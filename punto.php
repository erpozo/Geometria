<?php

class point{
    private int $coordX;
    private int $coordY;

    private function __construct(int $coordX, int $coordY){
        $this->$coordX = $coordX;
        $this->$coordY = $coordY;
    }

    public static function createPoint(int $coordX, int $coordY){
        return new point(abs($coordX), abs($coordY));
    }

    public function absMoveCoordX(int $coord){
        absMoveCoord("X", abs($coord));
    }

    public function absMoveCoordY(int $coord){
        absMoveCoord("Y", abs($coord));
    }

    private function absMoveCoord(string $axis, int $coord){
        if($axis=="X")$this->$coordX = $coord;
        if($axis=="Y")$this->$coordY = $coord;
    }

    public function RelMoveCoordX(int $coord){
        RelMoveCoord("X",$coord);
    }

    public function RelMoveCoordY(int $coord){
        RelMoveCoord("Y",$coord);
    }

    private function RelMoveCoord(string $axis, int $coord){
        if($axis=="X")$this->$coordX += $coord;
        if($axis=="Y")$this->$coordY += $coord;
    }
}