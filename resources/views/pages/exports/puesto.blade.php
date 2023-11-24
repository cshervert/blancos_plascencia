<table>
    <thead>
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="5" align="center">Catalago de Puestos de Trabajo</th>
    </tr>
    <tr>
        <th style="background-color:#4B7EC4; color:white;" colspan="2">ID</th>
        <th style="background-color:#4B7EC4; color:white;" colspan="3">Puesto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td colspan="2">{{ $item->id }}</td>
            <td colspan="3">{{ $item->puesto }}</td>
        </tr>
    @endforeach
    </tbody>
</table>