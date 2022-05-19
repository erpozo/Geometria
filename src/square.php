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
        foreach($points as $point){
            $this->addPoint($point);
        }
    }

    public function create(array $points):square{
        if(count($points) == 2)self::createWith2Points($points);
        if(!self::validate($points)){
            throw new \Exception("El cuadrado no es correcto");
        }
        return new square($points);       
    }

    /**
     * Crea square dando solo 2 puntos,
     * el resto se calcularan automaticamente
     * @return void
     */
    public static function createWith2Points(array $points):square{
        if(count($points) != 2){
            throw new \Exception("Numero de puntos incorrecto");
        }
        [$point1, $point2] = $points;
        if($point1->getCoordY() == $point2->getCoordY() && $point1->getCoordX() < $point2->getCoordX()){
            $points = self::calcCreateWith2PointsY($point1,$point2);
        }
        if($point1->getCoordX() == $point2->getCoordX() && $point1->getCoordY() < $point2->getCoordY()){
            $points = self::calcCreateWith2PointsX($point1,$point2);
        }
        if($point1->getCoordY() == $point2->getCoordY() && $point1->getCoordX() > $point2->getCoordX()){
            $points = self::calcCreateWith2PointsY($point2, $point1);
        }
        if($point1->getCoordX() == $point2->getCoordX() && $point1->getCoordY() > $point2->getCoordY()){
            $points = self::calcCreateWith2PointsX($point2, $point1);
        }
        return new square($points);
    }

    private static function calcCreateWith2PointsY(point $point1, point $point2):array{
        $side = $point1->getCoordX() - $point2->getCoordX();
        $point3 = point::createPoint(0,0);
        $point3->moveToPoint($point2);
        $point3->move(0, $side);
        $point4 = point::createPoint(0, 0);
        $point4->moveToPoint($point3);
        $point4->move(-$side, 0);
        return [$point1,$point2,$point3,$point4];
    }

    private static function calcCreateWith2PointsX(point $point1, point $point2):array{
        $side = $point1->getCoordX() - $point2->getCoordX();
        $point3 = point::createPoint(0,0);
        $point3->moveToPoint($point2);
        $point3->move($side, 0);
        $point4 = point::createPoint(0, 0);
        $point4->moveToPoint($point3);
        $point4->move(0, -$side);
        return [$point1,$point2,$point3,$point4];
    }

    public static function createWithPointSize(){

    }

    public function addPoint(point $point){
        $this->points[] = $point;
    }

    public function getAllCoords(){
        foreach($this->points as $n => $point){
            $posiciones[$n] = $point->getPosition();
        }
    }

    public function getArea():float{
        return $this->points[0]->getDistance($this->points[1])**2;
    }

    private static function validate(array $points):bool{
        if(count($points) > self::MAXPOINTS) return false;
        if(!self::validateDistancePoint($points)) return false;
        return true;
    }

    private static function validateDistancePoint(array $points):bool{
        return (
            $points[0]->getDistance($points[1]) == $points[1]->getDistance($points[2]) &&
            $points[1]->getDistance($points[2]) == $points[2]->getDistance($points[3]) &&
            $points[2]->getDistance($points[3]) == $points[3]->getDistance($points[0]) &&
            $points[0]->getDistance($points[2]) == $points[1]->getDistance($points[3])
        );
    }

    public function getMaxPoints():int{
        return self::MAXPOINTS;
    }
}

$point1 = point::createPoint(2,4);
$point2 = point::createPoint(4,4);

$micuadrado = new square([$point1,$point2]);

print_r($micuadrado->getAllCoords());