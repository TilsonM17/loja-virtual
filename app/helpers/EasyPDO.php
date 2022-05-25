<?php
/*
|------------------------------------------------------------------------------
| EasyPDO
|
| A class to simplify the processes of connecting and communicating with
| databases through PDO (PHP Data Objects)
|
| @package      EasyPDO
| @author       João Ribeiro
| @version      1.0.0
|------------------------------------------------------------------------------
*/

namespace App\helpers;

use PDO;

class EasyPDO
{
    // ------------------------------------------------------------------------
    // CONNETION PROPERTIES
    // ------------------------------------------------------------------------
    private $db_host = 'localhost';
    private $db_name = DATA_NAME;
    private $db_user = DATA_USER;
    private $db_pass = DATA_PASS;
    private $db_char = 'utf8';

    // ------------------------------------------------------------------------
    // CLASS OPTIONS
    // ------------------------------------------------------------------------
    private $opt_display_errors = true;
    private $opt_display_warnings = true;
    private $opt_attr_errmode = PDO::ERRMODE_WARNING;
    private $opt_attr_case = PDO::CASE_NATURAL;
    private $opt_attr_oracle_nulls = PDO::NULL_NATURAL;
    private $opt_debug = true;
    // private $opt_fetch_mode = PDO::FETCH_OBJ; 
    private $opt_fetch_mode = PDO::FETCH_ASSOC; 

    // ------------------------------------------------------------------------
    // CLASS PROPERTIES
    // ------------------------------------------------------------------------
    private $connection;
    private $command;
    public $affectedRows = 0;

    // ========================================================================
    public function __construct(array $options = [])
    {
        // --------------------------------------------------------------------
        // check if PDO module is available
        $modules = get_loaded_extensions();
        if (!in_array('PDO', $modules) || !in_array('pdo_mysql', $modules)) {
            die('PDO or pdo_mysql modules are not available.');
        }

        // --------------------------------------------------------------------
        // check if the developer defined other connection options
        if (key_exists('db_host', $options)) $this->db_host = $options['db_host'];
        if (key_exists('db_name', $options)) $this->db_name = $options['db_name'];
        if (key_exists('db_user', $options)) $this->db_user = $options['db_user'];
        if (key_exists('db_pass', $options)) $this->db_pass = $options['db_pass'];
        if (key_exists('db_char', $options)) $this->db_char = $options['db_char'];

        // --------------------------------------------------------------------
        // check if database connection options are available
        if (empty($this->db_host)) $this->error('Host is empty.');
        if (empty($this->db_name)) $this->error('Database name is empty.');
        if (empty($this->db_user)) $this->error('Username is empty.');
        if (empty($this->db_pass)) $this->warning('Username has no password defined.');
        if (empty($this->db_char)) $this->db_char = 'utf8';

        // --------------------------------------------------------------------
        // establishes the connection
        $str = "mysql:host={$this->db_host};dbname={$this->db_name};charset={$this->db_char}";
        $this->connection = new PDO(
            $str,
            $this->db_user,
            $this->db_pass,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // --------------------------------------------------------------------
        // set attributes
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, $this->opt_attr_errmode);
        $this->connection->setAttribute(PDO::ATTR_CASE, $this->opt_attr_case);
        $this->connection->setAttribute(PDO::ATTR_ORACLE_NULLS, $this->opt_attr_oracle_nulls);
    }

    // ========================================================================
    // CRUD generic methods
    // ========================================================================
    public function select($query, $parameters = null, $class = null)
    {
        // runs a SELECT query
        if (!preg_match("/^SELECT/i", trim($query))) {
            $this->error('Not a SQL SELECT statment.');
            return null;
        }

        $results = null;
        $command = null;

        // query execution
        // execution
        try {

            $command = $this->connection->prepare($query);
            if ($parameters != null) {
                $command->execute($parameters);
            } else {
                $command->execute();
            }

            // --------------------------------------------------
            // fetch as assoc array            
            if ($this->opt_fetch_mode == PDO::FETCH_ASSOC && $class == null) {
                $results = $command->fetchAll(PDO::FETCH_ASSOC);
            } elseif ($this->opt_fetch_mode == PDO::FETCH_OBJ & $class == null) {
                $results = $command->fetchAll(PDO::FETCH_OBJ);
            } elseif ($class != null) {
                if (!class_exists($class)) {
                    if ($class == null) {
                        $this->error("Database Error: no class specified.");
                    } else {
                        $this->error("Database Error: class '$class' does not exists.");
                    }
                    $this->affectedRows == 0;
                    return null;
                } else {
                    $results = $command->fetchAll(PDO::FETCH_CLASS, $class);
                }
            }

        } catch (\PDOException $e) {
            $this->affectedRows = 0;
            $this->error($e->getMessage());
            return null;
        }

        //affected rows
        $this->affectedRows = $command->rowCount();

        //close connection
        $this->connection = null;

        //returns results
        return $results;
    }
    
    // ========================================================================
    public function insert($query, $parameters = null)
    {
        // runs an INSERT query
        if (!preg_match("/^INSERT/i", trim($query))) {
            $this->error('Not a SQL INSERT statment.');
            return null;
        }

        $command = null;

        // query execution
        // execution
        try {

            $command = $this->connection->prepare($query);
            if ($parameters != null) {
                $command->execute($parameters);
            } else {
                $command->execute();
            }
        } catch (\PDOException $e) {
            $this->affectedRows = 0;
            $this->error($e->getMessage());
            return null;
        }

        //affected rows
        $this->affectedRows = $command->rowCount();

        //close connection
        $this->connection = null;
    }

    // ========================================================================
    public function update($query, $parameters = null)
    {
        // runs an UPDATE query
        if (!preg_match("/^UPDATE/i", trim($query))) {
            $this->error('Not a SQL UPDATE statment.');
            return null;
        }

        $command = null;

        // query execution
        // execution
        try {

            $command = $this->connection->prepare($query);
            if ($parameters != null) {
                $command->execute($parameters);
            } else {
                $command->execute();
            }
        } catch (\PDOException $e) {
            $this->affectedRows = 0;
            $this->error($e->getMessage());
            return null;
        }

        //affected rows
        $this->affectedRows = $command->rowCount();

        //close connection
        $this->connection = null;
    }

    // ========================================================================
    public function delete($query, $parameters = null)
    {
        // runs an UPDATE query
        if (!preg_match("/^DELETE/i", trim($query))) {
            $this->error('Not a SQL DELETE statment.');
            return null;
        }

        $command = null;

        // query execution
        // execution
        try {

            $command = $this->connection->prepare($query);
            if ($parameters != null) {
                $command->execute($parameters);
            } else {
                $command->execute();
            }
        } catch (\PDOException $e) {
            $this->affectedRows = 0;
            $this->error($e->getMessage());
            return null;
        }

        //affected rows
        $this->affectedRows = $command->rowCount();

        //close connection
        $this->connection = null;
    }

    // ========================================================================
    // FETCH ONE ROW AT A TIME
    // ========================================================================
    public function select_start($query, $parameters = null)
    {
        // runs a SELECT query prepared for FETCH one row at a time
        if (!preg_match("/^SELECT/i", trim($query))) {
            $this->error('Not a SQL SELECT statment.');
            return null;
        }

        // query execution
        // execution
        try {

            $this->command = $this->connection->prepare($query);
            if ($parameters != null) {
                $this->command->execute($parameters);
            } else {
                $this->command->execute();
            }
        } catch (\PDOException $e) {
            $this->command = null;
            $this->error($e->getMessage());
            return null;
        }
    }

    // ========================================================================
    public function select_next_row($class = null)
    {
        // get the next row from the query generated at select_start
        if(!isset($this->connection) || !isset($this->command) || is_null($this->command)){
            $this->error('Unable to return next row, because MySQL command is not prepared.');
            return null;
        }

        // --------------------------------------------------
        // fetch as assoc array            
        if ($this->opt_fetch_mode == PDO::FETCH_ASSOC && $class == null) {
            return $this->command->fetch(PDO::FETCH_ASSOC);
        } elseif ($this->opt_fetch_mode == PDO::FETCH_OBJ & $class == null) {
            return $this->command->fetch(PDO::FETCH_OBJ);
        } elseif ($class != null) {
            if (!class_exists($class)) {
                if ($class == null) {
                    $this->error("Database Error: no class specified.");
                } else {
                    $this->error("Database Error: class '$class' does not exists.");
                }
                $this->affectedRows == 0;
                return null;
            } else {
                return $this->command->fetchObject($class);
            }
        }
    }

    // ========================================================================
    public function select_end()
    {
        // disables command
        $this->command = null;
    }

    // ========================================================================
    // generic query
    // ========================================================================
    public function query($query, $parameters = null, $class = null)
    {
        // executes a generic query
        if(preg_match("/^SELECT/i", trim($query))){
            return $this->select($query, $parameters, $class);
        } else if(preg_match("/^INSERT/i", trim($query))){
            return $this->insert($query, $parameters);
        } else if(preg_match("/^UPDATE/i", trim($query))){
            return $this->update($query, $parameters);
        } else if(preg_match("/^DELETE/i", trim($query))){
            return $this->delete($query, $parameters);
        } else {

            $command = null;

            try {

                $command = $this->connection->prepare($query);
                if ($parameters != null) {
                    $command->execute($parameters);
                } else {
                    $command->execute();
                }
            } catch (\PDOException $e) {
                $this->affectedRows = 0;
                $this->error($e->getMessage());
                return null;
            }
    
            //affected rows
            $this->affectedRows = $command->rowCount();
    
            //close connection
            $this->connection = null;

        }
    }

    // ========================================================================
    public function available_drivers()
    {
        // outputs the available PDO drivers
        echo '<pre>';
        print_r(PDO::getAvailableDrivers());
    }

    // ========================================================================
    private function warning($message)
    {
        // emmits a non destructive warning message
        if (!$this->opt_debug) return;
        if (!$this->opt_display_errors) return;
        $class_name = explode('\\', __CLASS__);
        $class_name = end($class_name);
        echo PHP_EOL . "$class_name - WARNING - $message" . PHP_EOL;
    }

    // ========================================================================
    private function error($message)
    {
        // exits class with a destructive error
        if (!$this->opt_debug) return;
        if (!$this->opt_display_warnings) return;
        $class_name = explode('\\', __CLASS__);
        $class_name = end($class_name);
        die(PHP_EOL . "$class_name - ERROR - $message" . PHP_EOL);
    }
}
