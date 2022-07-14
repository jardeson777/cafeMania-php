<?php

namespace controller;

require_once  '../model/dao/UsuariosDAO.php';
require_once  '../model/dao/ClientesDAO.php';

use dao\UsuariosDao;
use dao\ClienteDAO;

class LoginController
{
  function logar($cpf, $senha)
  {
    $UsuarioDao = new UsuariosDAO();
    $usuarioLogado = $UsuarioDao->getUsuarioByCpfAndSenha($cpf, $senha);

    if (empty($usuarioLogado)) {
      $clienteDAO = new ClienteDAO();
      $clienteLogado = $clienteDAO->getClienteByCPF($cpf, $senha);

      if (empty($clienteLogado)) {
        header('Location: ../view/loginView.php');
      }
      header('Location: ../view/cliente');
    }

    $usuarioLogado->getCargo() === 'gerente'
      ? header('Location: ../view/gerente/')
      : header('Location: ../view/atendente/');
  }

  function deslogar()
  {
    //
  }
}

$cpf = $_POST["inputCpf"];
$senha = $_POST["inputSenha"];
$validandoParametro = !empty($cpf) && !empty($senha);

if (!$validandoParametro) {
  header('Location: ../view/loginView.php');
  return;
}

$login = new LoginController();
$login->logar($cpf, $senha);
