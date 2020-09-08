<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>Kikids</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
    <nav class="navbar navbar-expand-lg fixed-top text-right azul shadow" id="navbar">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" style="height:40px; vertical-align: middle">  
        </a>
    </nav>
</header>
<body>
    <div class="container text-center my-5">
    <h2 class="titulo">Esqueceu sua senha? Sem problemas!</h2>
    <h4>Insira o seu email no campo abaixo e enviaremos um link para você.</h4>
        <div class="col-lg-4 offset-lg-4 mt-3">
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="email">
                </div> 
            </form>
            
                <button class="btn btn-info col-md-12 mb-2" id="enviaLink">Recuperar minha senha</button>
            
        </div>
    </div>
    <script>
        document.getElementById('enviaLink').addEventListener('click', enviar)
        function enviar() {
            email = document.getElementById('email').value;
            if (email == ''){
                alert("Insira seu email!"); 
                return false;
                } else {
                    alert("Link enviado! Confira sua caixa de entrada!");
                    window.open("index.php");
                }
        }
    </script>
    <footer class="text-center vermelho textoBranco">
        <div class="row ">
            <div class="col mt-5">
                <p>47 988475547<br>contatokikids@gmail.com</p>
            </div>
            <div class="col mt-5">
                <p>Todos os direitos reservados<br>
                <img src="img/logo.png" style="height:40px; vertical-align: middle"><br>
                2019</p>
            </div>
            <div class="col mt-5">
                <p>Jaraguá do Sul | Santa Catarina<br>Affonso Nicoluzzi, 653</p>
            </div>
        </div>
    </footer>
</body>
</html>