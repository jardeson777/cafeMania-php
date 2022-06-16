<?php

namespace UsuarioDTO;

Class UsuarioDTO{


    private $id, $nome, $cpf, $senha, $cargo;

    public function __construct(int $id, string $nome, string $cpf, string $senha, string $cargo){
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->cargo = $cargo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }
}
?>