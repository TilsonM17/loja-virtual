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
 * @Table(name="tb_editora")
 */

class Editora
{

    /**
     * @Id
     * @GeneratedValue
     * @Column(name="`id_editora`",type="integer")
     */
    private int $id_editora;

    /**
     * @Column(name="`nome_editora`",type="string")
     */
    private string $nome_editora;
    
    
    public function GetId(){
      return $this->id_editora;
    }
    
    public function GetNomeEditora()
    {
        return $this->nome_editora;
    }


    public function cadastrarEditora(Request $request, $gestor){

         if(empty($request->request->get("nome") )){
                $_SESSION['_erro'] = "Estes campos não podem estar vazios";
                Func::redirect("admin/editora");
                return;
           }
              # --------------------------------------------------------------
           
           $this->nome_editora= htmlspecialchars($request->request->get("nome"));
      
           $gestor->persist($this);
           $gestor->flush();
         

           $_SESSION['_sucess'] = "Cadastro feito com sucesso!";
           Func::redirect("admin/editora");

    }

    public function apagarAutor(Request $request, $gestor,$id){
        $autor = $gestor->getRepository(Autor::class)->find($id);
        $gestor->remove($autor);
        $gestor->flush();
        $_SESSION['_sucess'] = "Autor apagado com sucesso!";
        Func::redirect();

    }

    public function atualizarAutor(Request $request, $gestor,$id){
      # Actualiza o autor
      $autor = $gestor->getRepository(Autor::class)->find($id);
      $autor->nome_autor = htmlspecialchars($request->request->get("primeiro_nome"));
      $autor->sobre_nome = htmlspecialchars($request->request->get("segundo_nome"));
      $gestor->persist($autor);
      $gestor->flush();
      $_SESSION['_sucess'] = "Autor atualizado com sucesso!";
      Func::redirect();
    }
}