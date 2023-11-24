<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Unidad;

class UnidadController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $unidades = Unidad::where('eliminado', 0)->get();
        return view('pages/unidades/mostrar')->with('unidades', $unidades);
    }

    public function crear()
    {
        $nombre = $this->request->get("nombre");
        $clave  = ($this->request->get("clave") != null) ? $this->request->get("clave") : "";
        $existe = Unidad::where('unidad', $nombre)->where('eliminado', 0)->count();
        if (!$existe) {
            $crear  = Unidad::create(['unidad' => $nombre, 'clave_sat' => $clave, 'activo' => 1, 'eliminado' => 0]);
            if ($crear) {
                $data["unidades"] = Unidad::where('activo', 1)->get();
                $this->responseSuccess("Unidad Creada.", $data);
            } else {
                $this->responseError(500, "No se pudo crear la unidad.");
            }
        } else {
            $this->responseError(500, "El nombre de la unidad, ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $data = Unidad::find($id)->toArray();
        if ($data) {
            $this->responseSuccess("Encontrada", $data);
        } else {
            $this->responseError(500, "No encontrado");
        }
        return response()->json($this->response);
    }

    public function modificar()
    {
        $id     = $this->request->get("idEditar");
        $nombre = $this->request->get("nombreEditar");
        $clave  = ($this->request->get("claveEditar") != null) ? $this->request->get("claveEditar") : "";
        $activo = $this->request->get("activoEditar");
        $existe = Unidad::where('unidad', $nombre)->where('id', '!=', $id)->where('eliminado', 0)->count();
        if (!$existe) {
            $actualizar = Unidad::where('id', $id)->update(['unidad' => $nombre, 'clave_sat' => $clave, 'activo' => $activo]);
            if ($actualizar) {
                $this->responseSuccess("Unidad Actualizada.");
            } else {
                $this->responseError(500, "No se pudo actualizar la unidad.");
            }
        } else {
            $this->responseError(500, "El nombre de la unidad, ya existe.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Unidad::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Unidad eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar la unidad, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $idUnidad = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Unidad::where('id', $idUnidad)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }
}
