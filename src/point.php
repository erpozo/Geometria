<?php

namespace geometria;

class point{
    private int $coordX;
    private int $coordY;

    private function __construct(int $coordX, int $coordY){
        $this->coordX = $coordX;
        $this->coordY = $coordY;
    }

    /**
     * Crea un nuevo punto
     * @param int $coordX
     * Define el eje X
     * @param int $coordY
     * Define el eje Y
     * @return point
     */
    public static function createPoint(int $coordX, int $coordY){
        return new point(abs($coordX), abs($coordY));
    }

    public function getCoordX(){
        return $this->coordX;
    }

    public function getCoordY(){
        return $this->coordY;
    }

    public function absMoveCoordX(int $coord){
        $this->absMoveCoord("X", abs($coord));
    }

    public function absMoveCoordY(int $coord){
        $this->absMoveCoord("Y", abs($coord));
    }

    private function absMoveCoord(string $axis, int $coord){
        if($axis=="X")$this->coordX = $coord;
        if($axis=="Y")$this->coordY = $coord;
    }

    public function RelMoveCoordX(int $coord){
        $this->RelMoveCoord("X",$coord);
    }

    public function RelMoveCoordY(int $coord){
        $this->RelMoveCoord("Y",$coord);
    }

    private function RelMoveCoord(string $axis, int $coord){
        if($axis=="X")$this->coordX += $coord;
        if($axis=="Y")$this->coordY += $coord;
    }

    public function doublePoint(){
        return $this->createPoint($this->coordX,$this->coordY);
    }
}