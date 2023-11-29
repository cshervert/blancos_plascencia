<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\Proveedor;
use App\Models\DatosFacturacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Exports\ProveedorExport;
use App\Imports\ProveedorImport;
use Maatwebsite\Excel\Facades\Excel;

class ProveedorController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $proveedores = Proveedor::where('eliminado',0)->get();
        return view('pages/proveedores/index', ['proveedores' => $proveedores]);
    }

    public function nuevo()
    {
        return view('pages/proveedores/crear');
    }
    
    public function editar($id)
    {
        $proveedor = Proveedor::where('id', $id)->first();
        $factura = DatosFacturacion::where('id', $proveedor->id_facturacion)->first();
        return view('pages/proveedores/editar', ['proveedor' => $proveedor, 'factura' => $factura]);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Proveedor::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Empleado eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar al empleado, vuelva a intentarlo.");
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

            $response = Proveedor::create([
                'representante' => empty($data['representante']) ? null : $data['representante'],
                'nombre' => empty($data['nombre']) ? null : $data['nombre'],
                'alias' => empty($data['alias']) ? null : $data['alias'],
                'rfc' => empty($data['rfc']) ? null : $data['rfc'],
                'curp' => empty($data['curp']) ? null : $data['curp'],
                'telefono' => empty($data['telefono']) ? null : $data['telefono'],
                'celular' => empty($data['celular']) ? null : $data['celular'],
                'email' => empty($data['email']) ? null : $data['email'],
                'comentario' => empty($data['comentario']) ? null : $data['comentario'],
                'limite_credito' => empty($data['limite']) ? null : $data['limite'],
                'dias_credito' => empty($data['dias']) ? null : $data['dias'],
                'id_facturacion' => $facturacion->id,
            ]); 
            if($response){
                $data['code'] = 200;
                $data['msg'] = "Cliente creado correctamente";
            }else{
                $data['msg'] = "Ocurrio un error al crear el proveedor";
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

            $response = Proveedor::where('id', $data['id'])->update([
                'representante' => empty($data['representante']) ? null : $data['representante'],
                'nombre' => empty($data['nombre']) ? null : $data['nombre'],
                'alias' => empty($data['alias']) ? null : $data['alias'],
                'rfc' => empty($data['rfc']) ? null : $data['rfc'],
                'curp' => empty($data['curp']) ? null : $data['curp'],
                'telefono' => empty($data['telefono']) ? null : $data['telefono'],
                'celular' => empty($data['celular']) ? null : $data['celular'],
                'email' => empty($data['email']) ? null : $data['email'],
                'comentario' => empty($data['comentario']) ? null : $data['comentario'],
                'limite_credito' => empty($data['limite']) ? null : $data['limite'],
                'dias_credito' => empty($data['dias']) ? null : $data['dias'],
            ]); 
            if($response){
                $data['code'] = 200;
                $data['msg'] = "Proveedor modificado con exito";
            }else{
                $data['msg'] = "Ocurrio un error al actualizar el proveedor";
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

    public function exportar()
    {
        return Excel::download(new ProveedorExport, 'proveedores.xlsx');
    }

    public function importar()
    {
        try{
            Excel::import(new ProveedorImport, $this->request->file('file'));
            $this->responseSuccess("Proveedores cargados con exito");

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

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Proveedor::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }
}
