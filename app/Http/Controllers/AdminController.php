<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public $usuario;
    public $request;
    public $response;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        Carbon::setLocale('es');
        $this->request = $request;
        $this->response['stats'] = [
            'code'    => 200,
            'status'  => 'success'
        ];
        if (auth()->user()) {
            $this->completarInformacion();
        }
    }

    private function completarInformacion()
    {
        $date    = Carbon::now()->format('Y-m-d');
        $request = $this->request;
        $usuario = Usuario::find(auth()->user()->id);
        $this->usuario = $usuario;
        view()->share(compact('date', 'request', 'usuario'));
    }

    public function responseError($errorCode, $message)
    {
        $this->response['stats']['status']  = 'error';
        $this->response['stats']['code']    = $errorCode;
        $this->response['stats']['message'] = $message;
    }
    public function responseSuccess($message, $data = [])
    {
        $this->response['stats']['status']  = 'success';
        $this->response['stats']['message'] = $message;
        $this->response["responseData"] = $data;
    }
}
