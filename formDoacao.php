<?php include "header.php" ?>

<div class="container text-center mb-3 mt-3" style="padding-top:50px; padding-bottom:100px;">

    <h2>Cadastro de Doações:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actionDoacao.php?" method="GET" class="was-validated" enctype="multipart/form-data">
                    

                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" id="data" placeholder="Data" name="data" required>
                        <label for="data">Data</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="rua" placeholder="Rua" name="rua" required>
                        <label for="rua">Rua</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="bairro" placeholder="Bairro" name="bairro" required>
                        <label for="bairro">Bairro</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                            <select class="form-select" id="cidade" name="cidade" required>
                                <option value="telemacaBorba">Telêmaco Borba</option>
                                <option value="imbau">Imbaú</option>
                                <option value="curitiba">Curitiba</option>
                                <option value="ortigueira">Ortigueira</option>
                                <option value="londrina" selected>Londrina</option>
                            </select>
                        <label for= "cidade">Cidade:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="parana">Paraná</option>
                                <option value="saoPaulo">São Paulo</option>
                                <option value="rioDeJaneiro">Rio de Janeiro</option>
                                <option value="minasGerais">Minas Gerais</option>
                                <option value="rioGrandeDoSul" selected>Rio Grande do Sul</option>
                            </select>
                        <label for= "estado">Estado:</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="numeroEstabelecimento" placeholder="Número do Estabelecimento" name="numeroEstabelecimento" required>
                        <label for="numeroEstabelecimento">Número do Estabelecimento: </label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>


                    <a href="formProduto.php" class="btn btn-success">Próximo >></a>
                </form>
            </div>
        </div>
        <br>
    </div>

</div>
                

<?php include "footer.php" ?>