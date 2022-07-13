<?php

namespace dao;

require 'connection.php';

require $_SERVER['DOCUMENT_ROOT'] . '/projetos/CafeMania/src/model/dto/UsuarioDTO.php';

use Conexao\ConexaoBanco;
use dto\UsuarioDTO;

class UsuariosDao
{
  private $connection;

    /*
    No construtor da classe, é a parte em que o DAO abre a contexão com o banco de dados
    Instanciando um objeto do tipo ConexaoBanco, na qual possui o método getConnection
    Logo em seguida, ele atribui o valor da operação feita com o objeto na variável
    connection, que passa a ser utilizada nos métodos do UsuariosDao, evitando assim
    a repetição de código de sempre ter que abrir a conexão em cada método.
  */
  function __construct()
  {
    $conexaoBanco = new ConexaoBanco();
    $this->connection = $conexaoBanco->getConnection();
  }

  public function getUsuarioByCpfAndSenha($cpf, $senha)
  {
    $sql = 'SELECT * FROM usuarios WHERE cpf=? AND senha=?';

    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $cpf);
    $stmt->bindParam(2, $senha);
    $stmt->execute();
    $result = $stmt->fetchAll()[0];

    if (empty($result)) {
      return null;
    }

    $usuario = new UsuarioDTO(
      $result['id'],
      $result['nome'],
      $result['cpf'],
      $result['cargo']
    );

    return $usuario;
  }
}