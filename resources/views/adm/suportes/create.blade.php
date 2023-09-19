<h1>Nova Dúvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
    
@endif

<form action="{{route('suporte.store')}}" method="POST">
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}

    @csrf()
    <input type="text" name="subject" id="subject" placeholder="Assunto">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">{{old('body')}}</textarea>
    <button type="submit">Enviar</button>
</form>