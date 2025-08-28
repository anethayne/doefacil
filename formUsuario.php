<?php include "header.php"; ?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex" style="max-width: 520px; width: 100%; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

        <!-- Faixa Laranja lateral -->
        <div style="width: 10px; background-color: orange; border-top-left-radius: 12px; border-bottom-left-radius: 12px;"></div>

        <!-- Formulário -->
        <div class="container p-4">
            <h2 class="mb-4 text-center">Cadastro de Usuário</h2>
            <form action="actionUsuario.php?pagina=formUsuario" method="POST" class="was-validated" enctype="multipart/form-data">

                <!-- Foto do Usuário -->
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="fotoUsuario" name="fotoUsuario" required>
                    <label for="fotoUsuario">Foto</label>
                </div>

                <!-- CPF -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cpfUsuario" name="cpfUsuario" placeholder="CPF" required>
                    <label for="cpfUsuario">CPF</label>
                </div>

                <!-- Nome -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="Nome Completo" required>
                    <label for="nomeUsuario">Nome Completo</label>
                </div>

                <!-- Data de Nascimento -->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dataNascimentoUsuario" name="dataNascimentoUsuario" required>
                    <label for="dataNascimentoUsuario">Data de Nascimento</label>
                </div>

                <!-- Telefone -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefoneUsuario" name="telefoneUsuario" placeholder="Telefone" required>
                    <label for="telefoneUsuario">Telefone</label>
                </div>

                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Email" required>
                    <label for="emailUsuario">Email</label>
                </div>

                <!-- Endereço -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="enderecoUsuario" name="enderecoUsuario" placeholder="Endereço" required>
                    <label for="enderecoUsuario">Endereço</label>
                </div>

                <!-- Senha -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" required>
                    <label for="senhaUsuario">Senha</label>
                </div>

                <!-- Confirmar Senha -->
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="confirmarSenhaUsuario" name="confirmarSenhaUsuario" placeholder="Confirme a Senha" required>
                    <label for="confirmarSenhaUsuario">Confirme a Senha</label>
                </div>

                <!-- Botão -->
                <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
