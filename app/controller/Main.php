<?php

namespace App\controller;

use App\helpers\Email;
use App\helpers\Func;
use App\models\ImagenLivro;
use App\models\Livro;
use League\Plates\Engine;
use App\models\Usuario;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use TilsonM17\config\GestorEntidade;


class Main
{

    private $plate;
    private $gestor;


    public function __construct()
    {
        // Create new Plates instance
        $this->plate = new Engine('../app/view');
        $this->gestor = GestorEntidade::GetEntityManager();
    }

    public function index()
    {
        //Buscar os livros na base de Dados e mandar os dados na View

        $query = $this->gestor->createQuery('SELECT DISTINCT u.id_livro FROM App\models\Livro u ');
        $users = $query->getResult(); // array of ForumUser objects with the avatar association loaded
        Func::printArray($users);


        $l = $this->gestor->getRepository(Livro::class)->findAll();
        $livros = (new ImagenLivro)->mesclarImagemLivros($l, $this->gestor);

        # Renderizar na View
        echo $this->plate->render('home', ["livro" => $livros]);
    }

    public function nova_conta()
    {
        echo $this->plate->render("nova_conta");
    }

    /**
     * Cadatrar novos usuarios na Loja
     */
    public function nova_conta_submit()
    {
        #Verifica se os imputs estão vazios
        if (empty($_POST['nome']) or empty($_POST['email']) or empty($_POST['senha'])) {
            $_SESSION['_erro'] = "Os Campos não pode estar vazio";
            Func::redirect("nova_conta");
        }

        #Validar email
        if (!Func::validarEmail($_POST['email'])) {
            $_SESSION['_erro'] = "Email invalido";
            Func::redirect("nova_conta");
        }

        #Saber se este usuario ja existe
        $retorno = $this->gestor->getRepository(Usuario::class)->findOneBy([
            'email' => $_POST['email']
        ]);
        if (is_object($retorno)) {
            if (empty($retorno->purl)) {
                Func::redirect("confirmar_email");
                return;
            }
            $_SESSION['_erro'] = "Email ja cadastrado";
            Func::redirect("nova_conta");
            return;
        }


        #region Inserir na base de Dados
        $user = new Usuario();

        $user->SetNome($_POST['nome']);
        $user->SetEmail($_POST['email']);
        $user->SetSenha($_POST['senha']);
        $user->SetPurl(Func::purl());

        $params = [
            'nome'  =>  $user->GetNome(), //Nome
            'email' =>  $user->GetEmail(), //Email
            'purl'  => $user->GetPurl() //Purl
        ];

        $this->gestor->persist($user);

        $this->gestor->flush();
        #endregion

        #region Confirmar email
        $email = new Email(new PHPMailer(true));

        $retorno = $email->EnviarEmail($params);
        #endregion 

        #region Redirecionar para a sala de espera
        if ($retorno != true) {
            Func::redirect();
        } else {
            #Armazenar em um cookie o email do usuario
            setcookie("email", $user->GetEmail(), time() + (86400 * 30), "/");

            #Redirecionar para a sala de espera
            Func::redirect("confirmar_email");
        }
        #endregion 


    }

    public function confirmar_email()
    {
        echo $this->plate->render("sala_espera");
    }

    public function confirmar_email_submit()
    {
        echo "submit";
    }

    public function erro_envio_email()
    {
    }
    public function validar_email_submit($purl)
    {
        echo $purl;
    }
    /**
     * Renderiza a tela de login
     */
    public function login()
    {
        echo $this->plate->render("login");
    }
    /**
     * Fazer Login
     */
    public function login_submit()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) {
            $_SESSION['_erro'] = "Os Campos não podem estar vazios";
            Func::redirect("login");
            return;
        }

        # Passou
        $usuario = new Usuario;
        $usuario->SetEmail($email);
        $usuario->SetSenhaNormal($senha);

        $usuario->fazerLogin($this->gestor);
    }
    public function teste()
    {

        #region Teste


        # Configuarar a EntidadeFunc::redirect("nova_conta");
        /*
       $u = new Usuario();
       $u->SetNome("Eduardo Brandão");
       $u->SetEmail("brandao@gmail.com");
       $u->SetSenha("#imports;");
 
       # Avisar ao Gestor que uma nova classe vai ser inserida na DB
        $this->gestor->persist($u);
        $this->gestor->flush();
        

        #region SELECT BUSCAR TUDO
        $retorno = $this->gestor->getRepository(Usuario::class)->findAll();
        foreach ($retorno as $key => $value) {
                echo "{$value->GetNome()}","<br>";
            }
      

        #region SELECT BUSCAR POR ID
        $retorno = $this->gestor->find(Usuario::class,2);
         echo "{$retorno->GetNome()}","<br>";
        

        #region SELECT BUSCAR POR NOME
            $retorno = $this->gestor->getRepository(Usuario::class)->findOneBy([
                'email' => 'tilsonmat@gmail.com'
            ]);

            Func::printArray($retorno);
        */

        #endregion
        #id_livro, nome_livro, autor, data_lancamento, preco, ativo, quantidade_estoque, created_at, update_at, deleted_at



        $variable = [
            ["O Guia do codigo amador", "Caelum", "2012-04-23", 10000, "Y", 100],
            ["Apreenda Python", "TilsonM17", "2015-04-23", 15000, "Y", 100,],
            /*["O amador","Caelum","2012-04-23",19000,"Y",100,],
              ["Via e obra de Neto","Caelum","2012-05-13",20000,"Y",100,],
              ["Velit fugiat non velit qui consectetur esse consequat sint.","Caelum","2019-09-03",5000,"Y",100,],
              ["Deserunt dolore minim non velit qui tempor cupidatat labore.","Caelum","2022-02-23",80000,"Y",100,]
*/
        ];


        foreach ($variable as $key => $value) {
            $index = 1;
            $l = new Livro();
            $l->SetNome($value[0]);
            $l->SetAutor($value[1]);
            $l->SetDataLancamento($value[2]);
            $l->SetPreco($value[3]);
            $l->SetAtivo($value[4]);
            $l->SetQuantidadeEstoque($value[5]);
            $l->SetCreatedAt(date("Y-m-d H:i:s"));
            #Inserir O livro
            $this->gestor->persist($l);
            $this->gestor->flush();

            $i = new ImagenLivro();

            $i->SetIdLivro($l);
            $i->SetImgNome("0{$index}.jpg");
            $index + 1;
            #Inserir O Imagem
            $this->gestor->persist($i);
            $this->gestor->flush();
        }

        Func::printArray($variable, $l);
        echo "<br>";

        echo "<br>", "TERMINADO";
    }


    public function error($e)
    {
        echo $this->plate->render("_erro", ['e' => $e]);
    }
}
