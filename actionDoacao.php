<!-- Inclui o header.php -->
<?php include "header.php" ?>

    <div class="container mt-3 mb-3">

        <?php

            //Verifica o método de requisição do servidor
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Bloco para declaração de variáveis
                $data = $status = $cidade = $bairro = $rua = $estado = $numeroEstabelecimento = "";

                //Variável booleana para controle de erros de preenchimento
                $erroPreenchimento = false;

                

                //Validação do campo status
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["status"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>STATUS</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $status = filtrar_entrada($_POST["status"]);
                }

                //Validação do campo cidade
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cidade"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cidade = filtrar_entrada($_POST["cidade"]);
                }

                //Validação do campo data
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["data"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>DATA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $data = filtrar_entrada($_POST["data"]);

                    //Aplicar a função strlen() para verificar o comprimento da string da data
                    if(strlen($data) == 10){

                        //Aplicar a função substr() para gerar substrings para armazenar dia, mês e ano da doação
                        $diaDoacao = substr($data, 8, 2);
                        $mesDoacao = substr($data, 5, 2);
                        $anoDoacao = substr($data, 0, 4);
                    }
                }
                //Validação do campo cidade
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["cidade"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $cidade = filtrar_entrada($_POST["cidade"]);
                }


                //Validação do campo estado
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["estado"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>ESTADO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $estado = filtrar_entrada($_POST["estado"]);
                }


                //Validação do campo bairro
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["bairro"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>BAIRRO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $bairro = filtrar_entrada($_POST["bairro"]);
                }

                //Validação do campo rua
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["rua"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>RUA</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $rua = filtrar_entrada($_POST["rua"]);
                }
                
                //Validação do campo numeroEstabelecimento
                //Utiliza a função empty() para verificar se o campo está vazio
                if(empty($_POST["numeroEstabelecimento"])){
                    echo "<div class='alert alert-warning text-center'>O campo <strong>NÚMERO DO ESTABELECIMENTO</strong> é obrigatório!</div>";
                    $erroPreenchimento = true;
                }
                else{
                    //Armazena valor do formulário na variável
                    $numeroEstabelecimento = filtrar_entrada($_POST["numeroEstabelecimento"]);
                }


                //Se não houver erro de preenchimento, exibe alerta de sucesso e uma tabela com os dados informados
                if(!$erroPreenchimento && !$erroUpload){

                    //Cria uma variável para armazenar a QUERY para realizar a inserção dos dados do produto na tabela doacao
                    $inserirProduto = "INSERT INTO doacao (data, estado, cidade, rua, bairro, numero_estabelecimento) VALUES ('$data', '$estado', '$cidade', '$rua', '$bairro', '$numeroEstabelecimento')";

                    //Inclui o arquivo de conexão com o Banco de Dados
                    include("conexaoBD.php");

                    //Se conseguir executar a query para inserção, exibe alerta de sucesso e a tabela com os dados informados
                    if(mysqli_query($conn, $inserirProduto)){

                        echo "<div class='alert alert-success text-center'><strong>Produto</strong> cadastrado(a) com sucesso!</div>";
                        echo "
                            <div class='container mt-3'>
                                <table class='table'>
                                    <tr>
                                        <th>DATA</th>
                                        <td>$data</td>
                                    </tr>
                                    <tr>
                                        <th>ESTADO</th>
                                        <td>$estado</td>
                                    </tr>
                                    <tr>
                                        <th>RUA</th>
                                        <td>$rua</td>
                                    </tr>
                                    <tr>
                                        <th>BAIRRO</th>
                                        <td>$bairro</td>
                                    </tr>
                                    <tr>
                                        <th>CIDADE</th>
                                        <td>$cidade</td>
                                    </tr>
                                    <tr>
                                        <th>CIDADE</th>
                                        <td>$cidade</td>
                                    </tr>
                                    <tr>
                                        <th>NUMERO DO ESTABELECIMENTO</th>
                                        <td>$numeroEstabelecimento</td>
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