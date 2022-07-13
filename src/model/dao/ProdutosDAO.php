<?php

namespace dao;

require 'connection.php';

use Conexao\ConexaoBanco;
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
}
