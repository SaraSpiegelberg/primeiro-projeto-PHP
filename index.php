<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

    <div class="main-login">

        <div class="left-login">
            <h1>Faça login <br> E acesse seu sistema!</h1>
            <img src="image.svg" alt="imagem" class="left-login-image">
        </div>

        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form id="login-form" action="controller.php" method="post">
                    <div class="error-message" id="error-message" style="display: none;">Senha e/ou usuário incorretos. Tente novamente.</div>
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário" required>
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>

                    <input type="hidden" name="acao" id="acao" value="entrar">
                    <button class="btn-login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>