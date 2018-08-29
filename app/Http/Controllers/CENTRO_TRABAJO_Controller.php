<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LU_CAT_NIVEL;
use App\CAT_CENTRO_TRABAJO;
use App\CAT_MUNICIPIOS_SEDESEM;
use App\LU_CAT_SUBSISTEMA;
use App\LU_CAT_NIVEL_EDUCATIVO;
USE App\LU_CAT_TURNO;

class CENTRO_TRABAJO_Controller extends Controller
{
    public function index(){}

    public function create(){
    	$niveles = LU_CAT_NIVEL::orderBy('CVE_NIVEL','ASC')->get();
    	return view('cedipiem.escuelas.eligeNivel',compact('niveles'));
    }

    public function store(Request $request){
    	dd($request->all());
    }

    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}

    public function eligeCentro(Request $request){
    	$user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        //dd($request->all());
        $niveles = LU_CAT_NIVEL::orderBy('CVE_NIVEL','ASC')->get();
        if($request->ESCUELA == NULL){
        	$escuelas = CAT_CENTRO_TRABAJO::where('CVE_NIVEL',$request->NIVEL)->orderBy('DESC_CCT','ASC')->paginate(500);
    		$municipios = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIOID','ASC')->get();
        	return view('cedipiem.escuelas.escuelasTabla',compact('niveles','escuelas','municipios'));
        }else{
        	$escuelas = CAT_CENTRO_TRABAJO::where('CVE_NIVEL',$request->NIVEL)->where('DESC_CCT','like','%'.strtoupper($request->ESCUELA).'%')->orderBy('DESC_CCT','ASC')->paginate(500);
        	$municipios = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIOID','ASC')->get();
        	return view('cedipiem.escuelas.escuelasTabla',compact('niveles','escuelas','municipios'));
        }
    }

    public function nuevoCentro(){
    	$niveles = LU_CAT_NIVEL::orderBy('CVE_NIVEL','ASC')->get();
    	$municipios = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIONOMBRE','ASC')->get();
    	$subsistemas = LU_CAT_SUBSISTEMA::orderBy('CVE_SUBSISTEMA','ASC')->get();
    	$educativos = LU_CAT_NIVEL_EDUCATIVO::orderBy('CVE_NIVEL_EDUCATIVO','ASC')->get();
    	$turnos = LU_CAT_TURNO::orderBy('CVE_TURNO','ASC')->get();
    	return view('cedipiem.escuelas.registroNuevaEscuela',compact('niveles','municipios','subsistemas','educativos','turnos'));
    }
}
