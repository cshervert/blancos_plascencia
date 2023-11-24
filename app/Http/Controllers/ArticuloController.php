<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\Impuesto;
use App\Models\Unidad;

class ArticuloController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $articulos = Articulo::where('eliminado', 0)->get();
        return view('pages/articulos/mostrar')
            ->with('articulos', $articulos);
    }

    public function nuevo()
    {
        $departamentos  = Departamento::where("activo", 1)->get();
        $unidades       = Unidad::where("activo", 1)->get();
        $impuestos      = Impuesto::where("activo", 1)->get();
        $categorias     = [];
        foreach ($departamentos as $departamento) {
            $categorias = Categoria::where("id_departamento", $departamento->id)->get();
            break;
        }
        return view('pages/articulos/crear')
            ->with('departamentos', $departamentos)
            ->with('categorias', $categorias)
            ->with('unidades', $unidades)
            ->with('impuestos', $impuestos);
    }

    public function generarClave()
    {
        $data["clave"] = $this->validarClave('0123456789', 13);
        $this->responseSuccess("Clave Generada.", $data);
        return response()->json($this->response);
    }

    public function validarClave($entrada, $cantidad = 13)
    {
        $cantidadEntrada = strlen($entrada);
        $claveGenerada   = '';
        for ($i = 0; $i < $cantidad; $i++) {
            $randomCaracteres = $entrada[mt_rand(0, $cantidadEntrada - 1)];
            $claveGenerada   .= $randomCaracteres;
        }
        $existe = Articulo::where('clave', $claveGenerada)->count();
        if ($existe > 0) {
            $this->validarClave('0123456789', 13);
        }
        return $claveGenerada;
    }

    public function obtenerCategoria($id_departamento)
    {
        $categorias = Categoria::where("id_departamento", $id_departamento)->get();
        if ($categorias->count()) {
            $data["categorias"] = $categorias->toArray();
            $this->responseSuccess("Categorías Encontradas.", $data);
        } else {
            $this->responseError(500, "No se encontraron categorías.");
        }
        return response()->json($this->response);
    }
}
