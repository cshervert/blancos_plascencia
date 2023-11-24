<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Domicilio</th>
        <th>Num Ext</th>
        <th>Num Int</th>
        <th>Colonia</th>
        <th>CP</th>
        <th>Ciudad</th>
        <th>Estado</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Activo</th>
        <th>Eliminado</th>
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