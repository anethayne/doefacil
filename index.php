<?php include "header.php"; ?>

<div class="container mt-5 mb-5">

    <?php
        include "conexaoBD.php";

        // SQL inicial
        $listarDoacoes = "SELECT * FROM Produtos";

        // Verifica filtro
        if(isset($_GET['filtroProduto'])){
            $filtroProduto = $_GET['filtroProduto'];

            if($filtroProduto != 'todos'){
                $listarDoacoes .= " WHERE statusProduto = '$filtroProduto' ";
            }

            switch($filtroProduto){
                case "todos": 
                    $mensagemFiltro = "no total";
                break;

                case "disponivel": 
                    $mensagemFiltro = "disponíveis";
                break;

                case "esgotado": 
                    $mensagemFiltro = "esgotados";
                break;

                default: 
                    $mensagemFiltro = "no total";
                break;
            }

        } else {
            $filtroProduto = "todos";
            $mensagemFiltro = "no total";
        }

        // Executa consulta
        $res = mysqli_query($conn, $listarDoacoes);
        $totalDoacoes = mysqli_num_rows($res);

        // Mensagem de quantidade
        if($totalDoacoes > 0){
            echo "<div class='alert alert-info text-center'>
                    Há <strong>$totalDoacoes</strong> doações $mensagemFiltro cadastradas!
                  </div>";
        } else {
            echo "<div class='alert alert-warning text-center'>
                    Não há doações cadastradas no sistema!
                  </div>";
        }

        // Formulário de filtro
        echo "
            <form name='formFiltro' action='index.php' method='GET' class='mb-4'>
                <div class='row align-items-end'>
                    <div class='col-md-9'>
                        <div class='form-floating'>
                            <select class='form-select' name='filtroProduto' required>
                                <option value='todos' ".($filtroProduto == 'todos' ? "selected" : "").">Exibir todas as Doações</option>
                                <option value='disponivel' ".($filtroProduto == 'disponivel' ? "selected" : "").">Exibir apenas Doações disponíveis</option>
                                <option value='esgotado' ".($filtroProduto == 'esgotado' ? "selected" : "").">Exibir apenas Doações esgotadas</option>
                            </select>
                            <label for='filtroProduto'>Selecione um Filtro</label>
                        </div>
                    </div>
                    <div class='col-md-3 text-end'>
                        <button type='submit' class='btn btn-outline-success w-100'>
                            <i class='bi bi-funnel'></i> Filtrar
                        </button>
                    </div>
                </div>
            </form>
        ";
    ?>

    <hr>

    <div class="row">
        <?php
