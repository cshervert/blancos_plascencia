<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Sucursal;
use App\Models\Usuario;
use App\Models\SucursalUsuario;
use App\Exports\SucursalExport;
use App\Imports\SucursalImport;
use Maatwebsite\Excel\Facades\Excel;

class SucursalController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $sucursales = Sucursal::where('eliminado', 0)->get();
        return view('pages/sucursales/mostrar')->with('sucursales', $sucursales);
    }

    public function nuevo()
    {
        $permisos = [];
        return view('pages/sucursales/crear')->with('permisos', $permisos);
    }

    public function crear()
    {
        $nombre     = $this->request->get("nombre");
        $domicilio  = $this->request->get("domicilio");
        $numero_exterior = ($this->request->get("numero_exterior") != null) ? $this->request->get("numero_exterior") : "";
        $numero_interior = ($this->request->get("numero_interior") != null) ? $this->request->get("numero_interior") : "";
        $colonia    = ($this->request->get("colonia") != null) ? $this->request->get("colonia") : "";
        $cp         = ($this->request->get("cp") != null) ? $this->request->get("cp") : "";
        $ciudad     = $this->request->get("ciudad");
        $estado     = ($this->request->get("estado") != null) ? $this->request->get("estado") : "";
        $email      = $this->request->get("email");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $existeSucursal = Sucursal::where("nombre", $nombre)->where("eliminado", 0)->first();
        if (!$existeSucursal) {
            $data = [
                'nombre'    => $nombre,
                'domicilio' => $domicilio,
                'numero_exterior' => $numero_exterior,
                'numero_interior' => $numero_interior,
                'colonia'   => $colonia,
                'cp'        => $cp,
                'ciudad'    => $ciudad,
                'estado'    => $estado,
                'email'     => $email,
                'telefono'  => $telefono,
                'celular'   => $celular,
                'activo'    => 1,
                'eliminado' => 0,
            ];
            $nuevoSucursal = Sucursal::create($data);
            if ($nuevoSucursal) {
                $this->responseSuccess("Sucursal creada correctamente.");
            } else {
                $this->responseError(500, "No se pudo crear la sucursal.");
            }
        } else {
            $this->responseError(500, "El nombre de la sucursal ya existe.");
        }
        return response()->json($this->response);
    }

    public function cambiarEstatus()
    {
        $idSucursalActual = $this->usuario->sucursal->id;
        $idSucursal = $this->request->get("id");
        if ($idSucursalActual != $idSucursal) {
            $activo     = $this->request->get("estatus");
            $result     = Sucursal::where('id', $idSucursal)->update(["activo" => $activo]);
            if (!$result) {
                $this->responseError(400, "No se realizo el cambio de estatus.");
            }
        } else {
            $this->responseError(400, "La sucursal que intentas desactivar, es la sucursal de tu usuario activo.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $idSucursalActual  = $this->usuario->sucursal->id;
        $idSucursalElminar = $this->request->get("id");
        if ($idSucursalActual != $idSucursalElminar) {
            $sucursal         = Usuario::where('id_sucursal', $idSucursalElminar)->count();
            $sucursalUsuarios = SucursalUsuario::where('id_sucursal', $idSucursalElminar)->count();
            if (!$sucursal && !$sucursalUsuarios) {
                $eliminarSucursal = Sucursal::where('id', $idSucursalElminar)->update(["activo" => 0, "eliminado" =>  1]);
                if ($eliminarSucursal) {
                    $this->responseSuccess("Sucursal eliminada correctamente.");
                } else {
                    $this->responseError(400, "Ocurrió un error al eliminar la sucursal, vuelva a intentarlo.");
                }
            } else {
                $this->responseError(400, "La sucursal que intentas eliminar, tiene usuarios ligados.");
            }
        } else {
            $this->responseError(400, "La sucursal que intentas eliminar, es la sucursal de tu usuario activo.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $sucursal = Sucursal::where('id', $id)->where('eliminado', 0)->first();
        return view('pages/sucursales/editar')
            ->with('sucursal', $sucursal);
    }

    public function modificar()
    {
        $id         = $this->request->get("id");
        $nombre     = $this->request->get("nombre");
        $domicilio  = $this->request->get("domicilio");
        $numero_exterior = ($this->request->get("numero_exterior") != null) ? $this->request->get("numero_exterior") : "";
        $numero_interior = ($this->request->get("numero_interior") != null) ? $this->request->get("numero_interior") : "";
        $colonia    = ($this->request->get("colonia") != null) ? $this->request->get("colonia") : "";
        $cp         = ($this->request->get("cp") != null) ? $this->request->get("cp") : "";
        $ciudad     = $this->request->get("ciudad");
        $estado     = ($this->request->get("estado") != null) ? $this->request->get("estado") : "";
        $email      = $this->request->get("email");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $activo     = $this->request->get("activo");
        $existeSucursal = Sucursal::where("nombre", $nombre)->where("id", '!=', $id)->where("eliminado", 0)->first();
        if (!$existeSucursal) {
            $data = [
                'nombre'    => $nombre,
                'domicilio' => $domicilio,
                'numero_exterior' => $numero_exterior,
                'numero_interior' => $numero_interior,
                'colonia'   => $colonia,
                'cp'        => $cp,
                'ciudad'    => $ciudad,
                'estado'    => $estado,
                'email'     => $email,
                'telefono'  => $telefono,
                'celular'   => $celular,
                'activo'    => $activo
            ];
            $updateSucursal = Sucursal::where('id', $id)->update($data);
            $data["id"]     = $id;
            if ($updateSucursal) {
                $this->responseSuccess("Sucursal actualizada correctamente.", $data);
            } else {
                $this->responseError(500, "No se realizo la actualización de la sucursal.");
            }
        } else {
            $this->responseError(500, "El nombre de la sucursal que intenta modificar, ya existe.");
        }
        return response()->json($this->response);
    }

    public function exportar()
    {

        return Excel::download(new SucursalExport, 'sucursales.xlsx');
    }

    public function importar()
    {
        try{
            Excel::import(new SucursalImport, $this->request->file('file'));
            $this->responseSuccess("Sucursales cargadas con exito");

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
