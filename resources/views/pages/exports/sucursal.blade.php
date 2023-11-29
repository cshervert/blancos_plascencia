<table>
    <thead style="background-color:#0547A2; color:white;">
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="14" align="center">Catálago de Sucursales</th>
    </tr>
    <tr >
        <th style="background-color:#4B7EC4; color:white;">ID</th>
        <th style="background-color:#4B7EC4; color:white;">Nombre</th>
        <th style="background-color:#4B7EC4; color:white;">Domicilio</th>
        <th style="background-color:#4B7EC4; color:white;">Num Ext</th>
        <th style="background-color:#4B7EC4; color:white;">Num Int</th>
        <th style="background-color:#4B7EC4; color:white;">Colonia</th>
        <th style="background-color:#4B7EC4; color:white;">CP</th>
        <th style="background-color:#4B7EC4; color:white;">Ciudad</th>
        <th style="background-color:#4B7EC4; color:white;">Estado</th>
        <th style="background-color:#4B7EC4; color:white;">Email</th>
        <th style="background-color:#4B7EC4; color:white;">Teléfono</th>
        <th style="background-color:#4B7EC4; color:white;">Celular</th>
        <th style="background-color:#4B7EC4; color:white;">Activo</th>
        <th style="background-color:#4B7EC4; color:white;">Eliminado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->domicilio }}</td>
            <td>{{ $item->numero_exterior }}</td>
            <td>{{ $item->numero_interior }}</td>
            <td>{{ $item->colonia }}</td>
            <td>{{ $item->cp }}</td>
            <td>{{ $item->ciudad }}</td>
            <td>{{ $item->estado }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telefono }}</td>
            <td>{{ $item->celular }}</td>
            <td>{{ $item->activo }}</td>
            <td>{{ $item->eliminado}}</td>
        </tr>
    @endforeach
    </tbody>
</table>