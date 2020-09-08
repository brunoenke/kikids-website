<?php include('functions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>Kikids</title>
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

    <nav class="navbar navbar-expand-lg fixed-top text-right azul shadow" id="navbar">

        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" style="height:40px; vertical-align: middle">  
        </a>

        
        <div class="content">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php
                            $teste = $_SESSION['success'];
                            $_SESSION['success']  = "Usuário criado com sucesso!";
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <div>
                <div>
                    <?php 
                        if(isAdmin()){
                            echo"
                            <div class=\"dropdown\">
                                <button class=\"nav-item btn btn-sm btn-light dropdown-toggle\" 
                                type=\"button\" 
                                id=\"dropdownMenuButton\" 
                                data-toggle=\"dropdown\" 
                                aria-haspopup=\"true\" 
                                aria-expanded=\"false\">"
                                    .
                                $_SESSION['user']['username']
                                    .
                                "</button>
                                <div class=\"dropdown-menu\" 
                                aria-labelledby=\"dropdownMenuButton\">       
                                    <a class=\"dropdown-item\" 
                                    href=\"crud_perguntas.php\">Gerenciar Perguntas</a>        
                                    <a class=\"dropdown-item\" 
                                    href=\"crud_jogadores.php\">Gerenciar Jogadores</a>
                                    <a class=\"dropdown-item\" 
                                    href=\"relatorio.php\">Relatórios</a>                                    
                                </div>
                            </div>"
                        ;}else{
                            if(isset($_SESSION['user'])){
                            echo"<strong class=\"nav-item text-white\">" .  $_SESSION['user']['username'] . "</strong>";}
                        ;} 
                    ?>
                </div>
                </div>
            </div>
        </div>
              
        <div class="navbar-collapse collapse" id="menu">
            <ul class="nav navbar-nav navbar-right ml-auto">
                <li class="nav-item"><a class="nav-link textoBranco" href="index.php">Kikids</a></li>
                <li class="nav-item"><a class="nav-link textoBranco" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link textoBranco" href="logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>