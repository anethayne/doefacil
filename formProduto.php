<?php include "header.php"; ?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex" style="max-width: 450px; width: 100%; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

        <!-- Faixa Laranja lateral -->
        <div style="width: 10px; background-color: orange; border-top-left-radius: 12px; border-bottom-left-radius: 12px;"></div>

        <!-- Formulário -->
        <div class="container p-4 text-center">
            <h2 class="mb-4">Cadastrar Produto</h2>
            <form action="actionProduto.php?pagina=formProduto" method="POST" class="was-validated" enctype="multipart/form-data">

                <!-- Foto -->
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" required>
                    <label for="fotoProduto">Foto</label>
                </div>

                <!-- Nome -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nomeProduto" placeholder="Nome" name="nomeProduto" required>
                    <label for="nomeProduto">Nome do Produto</label>
                </div>

                <!-- Descrição -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="descricaoProduto" placeholder="Descrição do produto" name="descricaoProduto" required></textarea>
                    <label for="descricaoProduto">Descrição do Produto</label>
                </div>

                <!-- Data de Validade -->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dataValidadeProduto" name="dataValidadeProduto" required>
                    <label for="dataValidadeProduto">Data de Validade</label>
                </div>

                <!-- Categoria -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                        <option value="doces">Doces</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="frutas">Frutas</option>
                        <option value="verduras">Verduras</option>
                        <option value="salgados" selected>Salgados</option>
                    </select>
                    <label for="categoriaProduto">Categoria</label>
                </div>

                <!-- Unidade -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="unidadeProduto" name="unidadeProduto" required>
                        <option value="kg">Quilogramas (KG)</option>
                        <option value="ml">Mililitros (ml)</option>
                        <option value="litros">Litros (L)</option>
                        <option value="gramas">Gramas (g)</option>
                        <option value="nenhuma" selected>Nenhuma</option>
                    </select>
                    <label for="unidadeProduto">Unidade de Medida</label>
                </div>

                 <!-- Campo Quantidade -->
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="quantidadeProduto" name="quantidadeProduto" placeholder="Quantidade do Produto" required>
                        <label for="quantidadeProduto">Quantidade do Produto:</label>
                    </div>

                <!-- Doação relacionada -->
                <div class="form-floating mb-3">
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
                    <label for="idDoacao">Doação Relacionada</label>
                </div>

                <button type="submit" class="btn btn-success w-100">Cadastrar Produto</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
