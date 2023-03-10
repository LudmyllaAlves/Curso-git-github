<?php
include_once("conexao.php");
include("./class/class_cliente.php");

if(isset($_POST['cadastrar'])&&!empty($_POST['telefone'])&&!empty($_POST['cpf'])){
    $v= new validar();
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];


if(strlen($_POST['cpf'])<11){
    die('Digite o cpf corretamente');
}

if($v ->validarTel($telefone) ==false){
    echo"Telefone Inexistente";
}
if($v ->validaCpf($cpf) ==false){
    echo"Cpf inexistente";
}


$nome = filter_input(INPUT_POST, 'nome' , 
FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$endereco = filter_input(INPUT_POST, 'endereco' , 
FILTER_SANITIZE_FULL_SPECIAL_CHARS);

};

$sql = "INSERT INTO cliente ( nome, endereco, telefone, cpf)  
VALUES ('$nome', '$endereco', '$telefone', '$cpf')";
$conPrepare = $conexão->prepare($sql);

if($conPrepare->execute()){
    echo "cliente cadastrado com sucesso ";
}

else{
    echo "error";
}



?>