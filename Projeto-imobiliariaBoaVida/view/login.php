<div class="container">
    <form name="cadLogin" id="cadLogin" action="" method="post">
        <div class="card" style="top:40px; width: 50%;">
            <div class="card-header">
                <span class="card-title">Login</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário:</label>
                <input type="text" class="form-control col-sm-8" name="login" id="login" 
                value=""  required/>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha:</label>
                <input type="password" class="form-control col-sm-8" name="senha" id="senha" 
                value=""  required/>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" name="btnLogar" id="btnLogar" value="Logar">
            </div>
        </div>
    </form>
</div>

<?php

if(isset($_POST['btnLogar'])){


    $resultado= call_user_func(array('UsuarioController','logar'));
    

    $_SESSION['logado'] = $resultado[0];
     
    $_SESSION['verify'] = $resultado[1];

    $_SESSION['login'] = $_POST['login'];

    $logado = $_SESSION['logado'];

    if($logado == false ){
       echo "<script> window.alert( 'Usuario ou senha inválidos!');</script> "; 
    }
    else {
        header('Location: index.php?page=inicio');
    }
    
}
