<?php include('cabecalho.php'); 
    require_once ('functions.php');?>
<body>
    <form class="my-4" method="post" action="create_user.php">
        <!-- php  = POST - form -->   
        <div class="text-center my-4">
            <h1 class="cadastroLogin">Cadastro de Usuário</h1>
            <p>Por favor, preencha todos os campos abaixo.</p>
        </div>
        <!-- The carousel -->
    <div class="col-md-8 offset-md-2 mb-5">
        <div id="myCarousel" class="carousel slide" data-interval="false">
                <!-- The slideshow -->
            <div class="carousel-inner">
                    <div class="carousel-item active" id="1">
                        <div class="col-md-6 col-sm-12 offset-lg-3 offset-md-4 mb-3 form-style" id="meuForm">

                            <label class="titulo">Digite o seu apelido</label>
                            <input class="form-control" type="text" name="apelido" id="apelido" value="">
                            <small><span class="helper-text"></span></small>

							<label class="titulo mt-4">Escolha o seu avatar</label>
                            <input class="form-control" type="text" name="avatar" id="avatar" value="" step="0.01" min="0.01"> 
                            <small><span class="helper-text"></span></small>
                        </div>
                    </div> 
            </div>

            <div class="text-center col-md-6 offset-md-3 mt-2">
				<input class="btn btn-md btn-light col-md-3 col-sm-12 float-right" type="submit" value="Enviar" name="enviar">
            </div>
        </div>
    </div>         
    </form>

	<?php 
    $apelido = filter_input(INPUT_POST, "apelido",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = filter_input(INPUT_POST, "avatar",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (($apelido) && ($avatar)) {
		//trocar para funcao
		require("db_conectar.php");

		$sql = "INSERT INTO avatar (id, apelido, avatar) VALUES (NULL, :apelido, :avatar);";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':apelido', $apelido);
        $stmt->bindValue(':avatar', $avatar);
		
        if($stmt->execute()) {
			echo "Registro inserido com sucesso!<br>";
			//troca url
            echo "<a href=index.php>Voltar</a>";
        } else {
            echo "Erro: " . $stmt->errorCode();
        }    
    }
include('rodape.php');
?>
</body>
</html>