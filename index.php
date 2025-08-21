<?php include "header.php" ?>

<div class='container mt-5 mb-5'>

    <?php
        include "conexaoBD.php";

        $listarDoacoes = "SELECT * FROM Produtos"; // ainda usa a mesma tabela

        if(isset($_GET['filtroProduto'])){
            $filtroProduto = $_GET['filtroProduto'];

            if($filtroProduto != 'todos'){
                $listarDoacoes .= " WHERE statusProduto LIKE '$filtroProduto' ";
            }

            switch($filtroProduto){
                case "todos" : $mensagemFiltro = "no total";
                break;

                case "disponivel" : $mensagemFiltro = "disponíveis";
                break;

                case "esgotado" : $mensagemFiltro = "esgotados";
                break;
            }

        } else {
            $filtroProduto = "todos";
            $mensagemFiltro = "no total";
        }

        $res = mysqli_query($conn, $listarDoacoes);
        $totalDoacoes = mysqli_num_rows($res);

        if($totalDoacoes > 0){
            echo "<div class='alert alert-info text-center'>Há <strong>$totalDoacoes</strong> doações $mensagemFiltro cadastradas!</div>";
        } else {
            echo "<div class='alert alert-info text-center'>Não há Doações cadastradas no sistema!</div>";
        }

        echo "
            <form name='formFiltro' action='index.php' method='GET'>
                <div class='form-floating mt-3'>
                    <select class='form-select' name='filtroProduto' required>
                        <option value='todos'"; if($filtroProduto == 'todos'){echo "selected";} echo">Exibir todas as Doações</option>
                        <option value='disponivel'"; if($filtroProduto == 'disponivel'){echo "selected";} echo">Exibir apenas Doações disponíveis</option>
                        <option value='esgotado'"; if($filtroProduto == 'esgotado'){echo "selected";} echo">Exibir apenas Doações esgotadas</option>
                    </select>
                    <label for='filtroProduto'>Selecione um Filtro</label>
                    <br>
                </div>
                <button type='submit' class='btn btn-outline-success' style='float:right'><i class='bi bi-funnel'></i> Filtrar</button>
                <br>
            </form>
        ";
    ?>

    <hr>

    <div class="row">
        <?php
            while($registro = mysqli_fetch_assoc($res)){
                $idProduto   = $registro['id_produtos'];
                $url         = $registro['url']; // pode ter mais de uma url separada por vírgula
                $nome        = $registro['nome'];
                $descricao   = $registro['descricao'];
                $categoria   = $registro['categorias'];
                $dataVal     = $registro['data_validade'];
                $quantidade  = $registro['quantidade'];

                // transforma em array se tiver várias imagens separadas por vírgula
                $imagens = explode(",", $url);

                echo "
                    <div class='col-sm-4 mb-4'>
                        <div class='card h-100'>

                            <!-- Carrossel de imagens -->
                            <div id='carousel$idProduto' class='carousel slide' data-bs-ride='carousel'>
                                <div class='carousel-inner'>";
                                    $active = "active";
                                    foreach($imagens as $img){
                                        echo "
                                            <div class='carousel-item $active'>
                                                <img src='$img' class='d-block w-100' alt='Imagem da doação $nome'>
                                            </div>";
                                        $active = "";
                                    }
                                echo "</div>
                                <button class='carousel-control-prev' type='button' data-bs-target='#carousel$idProduto' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon'></span>
                                </button>
                                <button class='carousel-control-next' type='button' data-bs-target='#carousel$idProduto' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon'></span>
                                </button>
                            </div>

                            <div class='card-body text-center'>
                                <h4 class='card-title'>$nome</h4>
                                <p class='card-text'>$descricao</p>
                                <p class='card-text'><strong>Categoria:</strong> $categoria</p>
                                <p class='card-text'><strong>Validade:</strong> $dataVal</p>
                                <p class='card-text'><strong>Quantidade:</strong> $quantidade</p>
                                <div class='d-grid'>
                                    <a class='btn btn-outline-success' href='visualizarProduto.php?idProduto=$idProduto'>
                                        <i class='bi bi-eye'></i> Ver detalhes
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                ";
            }
        ?>
    </div>
</div>



<?php include "footer.php" ?>