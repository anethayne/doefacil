<?php
    include("conexaoBD.php");
    session_start(); // Iniciar uma sessão

    // Verifica se os campos foram preenchidos
    if (empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario'])) {
        header('location:formLogin.php?erroLogin=dadosInvalidos');
        exit();
    }

    // Filtra os dados de entrada
    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
    $senhaDigitada = $_POST['senhaUsuario'];
    $quantidadeLogin = 0;

    // Corrige o nome da tabela para "usuario" (sem 's')
    $buscarLogin = "SELECT * FROM usuario WHERE email = '{$emailUsuario}'";

    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if ($registro = mysqli_fetch_assoc($efetuarLogin)) {
        // Verifica a senha usando password_verify()
        if (password_verify($senhaDigitada, $registro['senha'])) {
            $quantidadeLogin = 1;

            // Cria variáveis PHP a partir dos dados encontrados
            $idUsuario    = $registro['idUsuario'];
            $tipoUsuario  = $registro['tipoUsuario'];
            $emailUsuario = $registro['emailUsuario'];
            $nomeUsuario  = $registro['nome'];

            // Define variáveis de sessão
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            $_SESSION['emailUsuario'] = $emailUsuario;
            $_SESSION['nomeUsuario'] = $nomeUsuario;
            $_SESSION['logado'] = true;

            // Redireciona para a página inicial
            header('location:index.php');
            exit();
        }
    }

    // Se não encontrar ou senha inválida
    header('location:formLogin.php?erroLogin=dadosInvalidos');
    exit();
?>