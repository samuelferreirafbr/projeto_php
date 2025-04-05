<?php
/* Smarty version 5.4.1, created on 2024-11-16 22:32:49
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67390f817b86e7_18514293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d88e5122b2db92de2fbf4d6a3004f2d5b74bdea' => 
    array (
      0 => 'login.tpl',
      1 => 1731792307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67390f817b86e7_18514293 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projeto_php\\templates';
?><!-- login.tpl -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login do Cliente</h2>
    <?php if ($_smarty_tpl->getValue('error')) {?>
        <p><?php echo $_smarty_tpl->getValue('error');?>
</p>
    <?php }?>
    <form method="POST" action="">
        <input type="hidden" name="action" value="login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php }
}
