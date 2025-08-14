<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3">
    
    <h2>Cadastrar Produto:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionProduto.php?pagina=formProduto" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" required>
                        <label for="fotoProduto">Foto</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="nomeProduto" placeholder="Nome" name="nomeProduto" required>
                        <label for="nomeProduto">Nome do Produto: </label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="descricaoProduto" placeholder="Informe uma breve descrição sobre o Produto" name="descricaoProduto" required></textarea>
                        <label for="nomeProduto">Descrição do Produto: </label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" id="dataValidadeProduto" placeholder="Data de Validade do Produto:" name="dataValidadeProduto" required>
                        <label for="dataValidadeProduto">Data de Validade do Produto:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                            <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                                <option value="doces">Doces</option>
                                <option value="bebidas">Bebidas</option>
                                <option value="frutas">Frutas</option>
                                <option value="verduras">Verduras</option>
                                <option value="saldados" selected>Salgados</option>
                            </select>
                        <label for= "categoriaProduto">Categoria do Produto:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                            <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                                <option value="doces">Doces</option>
                                <option value="bebidas">Bebidas</option>
                                <option value="frutas">Frutas</option>
                                <option value="verduras">Verduras</option>
                                <option value="saldados" selected>Salgados</option>
                            </select>
                        <label for= "categoriaProduto">Categoria do Produto:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="quantidadeProduto" placeholder="Quantidade do Produto" name="quantidadeProduto" required>
                        <label for="quantidadeProduto">Quantidade do Produto:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <br>

</div>

<?php include "footer.php" ?>