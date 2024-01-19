<?php 
namespace Classes;

class Paginacion{
    public $pagina_actual;
    public $registro_por_pagina;
    public $total_registro;


    public function __construct($pagina_actual = 1, $registro_por_pagina = 10, $total_registro = 0 )
    {
        $this->pagina_actual = (int)$pagina_actual;
        $this->registro_por_pagina = (int)$pagina_actual;
        $this->total_registro = (int)$pagina_actual;
    }

}