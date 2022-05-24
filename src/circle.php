<?php

namespace geometria;
use geometria\point;

class circle extends polygon{
    private point $centerPoint;
    private int $radius;

    /**
     * Crea un objeto circle
     * @param point $centerPoint
     * Punto central del circulo
     * @param int $radius
     * Radio del circulo
     */
    private function __construct(point $centerPoint, int $radius){
        $this->centerPoint = $centerPoint;
        $this->radius = $radius;
    }

    /**
     * Crea un objeto circle
     * @param point $centerPoint
     * Punto central del circulo
     * @param int $radius
     * Radio del circulo
     */
    public static function createCircle(point $point1, int $radius):circle{
        return new circle($point1,$size);
    }

    /**
     * Crea un objeto punto para usarlo en circle
     * @param int $coordX
     * Coord eje X
     * @param int $coordY
     * Coord eje Y
     * @param int $radius
     * Radio del circulo
     */
    public static function createCircleAndPoint(int $coordX, int $coordY, int $radius):circle{
        return self::createCircle(point::createPoint($coordX, $coordY), $radius);
    }

    /**
     * Calcula el area del circulo
     * @return float 
     */
    public function calcArea():float{
        return pi() * $this->radius * $this->radius;
    }
}