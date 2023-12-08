<table>
    <thead>
    <tr >
        <th style="font-weight:700; font-size: 16px;" colspan="14" align="center">Catálago de Articulos</th>
    </tr>
    <tr>
        <th style="background-color:#4B7EC4; color:white;">ID</th>
        <th style="background-color:#4B7EC4; color:white;">Clave</th>
        <th style="background-color:#4B7EC4; color:white;">Clave Alterna</th>
        <th style="background-color:#4B7EC4; color:white;">Es Servicio</th>
        <th style="background-color:#4B7EC4; color:white;">Descripcion</th>
        <th style="background-color:#4B7EC4; color:white;">Categoria</th>
        <th style="background-color:#4B7EC4; color:white;">Unidad de Compra</th>
        <th style="background-color:#4B7EC4; color:white;">Unidad de Venta</th>
        <th style="background-color:#4B7EC4; color:white;">Factor</th>
        <th style="background-color:#4B7EC4; color:white;">Impuesto</th>
        <th style="background-color:#4B7EC4; color:white;">Precio Compra</th>
        <th style="background-color:#4B7EC4; color:white;">Es Precio Neto</th>
        <th style="background-color:#4B7EC4; color:white;">Precio</th>
        <th style="background-color:#4B7EC4; color:white;">Moneda</th>
        <th style="background-color:#4B7EC4; color:white;">Tasa Cambio</th>
        <th style="background-color:#4B7EC4; color:white;">Clave SAT</th>
        <th style="background-color:#4B7EC4; color:white;">Inventario Min</th>
        <th style="background-color:#4B7EC4; color:white;">Inventario Max</th>
        <th style="background-color:#4B7EC4; color:white;">Localización</th>
        <th style="background-color:#4B7EC4; color:white;">Caracteristicas</th>
        <th style="background-color:#4B7EC4; color:white;">Activo</th>
        <th style="background-color:#4B7EC4; color:white;">Eliminado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->clave }}</td>
            <td>{{ $item->clave_alterna }}</td>
            <td>{{ $item->es_servicio }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->categoria->categoria }}</td>
            <td>{{ $item->id_unidad_compra }}</td>
            <td>{{ $item->id_unidad_venta }}</td>
            <td>{{ $item->factor }}</td>
            <td>{{ $item->id_impuesto }}</td>
            <td>{{ $item->precio_compra }}</td>
            <td>{{ $item->es_precio_neto }}</td>
            <td>{{ $item->id_precio }}</td>
            <td>{{ $item->id_moneda }}</td>
            <td>{{ $item->tasa_cambio }}</td>
            <td>{{ $item->clave_sat }}</td>
            <td>{{ $item->inventario_min }}</td>
            <td>{{ $item->inventario_max }}</td>
            <td>{{ $item->localizacion }}</td>
            <td>{{ $item->caracteristicas }}</td>
            <td>{{ $item->activo }}</td>
            <td>{{ $item->eliminado}}</td>
        </tr>
    @endforeach
    </tbody>
</table>