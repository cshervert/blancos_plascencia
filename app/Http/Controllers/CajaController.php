<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Caja;
use App\Models\Sucursal;

class CajaController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $cajas = Caja::where('eliminado', 0)->get();
        $sucursales = Sucursal::where("activo", 1)->get();
        return view('pages/cajas/mostrar')
            ->with('cajas', $cajas)
            ->with('sucursales', $sucursales);
    }

    public function crear()
    {
        $nombre   = $this->request->get("nombre");
        $sucursal = $this->request->get("sucursal");
        $enviar   = ($this->request->get("enviar") != null) ? 1 : 0;
        $destinatarios = ($this->request->get("destinatarios") != null) ? $this->request->get("destinatarios") : "";
        $existe = Caja::where('nombre', $nombre)->where('id_sucursal', $sucursal)->where('eliminado', 0)->count();
        if (!$existe) {
            $crear  = Caja::create([
                'nombre'        => $nombre,
                'id_sucursal'   => $sucursal,
                'enviar'        => $enviar,
                'destinatarios' => $destinatarios,
                'activo'        =>  1,
                'eliminado'     => 0
            ]);
            if ($crear) {
                $this->responseSuccess("Caja creada con éxito.");
            } else {
                $this->responseError(500, "No se pudo crear la Caja.");
            }
        } else {
            $this->responseError(500, "El nombre de la Caja, ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $data = Caja::find($id)->toArray();
        if ($data) {
            $this->responseSuccess("Encontrada", $data);
        } else {
            $this->responseError(500, "No encontrado");
        }
        return response()->json($this->response);
    }

    public function modificar()
    {
        $id       = $this->request->get("idEditar");
        $nombre   = $this->request->get("nombreEditar");
        $sucursal = $this->request->get("sucursalEditar");
        $enviar   = ($this->request->get("enviarEditar") != null) ? 1 : 0;
        $destinatarios = ($this->request->get("destinatariosEditar") != null) ? $this->request->get("destinatariosEditar") : "";
        $activo   = $this->request->get("activoEditar");
        $existe = Caja::where('nombre', $nombre)->where('id_sucursal', $sucursal)
            ->where('id', '!=', $id)->where('eliminado', 0)->count();
        if (!$existe) {
            $actualizar = Caja::where('id', $id)->update([
                'nombre'        => $nombre,
                'id_sucursal'   => $sucursal,
                'enviar'        => $enviar,
                'destinatarios' => $destinatarios,
                'activo'        => $activo
            ]);
            if ($actualizar) {
                $this->responseSuccess("Caja Actualizada.");
            } else {
                $this->responseError(500, "No se pudo actualizar la caja.");
            }
        } else {
            $this->responseError(500, "El nombre de la caja, ya existe para esta sucursal.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Caja::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Caja eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar la caja, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $idCaja   = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Caja::where('id', $idCaja)->update(["activo" => $activo]);
        // Falta validar por movimiento
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }
}
