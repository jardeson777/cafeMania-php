<?php

namespace dao;

require 'connection.php';

use Conexao\ConexaoBanco;

class ClienteDAO
{
  private $connection;

  function __construct()
  {
    $conexaoBanco = new ConexaoBanco();
    $this->connection = $conexaoBanco->getConnection();
  }
}
