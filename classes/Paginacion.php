<?php 
namespace Classes;

class Paginacion{
    public $pagina_actual;
    public $registro_por_pagina;
    public $total_registro;


    public function __construct($pagina_actual = 1, $registro_por_pagina = 10, $total_registro = 0 )
    {
        
    }
}