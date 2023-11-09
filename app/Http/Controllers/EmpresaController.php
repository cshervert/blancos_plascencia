<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Empresa;
use App\Models\CuentaBancaria;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EmpresaController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $empresa = Empresa::first();
        $cuentas = CuentaBancaria::where('id_empresa', $empresa->id)->get();
        return view('pages/empresa/index', ['empresa' => $empresa, 'cuentas' => $cuentas]);
    }

    public function getEmpresa()
    {
        $empresa = Empresa::first();

        return $empresa;
    }

    public function saveEmpresa(Request $request)
    {
        // var_dump($request->input('id'));
        // var_dump($request->input('nombre'));
        // var_dump($request->all());

        $data['code'] = 500;
        $data['msg'] = "Error";

        $empresa = Empresa::find($request->input('id'));
        if($empresa){
            $response = Empresa::where('id',$request->input('id'))
                ->update([
                    "nombre"=>$request->input('nombre'),
                    "rfc"=>$request->input('rfc'),
                    "curp"=>$request->input('curp'),
                    "domicilio"=>$request->input('domicilio'),
                    "numero_interior"=>$request->input('no_int'),
                    "numero_exterior"=>$request->input('no_ext'),
                    "colonia"=>$request->input('colonia'),
                    "cp"=>$request->input('cp'),
                    "ciudad"=>$request->input('ciudad'),
                    "estado"=>$request->input('estado'),
                    "email"=>$request->input('email'),
                    "telefono"=>$request->input('telefono'),
                    "celular"=>$request->input('celular'),
                ]);
        }else{
            $response = Empresa::create([
                    "nombre"=>$request->input('nombre'),
                    "rfc"=>$request->input('rfc'),
                    "curp"=>$request->input('curp'),
                    "domicilio"=>$request->input('domicilio'),
                    "numero_interior"=>$request->input('no_int'),
                    "numero_exterior"=>$request->input('no_ext'),
                    "colonia"=>$request->input('colonia'),
                    "cp"=>$request->input('cp'),
                    "ciudad"=>$request->input('ciudad'),
                    "estado"=>$request->input('estado'),
                    "email"=>$request->input('email'),
                    "telefono"=>$request->input('telefono'),
                    "celular"=>$request->input('celular'),
                ]);
        }

        if($response){
            $data['code'] = 200;
            $data['msg'] = "Actualizado correctamente";
        }
        // var_dump($response);

        return $data;
    }

    public function saveCuenta(Request $request)
    {
        $data['code'] = 500;
        $data['msg'] = "Error";

        $data = $request->all();
        // var_dump($data);
        $mostrar = empty($data['mostrar']) ? 0 : 1;
        if($data['id'] == null){
            $response = CuentaBancaria::create([
                'cuenta' => $data['cuenta'],
                'sucursal' => $data['sucursal'],
                'clave' => $data['clave'],
                'banco' => $data['banco'],
                'cuenta_contable' => $data['cuenta'],
                'mostrar' => $mostrar,
                'id_empresa'=> $data['id_empresa']
            ]); 
        }else{
            $response = CuentaBancaria::where('id',$data['id'])
                ->update([
                    'cuenta' => $data['cuenta'],
                    'sucursal' => $data['sucursal'],
                    'clave' => $data['clave'],
                    'banco' => $data['banco'],
                    'cuenta_contable' => $data['cuenta'],
                    'mostrar' => $mostrar,
                    'id_empresa'=> $data['id_empresa']
                ]);
        }

        if($response){
            $data['code'] = 200;
            $data['msg'] = "Guardado correctamente";
        }
        
        return $data;
    }

    public function eliminarCuenta()
    {
        $data['code'] = 500;
        $data['msg'] = "Error";
        
        $id = $this->request->get("id");
        $cuenta = CuentaBancaria::where("id", $id)->first();
        if ($cuenta) {
            $response = CuentaBancaria::where('id', $id)->delete();
            if($response){
                $data['code'] = 200;
                $data['msg'] = "Eliminado correctamente";
            }
        }else{
            $data['msg'] = "No existe el registro";
        }

        return $data;
    }
}
