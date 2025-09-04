<?php include "header.php"; ?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex" style="max-width: 450px; width: 100%; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

        <!-- Faixa Laranja lateral -->
        <div style="width: 10px; background-color: orange; border-top-left-radius: 12px; border-bottom-left-radius: 12px;"></div>

        <!-- Formulário -->
        <div class="container p-4 text-center">
            <h2 class="mb-4">Cadastro de Doações</h2>
            <form action="actionDoacao.php" method="POST" class="was-validated" enctype="multipart/form-data">

                <!-- Data -->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="data" name="data" placeholder="Data" required>
                    <label for="data">Data</label>
                </div>

                <!-- Rua -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" required>
                    <label for="rua">Rua</label>
                </div>

                <!-- Bairro -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                    <label for="bairro">Bairro</label>
                </div>

                <!-- Cidade -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="cidade" name="cidade" required>
                        <option value="telemacaBorba">Telêmaco Borba</option>
                        <option value="imbau">Imbaú</option>
                        <option value="curitiba">Curitiba</option>
                        <option value="ortigueira">Ortigueira</option>
                        <option value="londrina" selected>Londrina</option>
                    </select>
                    <label for="cidade">Cidade</label>
                </div>

                <!-- Estado -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="parana">Paraná</option>
                        <option value="saoPaulo">São Paulo</option>
                        <option value="rioDeJaneiro">Rio de Janeiro</option>
                        <option value="minasGerais">Minas Gerais</option>
                        <option value="rioGrandeDoSul" selected>Rio Grande do Sul</option>
                    </select>
                    <label for="estado">Estado</label>
                </div>

                <!-- Número do Estabelecimento -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="numeroEstabelecimento" name="numeroEstabelecimento" placeholder="Número" required>
                    <label for="numeroEstabelecimento">Número do Estabelecimento</label>
                </div>

                <!-- Email -->
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email para contato:</label>
                </div>

                <!-- Botão submit -->
                <button type="submit" class="btn btn-success w-100">Próximo >></button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
