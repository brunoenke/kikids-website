<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function () {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        } 
    </script>
</head>

<header>

    <nav class="navbar navbar-expand-lg fixed-top text-left azul shadow" id="navbar">

        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" style="height:40px; vertical-align: middle">  
        </a>

        
        <div class="content">
            <div>
                <div>
                    <?php 
                        if(isAdmin()){
                            echo"<strong class=\"nav-item textoBranco\">" .  $_SESSION['user']['username'] . "</strong>"
                        ;}else{
                            if(isset($_SESSION['user'])){
                            echo"<strong class=\"nav-item textoBranco\">" .  $_SESSION['user']['username'] . "</strong>";}
                        ;} 
                    ?>
                </div>
                </div>
            </div>
        </div>
              
        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav navbar-right ml-auto">
            <li class="nav-item"><a class="nav-link textoBranco" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link textoBranco" href="crud_perguntas.php">Gerenciar Perguntas</a></li>
            <li class="nav-item"><a class="nav-link textoBranco" href="crud_jogadores.php">Gerenciar Jogadores</a></li>
            <li class="nav-item"><a class="nav-link textoBranco" href="relatorio.php">Relatórios</a></li>               
                <!-- <li class="nav-item"><a class="nav-link textoBranco" href="login.php">Login</a></li> -->
                <li class="nav-item"><a class="nav-link textoBranco" href="logout.php">Sair</a></li>
            </ul>
        </div>
        
    </nav>
</header>
<br>