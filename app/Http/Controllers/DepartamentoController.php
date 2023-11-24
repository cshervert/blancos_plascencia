<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Departamento;

class DepartamentoController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $departamentos = Departamento::where("eliminado", 0)->get();
        return view('pages/departamentos/mostrar')->with('departamentos', $departamentos);
    }

    public function crear()
    {
        $nombre = $this->request->get("nombre-departamento");
        $existe = Departamento::where('departamento', $nombre)->where('eliminado', 0)->count();
        if (!$existe) {
            $crear = Departamento::create(['departamento' => $nombre, 'activo' => 1, 'eliminado' => 0]);
            if ($crear) {
                $data["departametos"] = Departamento::where("activo", 1)->get();
                $this->responseSuccess("Departamento Creado.", $data);
            } else {
                $this->responseError(500, "No se pudo crear el departamento.");
            }
        } else {
            $this->responseError(500, "El nombre del departamento, ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $data = Departamento::find($id)->toArray();
        if ($data) {
            $this->responseSuccess("Encontrada", $data);
        } else {
            $this->responseError(500, "No encontrado");
        }
        return response()->json($this->response);
    }

    public function modificar()
    {
        $id     = $this->request->get("id-departamento");
        $nombre = $this->request->get("nombre-departamento-editar");
        $activo = $this->request->get("activo-departamento");
        $existe = Departamento::where('departamento', $nombre)->where('id', '!=', $id)->where('eliminado', 0)->count();
        if (!$existe) {
            $actualizar = Departamento::where('id', $id)->update(['departamento' => $nombre, 'activo' => $activo]);
            if ($actualizar) {
                $this->responseSuccess("Departamento Actualizada.");
            } else {
                $this->responseError(500, "No se pudo actualizar el departamento.");
            }
        } else {
            $this->responseError(500, "El nombre del departamento, ya existe.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Departamento::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Departamento::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Departamento eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar el departamento, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }
}
