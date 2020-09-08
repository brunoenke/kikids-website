
<?php 

include("cabecalho.php");

require_once ('createDb.php');
// require_once ('component.php');

// create instance of Createdb class
$database = new CreateDb("bancoproduto", "pergunta");

?>

<body>

<div class="container">
    
        <div class="container">
            
        <br>
        <div class="card-deck mb-2 mx-auto" style="width: 60rem;">
        <div class="card shadow">
            <img src="img/logo.png" class="card-img-top mx-auto" alt="..." style="height:180px; width: 180px;">
            <div class="card-body">
                <h4 class="card-title text-center">O que é o Kikids?</h4>
                <p class="card-text">O Kikids é aplicativo para ajudar as crianças a comerem mais alimentos saudáveis</p>
            </div>
        </div>
        <div class="card shadow">
            <img src="img/doc.png" class="card-img-top mx-auto" alt="..." style="height:180px; width: 180px;">
            <div class="card-body">
                <h4 class="card-title text-center">Termos de Uso</h4>
                <p class="card-text">Clique aqui para ler os termos de uso e licenças
                </p>
            </div>
        </div>
        <div class="card shadow">
            <img src="img/admin.png" class="card-img-top mx-auto" alt="..." style="height:180px; width: 180px;">
            <div class="card-body">
                <h4 class="card-title text-center">Painel de Controle</h4>
                <p class="card-text"><a href="crud_perguntas.php">Gerenciar Perguntas</a></p>
                <p class="card-text"><a href="crud_jogadores.php">Gerenciar Jogadores</a></p>
                <p class="card-text"><a href="relatorio.php">Relatórios</a></p>
                
            </div>
        </div>
    </div>
    </div>
</div>
<br>
</body>
</html>
<?php include("rodape.php"); ?>