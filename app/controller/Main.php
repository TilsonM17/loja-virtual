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
use CoffeeCode\Cropper\Cropper;

class Main
{

    private $plate;
    private $gestor;
    private $crooper;


    public function __construct()
    {
        // Create new Plates instance
        $this->plate = new Engine('../app/view');
        $this->gestor = GestorEntidade::GetEntityManager();
        $this->crooper = new Cropper("assets/resource/cache/img"); 
    }

    public function index()
    {
        //Buscar os livros na base de Dados e mandar os dados na View
        $l = (new EasyPDO())->select("SELECT * FROM vw_livro");
      
        echo $this->plate->render('home', [
            "livros" =>  $l,
            'crooper' => $this->crooper
        ]);
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
    /**
     * Retorna uma pagina com detalhes do respectivo livro
     */
    public function detalheLivro(string $id){

        $result = (new EasyPDO())->select("SELECT * FROM vw_livro WHERE id_livro = :id",[':id' => $id]);

        echo $this->plate->render("detalhe_livro",['livro' => $result, "crooper" => $this->crooper]);
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
        echo "<br>", "TERMINADO";
    }


    public function error($e)
    {
        echo $this->plate->render("_erro", ['e' => $e]);
    }
}
