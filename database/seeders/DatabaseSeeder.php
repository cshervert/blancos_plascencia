<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(CuentaBancariaSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(PermisoRolSeeder::class);
        $this->call(EstatusCompraSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(PuestoTrabajoSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(DatosFacturacionSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(GrupoClienteSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(SucursalSeeder::class);
        $this->call(EmpleadoSeeder::class);

        Usuario::factory()->create([
            'nombre'    => 'Juan Carlos Salvador Hervert',
            'direccion' => 'Loma Baja #25',
            'ciudad'    => 'Zapopan',
            'telefono'  => '3320168482',
            'celular'   => '3310960761',
            'foto'      => '',
            'email'     => 'hervert0719@gmail.com',
            'username'  => 'hervert',
            'password'  => '123123',
            'id_sucursal'  => 1,
            'id_rol'    => 1,
            'activo'    => true,
            'eliminado' => false
        ]);

        Usuario::factory()->create([
            'nombre'    => 'Mitsy Contreras',
            'direccion' => 'demo',
            'ciudad'    => 'demo',
            'telefono'  => '0000000',
            'celular'   => '0000000',
            'foto'      => '',
            'email'     => 'mitsy@gmail.com',
            'username'  => 'mitsy',
            'password'  => '123123',
            'id_sucursal'  => 1,
            'id_rol'    => 2,
            'activo'    => true,
            'eliminado' => false
        ]);

        $this->call(PermisoUsuarioSeeder::class);
        $this->call(SucursalUsuarioSeeder::class);
        $this->call(TipoImpuestoSeeder::class);
        $this->call(DesgloseImpuestoSeeder::class);
        $this->call(ImpuestoSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(EtiquetaSeeder::class);
        $this->call(PrecioSeeder::class);
        $this->call(PaqueteSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ArticuloPaqueteSeeder::class);
        $this->call(ComprasSeeder::class);
        $this->call(EntradaSeeder::class);
        $this->call(InventarioSeeder::class);
        $this->call(EntradaInventarioSeeder::class);
        $this->call(SucursalInventarioSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(TipoMovimientoSeeder::class);
    }
}
