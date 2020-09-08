<?php

  include("functions.php");

  session_start();

    //validar_sessao();

  include("p_cabecalho.php");

    // Matar a sessao

    session_destroy();

    // matar o cookie

    setcookie("usuario",'');

    unset($_COOKIE["usuario"]);

    setcookie("nome",'');

    unset($_COOKIE["nome"]);

    // redirecionar para o login
    header("Location: login.php");

?>