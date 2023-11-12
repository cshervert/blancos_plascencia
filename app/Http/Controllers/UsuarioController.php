<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Usuario;
use App\Models\Permiso;
use App\Models\PermisoRol;
use App\Models\PermisoUsuario;
use App\Models\Sucursal;
use App\Models\Rol;
use App\Models\SucursalUsuario;

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
        $sucursales = Sucursal::where("activo", 1)->get();
        $roles = Rol::where("activo", 1)->get();
        return view('pages/usuarios/crear')
            ->with('sucursales', $sucursales)
            ->with('roles', $roles);
    }

    public function crear()
    {
        $nombre     = $this->request->get("nombre");
        $domicilio  = $this->request->get("domicilio");
        $ciudad     = $this->request->get("ciudad");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $email      = $this->request->get("email");
        $sucursal   = $this->request->get("sucursal");
        $rol        = $this->request->get("rol");
        $usuario    = $this->request->get("usuario");
        $password   = $this->request->get("password");
        $passwordRepetir = $this->request->get("password-repetir");
        if ($password == $passwordRepetir) {
            $existeEmail = Usuario::where('email', $email)->count();
            if (!$existeEmail) {
                $existeUsuario = Usuario::where('username', $usuario)->count();
                if (!$existeUsuario) {
                    $usuarioCreado = Usuario::create([
                        'nombre'    => $nombre,
                        'direccion' => $domicilio,
                        'ciudad'    => $ciudad,
                        'telefono'  => $telefono,
                        'celular'   => $celular,
                        'foto'      => '',
                        'email'     => $email,
                        'username'  => $usuario,
                        'password'  => $password,
                        'id_sucursal' => $sucursal,
                        'id_rol'    => $rol,
                        'activo'    => true,
                        'eliminado' => false
                    ]);
                    if ($usuarioCreado) {
                        $imagen = $this->request->file('foto');
                        $this->insertarImagen($imagen, $usuarioCreado->id);
                        $this->insertarPermisosDefault($rol, $usuarioCreado->id);
                        SucursalUsuario::create(['id_sucursal' => $sucursal, 'id_usuario' => $usuarioCreado->id]);
                        $data["id"] = $usuarioCreado->id;
                        $this->responseSuccess("Usuario Creado correctamente.", $data);
                    } else {
                        $this->responseError(500, "Ocurrio un error al registrar el usuario.");
                    }
                } else {
                    $this->responseError(500, "Ya existe un registro con el nombre de usuario ingresado.");
                }
            } else {
                $this->responseError(500, "Ya existe un registro con el email ingresado.");
            }
        } else {
            $this->responseError(500, "Las contraseñas no coinciden.");
        }
        return response()->json($this->response);
    }

    public function insertarPermisosDefault($id_rol, $id_usuario)
    {
        $permisos_rol = PermisoRol::where("id_rol", $id_rol)->get();
        foreach ($permisos_rol as $item) {
            PermisoUsuario::create([
                'id_permiso' => $item->id_permiso,
                'id_usuario' => $id_usuario,
                'crear'      => $item->crear,
                'leer'       => $item->leer,
                'editar'     => $item->editar,
                'eliminar'   => $item->eliminar
            ]);
        }
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

    public function insertarImagen($imagen, $id_usuario)
    {
        if ($imagen) {
            $image_name      = "usuario_$id_usuario." . $imagen->getClientOriginalExtension();
            $destinationPath = "uploads/usuarios/";
            $imagen->move($destinationPath, $image_name);
            $new_imagen      = 'uploads/usuarios/' . $image_name;
            Usuario::where('id', $id_usuario)->update(['foto' =>  $new_imagen]);
        }
    }

    public function editar($id)
    {
        $usuario    = Usuario::find($id);
        $roles      = Rol::where("activo", 1)->get();
        $sucursales = Sucursal::where("activo", 1)->get();
        $sucursal_usuario   = SucursalUsuario::where("id_usuario", $id)->get();
        $listado_sucursales = [];
        foreach ($sucursales as $item) {
            $temporal_sucursal = $this->obtenerSucursalUsuario($sucursal_usuario, $item);
            array_push($listado_sucursales, $temporal_sucursal);
        }
        $permisos         = Permiso::all();
        $permisos_usuario = PermisoUsuario::where("id_usuario", $id)->get();
        $listado_permisos = [];
        foreach ($permisos as $item) {
            $temporal_permisos = $this->obtenerPermisosUsuario($permisos_usuario, $item);
            array_push($listado_permisos, $temporal_permisos);
        }
        return view('pages/usuarios/editar')
            ->with('usuario', $usuario)
            ->with('sucursales', $sucursales)
            ->with('roles', $roles)
            ->with('sucursalesActivas', $listado_sucursales)
            ->with('permisosActivos', $listado_permisos);
    }

    public function obtenerSucursalUsuario($sucursal_usuario, $sucursal_activa)
    {
        $temporal_sucursal['id']      = $sucursal_activa['id'];
        $temporal_sucursal['nombre']  = $sucursal_activa['nombre'];
        $temporal_sucursal['activo']  = 0;
        foreach ($sucursal_usuario as $item) {
            if ($item->id_sucursal === $sucursal_activa->id) {
                $temporal_sucursal['activo'] = 1;
                break;
            }
        }
        return $temporal_sucursal;
    }

    public function obtenerPermisosUsuario($permisos_usuario, $permiso_activo)
    {
        $permisosTemporales['id']       = $permiso_activo['id'];
        $permisosTemporales['permiso']  = $permiso_activo['permiso'];
        $permisosTemporales['leer']     = 0;
        $permisosTemporales['crear']    = 0;
        $permisosTemporales['editar']   = 0;
        $permisosTemporales['eliminar'] = 0;
        $permisosTemporales['existe']   = 0;
        foreach ($permisos_usuario as $permiso) {
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

    public function getImagen($id)
    {
        $usuario        = Usuario::find($id);
        $data["imagen"] = ($usuario && $usuario->foto != "") ? env("PHOTO_URL") . $usuario->foto : "";
        $this->responseSuccess("Encontrada", $data);
        return response()->json($this->response);
    }

    public function modificarGeneral()
    {
        $id         = $this->request->get("id");
        $nombre     = $this->request->get("nombre");
        $domicilio  = $this->request->get("domicilio");
        $ciudad     = $this->request->get("ciudad");
        $telefono   = $this->request->get("telefono");
        $celular    = $this->request->get("celular");
        $email      = $this->request->get("email");
        $sucursal   = $this->request->get("sucursal");
        $rol        = $this->request->get("rol");
        dd($this->request->all());
        // $idRol      = $this->request->get("id");
        // $nombreRol  = $this->request->get("rol");
        // $statusRol  = $this->request->get("status");
        // $rolExiste  = Rol::where('rol', $nombreRol)->where('id', '!=', $idRol)->count();
        // if (!$rolExiste) {
        //     $read        = ($this->request->get("read") != null) ? $this->request->get("read") : [];
        //     $create      = ($this->request->get("create") != null) ? $this->request->get("create") : [];
        //     $update      = ($this->request->get("update") != null) ? $this->request->get("update") : [];
        //     $delete      = ($this->request->get("delete") != null) ? $this->request->get("delete") : [];
        //     $permisos    = Permiso::all();
        //     $permisosRol = PermisoRol::where('id_rol', $idRol)->get();
        //     foreach ($permisos as $item) {
        //         $permisosTemporales = $this->obtenerPermisosRol($permisosRol, $item);
        //         $p['leer']      = $this->obtenerValorDePermiso($read, $item->id);
        //         $p['crear']     = $this->obtenerValorDePermiso($create, $item->id);
        //         $p['editar']    = $this->obtenerValorDePermiso($update, $item->id);
        //         $p['eliminar']  = $this->obtenerValorDePermiso($delete, $item->id);
        //         if ($permisosTemporales['existe']) {
        //             $rol = PermisoRol::where('id_permiso', $permisosTemporales['id'])->where('id_rol', $idRol);
        //             if ($p['leer'] == 0 && $p['crear'] == 0 && $p['editar'] == 0 && $p['eliminar'] == 0) {
        //                 $rol->delete();
        //             } else {
        //                 $rol->update([
        //                     'leer'     => $p['leer'],
        //                     'crear'    => $p['crear'],
        //                     'editar'   => $p['editar'],
        //                     'eliminar' => $p['eliminar']
        //                 ]);
        //             }
        //         } else if ($p['leer'] == 1 || $p['crear'] == 1 || $p['editar'] == 1 || $p['eliminar'] == 1) {
        //             PermisoRol::create([
        //                 'id_permiso' => $item->id,
        //                 'id_rol'     => $idRol,
        //                 'leer'       => $p['leer'],
        //                 'crear'      => $p['crear'],
        //                 'editar'     => $p['editar'],
        //                 'eliminar'   => $p['eliminar']
        //             ]);
        //         }
        //     }
        //     $rolExiste  = Rol::where('id', $idRol)->update(['rol' => $nombreRol, 'activo' => $statusRol]);
        //     $data["id"] = $idRol;
        //     $this->responseSuccess("Rol y permisos actualizados correctamente.", $data);
        // } else {
        //     $this->responseError(500, "El nombre del Rol ya existe.");
        // }
        // return response()->json($this->response);
    }
}
