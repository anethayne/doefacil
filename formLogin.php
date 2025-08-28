<?php include "header.php"; ?>

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="d-flex" style="max-width: 450px; width: 100%; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">

        <!-- Faixa Laranja lateral -->
        <div style="width: 10px; background-color: orange; border-top-left-radius: 12px; border-bottom-left-radius: 12px;"></div>

        <!-- Formulário -->
        <div class="container p-4 text-center">
            <?php
                if(isset($_GET['erroLogin'])){
                    $erroLogin = $_GET['erroLogin'];
                    if($erroLogin == 'dadosInvalidos'){
                        echo "<div class='alert alert-warning text-center'><strong>USUÁRIO ou SENHA</strong> inválidos!</div>";
                    }
                    if($erroLogin == 'naoLogado'){
                        echo "<div class='alert alert-warning text-center'><strong>USUÁRIO</strong> não logado!</div>";
                    }
                    if($erroLogin == 'acessoProibido'){
                        header('location:index.php');
                    }
                }
            ?>

            <h2 class="mb-4">Acessar o Sistema</h2>
            <form action="actionLogin.php" method="POST" class="was-validated">

                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Email" required>
                    <label for="emailUsuario">Email</label>
                    <div class="invalid-feedback">Informe seu email</div>
                </div>

                <!-- Senha -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" required>
                    <label for="senhaUsuario">Senha</label>
                    <div class="invalid-feedback">Informe sua senha</div>
                </div>

                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>

            <p class="mt-3 mb-0">
                Ainda não possui cadastro? 
                <a href="formUsuario.php" title="Cadastrar-se">Clique aqui!</a> 
                &nbsp;<i class="bi bi-emoji-smile"></i>
            </p>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
