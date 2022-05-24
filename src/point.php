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
    public static function createPoint(int $coordX, int $coordY):point{
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

    /**
     * Obtiene el registro de movimiento del punto 
     * @return array
     */
    public function getMovement():array{
        return $this->movement;
    }

    /**
     * Mueve el punto a las coordenadas dadas
     * @param integer $X
     * @param integer $Y
     * @return void
     */
    public function moveTo(int $X=0, int $Y=0){
        $this->coordX = $X;
        $this->coordY = $Y;
        $this->registerMovement();
    }

    /**
     * Desplaza el punto en la cantidad indicada
     *
     * @param integer $X
     * Coordenada el eje X
     * @param integer $Y
     * Coordenada el eje Y 
     * @return void
     */
    public function move(int $X=0, int $Y=0){
        $this->coordX += $X;
        $this->coordY += $Y;
        $this->registerMovement();
    }

    /**
     * Desplaza el punto en la cantidad indicada
     *
     * @param integer $X
     * Coordenada el eje X
     * @param integer $Y
     * Coordenada el eje Y 
     * @return void
     */
    public function moveToPoint(point $point){
        $this->moveTo($point->getCoordX(),$point->getCoordY());
    }

    /**
     * Registra el movimiento del punto
     * @return void
     */
    private function registerMovement(){
        $this->movement[] = $this->getPosition();
    }

    /**
     * Mide la distancia entre dos puntos
     *
     * @param point $point
     * Punto al que medir la distancia
     * @return float
     */
    public function getDistance(point $point):float{
        $x = $this->getCoordX() - $point->getCoordX();
        $y = $this->getCoordY() - $point->getCoordY();;
        return sqrt($x**2 + $y**2);
    }

    /**
     * Comprueba si el punto dado esta encima del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isUpper(point $point):bool{
        return $this->getCoordY() > $point->getCoordY();
    }
    /**
     * Comprueba si el punto dado esta debajo del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isBottom(point $point):bool{
        return $this->getCoordY() < $point->getCoordY();
    }
    /**
     * Comprueba si el punto dado esta a la izquierda del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isLeft(point $point):bool{
        return $this->getCoordX() < $point->getCoordX();
    }
    /**
     * Comprueba si el punto dado esta a la derecha del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isRight(point $point):bool{
        return $this->getCoordX() > $point->getCoordX();
    }
    /**
     * Comprueba si el punto dado esta encima a la izquierda del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isUpperLeft(point $point):bool{
        return $this->isLeft($point) && $this->isUpper($point);
    }
    /**
     * Comprueba si el punto dado esta encima a la derecha del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isUpperRight(point $point):bool{
        return $this->isRight($point) && $this->isUpper($point);
    }
    /**
     * Comprueba si el punto dado esta deajo a la izquierda del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isBottomLeft(point $point):bool{
        return $this->isLeft($point) && $this->isBottom($point);
    }
    /**
     * Comprueba si el punto dado esta deajo a la derecha del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isBottomRight(point $point):bool{
        return $this->isRight($point) && $this->isBottom($point);
    }
    /**
     * Comprueba si el punto dado esta verticalmente encima del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isJustUpper(point $point):bool{
        return $this->isUpper($point) && !$this->isLeft($point) && !$this->isRight($point);
    }
    /**
     * Comprueba si el punto dado esta verticalmente debajo del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isJustBottom(point $point):bool{
        return $this->isBottom($point) && !$this->isLeft($point) && !$this->isRight($point);
    }
    /**
     * Comprueba si el punto dado esta horizontalmente a la izquierda del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isJustLeft(point $point):bool{
        return $this->isLeft($point) && !$this->isUpper($point) && !$this->isBottom($point);
    }
    /**
     * Comprueba si el punto dado esta horizontalmente a la derecha del pasado por parametros
     * @param point $point
     * @return boolean
     */
    public function isJustRight(point $point):bool{
        return $this->isRight($point) && !$this->isUpper($point) && !$this->isBottom($point);
    }
} 