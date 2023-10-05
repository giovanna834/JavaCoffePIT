<table class="table table-bordered">
    <tr>
        <th style="color:#E1525F">Produto</th>
        <th style="color:#E1525F">Quantidade</th>
        <th style="color:#E1525F">Valor</th>
    </tr>
    @foreach($listaItens as $item)
    <tr>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->quantidade }}</td>
        <td>{{ $item->valoritem }}</td>
    </tr>
    @endforeach
</table>