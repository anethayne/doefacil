<?php include "header.php" ?>

<div class='container mt-5 mb-5'>

    <?php
        include "conexaoBD.php";

        //Seleciona as doações
        $listarDoacoes = "SELECT * FROM Produtos"; 

        $res = mysqli_query($conn, $listarDoacoes);
        $totalDoacoes = mysqli_num_rows($res);

        if($totalDoacoes > 0){
            echo "<div class='alert alert-info text-center'>Há <strong>$totalDoacoes</strong> doações cadastradas!</div>";
        }
        else{
            echo "<div class='alert alert-info text-center'>Não há doações cadastradas no sistema!</div>";
        }
    ?>

    <hr>

    <!-- Grid com os cards -->
    <div class="row">

        <?php
            while($registro = mysqli_fetch_assoc($res)){
                $id        = $registro['id_produtos'];
                $urls      = $registro['url']; // Pode conter 1 ou várias imagens separadas por vírgula
                $nome      = $registro['nome'];
                $descricao = $registro['descricao'];
                $categoria = $registro['categorias'];
                $validade  = $registro['data_validade'];
                $quant     = $registro['quantidade'];

                // transforma em array (caso venha "img1.jpg,img2.jpg,img3.jpg")
                $imagens = explode(",", $urls);

                echo "
                    <div class='col-sm-4 mb-4'>
                        <div class='card h-100'>

                            <!-- Carousel de imagens -->
                            <div id='carousel$id' class='carousel slide' data-bs-ride='carousel'>
                                <div class='carousel-inner'>";
                                    foreach($imagens as $index => $img){
                                        $active = ($index == 0) ? "active" : "";
                                        echo "
                                            <div class='carousel-item $active'>
                                                <img src='$img' class='d-block w-100' style='height:250px;object-fit:cover;' alt='Imagem da doação $nome'>
                                            </div>
                                        ";
                                    }
                                echo "</div>
                                <button class='carousel-control-prev' type='button' data-bs-target='#carousel$id' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon'></span>
                                </button>
                                <button class='carousel-control-next' type='button' data-bs-target='#carousel$id' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon'></span>
                                </button>
                            </div>

                            <!-- Infos da doação -->
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$nome</h5>
                                <p class='card-text'>$descricao</p>
                                <p><strong>Categoria:</strong> $categoria</p>
                                <p><strong>Validade:</strong> $validade</p>
                                <p><strong>Quantidade:</strong> $quant</p>
                                <a class='btn btn-outline-primary' href='visualizarDoacao.php?id=$id'>
                                    <i class='bi bi-eye'></i> Ver detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>

    </div>

</div>


<?php include "footer.php" ?>