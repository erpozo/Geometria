<?php

namespace geometria;
use geometria\point;

abstract class polygon{
    /**
     * $points contiene los puntos que definen el polígino
     * @var array
     */
    protected array $points=[];

    /**
     * Calcula el area del poligono
     * @return float
     */
    abstract public function getArea() :float;

    /**
     *  
     *
     * @param array $points
     * @return void
     */
    abstract static function create(array $points);
    abstract public function validateNewPoint():bool;
    abstract public function getMaxPoints():int;

    public function getNumPoints():int{
        return count($this->$points);
    }

    protected function addPoint(point $point){
        if(!$this->validateNewPoint()){
            throw new \Exception("El punto no es valido");
        }
        $this->$puntos[] = $p;
    }
}