<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class='row text-center'>

    <?php
        //Verifica se há recebimento de parâmetro via método GET
        if(isset($_GET['idProduto'])){
            $idProduto = $_GET['idProduto'];

            //Inclui conexão
            include "conexaoBD.php";

            $exibirDoacao = "SELECT * FROM Produtos WHERE id_produtos = $idProduto";
            $res = mysqli_query($conn, $exibirDoacao); 
            $totalDoacoes = mysqli_num_rows($res); 
            
            if($totalDoacoes > 0){
                
                if($registro = mysqli_fetch_assoc($res)){
                    $idDoacao    = $registro['id_produtos'];
                    $urls        = $registro['url']; // pode ter várias separadas por vírgula
                    $nome        = $registro['nome'];
                    $descricao   = $registro['descricao'];
                    $categoria   = $registro['categorias'];
                    $dataVal     = $registro['data_validade'];
                    $quantidade  = $registro['quantidade'];

                    // transforma em array de imagens
                    $imagens = explode(",", $urls);
                    ?>

                        <div class="d-flex justify-content-center mb-3">

                            <div class="card" style="width:40%; border-style:none;">
                                            
                                <!-- Carousel -->
                                <div id="carousel<?php echo $idDoacao?>" class="carousel slide" data-bs-ride="carousel">

                                    <!-- Slideshow -->
                                    <div class="carousel-inner">
                                        <?php
                                            $active = "active";
                                            foreach($imagens as $img){
                                                echo "
                                                    <div class='carousel-item $active'>
                                                        <img src='$img' alt='$nome' class='d-block w-100'>
                                                    </div>
                                                ";
                                                $active = "";
                                            }
                                        ?>
                                    </div>

                                    <!-- Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $idDoacao?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $idDoacao?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                </div>
                                
                                <div class="card-body text-center">
                                    <h4 class="card-title"><b><?php echo $nome?></b></h4>
                                    <p class="card-text"><?php echo $descricao?></p>
                                    <p class="card-text"><b>Categoria:</b> <?php echo $categoria?></p>
                                    <p class="card-text"><b>Validade:</b> <?php echo $dataVal?></p>
                                    <p class="card-text"><b>Quantidade:</b> <?php echo $quantidade?></p>
                                    
                                    <div class="card bg-light mt-3">
                                        <div class="card-body">
                                            <a href="#" title="Solicitar doação">
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
                }
                else{
                    echo "<div class='alert alert-warning text-center'>Doação não localizada</div>";
                }
            }
            else{
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar a doação</div>";
            }
        }
    ?>

    </div>

</div>


<?php include "footer.php" ?>