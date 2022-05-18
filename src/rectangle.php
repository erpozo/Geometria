<?php

namespace geometria;
use geometria\point;

class rectangle extends point{
    private point $point1;
    private point $point2;
    private point $point3;
    private point $point4;
    private int $width;
    private int $high;

    private function __construct(point $point1, point $point2, point $point3, point $point4, int $width, int $high){
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->point3 = $point3;
        $this->point4 = $point4;
        $this->width = $width;
        $this->high = $high;
    }

    public static function createRectangle(point $point1, int $width, int $high){
        return new Rectangle($point1, self::calcPoint2($point1, $width), self::calcPoint3($point1, $high), self::calcPoint4($point1, $width, $high), $width, $high);
    }

    public static function createRectangleAndPoint(int $coordX, int $coordY, int $width, int $high){
        $point = point::createPoint($coordX, $coordY);
        return self::createRectangle($point, $width, $high);
    }
    
    private static function calcPoint2(point $point1, int $width){
        return self::createPoint($point1->getCoordX+$width, $point1->getCoordY);
    }

    private static function calcPoint3(point $point1, int $high){
        return self::createPoint($point1->getCoordX, $point1->getCoordY+$high);
    }

    private static function calcPoint4(point $point1, int $width, int $high){
        return self::createPoint($point1->getCoordX+$width, $point1->getCoordY+$high);
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

    public function getRectanglePoints():array{
        return [self::getPoint1(),self::getPoint2(),self::getPoint3(),self::getPoint4()];
    }


    private function reCalc(){
        $this->point2 = self::calcPoint2($this->point1, $this->width);
        $this->point3 = self::calcPoint3($this->point1, $this->high);
        $this->point4 = self::calcPoint4($this->point1, $this->width, $this->high);
    }

    public function calcArea(){
        return $this->width*$this->high;
    }

    public function resize(int $newWidth, int $newHigh){
        $this->newWidth = $newWidth;
        $this->newHigh = $newHigh;
        $this->reCalc();
    }
}