<?php


namespace App\models;

use App\helpers\Func;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use App\models\Livro;


/**
 * @Entity
 * @Table(name="tb_livro_img")
 */

class ImagenLivro
{



    /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_livro_img`",type="integer")
     */
    private int $id_livro_img;

    /**
     * 
     * @Column(name="`id_livro`",type="integer")
     */
    private $id_livro;


    /**
     * @Column(name="`img_nome`",type="string")
     */
    private string $img_nome;

    /**
     * @Column(name="`img_type`",type="string")
     */
    private string $img_type;


    public function GetIdLivroImg()
    {
        return $this->id_livro_img;
    }

    public function GetIdLivro()
    {
        return $this->id_livro;
    }
    public function SetIdLivro($livro)
    {
        $this->id_livro = $livro;
    }
    public function GetImgNome()
    {
        return $this->img_nome;
    }
    public function SetImgNome($img_nome)
    {
        $this->img_nome = $img_nome;
    }

    public function GetImgType()
    {
        return $this->img_type;
    }
    public function SetImgType($img_type)
    {
        $this->img_type = $img_type;
    }

    /*
     [test:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 
     [originalName:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 27-272348_docker-logo-png-transparent-png.png
     [mimeType:Symfony\Component\HttpFoundation\File\UploadedFile:private] => image/png
     [error:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 0
     [pathName:SplFileInfo:private] => /tmp/phpSbdlVQ
     [fileName:SplFileInfo:private] => phpSbdlVQ
    */
    public function cadastrarImagem($file, int $id_livro, $gestor)
    {
        if ($file->getError() != 0) {
            $_SESSION['_erro'] = "Não foi Completar a Inserção, Tente mais tarde";
            Func::redirect("livros");
            return;
        }

      //Novo nome
        $nome = date("Y-m-d") . "-" . Func::purl(3) . "." . $file->getClientOriginalExtension();

        $file->move(dirname(__DIR__,2) . "/public/assets/resource/upload/livros", $nome);
   

        // Fazer upload de uma imagem e inserir na base de dados
        $img = new ImagenLivro();
        $img->SetIdLivro($id_livro);
        $img->SetImgNome($nome);
        $img->SetImgType($file->getClientMimeType());
        $gestor->persist($img);
        $gestor->flush();

       
        $_SESSION['_sucesso'] = "Livro inserida com sucesso";
        Func::redirect("livros");

    }
}
