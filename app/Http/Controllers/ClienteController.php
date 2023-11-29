<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Cliente;
use App\Models\DatosFacturacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ClienteExport;
use App\Imports\ClienteImport;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $clientes = Cliente::where('eliminado',0)->get();
        $grupos = DB::table('grupos')->get();
        return view('pages/clientes/index', ['clientes' => $clientes, 'grupos' => $grupos]);
    }
    
    public function nuevo()
    {
        $grupos = DB::table('grupos')->get();
        return view('pages/clientes/crear', ['grupos' => $grupos]);
    }
    
    public function editar($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        $factura = DatosFacturacion::where('id', $cliente->id_facturacion)->first();
        $grupos = DB::table('grupos')->get();
        $grupo = DB::table('grupos_clientes')->where('id_cliente', $id)->first();
        return view('pages/clientes/editar', ['cliente' => $cliente, 'factura' => $factura, 'grupos' => $grupos, 'grupo' => $grupo ]);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Cliente::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Cliente eliminado correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar al cliente, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }

    public function crear(Request $request)
    {
        $data['code'] = 500;
        $data['msg'] = "Error";

        $data = $request->all();
        // var_dump($data);
        $mostrar = empty($data['mostrar']) ? 0 : 1;

        

        $facturacion = DatosFacturacion::create([
            'razon_social' => empty($data['razon']) ? null : $data['razon'],
            'rfc' => empty($data['rfcfactura']) ? null : $data['rfcfactura'],
            'curp' => empty($data['curpfactura']) ? null : $data['curpfactura'],
            'domicilio' => empty($data['domicilio']) ? null : $data['domicilio'],
            'numero_interior' => empty($data['interior']) ? null : $data['interior'],
            'numero_exterior' => empty($data['exterior']) ? null : $data['exterior'],
            'colonia' => empty($data['colonia']) ? null : $data['colonia'],
            'cp' => empty($data['cp']) ? null : $data['cp'],
            'ciudad' => empty($data['ciudad']) ? null : $data['ciudad'],
            'localidad' => empty($data['localidad']) ? null : $data['localidad'],
            'estado' => empty($data['estado']) ? null : $data['estado'],
            'pais' => empty($data['pais']) ? null : $data['pais'],
        ]);

        if($facturacion){

            $response = Cliente::create([
                'clave' => empty($data['clave']) ? null : $data['clave'],
                'representante' => empty($data['representante']) ? null : $data['representante'],
                'nombre' => empty($data['nombre']) ? null : $data['nombre'],
                'rfc' => empty($data['rfc']) ? null : $data['rfc'],
                'curp' => empty($data['curp']) ? null : $data['curp'],
                'telefono' => empty($data['telefono']) ? null : $data['telefono'],
                'celular' => empty($data['celular']) ? null : $data['celular'],
                'email' => empty($data['email']) ? null : $data['email'],
                'numero_precio' => empty($data['noprecio']) ? null : $data['noprecio'],
                'limite_credito' => empty($data['limite']) ? null : $data['limite'],
                'dias_credito' => empty($data['dias']) ? null : $data['dias'],
                'id_facturacion' => $facturacion->id,
            ]); 
            if($response){
                if($data['grupo'] == 'new'){
                    $grupo = DB::table('grupos')->insertGetId([
                        'nombre' => $data['nombreGrupo']
                    ]);
                }
                
                if($data['grupo'] != 0 )
                    $grupo = ($data['grupo'] != 'new') ? $data['grupo'] : $grupo;
                    $grupo_cliente = DB::table('grupos_clientes')->insert([
                        'id_grupo' => $grupo,
                        'id_cliente' => $response->id,
                ]);
                $data['code'] = 200;
                $data['msg'] = "Usuario creado correctamente";
            }else{
                $data['msg'] = "Ocurrio un error al crear el usuario";
            }
        }else{
            $response = false;
            $data['msg'] = "Ocurrio un error al guardar los datos de facturacion";
        }

        if($response){
            $data['code'] = 200;
            $data['msg'] = "Guardado correctamente";
        }
        
        return $data;
    }

    public function modificar(Request $request){
        $data['code'] = 500;
        $data['msg'] = "Error";

        $data = $request->all();

        $facturacion = DatosFacturacion::where('id', $data['id_factura'])->update([
            'razon_social' => empty($data['razon']) ? null : $data['razon'],
            'rfc' => empty($data['rfcfactura']) ? null : $data['rfcfactura'],
            'curp' => empty($data['curpfactura']) ? null : $data['curpfactura'],
            'domicilio' => empty($data['domicilio']) ? null : $data['domicilio'],
            'numero_interior' => empty($data['interior']) ? null : $data['interior'],
            'numero_exterior' => empty($data['exterior']) ? null : $data['exterior'],
            'colonia' => empty($data['colonia']) ? null : $data['colonia'],
            'cp' => empty($data['cp']) ? null : $data['cp'],
            'ciudad' => empty($data['ciudad']) ? null : $data['ciudad'],
            'localidad' => empty($data['localidad']) ? null : $data['localidad'],
            'estado' => empty($data['estado']) ? null : $data['estado'],
            'pais' => empty($data['pais']) ? null : $data['pais'],
        ]);

        if($facturacion){

            $response = Cliente::where('id', $data['id'])->update([
                'clave' => empty($data['clave']) ? null : $data['clave'],
                'representante' => empty($data['representante']) ? null : $data['representante'],
                'nombre' => empty($data['nombre']) ? null : $data['nombre'],
                'rfc' => empty($data['rfc']) ? null : $data['rfc'],
                'curp' => empty($data['curp']) ? null : $data['curp'],
                'telefono' => empty($data['telefono']) ? null : $data['telefono'],
                'celular' => empty($data['celular']) ? null : $data['celular'],
                'email' => empty($data['email']) ? null : $data['email'],
                'numero_precio' => empty($data['noprecio']) ? null : $data['noprecio'],
                'limite_credito' => empty($data['limite']) ? null : $data['limite'],
                'dias_credito' => empty($data['dias']) ? null : $data['dias'],
            ]); 
            if($response){

                DB::table('grupos_clientes')->where('id_cliente', $data['id'])->delete();

                if($data['grupo'] == 'new'){
                    $grupo = DB::table('grupos')->insertGetId([
                        'nombre' => $data['nombreGrupo']
                    ]);
                }
                
                if($data['grupo'] != 0 )
                    $grupo = ($data['grupo'] != 'new') ? $data['grupo'] : $grupo;
                    $grupo_cliente = DB::table('grupos_clientes')->insert([
                        'id_grupo' => $grupo,
                        'id_cliente' => $data['id'],
                ]);

                $data['code'] = 200;
                $data['msg'] = "Usuario modificado con exito";
            }else{
                $data['msg'] = "Ocurrio un error al actualizar el usuario";
            }
        }else{
            $response = false;
            $data['msg'] = "Ocurrio un error al actualizar los datos de facturacion";
        }

        if($response){
            $data['code'] = 200;
            $data['msg'] = "Guardado correctamente";
        }
        
        return $data;
    }

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Cliente::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }

    public function exportar()
    {
        return Excel::download(new ClienteExport, 'clientes.xlsx');
    }

    public function importar()
    {
        try{
            Excel::import(new ClienteImport, $this->request->file('file'));
            $this->responseSuccess("Clientes cargados con exito");

        }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
            $failures = $e->failures();
            foreach($failures as $failure){
                $failure->row();
                $failure->attribute();
                $failure->errors();
                $failure->values();
            }
            $this->responseError(400, $failures);
        }catch(\Exception $e){
            // var_dump($e->getMessage());
            $this->responseError(500, $e->getMessage());
        }
       
        return response()->json($this->response);
    }
}
