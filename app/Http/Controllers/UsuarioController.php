<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Usuario;
use App\Models\Permiso;

class UsuarioController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $usuarios = Usuario::where('eliminado', 0)->get();
        return view('pages/usuarios/mostrar')->with('usuarios', $usuarios);
    }

    public function nuevo()
    {
        $permisos = Permiso::all();
        return view('pages/usuarios/crear')->with('permisos', $permisos);
    }

    public function CambiarEstatus()
    {
        $idUsuarioActual      = $this->usuario->id;
        $idUsuarioDesactivar  = $this->request->get("id");
        if ($idUsuarioActual != $idUsuarioDesactivar) {
            $activo = $this->request->get("estatus");
            $result = Usuario::where('id', $idUsuarioDesactivar)->update(["activo" => $activo]);
            if (!$result) {
                $this->responseError(400, "No se realizo el cambio de estatus.");
            }
        } else {
            $this->responseError(400, "El usuario que intentas desactivar, es tu usuario activo.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $idUsuarioActual   = $this->usuario->id;
        $idUsuarioElminar  = $this->request->get("id");
        if ($idUsuarioActual != $idUsuarioElminar) {
            $eliminarUsuario = Usuario::where('id', $idUsuarioElminar)->update(["activo" => 0, "eliminado" =>  1]);
            if ($eliminarUsuario) {
                $this->responseSuccess("Usuario eliminado correctamente.");
            } else {
                $this->responseError(400, "Ocurrió un error al eliminar el usuario, vuelva a intentarlo.");
            }
        } else {
            $this->responseError(400, "El usuario que intentas eliminar, es tu usuario activo.");
        }
        return response()->json($this->response);
    }
}
