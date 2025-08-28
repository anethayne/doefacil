<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">
    
    <h2>Cadastrar Produto:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionProduto.php?pagina=formProduto" method="POST" class="was-validated" enctype="multipart/form-data">

                    <!-- Campo Foto -->
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" required>
                        <label for="fotoProduto">Foto</label>
                    </div>

                    <!-- Campo Nome -->
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeProduto" placeholder="Nome" name="nomeProduto" required>
                        <label for="nomeProduto">Nome do Produto: </label>
                    </div>

                    <!-- Campo Descrição -->
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricaoProduto" placeholder="Informe uma breve descrição sobre o Produto" name="descricaoProduto" required></textarea>
                        <label for="descricaoProduto">Descrição do Produto: </label>
                    </div>

                    <!-- Campo Data de Validade -->
                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" id="dataValidadeProduto" name="dataValidadeProduto" required>
                        <label for="dataValidadeProduto">Data de Validade do Produto:</label>
                    </div>

                    <!-- Campo Categoria -->
                    <div class="form-floating mt-3 mb-3">
                        <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                            <option value="doces">Doces</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="frutas">Frutas</option>
                            <option value="verduras">Verduras</option>
                            <option value="salgados" selected>Salgados</option>
                        </select>
                        <label for="categoriaProduto">Categoria do Produto:</label>
                    </div>

                    <!-- Campo Unidade -->
                    <div class="form-floating mt-3 mb-3">
                        <select class="form-select" id="unidadeProduto" name="unidadeProduto" required>
                            <option value="kg">Quilogramas (KG)</option>
                            <option value="ml">Mililitros (ml)</option>
                            <option value="litros">Litros (L)</option>
                            <option value="gramas">Gramas (g)</option>
                            <option value="nenhuma" selected>Nenhuma</option>
                        </select>
                        <label for="unidadeProduto">Unidade de medida:</label>
                    </div>

                    <!-- Campo Categoria -->
                    <div class="form-floating mt-3 mb-3">
                        <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                            <option value="doces">Doces</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="frutas">Frutas</option>
                            <option value="verduras">Verduras</option>
                            <option value="salgados" selected>Salgados</option>
                        </select>
                        <label for="categoriaProduto">Categoria do Produto:</label>
                    </div>

                    <!-- Campo Quantidade -->
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="quantidadeProduto" name="quantidadeProduto" placeholder="Quantidade do Produto" required>
                        <label for="quantidadeProduto">Quantidade do Produto:</label>
                    </div>

                    <!-- Novo: Selecionar Doação relacionada -->
                    <div class="form-floating mt-3 mb-3">
                        <select class="form-select" id="idDoacao" name="idDoacao" required>
                            <option value="">Selecione a Doação</option>
                            <?php
                                include "conexaoBD.php";
                                $queryDoacoes = "SELECT id_doacao, data, cidade FROM doacao WHERE status='disponivel'";
                                $resDoacoes = mysqli_query($conn, $queryDoacoes);
                                while($doacao = mysqli_fetch_assoc($resDoacoes)){
                                    echo "<option value='{$doacao['id_doacao']}'>ID {$doacao['id_doacao']} - {$doacao['cidade']} ({$doacao['data']})</option>";
                                }
                            ?>
                        </select>
                        <label for="idDoacao">Doação relacionada:</label>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <br>
</div>

<?php include "footer.php" ?>
