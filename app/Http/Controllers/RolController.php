<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Rol;
use App\Models\Permiso;
use App\Models\PermisoRol;
use App\Models\Usuario;

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
        $permisos = Permiso::all();
        return view('pages/roles/crear')->with('permisos', $permisos);
    }

    public function crear()
    {
        $nombreRol = $this->request->get("rol");
        $existeRol = Rol::where("rol", $nombreRol)->first();
        if (!$existeRol) {
            $nuevoRol =  Rol::create(['rol' => $nombreRol, 'activo' => 1]);
            if ($nuevoRol) {
                $read     = ($this->request->get("read") != null) ? $this->request->get("read") : [];
                $create   = ($this->request->get("create") != null) ? $this->request->get("create") : [];
                $update   = ($this->request->get("update") != null) ? $this->request->get("update") : [];
                $delete   = ($this->request->get("delete") != null) ? $this->request->get("delete") : [];
                $permisos = Permiso::all();
                foreach ($permisos as $permiso) {
                    $permisoRead   = $this->obtenerValorDePermiso($read, $permiso->id);
                    $permisoCreate = $this->obtenerValorDePermiso($create, $permiso->id);
                    $permisoUpdate = $this->obtenerValorDePermiso($update, $permiso->id);
                    $permisoDelete = $this->obtenerValorDePermiso($delete, $permiso->id);
                    if ($permisoRead == 1 || $permisoCreate == 1 || $permisoUpdate == 1 || $permisoDelete == 1) {
                        PermisoRol::create([
                            'id_permiso' => $permiso->id,
                            'id_rol'     => $nuevoRol->id,
                            'leer'       => $permisoRead,
                            'crear'      => $permisoCreate,
                            'editar'     => $permisoUpdate,
                            'eliminar'   => $permisoDelete
                        ]);
                    }
                }
                $this->responseSuccess("Rol y permisos creados.");
            } else {
                $this->responseError(500, "No se pudo crear el nuevo Rol.");
            }
        } else {
            $this->responseError(500, "El nombre del Rol ya existe.");
        }
        return response()->json($this->response);
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

    public function eliminar()
    {
        $idRol = $this->request->get("id");
        $existeUsuario = Usuario::where("id_rol", $idRol)->first();
        if (!$existeUsuario) {
            $eliminarPermisos = PermisoRol::where('id_rol', $idRol)->delete();
            $eliminarRol      = Rol::where('id', $idRol)->delete();
            if ($eliminarPermisos && $eliminarRol) {
                $this->responseSuccess("Rol y permisos eliminados correctamente.");
            } else {
                $this->responseError(400, "Ocurrió un error al eliminar el rol y permisos, vuelva a intentarlo.");
            }
        } else {
            $this->responseError(400, "Este Rol cuenta con usuarios, no se puede eliminar.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $rol = Rol::where('id', $id)->first();
        $permisosAll = Permiso::all();
        $permisosRol = PermisoRol::where('id_rol', $id)->get();
        $permisosActivos = array();
        foreach ($permisosAll as $item) {
            $permisosTemporales = $this->obtenerPermisosRol($permisosRol, $item);
            array_push($permisosActivos, $permisosTemporales);
        }
        return view('pages/roles/editar')
            ->with('rol', $rol)
            ->with('permisos', $permisosActivos);
    }

    public function obtenerPermisosRol($permisosRol, $permisoActual)
    {
        $permisosTemporales['id']       = $permisoActual['id'];
        $permisosTemporales['permiso']  = $permisoActual['permiso'];
        $permisosTemporales['leer']     = 0;
        $permisosTemporales['crear']    = 0;
        $permisosTemporales['editar']   = 0;
        $permisosTemporales['eliminar'] = 0;
        $permisosTemporales['existe']   = 0;
        foreach ($permisosRol as $permiso) {
            if ($permiso->id_permiso === $permisosTemporales['id']) {
                $permisosTemporales['leer']     = $permiso->leer;
                $permisosTemporales['crear']    = $permiso->crear;
                $permisosTemporales['editar']   = $permiso->editar;
                $permisosTemporales['eliminar'] = $permiso->eliminar;
                $permisosTemporales['existe']   = 1;
                break;
            }
        }
        return $permisosTemporales;
    }

    public function modificar()
    {
        $idRol      = $this->request->get("id");
        $nombreRol  = $this->request->get("rol");
        $statusRol  = $this->request->get("status");
        $rolExiste  = Rol::where('rol', $nombreRol)->where('id', '!=', $idRol)->count();
        if (!$rolExiste) {
            $read        = ($this->request->get("read") != null) ? $this->request->get("read") : [];
            $create      = ($this->request->get("create") != null) ? $this->request->get("create") : [];
            $update      = ($this->request->get("update") != null) ? $this->request->get("update") : [];
            $delete      = ($this->request->get("delete") != null) ? $this->request->get("delete") : [];
            $permisos    = Permiso::all();
            $permisosRol = PermisoRol::where('id_rol', $idRol)->get();
            foreach ($permisos as $item) {
                $permisosTemporales = $this->obtenerPermisosRol($permisosRol, $item);
                $p['leer']      = $this->obtenerValorDePermiso($read, $item->id);
                $p['crear']     = $this->obtenerValorDePermiso($create, $item->id);
                $p['editar']    = $this->obtenerValorDePermiso($update, $item->id);
                $p['eliminar']  = $this->obtenerValorDePermiso($delete, $item->id);
                if ($permisosTemporales['existe']) {
                    $rol = PermisoRol::where('id_permiso', $permisosTemporales['id'])->where('id_rol', $idRol);
                    if ($p['leer'] == 0 && $p['crear'] == 0 && $p['editar'] == 0 && $p['eliminar'] == 0) {
                        $rol->delete();
                    } else {
                        $rol->update([
                            'leer'     => $p['leer'],
                            'crear'    => $p['crear'],
                            'editar'   => $p['editar'],
                            'eliminar' => $p['eliminar']
                        ]);
                    }
                } else if ($p['leer'] == 1 || $p['crear'] == 1 || $p['editar'] == 1 || $p['eliminar'] == 1) {
                    PermisoRol::create([
                        'id_permiso' => $item->id,
                        'id_rol'     => $idRol,
                        'leer'       => $p['leer'],
                        'crear'      => $p['crear'],
                        'editar'     => $p['editar'],
                        'eliminar'   => $p['eliminar']
                    ]);
                }
            }
            $rolExiste  = Rol::where('id', $idRol)->update(['rol' => $nombreRol, 'activo' => $statusRol]);
            $data["id"] = $idRol;
            $this->responseSuccess("Rol y permisos actualizados correctamente.", $data);
        } else {
            $this->responseError(500, "El nombre del Rol ya existe.");
        }
        return response()->json($this->response);
    }
}
