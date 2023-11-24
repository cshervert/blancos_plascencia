<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Alias</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>NSS</th>
        <th>CURP</th>
        <th>Ciudad</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Comision</th>
        <th>Fecha Nacimiento</th>
        <th>Puesto</th>
        <th>Sucursal</th>
        <th>Activo</th>
        <th>Eliminado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->alias }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->direccion }}</td>
            <td>{{ $empleado->nss }}</td>
            <td>{{ $empleado->curp }}</td>
            <td>{{ $empleado->ciudad }}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->celular }}</td>
            <td>{{ $empleado->email }}</td>
            <td>{{ $empleado->comision }}</td>
            <td>{{ $empleado->fecha_nacimiento }}</td>
            <td>{{ $empleado->puesto_trabajo->puesto }}</td>
            <td>{{ $empleado->sucursal->nombre }}</td>
            <td>{{ $empleado->activo }}</td>
            <td>{{ $empleado->eliminado}}</td>
        </tr>
    @endforeach
    </tbody>
</table>