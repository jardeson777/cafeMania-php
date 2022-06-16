<?php
    namespace UsuariosDao;

    require('../connection.php');
    use Conexao\ConexaoBanco;

    class UsuariosDao {
        private $connection;

        function __construct(){
            $conexaoBanco = new ConexaoBanco();
            $this->connection = $conexaoBanco->getConnection();
        }
        
        public function getUsuarioByCpfAndSenha($cpf, $senha){
            $sql = 'SELECT * FROM usuarios WHERE cpf=? AND senha=?';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(1, $cpf);   
            $stmt->bindParam(2, $senha);   
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        }
    }
?>
