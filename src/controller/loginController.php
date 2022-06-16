<?php 
    namespace loginController;

    require('../model/dao/UsuariosDAO.php');
    use UsuariosDao\UsuariosDao;
    
    if(empty($_POST["inputCpf"]) || empty($_POST["inputSenha"])) {
        header('Location: ../model/connection.php');
        return;
    }
    
    $cpf = $_POST["inputCpf"];
    $senha = $_POST["inputSenha"];
    $usuarioDao = new UsuariosDao();
    $dados = $usuarioDao->getUsuarioByCpfAndSenha($cpf, $senha);

    echo 'a';
?>
loginController
