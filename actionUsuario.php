<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3" style="padding-top:100px; padding-bottom:100px;">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Inclui o arquivo de conexão
    include("conexaoBD.php");

    // Função para sanitizar entrada de dados
    function filtrar_entrada($dado) {
        $dado = trim($dado);
        $dado = stripslashes($dado);
        $dado = htmlspecialchars($dado);
        return $dado;
    }

    // Variáveis
    $erroPreenchimento = false;

    // Valida CPF
    if (empty($_POST["cpfUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>CPF</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $cpfUsuario = filtrar_entrada($_POST["cpfUsuario"]);
    }

    // Valida Nome
    if (empty($_POST["nomeUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>NOME</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]);
        if (!preg_match('/^[\p{L} ]+$/u', $nomeUsuario)) {
            echo "<div class='alert alert-warning'>O campo <strong>NOME</strong> deve conter apenas letras!</div>";
            $erroPreenchimento = true;
        }
    }

    // Valida Data de Nascimento
    if (empty($_POST["dataNascimentoUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>DATA DE NASCIMENTO</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $dataNascimentoUsuario = filtrar_entrada($_POST["dataNascimentoUsuario"]);
        if (strlen($dataNascimentoUsuario) == 10) {
            $dia = substr($dataNascimentoUsuario, 8, 2);
            $mes = substr($dataNascimentoUsuario, 5, 2);
            $ano = substr($dataNascimentoUsuario, 0, 4);
            if (!checkdate($mes, $dia, $ano)) {
                echo "<div class='alert alert-warning'><strong>DATA INVÁLIDA</strong></div>";
                $erroPreenchimento = true;
            }
        } else {
            echo "<div class='alert alert-warning'><strong>DATA INVÁLIDA</strong></div>";
            $erroPreenchimento = true;
        }
    }

    // Endereço
    if (empty($_POST["enderecoUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>ENDEREÇO</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $enderecoUsuario = filtrar_entrada($_POST["enderecoUsuario"]);
    }

    // Telefone
    if (empty($_POST["telefoneUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $telefoneUsuario = filtrar_entrada($_POST["telefoneUsuario"]);
    }

    // Email
    if (empty($_POST["emailUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);
    }

    // Senha
    if (empty($_POST["senhaUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>SENHA</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $senhaOriginal = filtrar_entrada($_POST["senhaUsuario"]);
    }

    // Confirmação de Senha
    if (empty($_POST["confirmarSenhaUsuario"])) {
        echo "<div class='alert alert-warning'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $confirmarSenha = filtrar_entrada($_POST["confirmarSenhaUsuario"]);
        if ($senhaOriginal !== $confirmarSenha) {
            echo "<div class='alert alert-warning'>As <strong>SENHAS</strong> informadas são diferentes!</div>";
            $erroPreenchimento = true;
        } else {
            $senhaUsuario = password_hash($senhaOriginal, PASSWORD_DEFAULT);
        }
    }

    // Upload da foto
    $diretorio = "img/";
    $fotoUsuario = $diretorio . basename($_FILES['fotoUsuario']['name']);
    $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));
    $erroUpload = false;

    if ($_FILES['fotoUsuario']['size'] != 0) {
        if ($_FILES['fotoUsuario']['size'] > 5000000) {
            echo "<div class='alert alert-warning'>A <strong>FOTO</strong> deve ter no máximo 5MB!</div>";
            $erroUpload = true;
        }

        if (!in_array($tipoDaImagem, ["jpg", "jpeg", "png", "webp"])) {
            echo "<div class='alert alert-warning'>A <strong>FOTO</strong> deve ser JPG, JPEG, PNG ou WEBP.</div>";
            $erroUpload = true;
        }

        if (!move_uploaded_file($_FILES['fotoUsuario']['tmp_name'], $fotoUsuario)) {
            echo "<div class='alert alert-danger'>Erro ao mover a <strong>FOTO</strong> para o diretório!</div>";
            $erroUpload = true;
        }
    } else {
        echo "<div class='alert alert-warning'>O campo <strong>FOTO</strong> é obrigatório!</div>";
        $erroUpload = true;
    }

    // Se tudo OK, insere no banco
    if (!$erroPreenchimento && !$erroUpload) {
        $query = "INSERT INTO usuario (url, email, senha, telefone, endereco, nome, data_nascimento, cpf) 
                  VALUES ('$fotoUsuario', '$emailUsuario', '$senhaUsuario', '$telefoneUsuario', '$enderecoUsuario', '$nomeUsuario', '$dataNascimentoUsuario', '$cpfUsuario')";

        if (mysqli_query($conn, $query)) {
            echo "<div class='alert alert-success'><strong>Usuário</strong> cadastrado com sucesso!</div>";
            echo "
                <div class='container mt-3'>
                    <div class='text-center'>
                        <img src='$fotoUsuario' style='width:150px;' alt='Foto de $nomeUsuario'>
                    </div>
                    <table class='table'>
                        <tr><th>NOME</th><td>$nomeUsuario</td></tr>
                        <tr><th>DATA DE NASCIMENTO</th><td>$dia/$mes/$ano</td></tr>
                        <tr><th>ENDEREÇO</th><td>$enderecoUsuario</td></tr>
                        <tr><th>TELEFONE</th><td>$telefoneUsuario</td></tr>
                        <tr><th>EMAIL</th><td>$emailUsuario</td></tr>
                    </table>
                </div>
            ";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar usuário: " . mysqli_error($conn) . "</div>";
        }

        mysqli_close($conn);
    }
} else {
    header("Location: formUsuario.php");
    exit();
}
?>

</div>

<?php include "footer.php" ?>