<?php

namespace geometria;

class point{
    private int $coordX;
    private int $coordY;
    private array $movement;

    private function __construct(int $coordX, int $coordY){
        $this->coordX = $coordX;
        $this->coordY = $coordY;
        $this->movement[] = ["X"=>$coordX, "Y"=>$coordX];
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
        return new point($coordX, $coordY);
    }

    /**
     * Devuelve la coordenada X del punto
     * @return int
     */
    public function getCoordX():int{
        return $this->coordX;
    }

    /**
     * Devuelve la coordenada Y del punto
     * @return int
     */
    public function getCoordY():int{
        return $this->coordY;
    }

    /**
     * Devuelve la posición del punto en un array indexado
     * ["X"=>0,"Y"=>0]
     * @return array
     */
    public function getPosition():array{
        return ["X"=>$this->getCoordX(), "Y"=>$this->getCoordY()];
    }

    public function getMovement():array{
        return $this->movement;
    }

    public function moveTo(int $X=0, int $Y=0){
        $this->coordX = $X;
        $this->coordY = $Y;
        $this->registerMovement();
    }

    public function move(int $X=0, int $Y=0){
        $this->coordX += $X;
        $this->coordY += $Y;
        $this->registerMovement();
    }

    public function moveToPoint(point $point){
        $this->moveTo($point->getCoordX(),$point->getCoordY());
    }

    private function registerMovement(){
        $this->movement[] = $this->getPosition();
    }

    public function getDistance(point $point):float{
        [$px,$py] = $point->getPosition();
        $x = $this->getCoordX() - $px;
        $y = $this->getCoordY() - $py;
        return sqrt($x**2 + $y**2);
    }

    public function isUpper(point $point){
        return $this->getCoordY() > $point->getCoordY();
    }
    public function isBottom(point $point){
        return $this->getCoordY() < $point->getCoordY();
    }
    public function isLeft(point $point){
        return $this->getCoordX() < $point->getCoordX();
    }
    public function isRight(point $point){
        return $this->getCoordX() > $point->getCoordX();
    }
    public function isUpperLeft(point $point){
        return $this->isLeft($point) && $this->isUpper($point);
    }
    public function isUpperRight(point $point){
        return $this->isRight($point) && $this->isUpper($point);
    }
    public function isBottomLeft(point $point){
        return $this->isLeft($point) && $this->isBottom($point);
    }
    public function isBottomRight(point $point){
        return $this->isRight($point) && $this->isBottom($point);
    }
} 