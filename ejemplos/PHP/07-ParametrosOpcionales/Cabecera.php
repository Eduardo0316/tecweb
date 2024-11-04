<?php
class Cabecera{
    private $titulo;
    private $ubicacion;
    private $colorFuente;
    private $colofFondo;

    public function __construct($title, $location='center', $cfont='#000000', $cback='#FFFF00'){
        $this->titulo = $title;
        $this->ubicacion = $location;
        $this->coloFuente = $cfont;
        $this->colorFondo = $cback;
    }

    public function graficar(){
        $estilo = 'font-size: 30px; text-align: '.$this->ubicacion.';';
        $estilo .= '; color: '.$this->colorFuente;
        $estilo .= '; background-color: '.$this->colorFondo.';';
        echo '<div style="'.$estilo.'">';
        echo '<h4>'.$this->titulo.'</h4>';
        echo '</div>';
    }
}
?>