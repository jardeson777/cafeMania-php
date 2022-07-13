<?php

namespace dao;

require 'connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/projetos/CafeMania/src/model/dto/ProdutoDTO.php';

use Conexao\ConexaoBanco;
use dto\ProdutoDTO;
use \PDOException;

class ProdutoDAO
{
  private $connection;

  function __construct()
  {
    $conexaoBanco = new ConexaoBanco();
    $this->connection = $conexaoBanco->getConnection();
  }

  public function getProdutos()
  {
    $sql = "SELECT * FROM produtos";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
  }

  public function excluirProduto($id)
  {
    try {
      $sql = "DELETE FROM produtos WHERE id=?";

      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $stmt->fetchAll();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function incluirProduto(ProdutoDTO $produto)
  {
    try {
      $sql = "INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)";

      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, $produto->getNome());
      $stmt->bindParam(2, $produto->getPreco());
      $stmt->bindParam(3, $produto->getEstoque());
      $stmt->execute();
      $stmt->fetchAll();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}
