<h1>Dúvida {{$suporte->id}}</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
    
@endif

<form action="{{route('suporte.update', $suporte->id)}}" method="POST">
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}

    @csrf()
    @method('PUT')
    <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{$suporte->subject}}">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">{{$suporte->body}}</textarea>
    <button type="submit">Editar</button>
</form>