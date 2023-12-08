<table>
    <thead style="background-color:#0547A2; color:white;">
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="14" align="center">Catálago de Departamentos</th>
    </tr>
    <tr >
        <th style="background-color:#4B7EC4; color:white;">ID</th>
        <th style="background-color:#4B7EC4; color:white;">Departamento</th>
        <th style="background-color:#4B7EC4; color:white;">Activo</th>
        <th style="background-color:#4B7EC4; color:white;">Eliminado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->departamento }}</td>
            <td>{{ $item->activo }}</td>
            <td>{{ $item->eliminado}}</td>
        </tr>
    @endforeach
    </tbody>
</table>