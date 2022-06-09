<?php

namespace App\models;

use App\helpers\Func;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Entity
 * @Table(name="tb_autor")
 */

class Autor
{

    /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_autor`",type="integer")
     */
    private int $id_autor;
    /**
     * @Column(name="`nome_autor`",type="string")
     */
    private string $nome_autor;
      /**
      * @Column(name="`sobre_nome`",type="string")
      */
    private $sobre_nome;
    
    public function GetId(){
      return $this->id_autor;
    }
    public function GetNomeAutor()
    {
        return $this->nome_autor;
    }

    public function GetSobreNome()
    {
        return $this->sobre_nome;
    }

    public function cadastrarAutor(Request $request, $gestor){

         if(empty($request->request->get("segundo_nome")) || empty($request->request->get("primeiro_nome"))){
                $_SESSION['_erro'] = "Estes campos não podem estar vazios";
                Func::redirectAdmin("autor");
                return;
           }
              # --------------------------------------------------------------
             $n1 = htmlspecialchars($request->request->get("primeiro_nome"));
             $n2 = htmlspecialchars($request->request->get("segundo_nome"));
           
           $this->nome_autor = $n1;
           $this->sobre_nome = $n2;
           $gestor->persist($this);
           $gestor->flush();
         

           $_SESSION['_sucess'] = "Cadastro feito com sucesso!";
           Func::redirectAdmin("autor");

    }

    public function apagarAutor(Request $request, $gestor,$id){
        $autor = $gestor->getRepository(Autor::class)->find($id);
        $gestor->remove($autor);
        $gestor->flush();
        $_SESSION['_sucess'] = "Autor apagado com sucesso!";
        Func::redirectAdmin("autor");

    }

    public function atualizarAutor(Request $request, $gestor,$id){
      # Actualiza o autor
      $autor = $gestor->getRepository(Autor::class)->find($id);
      $autor->nome_autor = htmlspecialchars($request->request->get("primeiro_nome"));
      $autor->sobre_nome = htmlspecialchars($request->request->get("segundo_nome"));
      $gestor->persist($autor);
      $gestor->flush();
      $_SESSION['_sucess'] = "Autor atualizado com sucesso!";
      Func::redirectAdmin("autor");
    }
}
