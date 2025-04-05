<!-- login.tpl -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login do Cliente</h2>
    {if $error}
        <p>{$error}</p>
    {/if}
    <form method="POST" action="">
        <input type="hidden" name="action" value="login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
