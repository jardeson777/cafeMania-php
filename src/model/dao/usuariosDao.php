<?php
    namespace UsuarioDao;

    include '../connection.php';

    class UsuariosDao {
        private $connection;

        function __construct(){
            $this->connection = getConnection();
        }
        
        public function getUsuarioByCpfAndSenha($cpf, $senha){
            $sql = 'SELECT * FROM usuarios WHERE cpf=? AND senha=?';

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(1, $cpf);   
            $stmt->bindValue(2, $senha);   

            if($stmt->execute()){
                
            }
        }
    }
?>