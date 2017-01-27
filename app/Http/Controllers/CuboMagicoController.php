<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CuboMagicoController extends Controller
{
    private $cubo;
    private $sum;
    private $dimension;


    public function __construct(){

        $this->dimension = 3;
        $this->matrixCubo();
    }

    public function index(){

        return view('from.formulario');
    }

    public function matrixCubo(){
        $this->cubo = array_fill(0, $this->dimension, array_fill(0, $this->dimension, array_fill(0, $this->dimension, 0)));
    }

    public function store(Request $request){

        if($request['selectop'] == "Set"){

            $this->setUpdate($request["set1"],$request["set2"],$request["set3"],$request["set4"]);

            $result = "Set ok (".$request["set1"].",".$request["set2"].",".$request["set3"].")=".$request["set4"];
        }

        if($request["selectop"]=="Query"){
            if($request["set1"] != ''){

                $this->setUpdate($request["set1"],$request["set2"],$request["set3"],$request["set4"]);
            }

            $i = array($request["query1"], $request["query2"], $request["query3"]);
            $f = array($request["query4"], $request["query5"], $request["query6"]);


            $result = "Query:".$r=$this->setQuery($i,$f);


        }

        if($request->ajax()){
            return response()->json([
                'mensaje'=> $result

            ]);

        }

    }

    public function setUpdate($x,$y,$z,$w){

        if ($this->validatePoint($x, $y, $z)){
            $this->cubo[$x][$y][$z]=$w;
        }

        return "Los puntos no son validos";
    }

    public function setQuery($i,$f){

        $this->sum=0;

        $x=$i[0];
        $y=$i[1];
        $z=$i[2];
        $fx=$f[0];
        $fy=$f[1];
        $fz=$f[2];

        if ($this->validatePoint($x, $y, $z) && $this->validatePoint($fx, $fy, $fz)){
            for($x=$i[0];$x<=$fx;$x++) {
                for($y=$i[0];$y<=$fy;$y++){
                    for($z=$i[0];$z<=$fz;$z++){
                        $this->sum +=$this->cubo[$x][$y][$z];
                    }
                }
            }
            return $this->sum;
        }

        return 'El o los puntos que ingreso son invalidos';
    }

    private function validatePoint($x, $y, $z){
        return $this->validateAxis($x) && $this->validateAxis($y) && $this->validateAxis($z);
    }

    private function validateAxis($axis)
    {
        return (! ($axis > $this->dimension) && $axis >= 1);
    }

}
