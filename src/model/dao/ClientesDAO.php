<?php

namespace dao;

require_once  'connection.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/projetos/CafeMania/src/model/dto/UsuarioDTO.php';

use Conexao\ConexaoBanco;
use dto\UsuarioDTO;
use \PDOException;


    /*
    No construtor da classe, é a parte em que o DAO abre a conexão com o banco de dados
    Instanciando um objeto do tipo ConexaoBanco, na qual possui o método getConnection
    Logo em seguida, ele atribui o valor da operação feita com o objeto na variável
    connection, que passa a ser utilizada nos métodos do UsuariosDAO, evitando assim
    a repetição de código de sempre ter que abrir a conexão em cada método.
  */
class ClienteDAO
{
  private $connection;

  /*
    No construtor da classe, é a parte em que o DAO abre a conexão com o banco de dados
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

    /*
  Esse método é responsável por fazer uma requisição ao banco, e retornando 
  todos os clientes que existem dentro do banco, para que possam ser mostrados na tela,
  por exemplo.
  */
  public function getClientes()
  {
    $sql = "SELECT * FROM clientes";

    //Abre conexão com o banco de dados
    $stmt = $this->connection->prepare($sql);

    //executa o comando feito na variável sql
    $stmt->execute();
    $result = $stmt->fetchAll();

    //retorna os produtos que chegaram
    return $result;
  }

    /*
  Método responsável pela exclusão de um cliente por um ID solicitado como parametro
  Acessando o banco de dados, procurando o cliente que tem o ID informado.
  Logo após, são feitos os passos para exclusão do cliente.
  */
  public function excluirCliente($id)
  {
    try {
      $sql = "DELETE FROM clientes WHERE id=?";

      //aberta a conexão com o banco e inserido o comando a ser executado
      $stmt = $this->connection->prepare($sql);

      //trocando a interrogação pelo parametro id vindo quando chamado o método no código
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $stmt->fetchAll();

      //retornando um boolean mostrando o sucesso da exclusão
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  /*
  Método responsável por incluir um cliente no banco de dados,
  recebendo nome, endereco, email, cpf e senha como parâmetros, 
  e adicionando essas informações no banco, gerando um ID para o mesmo
  */
  public function incluirCliente($nome, $endereco, $email, $cpf, $senha)
  {
    try {
      //comando a ser executado para inserção do cliente no banco
      $sql = "INSERT INTO clientes (nome, endereco, email, cpf, senha) VALUES (?, ?, ?, ?, ?)";

      //abre a conexão com o banco de dados
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, $nome);
      $stmt->bindParam(2, $endereco);
      $stmt->bindParam(3, $email);
      $stmt->bindParam(4, $cpf);
      $stmt->bindParam(5, $senha);
      $stmt->execute();
      $stmt->fetchAll();

      //retorna true se a inserção for um sucesso
      return true;
    } catch (PDOException $e) {
      //retorna false se a inserção não é um sucesso
      return false;
    }
  }
}
