<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="?alugar">Alugar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?logar">Comprar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=cadastrar">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?logar"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
            </svg>
            Log-in
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <section class='containerContent' >
        <div class="logo">  
          <div class='contentLogo'>
            <h1>Imoboliaria Boa Vida</h1>
            <p>Sua casa dos sonhos na vida real</p>
      </div>
        </div>
          
    <div class="content">
            <h2>Compre ou Alugue sua casa com o melhor preço e qualidade!</h2>  
        <div class="experienceCards">
              <div class="card" style="width: 18rem;">
              <img src="img/casa1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Casas Arborizadas com um lindo conceito aberto.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="img/casa2.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Estilo e conforto com a maior segurança.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="img/casa3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Varandas incriveis com garagem externa.</p>
              </div>
        </div>  
        
          
      </div>
        <h2>Venha nos fazer uma visita!</h2>
          <iframe class="local" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.1132708188447!2d-47.21240988441905!3d-22.87227374239195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8b9576bd03a93%3A0xb652b12256f924!2sEtec%20-%20Escola%20T%C3%A9cnica%20Estadual%20de%20Hortol%C3%A2ndia!5e0!3m2!1spt-BR!2sbr!4v1661469684476!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      <h2>Alguns de nossos melhores empreendimentos</h2>
      <?php
//Chama uma função PHP que permite informar a classe e o Método que será acionado
if(isset($_GET['tipo'])){
  $imoveis = call_user_func(array('ImovelController','listarTipo'),$_GET['tipo']);
}else{
  $imoveis = call_user_func(array('ImovelController','listar'));
}

?>
<div class="container">
<table class="table" style="top:40px;">
        <tbody>
        <?php 
        $cont=0;
        //Verifica se houve algum retorno
        if (isset($imoveis) && !empty($imoveis)) {
          foreach ($imoveis as $imovel) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<td>';
            echo ' <img class="img-thumbnail" style="width: 300px; height:190px" src="data:'.$imovel->getFotoTipo().';base64,'.base64_encode($imovel->getFoto()).' " > <br>';
            echo substr($imovel->getDescricao(),0,70);
            echo '<br><strong>Valor: </strong>'.$imovel->getValor().'<br>';
            $tipo = $imovel->getTipo()=='A'?'Aluguel':'Venda';
            echo '<strong>Tipo: </strong>'.$tipo.'<br>';
            echo '<a href="index.php?action=editar&id='.$imovel->getId().'&page=imovel" class="btn btn-primary btn-sm">Comprar</a>&nbsp;&nbsp;&nbsp;';
            $cont++;
            if($cont==4)
              $cont=0;

          }
        }else{
            ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
        }
?>
        </tbody>
</table>
</div>

  </section>
  

