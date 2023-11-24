<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\PuestoTrabajo;
use App\Exports\EmpleadosExport;
use App\Exports\PuestoTrabajoExport;
use App\Imports\EmpleadosImport;
use Maatwebsite\Excel\Facades\Excel;


class EmpleadoController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $empleados = Empleado::where('eliminado', 0)->get();
        return view('pages/empleados/mostrar')
            ->with('empleados', $empleados);
    }

    public function nuevo()
    {
        $puestos    = PuestoTrabajo::where('activo', 1)->get();
        $sucursales = Sucursal::where('activo', 1)->get();
        return view('pages/empleados/crear')
            ->with('puestos', $puestos)
            ->with('sucursales', $sucursales);
    }

    public function crear()
    {
        $alias      = $this->request->get("alias");
        $nombre     = $this->request->get("nombre");
        $direccion  = $this->request->get("direccion");
        $ciudad     = $this->request->get("ciudad");
        $nss        = $this->request->get("nss");
        $curp       = $this->request->get("curp");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $email      = $this->request->get("email");
        $comision   = $this->request->get("comision");
        $fecha_nacimiento = ($this->request->get("fecha_nacimiento") != null) ? date("Y-m-d", strtotime($this->request->get("fecha_nacimiento"))) : null;
        $puesto     = $this->request->get("puesto");
        $sucursal   = $this->request->get("sucursal");
        $existe     = Empleado::where("nombre", $nombre)->where("id_sucursal", $sucursal)->where("eliminado", 0)->first();
        if (!$existe) {
            $data = [
                'alias'     => $alias,
                'nombre'    => $nombre,
                'direccion' => $direccion,
                'nss'       => $nss,
                'curp'      => $curp,
                'ciudad'    => $ciudad,
                'telefono'  => $telefono,
                'celular'   => $celular,
                'email'     => $email,
                'comision'  => $comision,
                'fecha_nacimiento' => $fecha_nacimiento,
                'id_puesto'     => $puesto,
                'id_sucursal'   => $sucursal,
                'activo'        => 1,
                'eliminado'     => 0,
            ];
            $nuevo = Empleado::create($data);
            if ($nuevo) {
                $this->responseSuccess("Empleado creado correctamente.");
            } else {
                $this->responseError(500, "No se logro crear el empleado, vuelva a intentarlo.");
            }
        } else {
            $this->responseError(500, "El empleado ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $empleado   = Empleado::where('id', $id)->where('eliminado', 0)->first();;
        $puestos    = PuestoTrabajo::where('activo', 1)->get();
        $sucursales = Sucursal::where('activo', 1)->get();
        return view('pages/empleados/editar')
            ->with('empleado', $empleado)
            ->with('puestos', $puestos)
            ->with('sucursales', $sucursales);
    }

    public function modificar()
    {
        $id         = $this->request->get("id");
        $alias      = $this->request->get("alias");
        $nombre     = $this->request->get("nombre");
        $direccion  = $this->request->get("direccion");
        $ciudad     = $this->request->get("ciudad");
        $nss        = $this->request->get("nss");
        $curp       = $this->request->get("curp");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $email      = $this->request->get("email");
        $comision   = $this->request->get("comision");
        $fecha_nacimiento = ($this->request->get("fecha_nacimiento") != null) ? date("Y-m-d", strtotime($this->request->get("fecha_nacimiento"))) : null;
        $puesto     = $this->request->get("puesto");
        $sucursal   = $this->request->get("sucursal");
        $existe     = Empleado::where("nombre", $nombre)->where("id_sucursal", $sucursal)->where("id", '!=', $id)->where("eliminado", 0)->first();
        if (!$existe) {
            $data = [
                'alias'     => $alias,
                'nombre'    => $nombre,
                'direccion' => $direccion,
                'nss'       => $nss,
                'curp'      => $curp,
                'ciudad'    => $ciudad,
                'telefono'  => $telefono,
                'celular'   => $celular,
                'email'     => $email,
                'comision'  => $comision,
                'fecha_nacimiento' => $fecha_nacimiento,
                'id_puesto'     => $puesto,
                'id_sucursal'   => $sucursal,
                'activo'        => 1,
                'eliminado'     => 0,
            ];
            $update = Empleado::where('id', $id)->update($data);
            if ($update) {
                $this->responseSuccess("Empleado actualizado correctamente.");
            } else {
                $this->responseError(500, "No se logro actualizar el empleado, vuelva a intentarlo.");
            }
        } else {
            $this->responseError(500, "El empleado ya existe.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Empleado::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Empleado::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Empleado eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar al empleado, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }

    public function exportar()
    {
        return Excel::download(new EmpleadosExport, 'empleados.xlsx');
    }
    public function exportarPuesto()
    {
        return Excel::download(new PuestoTrabajoExport, 'puestos.xlsx');
    }
    public function importar()
    {
        try{
            Excel::import(new EmpleadosImport, $this->request->file('fileEmpleado'));
            $this->responseSuccess("Empleados cargados con exito");

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
