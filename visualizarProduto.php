<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class='row text-center'>

    <?php
        //Verifica se há recebimento de parâmetro via GET
        if(isset($_GET['idProduto'])){
            $idProduto = $_GET['idProduto'];

            include "conexaoBD.php";

            //Seleciona produto pelo ID
            $exibirProduto = "SELECT * FROM Produtos WHERE id_produtos = $idProduto";
            $res = mysqli_query($conn, $exibirProduto);
            $totalProdutos = mysqli_num_rows($res);

            if($totalProdutos > 0){
                if($registro = mysqli_fetch_assoc($res)){
                    $idProduto    = $registro['id_produtos'];
                    $urls         = $registro['url']; // pode conter várias URLs separadas por vírgula
                    $nomeProduto  = $registro['nome'];
                    $descricao    = $registro['descricao'];
                    $categoria    = $registro['categorias'];
                    $dataValidade = $registro['data_validade'];
                    $quantidade   = $registro['quantidade'];

                    //Transforma URLs em array para o carrossel
                    $imagens = explode(",", $urls);
                    ?>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="card" style="width:40%; border-style:none;">
                                            
                            <!-- Carousel -->
                            <div id="carousel<?php echo $idProduto?>" class="carousel slide" data-bs-ride="carousel">

                                <!-- Slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $active = "active";
                                    foreach($imagens as $img){
                                        echo "<div class='carousel-item $active'>
                                                <img src='$img' alt='$nomeProduto' class='d-block w-100'>
                                              </div>";
                                        $active = "";
                                    }
                                    ?>
                                </div>

                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $idProduto?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $idProduto?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                                
                            <div class="card-body text-center">
                                <h4 class="card-title"><b><?php echo $nomeProduto?></b></h4>
                                <p class="card-text"><?php echo $descricao?></p>
                                <p class="card-text"><b>Categoria:</b> <?php echo $categoria?></p>
                                <p class="card-text"><b>Validade:</b> <?php echo $dataValidade?></p>
                                <p class="card-text"><b>Quantidade:</b> <?php echo $quantidade?></p>

                                <div class="card bg-light mt-3">
                                    <div class="card-body">
                                        <a href="#" title="Solicitar Doação">
                                            <button class="btn btn-outline-success">
                                                <i class="bi bi-hand-thumbs-up" style="font-size:16pt;"></i>
                                                Solicitar Doação
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                } else {
                    echo "<div class='alert alert-warning text-center'>Produto não localizado</div>";
                }
            } else {
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar o produto</div>";
            }
        }
    ?>

    </div>

</div>

<?php include "footer.php" ?>
