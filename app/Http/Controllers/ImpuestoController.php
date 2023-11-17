<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Impuesto;
use App\Models\DesgloseImpuesto;
use App\Models\TipoImpuesto;
use App\Models\Articulo;
use App\Models\Entrada;
use App\Models\Paquete;

class ImpuestoController extends AdminController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $impuestos = Impuesto::where('eliminado', 0)->get();
        return view('pages/impuestos/mostrar')->with('impuestos', $impuestos);
    }

    public function nuevo()
    {
        $desglose = DesgloseImpuesto::all();
        $tipos    = TipoImpuesto::all();
        return view('pages/impuestos/crear')
            ->with('desglose', $desglose)
            ->with('tipos', $tipos);
    }

    public function crear()
    {
        $nombre   = $this->request->get("nombre");
        $impuesto = $this->request->get("impuesto");
        $activo   = ($this->request->get("activo") != null) ? 1 : 0;
        $impreso  = ($this->request->get("impreso") != null) ? 1 : 0;
        $orden    = $this->request->get("orden");
        $impuesto_local     = ($this->request->get("impuesto_local") != null) ? 1 : 0;
        $aplicar_iva        = ($this->request->get("aplicar_iva") != null) ? 1 : 0;
        $desglose_impuesto  = $this->request->get("desglose_impuesto");
        $tipo_impuesto      = $this->request->get("tipo_impuesto");
        $cuenta_contable    = ($this->request->get("cuenta_contable") != null) ? $this->request->get("cuenta_contable") : "";
        $existe = Impuesto::where('nombre', $nombre)->where('eliminado', 0)->count();
        if (!$existe) {
            $crear  = Impuesto::create([
                'nombre'    => $nombre,
                'impuesto'  => $impuesto,
                'activo'    => $activo,
                'impreso'   => $impreso,
                'impuesto_local'        => $impuesto_local,
                'id_desglose_impuesto'  => $desglose_impuesto,
                'id_tipo_impuesto'      => $tipo_impuesto,
                'orden'         => $orden,
                'aplicar_iva'   => $aplicar_iva,
                'cuenta_clave'  => $cuenta_contable,
                'eliminado'     => 0
            ]);
            if ($crear) {
                $this->responseSuccess("Impuesto creado con exito.");
            } else {
                $this->responseError(500, "No se pudo crear el impuesto.");
            }
        } else {
            $this->responseError(500, "El nombre del impuesto, ya existe.");
        }
        return response()->json($this->response);
    }

    public function editar($id)
    {
        $impuesto = Impuesto::where('id', $id)->first();
        $desglose = DesgloseImpuesto::all();
        $tipos    = TipoImpuesto::all();
        return view('pages/impuestos/editar')
            ->with('impuesto', $impuesto)
            ->with('desglose', $desglose)
            ->with('tipos', $tipos);
    }

    public function modificar()
    {
        $id       = $this->request->get("id");
        $nombre   = $this->request->get("nombre");
        $impuesto = $this->request->get("impuesto");
        $activo   = ($this->request->get("activo") != null) ? 1 : 0;
        $impreso  = ($this->request->get("impreso") != null) ? 1 : 0;
        $orden    = $this->request->get("orden");
        $impuesto_local     = ($this->request->get("impuesto_local") != null) ? 1 : 0;
        $aplicar_iva        = ($this->request->get("aplicar_iva") != null) ? 1 : 0;
        $desglose_impuesto  = $this->request->get("desglose_impuesto");
        $tipo_impuesto      = $this->request->get("tipo_impuesto");
        $cuenta_contable    = ($this->request->get("cuenta_contable") != null) ? $this->request->get("cuenta_contable") : "";
        $existe = Impuesto::where('nombre', $nombre)->where('id', '!=', $id)->where('eliminado', 0)->count();
        if (!$existe) {
            $editar  = Impuesto::where('id', $id)->update([
                'nombre'    => $nombre,
                'impuesto'  => $impuesto,
                'activo'    => $activo,
                'impreso'   => $impreso,
                'impuesto_local'        => $impuesto_local,
                'id_desglose_impuesto'  => $desglose_impuesto,
                'id_tipo_impuesto'      => $tipo_impuesto,
                'orden'         => $orden,
                'aplicar_iva'   => $aplicar_iva,
                'cuenta_clave'  => $cuenta_contable
            ]);
            if ($editar) {
                $this->responseSuccess("Impuesto actualizado con exito.");
            } else {
                $this->responseError(500, "No hubo cambios en el impuesto.");
            }
        } else {
            $this->responseError(500, "El nombre del impuesto, ya existe.");
        }
        return response()->json($this->response);
    }

    public function CambiarEstatus()
    {
        $id       = $this->request->get("id");
        $activo   = $this->request->get("estatus");
        $result   = Impuesto::where('id', $id)->update(["activo" => $activo]);
        if (!$result) {
            $this->responseError(400, "No se realizo el cambio de estatus.");
        }
        return response()->json($this->response);
    }

    public function eliminar()
    {
        $id       = $this->request->get("id");
        $articulo = Articulo::where('id_impuesto', $id)->count();
        $entrada  = Entrada::where('id_impuesto', $id)->count();
        $paquete  = Paquete::where('id_impuesto', $id)->count();
        if (!$articulo && !$entrada && !$paquete) {
            $eliminar = Impuesto::where('id', $id)->update(["activo" => 0, "eliminado" =>  1]);
            if ($eliminar) {
                $this->responseSuccess("Impuesto eliminado correctamente.");
            } else {
                $this->responseError(400, "Ocurrió un error al eliminar el impuesto, vuelva a intentarlo.");
            }
        } else {
            $this->responseError(400, "No se puede eliminar el impuesto porque está siendo utilizado en Artículos.");
        }
        return response()->json($this->response);
    }
}
