<?php include "header.php"; ?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex" style="max-width: 520px; width: 100%; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

        <!-- Faixa Laranja lateral -->
        <div style="width: 10px; background-color: orange; border-top-left-radius: 12px; border-bottom-left-radius: 12px;"></div>

        <!-- Formulário -->
        <div class="container p-4">
            <h2 class="mb-4">Cadastro de Doações</h2>
            <form action="actionDoacao.php" method="POST" class="was-validated">

                <!-- Data -->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="data" name="data" required>
                    <label for="data">Data</label>
                    <div class="invalid-feedback">Por favor, selecione a data da doação.</div>
                </div>

                <!-- Rua -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" required>
                    <label for="rua">Rua</label>
                    <div class="invalid-feedback">Por favor, informe a rua.</div>
                </div>

                <!-- Número do Estabelecimento -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="numeroEstabelecimento" name="numeroEstabelecimento" placeholder="Número" required>
                    <label for="numeroEstabelecimento">Número do Estabelecimento</label>
                    <div class="invalid-feedback">Por favor, informe o número.</div>
                </div>

                <!-- Bairro -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
                    <label for="bairro">Bairro</label>
                    <div class="invalid-feedback">Por favor, informe o bairro.</div>
                </div>

                <!-- Cidade -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="cidade" name="cidade" required>
                        <option value="">Selecione a cidade</option>
                        <option value="telemacaBorba">Telêmaco Borba</option>
                        <option value="imbau">Imbaú</option>
                        <option value="curitiba">Curitiba</option>
                        <option value="ortigueira">Ortigueira</option>
                        <option value="londrina" selected>Londrina</option>
                    </select>
                    <label for="cidade">Cidade</label>
                    <div class="invalid-feedback">Por favor, selecione a cidade.</div>
                </div>

                <!-- Estado -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="">Selecione o estado</option>
                        <option value="parana">Paraná</option>
                        <option value="saoPaulo">São Paulo</option>
                        <option value="rioDeJaneiro">Rio de Janeiro</option>
                        <option value="minasGerais">Minas Gerais</option>
                        <option value="rioGrandeDoSul" selected>Rio Grande do Sul</option>
                    </select>
                    <label for="estado">Estado</label>
                    <div class="invalid-feedback">Por favor, selecione o estado.</div>
                </div>

                <!-- Telefone (opcional) -->
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    <label for="telefone">Telefone de contato (opcional)</label>
                </div>

                <!-- Ponto de referência (opcional) -->
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Ex: próximo à padaria">
                    <label for="referencia">Ponto de referência (opcional)</label>
                </div>

                <!-- Botão Próximo -->
                <button type="submit" class="btn btn-success w-100">Próximo &gt;&gt;</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
