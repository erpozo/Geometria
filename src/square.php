<?php

namespace geometria;
use geometria\point;

class square extends point{
    private point $point1;
    private point $point2;
    private point $point3;
    private point $point4;
    private int $size;

    private function __construct(point $point1, point $point2, point $point3, point $point4, int $size){
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->point3 = $point3;
        $this->point4 = $point4;
        $this->size = $size;
    }

    public static function createSquare(point $point1, int $size){
        return new square($point1, self::calcPoint2($point1,$size), self::calcPoint3($point1,$size), self::calcPoint4($point1,$size), $size);
    }

    public static function createSquareAndPoint(int $coordX, int $coordY, int $size){
        $point = point::createPoint($coordX, $coordY);
        return self::createSquare($point, $size);
    }
    
    private static function calcPoint2(point $point1, int $size){
        return self::createPoint($point1->getCoordX+$size, $point1->getCoordY);
    }

    private static function calcPoint3(point $point1, int $size){
        return self::createPoint($point1->getCoordX, $point1->getCoordY+$size);
    }

    private static function calcPoint4(point $point1, int $size){
        return self::createPoint($point1->getCoordX+$size, $point1->getCoordY+$size);
    }

    public function getPoint1(){
        return $this->point1;
    }
    public function getPoint2(){
        return $this->point2;
    }
    public function getPoint3(){
        return $this->point3;
    }
    public function getPoint4(){
        return $this->point4;
    }

    public function getSquarePoints():array{
        return [self::getPoint1(),self::getPoint2(),self::getPoint3(),self::getPoint4()];
    }


    private function reCalc(){
        $this->point2 = self::calcPoint2($this->point1, $this->size);
        $this->point3 = self::calcPoint3($this->point1, $this->size);
        $this->point4 = self::calcPoint4($this->point1, $this->size);
    }

    public function calcArea(){
        return pow($this->size,3);
    }

    public function resize(int $newSize){
        $this->size = $newSize;
        $this->reCalc();
    }
}