<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Inclui conexão
    include("conexaoBD.php");

    //Declaração de variáveis
    $data = $cidade = $bairro = $rua = $estado = $numeroEstabelecimento = $email = "";
    $erroPreenchimento = false;

    //Função para filtrar entrada de dados
    function filtrar_entrada($dado){
        $dado = trim($dado);
        $dado = stripslashes($dado);
        $dado = htmlspecialchars($dado);
        return $dado;
    }

    //Valida campos
    $campos = ["data","cidade","bairro","rua","estado","numeroEstabelecimento","email"];
    foreach($campos as $campo){
        if(empty($_POST[$campo])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>".strtoupper($campo)."</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else {
            $$campo = filtrar_entrada($_POST[$campo]);
        }
    }

    //Se não houver erros, insere no banco
    if(!$erroPreenchimento){

        $inserirDoacao = "INSERT INTO doacao (data, estado, cidade, rua, bairro, numero_estabelecimento, email, status) 
                          VALUES ('$data', '$estado', '$cidade', '$rua', '$bairro', '$numeroEstabelecimento', '$email', 'disponivel')";

        if(mysqli_query($conn, $inserirDoacao)){

            $idDoacao = mysqli_insert_id($conn);

            echo "<div class='alert alert-success text-center'>
                    <strong>Doação</strong> cadastrada com sucesso!
                </div>";

            mysqli_close($conn);

            // Redireciona para o formulário de produtos
            header("Location: formProduto.php?idDoacao=$idDoacao");
            exit;

        } else {
            echo "<div class='alert alert-danger text-center'>
                    Erro ao cadastrar a doação: ".mysqli_error($conn)."
                </div>";
        }

    }

} else {
    //Se não for POST, redireciona para o formulário
    header("Location: formDoacao.php");
    exit;
}
?>
