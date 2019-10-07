<?php 
require_once 'usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<meta charset="uft-8"/>
<title>LOGIN</title>
<link rel="icon" href="download.jpg">
<link rel="stylesheet" href="style.css">
<body>
    <body>
        <div id="corpo">
        <h1>Entrar</h1>
        <form method="POST">
        
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="Senha" name="senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastro.html">Ainda não é inscrito?<strong>Cadastre-se já</strong></a>
        
        
        </form>
        </div>


<?php
if(isset($_POST['email'])){
    
    $email = addslaches($_POST['email']);
    $senha = addslaches($_POST['senha']);
    
    
    if(!empty($email) && !empty($senha)){
        $u->conectar("projeto","3306","root","");
        if($u->msgError == ""){

        
       if( $u->logar($email,$senha))
       {
         header("location: AreaPrivada.php");
       }
       else
       {
        
           echo "Email ou senha estão incorreto";
           
       }
    }



    else{


        echo "Preencha todos os campos.";
        
    }
}

?>

?>
</body>

</html>

