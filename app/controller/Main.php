<?php

namespace App\controller;

use App\helpers\DB;
use App\helpers\EasyPDO;
use App\helpers\Email;
use App\helpers\Func;
use App\models\ImagenLivro;
use App\models\Livro;
use League\Plates\Engine;
use App\models\Usuario;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
       #  $l = (new EasyPDO())->select("SELECT i.id_livro,nome_livro, autor,preco,quantidade_estoque,img_nome FROM tb_livro_img as i inner join tb_livro as l on l.id_livro = i.id_livro;");
     
        # Renderizar na View
        echo $this->plate->render('home', ["livros" =>  '']);
    }

    public function nova_conta()
    {
        echo $this->plate->render("nova_conta");
    }

    /**
     * Cadatrar novos usuarios na Loja
     */
    public function nova_conta_submit(Request $request)
    {
        


        die();
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

        #region Redirecionar para a sala de espera se verdadeiro
        # vai pra
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

     
        echo "<br>", "TERMINADO";
    }


    public function error($e)
    {
        echo $this->plate->render("_erro", ['e' => $e]);
    }
}
