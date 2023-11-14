<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Cliente;
use App\Models\DatosFacturacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('pages/clientes/index', ['clientes' => $clientes]);
    }

    public function nuevo()
    {
        return view('pages/clientes/crear');
    }

    public function eliminar()
    {
        $data['code'] = 500;
        $data['msg'] = "Error";
        
        $id = $this->request->get("id");
        $cuenta = Cliente::where("id", $id)->first();
        if ($cuenta) {
            $response = Cliente::where('id', $id)->delete();
            if($response){
                $response = DatosFacturacion::where('id', $cuenta->id_facturacion)->delete();
                if($response){
                    $data['code'] = 200;
                    $data['msg'] = "Eliminado correctamente";
                }else{
                    $data['msg'] = "Hubo un problema al eliminar los datos de facturación";
                }
            }else{
                $data['msg'] = "Hubo un problema al eliminar el registro del Cliente";
            }
        }else{
            $data['msg'] = "No existe el registro";
        }

        return $data;
    }
}
