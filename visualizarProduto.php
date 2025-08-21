<?php include "header.php" ?>

<div class="container text-center mt-5 mb-5">

    <div class='row text-center'>

    <?php
        //Verifica se há recebimento de parâmetro via método GET
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Inclui conexão
            include "conexaoBD.php";

            $exibirDoacao = "SELECT * FROM Produtos WHERE id_produtos = $id";
            $res = mysqli_query($conn, $exibirDoacao);
            $totalDoacoes = mysqli_num_rows($res);
            
            if($totalDoacoes > 0){
                if($registro = mysqli_fetch_assoc($res)){
                    $nome       = $registro['nome'];
                    $descricao  = $registro['descricao'];
                    $categoria  = $registro['categorias'];
                    $validade   = $registro['data_validade'];
                    $quant      = $registro['quantidade'];
                    $urls       = $registro['url'];

                    // transforma em array
                    $imagens = explode(",", $urls);
                    ?>

                    <div class="d-flex justify-content-center mb-3">

                        <div class="card" style="width:35%; border:none;">
                                        
                            <!-- Carousel -->
                            <div id="doacao<?php echo $id?>" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">
                                    <?php 
                                        foreach($imagens as $index => $img){
                                            $active = ($index == 0) ? "active" : "";
                                            echo "
                                                <div class='carousel-item $active'>
                                                    <img src='$img' class='d-block w-100' style='height:300px;object-fit:cover;' alt='Imagem da doação $nome'>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>

                                <!-- Controles -->
                                <?php if(count($imagens) > 1): ?>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#doacao<?php echo $id?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#doacao<?php echo $id?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>
                                <?php endif; ?>
                            </div>
                            
                            <div class="card-body">
                                <h4 class="card-title"><b><?php echo $nome ?></b></h4>
                                <p class="card-text"><?php echo $descricao ?></p>
                                <p><strong>Categoria:</strong> <?php echo $categoria ?></p>
                                <p><strong>Data de Validade:</strong> <?php echo $validade ?></p>
                                <p><strong>Quantidade:</strong> <?php echo $quant ?></p>
                                
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <button class="btn btn-outline-primary" disabled>
                                            <i class="bi bi-gift"></i> Doação disponível
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                } else {
                    echo "<div class='alert alert-warning text-center'>Doação não localizada</div>";
                }
            } else {
                echo "<div class='alert alert-warning text-center'>Não foi possível carregar a doação</div>";
            }
        }
    ?>

    </div>
</div>


<?php include "footer.php" ?>