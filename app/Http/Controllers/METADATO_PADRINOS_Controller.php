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
use App\CAT_GRADO_ESTUDIOS;
use App\CAT_MUNICIPIOS_SEDESEM;
use App\LU_ESTRUCGOB;
use App\LU_DEPENDENCIAS;
use App\CAT_VIGENCIA_PROGRAMAS;

class METADATO_PADRINOS_Controller extends Controller
{
    public function selectDependencia($id){
        $local = LU_DEPENDENCIAS::obtenerDependencias($id);
        return response()->json($local);
    }

    public function selectEstructura($id){
        $local = LU_ESTRUCGOB::obtenerEstructuras($id);
        return response()->json($local);
    }

    public function index(){
        $clasificgob = LU_CLASIFICGOB::orderBy('CLASIFICGOB_ID','asc')->get();
        $programa    = CAT_PROGRAMAS::find(13);
        return view('cedipiem.usuario.padrino.nuevoRegistroEligeSector',compact('clasificgob','programa'));
    }

    public function create(){
    	$clasificgob = LU_CLASIFICGOB::orderBy('CLASIFICGOB_ID','asc')->get();
    	return view('cedipiem.usuario.padrino.padrinoPrincipal',compact('clasificgob'));
    }

    public function store(METADATO_PADRINOS_Request $request){
        //dd($request->all());
        $user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        if(METADATO_PADRINOS::validaNombres($request->APELLIDO_PATERNO,$request->APELLIDO_MATERNO,$request->NOMBRES)==true){ //VALIDA NOMBRE
            if(METADATO_PADRINOS::validaCurp($request->FECHA_NACIMIENTO,$request->CURP)==true){ //VALIDA CURP
                if(METADATO_PADRINOS::validaRFC($request->FECHA_NACIMIENTO,$request->CURP,$request->RFC)==true){//VALIDA RFC
                    if(METADATO_PADRINOS::validaDuplicados($request->APELLIDO_PATERNO.' '.$request->APELLIDO_MATERNO.' '.$request->NOMBRES,$request->FECHA_NACIMIENTO,$request->CVE_MUNICIPIO)==true){//VALIDA DUPLICADOS POR NOMBRE COMPLETO, FECHA DE NACIMIENTO Y MUNICIPIO
                        //SE REALIZA REGISTRO
                        $fecha_esp  = str_replace("/", "", $request->FECHA_NACIMIENTO);
                        $dia        = substr($fecha_esp, 0, 2);
                        $mes        = substr($fecha_esp, 2, 2);
                        $anio       = substr($fecha_esp, 4, 4);
                        $fecha_ok   = $anio."/".$mes."/".$dia;
                        if (getenv('HTTP_CLIENT_IP')) {
                          $ip = getenv('HTTP_CLIENT_IP');
                        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                          $ip = getenv('HTTP_X_FORWARDED_FOR');
                        } elseif (getenv('HTTP_X_FORWARDED')) {
                          $ip = getenv('HTTP_X_FORWARDED');
                        } elseif (getenv('HTTP_FORWARDED_FOR')) {
                          $ip = getenv('HTTP_FORWARDED_FOR');
                        } elseif (getenv('HTTP_FORWARDED')) {
                          $ip = getenv('HTTP_FORWARDED');
                        } else {
                          // Método por defecto de obtener la IP del usuario
                          // Si se utiliza un proxy, esto nos daría la IP del proxy
                          // y no la IP real del usuario.
                          $ip = $_SERVER['REMOTE_ADDR'];
                        }

                        $nr_mp = [
                            'CVE_SP'            => strtoupper($request->CVE_SP),
                            'CVE_PADRINO'       => strtoupper($request->CVE_PADRINO),
                            'CLASIFICGOB_ID'    => $request->select_dep,
                            'APELLIDO_PATERNO'  => strtoupper($request->APELLIDO_PATERNO),
                            'APELLIDO_MATERNO'  => strtoupper($request->APELLIDO_MATERNO),
                            'NOMBRES'           => strtoupper($request->NOMBRES),
                            'NOMBRE_COMPLETO'   => strtoupper($request->APELLIDO_PATERNO.' '.$request->APELLIDO_MATERNO.' '.$request->NOMBRES),
                            'FECHA_NACIMIENTO'  => $fecha_ok,
                            'SEXO'              => strtoupper($request->sexo),
                            'RFC'               => strtoupper($request->RFC),
                            'CURP'              => strtoupper($request->CURP),
                            'COLONIA'           => strtoupper($request->COLONIA),
                            'CALLE'             => strtoupper($request->CALLE),
                            'ENTRE_CALLE'       => strtoupper($request->ENTRE_CALLE),
                            'Y_CALLE'           => strtoupper($request->Y_CALLE),
                            'OTRA_REFERENCIA'   => strtoupper($request->OTRA_REFERENCIA),
                            'CP'                => $request->CODIGO_POSTAL,
                            'LADA_TEL'          => $request->LADA_TEL,
                            'TELEFONO'          => $request->TELEFONO,
                            'LADA_CEL'          => $request->LADA_CEL,
                            'CELULAR'           => $request->CELULAR,
                            'CORREO_ELECT'      => $request->CORREO_ELECT,
                            'CVE_GRADO_ESTUDIO' => strtoupper($request->CVE_GRADO_ESTUDIO),
                            'CVE_MUNICIPIO'     => strtoupper($request->CVE_MUNICIPIO),
                            'ESTRUCGOB_ID'      => strtoupper($request->UNIDAD),
                            'UNIDAD_ADMIN'      => strtoupper($request->UNIDAD_ADMIN),
                            'CARGO'             => strtoupper($request->CARGO),
                            'DIRECCION_LAB'     => strtoupper($request->DIRECCION_LAB),
                            'LADA_LAB'          => strtoupper($request->LADA_LAB),
                            'TELEFONO_LAB'      => strtoupper($request->TELEFONO_LAB),
                            'N_PERIODO'         => strtoupper($request->N_PERIODO),
                            'OBS'               => strtoupper($request->OBS),
                            'USU_M'             => $user,
                            'PW_M'              => $pass,
                            'IP_M'              => $ip,
                            'FECHA_M'           => date('Y/m/d')
                        ];
                        //SE REALIZA EL UPDATE A TODO LO QUE DA
                        Flash::info("La información del padrino ".$request->NOMBRES." fue actualizada satisfactoriamente.")->important();
                        METADATO_PADRINOS::where('CVE_PADRINO', $request->CVE_PADRINO)->update($nr_mp);
                        $trx_aux = FURWEB_DIARIO_13::buscarTransaccion(date('Y'),13,date('m'),$request->CVE_PADRINO,7,7001,22)->get(); //TRX SIGNIFICA TRANSACCION
                        if($trx_aux->count()==0){
                            $nuevo = new FURWEB_DIARIO_13();
                                $nuevo->N_PERIODO         = date('Y');
                                $nuevo->CVE_PROGRAMA      = 13;
                                $nuevo->MES               = date('m');
                                $nuevo->FOLIO             = $request->CVE_PADRINO;
                                $nuevo->FOLIO_RELACIONADO = $request->CVE_PADRINO;
                                $nuevo->PROCESO_ID        = 7;
                                $nuevo->ACTIVIDAD_ID      = 7001;
                                $nuevo->TRX_ID            = 22;
                                $nuevo->OBS               = NULL;
                                $nuevo->NO_VECES          = 1;
                                $nuevo->FECHA_REG         = date('Y/m/d');
                                $nuevo->USU               = $user;
                                $nuevo->IP                = $ip;
                                $nuevo->FECHA_M           = date('Y/m/d');
                                $nuevo->USU_M             = $user;
                                $nuevo->IP_M              = $ip;
                                $nuevo->save();
                            Flash::success("Se registró una nueva transacción.")->important();
                            //UN INSERT A TODO LO QUE DA...
                        }else{
                            $nuevoDiario = [
                                'TRX_ID'    => 22,
                                'NO_VECES'  => ($trx_aux[0]->no_veces) + 1,
                                'FECHA_M'   => date('Y/m/d'),
                                'USU_M'     => $user,
                                'IP_M'      => $ip
                            ];
                            //A REALIZAR UN UPDATE A LO MALDITA SEA
                            FURWEB_DIARIO_13::where('N_PERIODO',date('Y'))
                                             ->where('CVE_PROGRAMA',13)
                                             ->where('MES',date('m'))
                                             ->where('FOLIO',$request->CVE_PADRINO)
                                             ->where('PROCESO_ID',7)
                                             ->where('ACTIVIDAD_ID',7001)
                                             ->where('TRX_ID',22)
                                             ->update($nuevoDiario);
                            Flash::warning("Se actualizó una transacción.")->important();
                        }
                        $clasificgob = LU_CLASIFICGOB::orderBy('CLASIFICGOB_ID','asc')->get();
                        return view('cedipiem.usuario.padrino.padrinoPrincipal',compact('clasificgob'));
                        //return view('cedipiem.usuario.menu.menu'); 
                    }else{
                        //MOSTRAR ERROR DE DUPLICADOS
                        return back()->withErrors(['DUPLICADO' => 'Este registro ya se encuentra en el sistema. Por favor, verificar si no fue un error de escritura.']);
                    }
                }else{
                    //MOSTRAR ERROR DE RFC
                    return back()->withErrors(['RFC' => 'Existe un error en el RFC. Por favor, verificar si no fue un error de escritura.']);
                }
            }else{
                //MOSTRAR ERROR DE CURP
                return back()->withErrors(['CURP' => 'Existe un error en el CURP. Por favor, verificar si no fue un error de escritura.']);
            }
        }else{
            //MOSTRAR ERROR DE NOMBRE
            return back()->withErrors(['NOMBRES' => 'Existe un error de escritura en APELLIDOS o en el NOMBRE. Recuerda que no puedes ingresar números o caracteres especiales.']);
        }
    }

    public function generarTabla(Request $request){
    	$user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }

        //dd($request->all());
    	//SUJETO DE PRUEBA                 PEREZ MONZALVO ARTURO
    	if($request->nombre == NULL AND $request->select_dep <> 0){
    		//dd('1');
    		$clasific = LU_CLASIFICGOB::where('CLASIFICGOB_ID',$request->select_dep)->get();
    		$clasificgob = $clasific[0];
    		$totales = METADATO_PADRINOS::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('CVE_PADRINO','asc')->paginate(500);
    		//dd($totales);
    		$ahijados = METADATO_PADRINOS::join('ASIGNACION_PADRINO_AHIJADO','METADATO_PADRINOS.CVE_PADRINO','=','ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->selectRaw('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO, COUNT(ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO) as total_ahijados')
    										->where('METADATO_PADRINOS.CLASIFICGOB_ID','=',$request->select_dep)
    										->groupBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->orderBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO','asc')
    										->paginate(500);
    										//->get();
    		//dd($ahijados[2]);

    		return view('cedipiem.usuario.padrino.padrinoTabla',compact('clasificgob','totales','ahijados'));
    		//return view('cedipiem.usuario.padrino.padrinoTabla',compact('clasificgob','totales'));
    	}else
    		if($request->nombre <> NULL AND $request->select_dep <> 0){
    			//dd('2');
    			$clasific = LU_CLASIFICGOB::where('CLASIFICGOB_ID',$request->select_dep)->get();
	    		$clasificgob = $clasific[0];
	    		$totales = METADATO_PADRINOS::where('NOMBRE_COMPLETO','like','%'.strtoupper($request->nombre).'%')
	    										->where('CLASIFICGOB_ID',$request->select_dep)
	    										->orderBy('CVE_PADRINO','asc')
	    										->get();

	    		$ahijados = METADATO_PADRINOS::join('ASIGNACION_PADRINO_AHIJADO','METADATO_PADRINOS.CVE_PADRINO','=','ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->selectRaw('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO, COUNT(ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO) as total_ahijados')
    										->where('METADATO_PADRINOS.NOMBRE_COMPLETO','like','%'.strtoupper($request->nombre).'%')
    										->where('METADATO_PADRINOS.CLASIFICGOB_ID','=',$request->select_dep)
    										->groupBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->orderBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO','asc')
    										->get();

	    		if(!$totales->count()){
		    		return back()->withErrors(['FOLIO' => 'El nombre '.$request->nombre.' no se ha encontrado en la opción '.$clasificgob->clasificgob_desc.'.']);
		    	}
		    	else{
		    		return view('cedipiem.usuario.padrino.padrinoBNombre',compact('clasificgob','totales','ahijados'));
		    	}
	    		return view('cedipiem.usuario.padrino.padrinoBNombre',compact('clasificgob','totales','ahijados'));
    		}else
    			if($request->nombre <> NULL AND $request->select_dep == 0){
    				//dd('3');
    				$clasific = LU_CLASIFICGOB::where('CLASIFICGOB_ID',$request->select_dep)->get();
		    		$clasificgob = $clasific[0];
		    		$totales = METADATO_PADRINOS::where('NOMBRE_COMPLETO','like','%'.strtoupper($request->nombre).'%')->orderBy('CVE_PADRINO','asc')->get();
		    		$ahijados = METADATO_PADRINOS::join('ASIGNACION_PADRINO_AHIJADO','METADATO_PADRINOS.CVE_PADRINO','=','ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->selectRaw('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO, COUNT(ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO) as total_ahijados')
    										->where('METADATO_PADRINOS.NOMBRE_COMPLETO','like','%'.strtoupper($request->nombre).'%')
    										->groupBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO')
    										->orderBy('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO','asc')
    										->get();
		    		//dd($ahijados);
		    		if(!$totales->count()){
		    			return back()->withErrors(['FOLIO' => 'El nombre '.$request->nombre.' no se ha encontrado. Verificar si no fue un error de escritura.']);
		    		}
		    		else{
		    			return view('cedipiem.usuario.padrino.padrinoBNombre',compact('clasificgob','totales','ahijados'));
		    		}
    			}else
    				if($request->nombre == NULL AND $request->select_dep == 0){
    					return back()->withErrors(['FOLIO' => 'Por favor, elije una opción.']);
    				}
    }

    public function show($id){
    	$user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        //dd($id);
    	$clasific    = LU_CLASIFICGOB::where('CLASIFICGOB_ID',$id)->get();
    	$clasificgob = $clasific[0];
    	$totales     = METADATO_PADRINOS::where('CLASIFICGOB_ID',$id)->orderBy('CVE_PADRINO','asc')->paginate(500);
    	return view('cedipiem.usuario.padrino.padrinoTabla',compact('clasificgob','totales'));
    }

    public function edit($id){
    	$user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        $programa 	 = CAT_PROGRAMAS::find(13);
    	$padrino  	 = METADATO_PADRINOS::find($id);
    	$clasificgob = LU_CLASIFICGOB::orderBy('CLASIFICGOB_ID','asc')->get();
    	$estudio	 = CAT_GRADO_ESTUDIOS::orderBy('CVE_GRADO_ESTUDIOS','ASC')->get();
    	$municipio 	 = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID','15')->orderBy('MUNICIPIONOMBRE','ASC')->get();
        $gob         = LU_ESTRUCGOB::where('CLASIFICGOB_ID','=',$padrino->clasificgob_id)->orderBy('ESTRUCGOB_DESC','ASC')->get();
        //$periodo     = CAT_VIGENCIA_PROGRAMAS::where('N_PERIODO',$padrino->n_periodo)->where('CVE_PROGRAMA',13)->orderBy()->get();
        $periodo     = CAT_VIGENCIA_PROGRAMAS::where('CVE_PROGRAMA',13)->orderBy('N_PERIODO','ASC')->get();
    	return view('cedipiem.usuario.padrino.padrinoActualizarOrganismo',compact('programa','padrino','clasificgob','estudio','municipio','gob','periodo'));
    }

    public function inhabilitarRegistro($id){
        $user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        $padrino = METADATO_PADRINOS::find($id);
    }

    public function eligeSector(Request $request){
        //dd($request->all());
        $user = session()->get('userlog');
        $pass = session()->get('passlog');
        if($user == NULL AND $pass == NULL){
            return view('cedipiem.usuario.login.expirada');
            //return redirect()->route('/');
        }
        
        $estrucgob   = LU_ESTRUCGOB::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->get();
        $estruc = $estrucgob[0];                                     
        $hoy         = date('d/m/Y');
        $clasificgob = LU_CLASIFICGOB::find($request->select_dep);
        $programa    = CAT_PROGRAMAS::find(13);
        if(is_numeric($request->select_dep)){
            //dd('Todo oc');
            if($request->select_dep==0){
                return back()->withErrors(['FOLIO' => 'Por favor, elije una opción.']);
                //$dependencias = LU_DEPENDENCIAS::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('DEPEN_DESC','ASC')->get();
                //return view('cedipiem.usuario.padrino.nuevoRegistro',compact('clasificgob','programa','dependencias','hoy'));
            }else{
                if($request->select_dep==1){//SI ES 1 (SECTOR CENTRAL)
                    $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                    return view('cedipiem.usuario.padrino.nuevoRegistro',compact('clasificgob','programa','dependencias','hoy','estruc'));
                }else{
                    if($request->select_dep==2){//SI ES 2 (ORGANISMO AUXILIAR)
                        $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                        //$estruc       = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('ESTRUCGOB_DESC','ASC')->get();
                        return view('cedipiem.usuario.padrino.nuevoRegistro',compact('clasificgob','programa','dependencias','hoy','estruc'));
                    }else{
                        if($request->select_dep==3){//SI ES 3 (AYUNTAMIENTOS)
                            $dependencias = CAT_MUNICIPIOS_SEDESEM::where('ENTIDADFEDERATIVAID',15)->where('MUNICIPIOID',$request->estruc)->orderBy('MUNICIPIONOMBRE','ASC')->get();
                            $depend=$dependencias[0];
                            return view('cedipiem.usuario.padrino.nuevoRegistroAyuntamientos',compact('clasificgob','programa','dependencias','hoy','depend'));
                        }else{
                            if($request->select_dep==4){//SI ES 4 (ORGANISMO INDEPENDIENTE)
                                $dependencias = LU_DEPENDENCIAS::where('ESTRUCGOB_ID','LIKE','%'.$request->estruc.'%')->orderBy('DEPEN_DESC','ASC')->get();
                                //$estruc       = LU_ESTRUCGOB::where('CLASIFICGOB_ID',$request->select_dep)->orderBy('ESTRUCGOB_DESC','ASC')->get(); 
                                return view('cedipiem.usuario.padrino.nuevoRegistro',compact('clasificgob','programa','dependencias','hoy','estruc'));
                            }else{
                                if($request->select_dep==5){//SI ES 5 (INICIATIVA PRIVADA)
                                    return view('cedipiem.usuario.padrino.nuevoRegistroIP',compact('clasificgob','programa','hoy'));
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
        //$padrino = METADATO_PADRINOS::find($id);
    }

    public function nuevoPadrino(Request $request){
        dd($request->all());
    }

    public function pendientesAlta(){
        $pendientes = METADATO_PADRINOS_PRE_ALTA::where('STATUS_4','E')->get();
        dd($pendientes->all());
    }

    public function update(Request $request, $id){}

    public function destroy($id){}
}
