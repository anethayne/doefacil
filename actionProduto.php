<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $fotoProduto = $nomeProduto = $descricaoProduto = $categoriaProduto = $dataValidadeProduto = $quantidadeProduto = "";

                //Variável booleana para controle de erros de preenchimento
                $erroPreenchimento = false;

                

                //Validação do campo nome
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["nomeProduto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $nomeProduto = filtrar_entrada($_POST["nomeProduto"]);
                }

                //Validação do campo descricao
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["descricaoProduto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DESCRIÇÃO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $descricaoProduto = filtrar_entrada($_POST["descricaoProduto"]);
                }

                //Validação do campo dataValidade
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["dataValidadeProduto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DATA DE VALIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $dataValidadeProduto = filtrar_entrada($_POST["dataValidadeProduto"]);

                    //Aplicar a função strlen() para verificar o comprimento da string da dataValidade
                    if(strlen($dataValidadeProduto) == 10){

                        //Aplicar a função substr() para gerar substrings para armazenar dia, mês e ano da validade do produto
                        $diaValidadeProduto = substr($dataValidadeProduto, 8, 2);
                        $mesValidadeProduto = substr($dataValidadeProduto, 5, 2);
                        $anoValidadeProduto = substr($dataValidadeProduto, 0, 4);
                    }
                }
                //Validação do campo categoria
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["categoriaProduto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CATEGORIA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $categoriaProduto = filtrar_entrada($_POST["categoriaProduto"]);
                }

                if(empty($_POST["quantidadeProduto"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>QUANTIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $quantidadeProduto = filtrar_entrada($_POST["quantidadeProduto"]);
                }

                //Início da validação da url
                $diretorio    = "img/"; //Define para qual diretório as imagens serão movidas
                $fotoProduto  = $diretorio . basename($_FILES['fotoProduto']['name']); //img/joaozinho.jpg
                $tipoDaImagem = strtolower(pathinfo($fotoProduto, PATHINFO_EXTENSION)); //Pega o tipo do arquivo em letras minúsculas
                $erroUpload   = false; //Variável para controle do upload da foto

                //Verifica se o tamanho do arquivo é DIFERENTE DE ZERO
                if($_FILES['fotoProduto']['size'] != 0){

                    //Verifica se o tamanho do arquivo é maior do que 5 MegaBytes (MB) - Medida em Bytes
                    if($_FILES['fotoProduto']['size'] > 5000000){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve ter tamanho máximo de 5MB!</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a foto está nos formatos JPG, JPEG, PNG ou WEBP
                    if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                        echo "<div class='alert alert-warning text-center'>A <strong>FOTO</strong> deve estar nos formatos JPG, JPEG, PNG ou WEBP</div>";
                        $erroUpload = true;
                    }

                    //Verifica se a imagem foi movida para o diretório IMG, utilizando a função move_uploaded_file
                    if(!move_uploaded_file($_FILES['fotoProduto']['tmp_name'], $fotoProduto)){
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!</div>";
                        $erroUpload = true;
                    }

                }
                else{
                    echo "<div class='alert alert-warning text-center'>O campo <strong>FOTO</strong> é obrigatório!</div>";
                    $erroUpload = true;
                }

                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento && !$erroUpload){

                    $idDoacao = $_POST['idDoacao'];

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do produto na tabela Produtos
                    $inserirProduto = "INSERT INTO Produtos (url, nome, descricao, categorias, data_validade, quantidade, id_doacao) VALUES ('$fotoProduto', '$nomeProduto', '$descricaoProduto', '$categoriaProduto', '$dataValidadeProduto', '$quantidadeProduto', '$idDoacao')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirProduto)){

                        echo "<div class='alert alert-success text-center'><strong>Produto</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <div class='container mt-3 text-center'>
                                    <img src='$fotoProduto' style='width:150px;' title='Foto de $nomeProduto'>
                                </div>
                                <table class='table'>
                                    <tr>
                                        <th>NOME</th>
                                        <td>$nomeProduto</td>
                                    </tr>
                                    <tr>
                                        <th>DESCRIÇÃO DO PRODUTO</th>
                                        <td>$descricaoProduto</td>
                                    </tr>
                                    <tr>
                                        <th>DATA DE VALIDADE DO PRODUTO</th>
                                        <td>$dataValidadeProduto</td>
                                    </tr>
                                    <tr>
                                        <th>CATEGORIA DO PRODUTO</th>
                                        <td>$categoriaProduto</td>
                                    </tr>
                                    <tr>
                                        <th>QUANTIDADE DO PRODUTO</th>
                                        <td>$quantidadeProduto</td>
                                    </tr>
                                    
                                    
                                    </table>
                            </div>
                        ";
                        mysqli_close($conn); //Essa função encerra a conexão com o Banco de Dados
                    }
                    else{
                        echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Produto</strong> no Banco de Dados $database!</div>" . mysqli_error($conn);
                    }
                }
            }
            else{
                //Redireciona o usuário para o formProduto.php
                header("location:formProduto.php");
            }

            //Função para filtrar entrada de dados
            function filtrar_entrada($dado){
                $dado = trim($dado); //Remove espaços desnecessários
                $dado = stripslashes($dado); //Remove barras invertidas
                $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML

                //Retorna o dado após filtrado
                return($dado);
            }
        ?>

    </div>

<!-- Inclui o footer.php -->
<?php include "footer.php" ?>