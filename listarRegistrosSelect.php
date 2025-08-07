<?php include "header.php"?>

<div class = 'container'>
    <div class = 'row'>
        <!-- Coluna para exibir o select para listar Usuários-->
        <div class = 'col-sm-6'>
            <div class = 'form-floating mt-3 mb-3'>
                <select class = 'form-select' name = 'nomeUsuario'>
                    <?php
                        include "conexaoBD.php";
                        $listarUsuarios = "SELECT * FROM Usuarios";
                        $resultado = mysqli_query($conn, $listarUsuarios) or die("Erro ao tenatr carregar Usuários!");
                        while($registro = mysqli_fetch_assoc($resultado)){
                            $idUsuario = $registro['idUsuario'];
                            $nomeUsuario = $registro['nomeUsuario'];
                            echo "<option value = '$idUsuario'>$nomeUsuario</option>";
                        }
                    ?>
                </select>
                <label for = "nomeUsuario">Selecione um Usuário</label>
            </div>
        </div>
        <!-- Coluna para exibir o select parar listar produtos -->
         <div class = 'col-sm-6'>
            <div class = 'form-floating mt-3 mb-3'>
                <select class = 'form-select' name = "nomeProduto">
                    <?php
                        include "conexaoBD.php";
                        $listarProdutos = "SELECT * FROM  Produtos";
                        $resultado = mysqli_query($conn, $listarProdutos) or die("Erro ao tentar carregar Produtos!");
                        while($resultado = mysqli_fetch_assoc($resultado)){
                            $idProduto = $registro['idProduto'];
                            $nomeProduto = $registro['nomeProduto'];
                            echo "<option value = '$idUsuario'>$nomeUsuario</option>";
                        }
                    ?>
                </select>
                <label for = "nomeUsuario">Selecione um Usuário</label>
            </div>
         </div>
    </div>
</div>

<?php include "footer.php"?>