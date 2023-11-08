<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\PermisoRol;

class RolController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $roles = Rol::all();
        return view('pages/roles/mostrar')->with('roles', $roles);
    }

    public function nuevo()
    {
        $permisos   = Permiso::all();
        $roles      = Rol::all();
        return view('pages/roles/crear')->with('roles', $roles)->with('permisos', $permisos);
    }

    public function crear()
    {
        // $nombreRol = $this->request->get("rol");
        // $nuevoRol  =  Rol::create(['rol' => $nombreRol, 'activo' => 1]);
        // if ($nuevoRol) {
        //     $read      = ($this->request->get("read") != null) ? $this->request->get("read") : [];
        //     $create    = ($this->request->get("create") != null) ? $this->request->get("create") : [];
        //     $update    = ($this->request->get("update") != null) ? $this->request->get("update") : [];
        //     $delete    = ($this->request->get("delete") != null) ? $this->request->get("delete") : [];
        //     $permisos   = Permiso::all();
        //     foreach ($permisos as $permiso) {
        //         $permisoRead   = $this->obtenerValorDePermiso($read, $permiso->id);
        //         $permisoCreate = $this->obtenerValorDePermiso($create, $permiso->id);
        //         $permisoUpdate = $this->obtenerValorDePermiso($update, $permiso->id);
        //         $permisoDelete = $this->obtenerValorDePermiso($delete, $permiso->id);
        //         if ($permisoRead == 1 || $permisoCreate == 1 || $permisoUpdate == 1 || $permisoDelete == 1) {
        //             PermisoRol::create([
        //                 'id_permiso'    => $permiso->id,
        //                 'id_rol'        => $nuevoRol->id,
        //                 'leer'          => $permisoRead,
        //                 'crear'         => $permisoCreate,
        //                 'editar'        => $permisoUpdate,
        //                 'eliminar'      => $permisoDelete,
        //                 'activo'        => 1,
        //             ]);
        //         }
        //     }
        // }
        return $this->responseData('success', 'Credenciales validas');
    }

    public function obtenerValorDePermiso($list, $idpermiso)
    {
        foreach ($list as $id) {
            if ($id == $idpermiso) {
                return 1;
            }
        }
        return 0;
    }
}
