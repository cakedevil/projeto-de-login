<?php
require_once 'usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">
<head>
<meta charset="uft-8"/>
<title> Projeto de Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="corpo">
<h1>Cadastro</h1>
<form method="POST">

<input type="text" name="nome" placeholder="Nome Completo" maxlenght="30">
<input type="text" name="telefone" placeholder="Telefone" maxlenght="30">
<input type="email" name="email" placeholder="Usuário" maxlenght="40">
<input type="password" name="senha" placeholder="Senha" maxlenght="15">
<input type="password" name="confsenha" placeholder="Confirmar Senha">

<input type="submit" value="Cadastrar">



</form>
</div>

</body>
<?php

if(isset($_POST['nome'])){
    $nome = addslaches($_POST['nome']);
    $telefone = addslaches($_POST['telefone']);
    $email = addslaches($_POST['email']);
    $senha = addslaches($_POST['senha']);
    $ConfirmarSenha = addslaches($_POST['confsenha']);
    
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfirmarSenha)){
     $u->conectar("projeto","3306","root",""); 
     if($u->msgErro == ""){

         if($senha == $ConfirmarSenha){
           if($u->cadastrar($nome,$telefone,$email,$senha));{

            
            
             echo "Cadastrado com sucesso!";
            
            
           }
           else{
               
            
                echo "email já cadastrado!";
               
               
           }
         }
     else{

       
        echo "As senhas não correspondem!";
       
     }
     }
     else{
         
         
          echo "Erro: ".$u->msgErro;
         
     }
    }else{
        
               echo "É necessário o preenchimento de todos os campos";
               
    }
}


</html>

