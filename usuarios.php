<?php

class Usuario
{
    private $pdo;
    public $msgError = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
     global $pdo;
     try{
        $pdo = new PDO("mysql:host=localhost:3306;dbname=projeto", "root","");
      } 
      catch(PDO Exception $e){
           $msgError= $e->getMessage();
         }
    
     
    }
    public function cadastrar($nome, $telefone, $email, $senha);
    {
        global $pdo;
        $sql =$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
           return false; 
        }
        else{
            
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        
        }


    }
    public function logar($email, $senha)
    {
        global $pdo;
        $sql =$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
          $dados = $sql->fetch();
          session_start();
          $_SESSION['id_usuario'] = $dado['id_usuario'];
          return true;
        }
        else{
          return false;
        }

    }


}

?>