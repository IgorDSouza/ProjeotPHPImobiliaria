<?php
require_once 'model/Imagens.php';

class ImagensController{

    public static function salvar($fotoAtual="", $fotoTipo=""){

        $imagens = new Imagens();

        $imagem = array();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            $imagem['data'] = file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            $pathadd = 'imagens/'.$_FILES['foto']['name'];
            $imagem['pathadd'] = $pathadd;
            move_uploaded_file($_FILES['foto']['tmp_name'],$pathadd);
        }
        if(!empty($imagem)){
            $imagens->setFoto($imagem['data']);
            $imagens->setFotoTipo($imagem['tipo']);
            $imagens->setPathadd($imagem['pathadd']);
            if(!empty($_POST['pathadd'])){
                unlink($_POST['pathadd']);
            }
            

        }else{
            $imagens->setFoto($fotoAtual);
            $imagens->setFotoTipo($fotoTipo);
            $imagens->setPathadd($imagem['pathadd']);

        }
        
        
        $imagens->setIdImovel($_POST['idImovel']);


        $imagens->save();
    }

    public static function listar(){
        $idImovel = $_GET['idImovel'];
        $imagens = new Imagens();
        return $imagens->listAllImg($idImovel);
    }

    public static function editar($id){
    }

    public static function excluir($id){
        $imagens = new Imagens();
        $imagens = $imagens->remove($id);
    }
}

?>