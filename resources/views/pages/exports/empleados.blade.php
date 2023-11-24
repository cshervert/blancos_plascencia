<table>
    <thead>
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="14" align="center">Catalago de Empleados</th>
    </tr>
    <tr>
        <th style="background-color:#4B7EC4; color:white;">ID</th>
        <th style="background-color:#4B7EC4; color:white;">Alias</th>
        <th style="background-color:#4B7EC4; color:white;">Nombre</th>
        <th style="background-color:#4B7EC4; color:white;">Direccion</th>
        <th style="background-color:#4B7EC4; color:white;">NSS</th>
        <th style="background-color:#4B7EC4; color:white;">CURP</th>
        <th style="background-color:#4B7EC4; color:white;">Ciudad</th>
        <th style="background-color:#4B7EC4; color:white;">Telefono</th>
        <th style="background-color:#4B7EC4; color:white;">Celular</th>
        <th style="background-color:#4B7EC4; color:white;">Email</th>
        <th style="background-color:#4B7EC4; color:white;">Comision</th>
        <th style="background-color:#4B7EC4; color:white;">Fecha Nacimiento</th>
        <th style="background-color:#4B7EC4; color:white;">Puesto</th>
        <th style="background-color:#4B7EC4; color:white;">Sucursal</th>
        <th style="background-color:#4B7EC4; color:white;">Activo</th>
        <th style="background-color:#4B7EC4; color:white;">Eliminado</th>
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