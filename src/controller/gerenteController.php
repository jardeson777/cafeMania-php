<?php

namespace controller;

require_once  $_SERVER['DOCUMENT_ROOT'] . '/projetos/CafeMania/src/model/dao/ProdutosDAO.php';

use dao\ProdutoDAO;

session_start();
class GerenteController
{
  public function listarProdutos()
  {
    $produtoDAO = new ProdutoDAO();
    $result = $produtoDAO->getProdutos();

    return $result;
  }

  public function excluirProduto($id)
  {
    $produtoDAO = new ProdutoDAO();
    $response = $produtoDAO->excluirProduto($id);

    unset($_SESSION["produtos"]);

    var_dump($response);
    return $response;
  }

  public function incluirProduto($nome, $preco, $estoque)
  {
    $produtoDAO = new ProdutoDAO();
    $response = $produtoDAO->incluirProduto($nome, $preco, $estoque);
    return $response;
  }
}

$requestWasPost = isset($_POST);
$requestWasGet = isset($_GET);

if ($requestWasPost) {
  $action = $_POST["action"];
  $controller = new GerenteController();

  if ($action === 'listarProdutos') {
    $produtos = $controller->listarProdutos();
    $_SESSION['produtos'] = $produtos;
    header("Location: /projetos/CafeMania/src/view/gerente/ListarProdutos");
  }

  if ($action === 'excluirProduto') {
    $id = $_POST['id'];
    $response = $controller->excluirProduto($id);

    if ($response) {
      $_SESSION['success'] = 'Produto excluído com sucesso';
      header("Location: /projetos/CafeMania/src/view/gerente/ListarProdutos");
    }
    $_SESSION['error'] = 'Erro ao excluir produto';
    header("Location: /projetos/CafeMania/src/view/gerente/ListarProdutos");
  }

  if ($action === 'cadastrarProdutos') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $response = $controller->incluirProduto($nome, $preco, $estoque);

    if ($response) {
      $_SESSION['success'] = 'Produto adicionado com sucesso';
      header("Location: /projetos/CafeMania/src/view/gerente/ListarProdutos");
    }

    $_SESSION['error'] = 'Produto não foi adicionado';
    header("Location: /projetos/CafeMania/src/view/gerente");
  }
}
