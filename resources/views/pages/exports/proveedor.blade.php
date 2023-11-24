<table>
    <thead style="background-color:#0547A2; color:white;">
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="14" align="center">Catalago de Proveedores</th>
    </tr>
    <tr >
        <th style="font-weight:700; background-color:#102C56; color:white;" colspan="12" align="center">Datos Proveedor</th>
        <th style="font-weight:700; background-color:#345582; color:white;" colspan="12" align="center">Datos Facturacion</th>
    </tr>
    <tr >
        <th style="background-color:#4B7EC4; color:white;">ID</th>
        <th style="background-color:#4B7EC4; color:white;">Representante</th>
        <th style="background-color:#4B7EC4; color:white;">Nombre</th>
        <th style="background-color:#4B7EC4; color:white;">Alias</th>
        <th style="background-color:#4B7EC4; color:white;">RFC</th>
        <th style="background-color:#4B7EC4; color:white;">CURP</th>
        <th style="background-color:#4B7EC4; color:white;">Telefono</th>
        <th style="background-color:#4B7EC4; color:white;">Celular</th>
        <th style="background-color:#4B7EC4; color:white;">Email</th>
        <th style="background-color:#4B7EC4; color:white;">Comentario</th>
        <th style="background-color:#4B7EC4; color:white;">Limite Credito</th>
        <th style="background-color:#4B7EC4; color:white;">Dias Credito</th>
        <th style="background-color:#4B7EC4; color:white;">Razon Social</th>
        <th style="background-color:#4B7EC4; color:white;">RFC</th>
        <th style="background-color:#4B7EC4; color:white;">CURP</th>
        <th style="background-color:#4B7EC4; color:white;">Domicilio</th>
        <th style="background-color:#4B7EC4; color:white;">Num Ext</th>
        <th style="background-color:#4B7EC4; color:white;">Num Int</th>
        <th style="background-color:#4B7EC4; color:white;">Colonia</th>
        <th style="background-color:#4B7EC4; color:white;">CP</th>
        <th style="background-color:#4B7EC4; color:white;">Ciudad</th>
        <th style="background-color:#4B7EC4; color:white;">Localidad</th>
        <th style="background-color:#4B7EC4; color:white;">Estado</th>
        <th style="background-color:#4B7EC4; color:white;">Pais</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->representante }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->alias }}</td>
            <td>{{ $item->rfc }}</td>
            <td>{{ $item->curp }}</td>
            <td>{{ $item->telefono }}</td>
            <td>{{ $item->celular }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->comentario }}</td>
            <td>{{ $item->limite_credito }}</td>
            <td>{{ $item->dias_credito }}</td>
            <td>{{ $item->datos_facturacion->razon_social }}</td>
            <td>{{ $item->datos_facturacion->rfc }}</td>
            <td>{{ $item->datos_facturacion->curp }}</td>
            <td>{{ $item->datos_facturacion->domicilio }}</td>
            <td>{{ $item->datos_facturacion->numero_interior }}</td>
            <td>{{ $item->datos_facturacion->numero_exterior }}</td>
            <td>{{ $item->datos_facturacion->colonia }}</td>
            <td>{{ $item->datos_facturacion->cp }}</td>
            <td>{{ $item->datos_facturacion->ciudad }}</td>
            <td>{{ $item->datos_facturacion->localidad }}</td>
            <td>{{ $item->datos_facturacion->estado }}</td>
            <td>{{ $item->datos_facturacion->pais }}</td>

        </tr>
    @endforeach
    </tbody>
</table>