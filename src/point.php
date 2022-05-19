<?php

namespace geometria;

/**
 * Point representa un punto en un plano 2D
 * @var int $coordX
 * Coordenada eje X
 * @var int $coordY
 * Coordenada eje Y
 */
class point{
    private int $coordX;
    private int $coordY;
    private array $movement;

    /**
     * Crea un nuevo punto
     * @param int $coordX
     * Define el eje X
     * @param int $coordY
     * Define el eje Y
     */
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
     * Devuelve la posición del punto
     * @return array
     * ["X"=>1,"Y"=>2]
     */
    public function getPosition():array{
        return [
            "X" => $this->getCoordX(),
            "Y" => $this->getCoordY()
        ];
    }

    /**
     * Devuelve la posición del eje X
     * @return int
     */
    public function getCoordX():int{
        return $this->coordX;
    }

    /**
     * Devuelve la posición del eje Y
     * @return int
     */
    public function getCoordY():int{
        return $this->coordY;
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