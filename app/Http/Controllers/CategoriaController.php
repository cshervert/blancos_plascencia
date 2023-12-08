<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Exports\CategoriaExport;
use App\Imports\CategoriaImport;
use Maatwebsite\Excel\Facades\Excel;

class CategoriaController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $categorias = Categoria::where("eliminado", 0)->get();
        $departamentos = Departamento::where("eliminado", 0)->get();
        return view('pages/categorias/mostrar')
            ->with('categorias', $categorias)
            ->with('departamentos', $departamentos);
    }

    public function crear()
    {
        $nombre          = $this->request->get("nombre-categoria");
        $id_departamento = $this->request->get("id-departamento-categoria");
        $existe          = Categoria::where('categoria', $nombre)->where('id_departamento', $id_departamento)->where('eliminado', 0)->count();
        if (!$existe) {
            $crear = Categoria::create([
                'categoria'         => $nombre,
                'id_departamento'   => $id_departamento,
                'activo'            => 1,
                'eliminado'         => 0
            ]);
            if ($crear) {
                $this->responseSuccess("Categoría Creado.");
            } else {
                $this->responseError(500, "No se pudo crear la categoría.");
            }
        } else {
            $this->responseError(500, "El nombre de la categoría, ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $data = Categoria::find($id)->toArray();
        if ($data) {
            $this->responseSuccess("Encontrada", $data);
        } else {
            $this->responseError(500, "No encontrado");
        }
        return response()->json($this->response);
    }

    public function modificar()
    {
        $id      = $this->request->get("id-categoria");
        $nombre  = $this->request->get("nombre-categoria-editar");
        $id_departamento = $this->request->get("id-departamento-categoria-editar");
        $activo = $this->request->get("activo-categoria");
        $existe = Categoria::where('categoria', $nombre)
            ->where('id_departamento', $id_departamento)
            ->where('id', '!=', $id)->where('eliminado', 0)->count();
        if (!$existe) {
            $actualizar = Categoria::where('id', $id)->update([
                'categoria'      => $nombre,
                'id_departamento' => $id_departamento,
                'activo'          => $activo
            ]);
            if ($actualizar) {
                $this->responseSuccess("Categoría Actualizada.");
            } else {
                $this->responseError(500, "No se pudo actualizar la categoría.");
            }
        } else {
            $this->responseError(500, "El nombre de la categoría, ya existe.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Categoria::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id = $this->request->get("id");
        $eliminar = Categoria::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
        if ($eliminar) {
            $this->responseSuccess("Categoría eliminada correctamente.");
        } else {
            $this->responseError(400, "Ocurrió un error al eliminar la categoría, vuelva a intentarlo.");
        }
        return response()->json($this->response);
    }

    public function exportar()
    {
        return Excel::download(new CategoriaExport, 'categorias.xlsx');
    }

    public function importar()
    {
        try{
            Excel::import(new CategoriaImport, $this->request->file('file'));
            $this->responseSuccess("Categorias cargados con exito");

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
