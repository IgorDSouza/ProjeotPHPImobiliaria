<?php
ob_start();
?>
<div class="container">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Adicionar Novas Imagens</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="file" class="form-control col-sm-8" name="foto" id="foto" required/>
                </div> 

                <div class="card-footer">
                    <input type="hidden" name="idImovel" id="idImovel" value="<?php echo $_GET["idImovel"] ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>
    <br><br><br>


<?php

//Verifica se o botão submit foi acionado

if(isset($_POST['btnSalvar'])){
    //Chama uma função PHP que permite informar a classe e o Método que será acionado
        if(isset($imagens)){
            call_user_func(array('ImagensController','salvar'),$imagens->getFoto(),$imagens->getFotoTipo());
        }else{
            call_user_func(array('ImagensController','salvar'));
        }
    }

require_once "listImagens.php";
ob_end_flush();

?>

