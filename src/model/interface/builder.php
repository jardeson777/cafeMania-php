<?php

namespace interface;

/*
Interface é responsável por instanciar as classes dos relatórios da aplicação
que possuem métodos e atributos semelhantes.
*/
interface Builder
{
  /*
    função que busca os dados para geração do relatório
  */
  public function BuscarDados(string $query);

  /*
  função que constrói o relatório com os dados que vão ser acessados internamente
  */
  public function ConstroiRelatorio();
}
