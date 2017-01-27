<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MatrizController extends Controller
{

	private $cubo;
	private $sum;

    public function index(){

    	return $this->create();
    } 

    public function create(){
		$this->inicializa();
    	return view('from.formulario');
    }

    public function store(Request $request){

		if($request['selectop'] == "Set"){

    		$this->setUpdate($request["set1"],$request["set2"],$request["set3"],$request["set4"]);

			$result = "Set ok (".$request["set1"].",".$request["set2"].",".$request["set3"].")=".$request["set4"];
    	}

    	if($request["selectop"]=="Query")
		{

			if($request["set1"] != ''){

				$this->setUpdate($request["set1"],$request["set2"],$request["set3"],$request["set4"]);	
			}


			$i[0]=$request["query1"];
			//y
			$i[1]=$request["query2"];
			//z
			$i[2]=$request["query3"];

			$f[0]=$request["query4"];
			$f[1]=$request["query5"];
			$f[2]=$request["query6"];

			$result = "Query:".$r=$this->setQuery($i,$f);


		}	

		if($request->ajax()){
			return response()->json([
				'mensaje'=> $result

			]);

		}
    }

    public function inicializa(){

    	$x=1;
		$y=1;
		$z=1;
		$fx=4;
		$fy=4;
		$fz=4;
		for($x=1;$x<$fx;$x++)
		{
			for($y=1;$y<$fy;$y++){

				for($z=1;$z<$fz;$z++)
				{
					$this->cubo[$x][$y][$z]=0;

				}

			}

		}

    }

    public function setUpdate($x,$y,$z,$w){

		$this->cubo[$x][$y][$z]=$w;

	}

	public function setQuery($i,$f){


		$this->sum=0;
			
		$x=$i[0];
		$y=$i[1];
		$z=$i[2];
		$fx=$f[0];
		$fy=$f[1];
		$fz=$f[2];

		for($x=$i[0];$x<=$fx;$x++)
		{

			for($y=$i[0];$y<=$fy;$y++){


				for($z=$i[0];$z<=$fz;$z++)
				{
					$this->sum=$this->cubo[$x][$y][$z]+$this->sum;
				}

			}
		}

		return $this->sum;
	}


}
