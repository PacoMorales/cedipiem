<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\METADATO_PADRINOS_Request;
use Laracasts\Flash\Flash;
use App\LU_CLASIFICGOB;
use App\METADATO_PADRINOS;
use App\METADATO_PADRINOS_PRE_ALTA;
use App\FURWEB_DIARIO_13;
use App\ASIGNACION_PADRINO_AHIJADO;
use App\CAT_PROGRAMAS;
use App\CAT_MESES;
use App\CAT_GRADO_ESTUDIOS;
use App\CAT_MUNICIPIOS_SEDESEM;
use App\CAT_MUNICIPIOS;
use App\LU_ESTRUCGOB;
use App\LU_DEPENDENCIAS;
use App\CAT_VIGENCIA_PROGRAMAS;

class PRE_ALTA_Controller extends Controller
{
	public function apiSectores(){
		return response()->json(LU_CLASIFICGOB::where("CLASIFICGOB_ID",'>',0)->where("CLASIFICGOB_ID",'<',5)->orderBy('CLASIFICGOB_ID','ASC')->get());
	}

    public function apiEstructura($id){
        return response()->json(LU_ESTRUCGOB::obtenerEstructuras($id)); 
    }

    public function apiDependencia($id){
        return response()->json(LU_DEPENDENCIAS::obtenerDependencia($id)); 
    }

    public function apiMunicipios(){
        /*$mun = CAT_MUNICIPIOS::all();
        echo '<pre>';
        var_dump($mun); die;*/
        return response()->json(CAT_MUNICIPIOS_SEDESEM::Municipios()); 
    }

	public function inicioPadrinosApp(){
        //$programa    = CAT_PROGRAMAS::find(13);
        return view('cedipiem.usuario.padrino.app.inicio');
    }

    public function crearPadrinoAPP(){
        $clasificgob = LU_CLASIFICGOB::orderBy('CLASIFICGOB_ID','asc')->get();
        $programa    = CAT_PROGRAMAS::find(13);
        return view('cedipiem.usuario.padrino.app.registro',compact('clasificgob','programa'));
    }

    public function sectorAPP(Request $request){
        $estrucgob   = LU_ESTRUCGOB::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->get();
        $estruc = $estrucgob[0];
        $clasificgob = LU_CLASIFICGOB::find($request->select_dep);
        $programa    = CAT_PROGRAMAS::find(13);
        $municipios  = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->orderBy('MUNICIPIONOMBRE','ASC')->get();
        $meses 		 = CAT_MESES::orderBy('CVE_MES','ASC')->get(); 
        if(is_numeric($request->select_dep)){
            //dd('Todo oc');
            if($request->select_dep==0){
                return back()->withErrors(['FOLIO' => 'Por favor, elije una opción.']);
                //$dependencias = LU_DEPENDENCIAS::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('DEPEN_DESC','ASC')->get();
                //return view('cedipiem.usuario.padrino.nuevoRegistro',compact('clasificgob','programa','dependencias','hoy'));
            }else{
                if($request->select_dep==1){//SI ES 1 (SECTOR CENTRAL)
                    $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                    return view('cedipiem.usuario.padrino.app.nuevoRegistroAPP',compact('clasificgob','programa','dependencias','estruc','municipios','meses'));
                }else{
                    if($request->select_dep==2){//SI ES 2 (ORGANISMO AUXILIAR)
                        $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                        //$estruc       = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('ESTRUCGOB_DESC','ASC')->get();
                        return view('cedipiem.usuario.padrino.app.nuevoRegistroAPP',compact('clasificgob','programa','dependencias','estruc','municipios','meses'));
                    }else{
                        if($request->select_dep==3){//SI ES 3 (AYUNTAMIENTOS)
                            $dependencias = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->where('MUNICIPIOID',$request->estruc)->orderBy('MUNICIPIONOMBRE','ASC')->get();
                            $depend=$dependencias[0];
                            return view('cedipiem.usuario.padrino.app.nuevoRegistroAyuntamientosAPP',compact('clasificgob','programa','dependencias','depend','municipios','meses'));
                        }else{
                            if($request->select_dep==4){//SI ES 4 (ORGANISMO INDEPENDIENTE)
                                $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                                //$estruc       = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('ESTRUCGOB_DESC','ASC')->get(); 
                                return view('cedipiem.usuario.padrino.app.nuevoRegistroAPP',compact('clasificgob','programa','dependencias','estruc','municipios','meses'));
                            }else{
                                if($request->select_dep==5){//SI ES 5 (INICIATIVA PRIVADA)
                                    return view('cedipiem.usuario.padrino.app.nuevoRegistroIPAPP',compact('clasificgob','programa','estruc','municipios'));
                                }else{
                                    return back()->withErrors(['FOLIO' => 'Ha ocurrido algo inesperado. Por favor, elije una opción.']);
                                }
                            }
                        }
                    }
                }
            }
        }else{
            return back()->withErrors(['FOLIO' => 'Por favor, elije una opción.']);
        }
    }

    public function nuevoPadrinoAPP(Request $request){
        //dd($request->all());
        do{
            $aux    = mt_rand(5000000,25000000);
            $var = false;
            $existe = METADATO_PADRINOS_PRE_ALTA::find($aux);
            if($existe==NULL){
                $var = true;
            }else{
                $var = false;
            }
        }while($var == false);
        $rfc = METADATO_PADRINOS_PRE_ALTA::where('RFC','like','%'.$request->RFC.'%')->get();
        //Error 505;
        if($rfc->count()>=1){
        	//dd('entro RFC');
        	//return back()->withErrors(['RFC' => 'El RFC: '.$request->RFC.' está duplicado, por favor verifica si no ha sido un error de escritura.']);
            return (['Error'=>'505','Mensaje: '=>'El RFC esta duplicado.']);
        }
        //Esto entra como un error ?
        /*$nombre = METADATO_PADRINOS_PRE_ALTA::where('NOMBRE_COMPLETO','like','%'.$request->PATERNO.' '.$request->MATERNO.' '.$request->NOMBRES.'%')->get();
        if($nombre->count() >= 1){
            //dd('entro NOMBRE');
            //return back()->withErrors(['RFC' => 'El NOMBRE: '.$request->PATERNO.' '.$request->MATERNO.' '.$request->NOMBRES.' ya ha sido ingresado, por favor verifica si no ha sido un error de escritura.']);
            return (['Error'=>'','Mensaje: '=>'El RFC esta duplicado.']);
        }*/
        //Error 535
        if($request->OPCION1 == $request->OPCION2 OR $request->OPCION2 == $request->OPCION3 OR $request->OPCION1 == $request->OPCION3){
            //dd('entro OPCION');
        	//return back()->withErrors(['FOLIO' => 'Por favor, elige diferentes municipios a apadrinar.']);
            return (['Error'=>'535','Mensaje: '=>'Los municipios a apadrinar están duplicados']);
        }
        //Error 515
        $clasif = LU_CLASIFICGOB::where('CLASIFICGOB_ID',$request->SECTOR)->get();
        if($clasif->count() <= 0){
            /*dd('NO enCONtro CLASIFICACION');
            return back()->withErrors(['FOLIO' => 'Un error con la clasificacion.']);   */
            return (['Error'=>'515','Mensaje: '=>'La clasificación ingresada es incorrecta.']);
        }
        //Error 525
        $clasificgob=$clasif[0];
        $estruc = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$clasificgob->clasificgob_id)->where('ESTRUCGOB_ID','like','%'.$request->ESTRUCTURA.'%')->get();
        if($estruc->count() <= 0){
            //dd('NO ENCONTRO ESTRUCTURA ');
            //return back()->withErrors(['FOLIO' => 'Un error con la estructura.']);   
            return (['Error'=>'525','Mensaje: '=>'La estructura gubernamental es incorrecta.']);
        }
        $estrucgob=$estruc[0];
        $nuevo = new METADATO_PADRINOS_PRE_ALTA();
        $nuevo->CVE_SP = (int)$request->CVE_SERV_PUBLICO;
        $nuevo->CVE_PADRINO = (int)$aux;
        $nuevo->CLASIFICGOB_ID = $clasificgob->clasificgob_id;
        $nuevo->APELLIDO_PATERNO = strtoupper($request->PATERNO);
        $nuevo->APELLIDO_MATERNO = strtoupper($request->MATERNO);
        $nuevo->NOMBRES = strtoupper($request->NOMBRES);
        $nuevo->NOMBRE_COMPLETO = strtoupper($request->PATERNO.' '.$request->MATERNO.' '.$request->NOMBRES);
        $nuevo->RAZON_SOCIAL = strtoupper($request->RAZON_SOCIAL);
        $nuevo->REPRESENTANTE = strtoupper($request->REPRESENTANTE);
        $nuevo->SEXO = strtoupper($request->SEXO);
        $nuevo->RFC = strtoupper($request->RFC);
        $nuevo->ESTRUCGOB_ID = $estrucgob->estrucgob_id;
        $nuevo->CVE_DEPENDENCIA = strtoupper($request->DEPENDENCIA);
        $nuevo->INSTITUCION = strtoupper($request->INSTITUCION);
        $nuevo->UNIDAD_ADMIN = strtoupper($request->UNIDAD);
        $nuevo->CARGO = strtoupper($request->CARGO);
        $nuevo->COLONIA = strtoupper($request->COLONIA);
        $nuevo->CP = strtoupper($request->CP);
        $nuevo->DIRECCION_LAB = strtoupper($request->CALLE.' '.$request->NUM_EXT.' '.$request->NUM_INT);
        $nuevo->LADA_LAB = strtoupper($request->LADA);
        $nuevo->TELEFONO_LAB = (int)$request->TELEFONO;
        $nuevo->CORREO_ELECT = $request->CORREO;
        $nuevo->N_PERIODO = date('Y');
        $nuevo->STATUS_4 = 'E';
        $nuevo->NO_AHIJADOS = strtoupper($request->AHIJADOS);
        $nuevo->MONTO_AHIJADOS = $request->AHIJADOS * 150;
        $nuevo->QUINCENA = strtoupper($request->QUINCENA);
        $nuevo->QUINCENA_MES = strtoupper($request->MES);
        $nuevo->QUINCENA_ANIO = strtoupper($request->ANIO);
        $nuevo->RECIBO_DEDUCIBLE = strtoupper($request->RECIBO_DEDUCIBLE);
        $nuevo->CVE_MUNICIPIO_OPC1 = strtoupper($request->OPCION1);
        $nuevo->CVE_MUNICIPIO_OPC2 = strtoupper($request->OPCION2);
        $nuevo->CVE_MUNICIPIO_OPC3 = strtoupper($request->OPCION3);
        $nuevo->FECHA_REG = date('Y/m/d');
        //dd('A GUARDAR');
        $nuevo->save();
        return (['Ok'=>'200','Mensaje: '=>'Registro agregado correctamente.']);
        //Flash::success("La información del PADRINO: ".$request->NOMBRES." con CLAVE DE PADRINO: ".$aux." fue registrada correctamente.")->important();
        //$programa    = CAT_PROGRAMAS::find(13);
        //return view('cedipiem.usuario.padrino.app.aviso',compact('programa'));
    }

    /*public function nuevoPadrinoIPAPP(Request $request){
    	//dd($request->all()); 
    	do{
            $aux    = mt_rand(5000000,25000000);
            $var = false;
            $existe = METADATO_PADRINOS_PRE_ALTA::find($aux);
            if($existe==NULL){
                $var = true;
            }else{
                $var = false;
            }
        }while($var == false);
        if($request->OPCION1 == $request->OPCION2 OR $request->OPCION2 == $request->OPCION3 OR $request->OPCION1 == $request->OPCION3){
        	return back()->withErrors(['FOLIO' => 'Por favor, elige diferentes municipios a apadrinar.']);
        }
        $clasif = LU_CLASIFICGOB::where('CLASIFICGOB_DESC','like','%'.$request->SECTOR.'%')->get();
        $clasificgob=$clasif[0];
        $estruc = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$clasificgob->clasificgob_id)->where('ESTRUCGOB_DESC','like','%'.$request->ESTRUCTURA.'%')->get();
        $estrucgob=$estruc[0];
        $nuevo = new METADATO_PADRINOS_PRE_ALTA();
        $nuevo->CVE_SP = strtoupper($request->CVE_SERV_PUBLICO);
        $nuevo->CVE_PADRINO = $aux;
        $nuevo->CLASIFICGOB_ID = $clasificgob->clasificgob_id;
        $nuevo->APELLIDO_PATERNO = strtoupper($request->PATERNO);
        $nuevo->APELLIDO_MATERNO = strtoupper($request->MATERNO);
        $nuevo->NOMBRES = strtoupper($request->NOMBRES);
        $nuevo->NOMBRE_COMPLETO = strtoupper($request->PATERNO.' '.$request->MATERNO.' '.$request->NOMBRES);
        $nuevo->RAZON_SOCIAL = strtoupper($request->RAZON_SOCIAL);
        $nuevo->REPRESENTANTE = strtoupper($request->REPRESENTANTE);
        $nuevo->RFC = strtoupper($request->RFC);
        $nuevo->ESTRUCGOB_ID = $estrucgob->estrucgob_id;
        $nuevo->CVE_DEPENDENCIA = strtoupper($request->DEPENDENCIA);
        $nuevo->COLONIA = strtoupper($request->COLONIA);
        $nuevo->CP = strtoupper($request->CP);
        $nuevo->DIRECCION_LAB = strtoupper($request->CALLE.' '.$request->NUM_EXT.' '.$request->NUM_INT);
        $nuevo->LADA_LAB = strtoupper($request->LADA);
        $nuevo->TELEFONO_LAB = strtoupper($request->TELEFONO);
        $nuevo->CORREO_ELECT = $request->CORREO;
        $nuevo->N_PERIODO = date('Y');
        $nuevo->STATUS_4 = 'E';
        $nuevo->NO_AHIJADOS = strtoupper($request->AHIJADOS);
        $nuevo->MONTO_AHIJADOS = $request->AHIJADOS * 150;
        $nuevo->RECIBO_DEDUCIBLE = strtoupper($request->RECIBO_DEDUCIBLE);
        $nuevo->CVE_MUNICIPIO_OPC1 = strtoupper($request->OPCION1);
        $nuevo->CVE_MUNICIPIO_OPC2 = strtoupper($request->OPCION2);
        $nuevo->CVE_MUNICIPIO_OPC3 = strtoupper($request->OPCION3);
        $nuevo->FECHA_REG = date('Y/m/d');
        dd($nuevo);
        //$nuevo->save();
        Flash::success("La información del PADRINO: ".$request->NOMBRES." con CLAVE DE PADRINO: ".$aux." fue registrada correctamente.")->important();
        $programa    = CAT_PROGRAMAS::find(13);
        return view('cedipiem.usuario.padrino.app.aviso',compact('programa'));
    }*/

    public function vistaLogin(){
    	$programa    = CAT_PROGRAMAS::find(13);
    	return view('cedipiem.usuario.padrino.app.login.login',compact('programa'));
    }

    public function loginPadrinoApp(Request $request){
    	//dd($request->all());
    	$existe = METADATO_PADRINOS_PRE_ALTA::where('CVE_PADRINO',$request->CVE_PADRINO)->where('RFC',$request->RFC)->get();
    	if($existe->count() >= 1){
    		dd('TODO OK');
    	}else{
    		return back()->withErrors(['FOLIO' => 'Al parecer aún no te han dado de alta. Por favor mantente al pendiente de tu correo electrónico, ahí te llegará la confirmación de aceptación de tu solicitud como un nuevo padrino.']);
    	}
    }
}
