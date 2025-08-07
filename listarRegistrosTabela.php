<?php include "header.php" ?>

<div class='container mt-3 mb-3'>
    <?php
        echo "<h3 class='text-center'>Listar registros em uma TABELA:</h3>";

        //QUERY para listar TODOS os registros da tabela Produtos
        //QUERY é um comando SQL (Structured Query Language)
        $listarProdutos = "SELECT * FROM Produtos";

        include "conexaoBD.php"; //Incliu o arquivo de conexão com o BD
        //A função mysqli_query() é rosponsável pela execução de comando SQL nop BD
        $resultado = mysqli_query($conn, $listarProdutos) or die("Erro ao tentar Listar Produtos");
        $totalProdutos = mysqli_num_rows($resultado); //Busca o total de produtos na QUERY

        echo "
            <div class = 'alert alert-info text-center'>
                Há <strong> $totalProdutos </strong> produto(s) cadastrado(s) em nosso sistema
            </div>
        ";

        //Monta o cabeçalho da tabela para exibir os produtos
        echo "
            <table class = 'table'>
                <thead class = 'table-dark'>
                    <tr>
                        <th>ID</th>
                        <th>FOTO</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>VALOR</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
        ";

        //Enquanto houver registros, executa a função abaixo para armazena-los nas variáveis
        while($registro = mysqli_fetch_assoc($resultado)){
            //Cria variáveis PHP e armazena os registros encontrados pela QUERY
            $idProduto = $registro['idProduto'];
            $fotoProduto = $registro['fotoProduto'];
            $nomeProduto = $registro['nomeProduto'];
            $descricaoProduto = $registro['descricaoProduto'];
            $valorProduto = $registro['valorProduto'];
            $statusProduto = $registro['statusProduto'];

            //Exibe os valores armazenados pelas variáveis
            echo "
                <tr>
                    <td>$idProduto</td>
                    <td><img src = '$fotoProduto' title = 'Foto de $nomeProduto' style = 'width:70px'></td>
                    <td>$nomeProduto</td>
                    <td>$descricaoProduto</td>
                    <td>$valorProduto</td>
                    <td>$statusProduto</td>
                </tr>
            ";
        }
        echo "</tbody>";//Fechamento do corpo da tabela
        echo "</table>";//Fechamento da tabela
        mysqli_close($conn);//Encerra a conexão com o BD
    ?>
</div>

<?php include "footer.php" ?>
