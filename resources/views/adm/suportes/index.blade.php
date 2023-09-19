<h1>Listagem dos Suportes</h1>

<a href="{{route('suporte.create')}}">Adicionar Comentario</a>

<table>
    <thead>
        <th>assuntos</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($suportes as $suporte)
            <tr>
                <td>{{$suporte['subject']}}</td>
                <td>{{$suporte['status']}}</td>
                <td>{{$suporte['body']}}</td>
                <td>
                    <a href="{{route('suporte.show', $suporte['id'])}}"> ir </a>
                    <a href="{{route('suporte.edit', $suporte['id'])}}"> editar </a>
                    <form action="{{route('suporte.delete', $suporte['id'])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
    
        @endforeach
    </tbody>
</table>
