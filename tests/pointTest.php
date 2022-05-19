<?php
use PHPUnit\Framework\TestCase;
use geometria\point;

final class pointTest extends TestCase{
    
    function DPPointTest(){
        $punto1 = point::createPoint(4,7);
        $punto1->moveTo(0,0);
        $punto1->move(2,-1);
        $punto2 = point::createPoint(2,2);
        $punto2->moveToPoint($punto1);
        $punto2->move(-1,3);
        return [
            "Crear punto mover y obtener coordenadas"=>[
                $punto1->getPosition(),
                ["X"=>2,"Y"=>-1]
            ],
            "Clonar posicion de punto mover y obtener coordenadas"=>[
                $punto2->getPosition(),
                ["X"=>1,"Y"=>2]
            ],
            "Registro de movimiento"=>[
                $punto2->getMovement(),
                [
                    ["X"=>2,"Y"=>2],
                    ["X"=>2,"Y"=>-1],
                    ["X"=>1,"Y"=>2]
                ]
            ]
        ];
    }

    /**
     * @dataProvider DPPointTest
     */
    public function testPoint($funcion,$resultado){
        $this->assertEquals($funcion,$resultado);
    }
}