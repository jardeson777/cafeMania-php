<?php

namespace interface;

/*
Interface é responsável por instanciar as classes de transporte
que possuem métodos e atributos semelhantes.
*/

interface Transporte
{
  /*
    função que busca os dados para geração do relatório
  */
  public function entrega();
}
