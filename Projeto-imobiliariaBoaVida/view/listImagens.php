<?php
//Chama uma função PHP que permite informar a classe e o Método que será acionado

  $imagens = call_user_func(array('ImagensController','listar'));


?>
<div class="container">

<h1>Biblioteca de fotos </h1>
<hr>
<div class="img">
<table class="table" style="top:40px;">
        <tbody>
        <?php 
        $cont=0;
        //Verifica se houve algum retorno
        if (isset($imagens) && !empty($imagens)) {
          foreach ($imagens as $imagem) {
            
            if($cont==0){
              echo '<tr>';
            }
            echo '<div>';
            echo '<img class="img-thumbnail" style="width: 300px; height: 200px" src="'.$imagem->getPathadd().'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo '<br><a href="index.php?action=excluirImg&id='.$imagem->getId().'&idImovel='.$imagem->getIdImovel().'&page=imovel" class="btn btn-danger btn-sm">Excluir</a>&nbsp;&nbsp;&nbsp;';
            echo '</div>';
            
            

            $cont++;
            if($cont==4)
              $cont=0;

          }
        }else{
            ?>
                <tr>
                    <td colspan="3">Nenhuma foto cadastrada</td>
                </tr>
                <?php
        }
?>
</div>
        </tbody>
</table>
</div>


