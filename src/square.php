<?php

namespace geometria;
use geometria\polygon;

class square extends polygon{
    private const MAXPOINTS = 4;
    /**
     * new cuadrado([p1,p2,p3,p4])
     * los puntos deben venir dados Izq Arriba, Der Arriba, Der abajo Izq abajo
     */
    public function __construct(array $points){
        if(!self::validate()){
            throw new Exception("El cuadrado no es correcto");
        }
        foreach($points as $point){
            $this->addPoint($punto);
        }
    }

    private static function validate(array $points):bool{
        if(count($point) > self::MAXPOINTS) return false;
        if(!self::validateDistancePoint()) return false;
    }

    private static function validateDistancePoint(array $puntos):bool{
        return (
            $puntos[0]->getDistance($puntos[1]) == $puntos[1]->getDistance($puntos[2]) &&
            $puntos[1]->getDistance($puntos[2]) == $puntos[2]->getDistance($puntos[3]) &&
            $puntos[2]->getDistance($puntos[3]) == $puntos[3]->getDistance($puntos[0]) &&
            $puntos[0]->getDistance($puntos[2]) == $puntos[1]->getDistance($puntos[3])
        );
    }
}