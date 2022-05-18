<?php

namespace geometria;
use geometria\point;

class circle extends point{
    private point $centerPoint;
    private int $radius;

    private function __construct(point $centerPoint, int $radius){
        $this->centerPoint = $centerPoint;
        $this->radius = $radius;
    }

    public static function createCircle(point $point1, int $size){
        return new circle($point1,$size);
    }

    public static function createCircleAndPoint(int $coordX, int $coordY, int $size){
        $point = point::createPoint($coordX, $coordY);
        return self::createCircle($point, $size);
    }

    public function calcArea(){
        return pi() * $this->radius * $this->radius;
    }
}