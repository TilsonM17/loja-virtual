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
                Func::redirectAdmin("editora");
                return;
           }
              # --------------------------------------------------------------
           
           $this->nome_editora= htmlspecialchars($request->request->get("nome"));
      
           $gestor->persist($this);
           $gestor->flush();
         

           $_SESSION['_sucess'] = "Cadastro feito com sucesso!";
           Func::redirectAdmin("editora");

    }

    public function apagarEditora($gestor,$id){

        $editora = $gestor->getRepository(Editora::class)->find($id);
        $gestor->remove($editora);
        $gestor->flush();
        $_SESSION['_sucess'] = "Editora Eliminada com sucesso!";
        Func::redirectAdmin("editora");

    }

    public function atualizarEditora(Request $request, $gestor,$id){
      # Actualiza o editora
      $editora = $gestor->getRepository(Editora::class)->find($id);
      $editora->nome_editora = htmlspecialchars($request->request->get("nome"));
      $gestor->persist($editora);
      $gestor->flush();
      $_SESSION['_sucess'] = "Editora atualizado com sucesso!";
      Func::redirectAdmin();
      sleep(3);
      Func::redirectAdmin("editora");
    }
}