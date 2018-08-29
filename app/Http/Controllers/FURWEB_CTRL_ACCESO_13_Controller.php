<?php

namespace App\Http\Controllers; 

use App\Http\Requests\FURWEB_CTRL_ACCESO_13_Request;
use App\FURWEB_CTRL_ACCESO_13;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class FURWEB_CTRL_ACCESO_13_Controller extends Controller
{
    public function index(){}

    public function create(){}

    public function store(FURWEB_CTRL_ACCESO_13_Request $request){
        $usuario = FURWEB_CTRL_ACCESO_13::find($request->LOGIN); //OBTINEN REGISTRO
        if($usuario <> NULL){ //EXISTE REGISTRO ?
            //SI EXISTE! :D
            if($usuario->login == $request->LOGIN AND $usuario->password == $request->PASSWORD){
                session(['userlog' => $request->LOGIN,'passlog' => $request->PASSWORD]);
                //$usuario = $request->LOGIN; $pass = $request->PASSWORD;
                Flash::success("Bienvenido ".$request->LOGIN.".")->important();
                return view('cedipiem.usuario.menu.menu');
            }else{
                return back()->withErrors(['LOGIN' => 'Contraseña incorrecta. Verificar si no fue un error de escritura.']);    
            }
        }else{
            //NO EXISTE X____X
            return back()->withErrors(['LOGIN' => 'Al paracer el usuario '.$request->LOGIN.' no fue encontrado en el sistema. Verificar si no fue un error de escritura.']);
        }
    }

    public function show($id){}

    public function edit($id){}

    public function update(Request $request, $id){}

    public function destroy($id){}

    public function adminDelete($id){}
}
