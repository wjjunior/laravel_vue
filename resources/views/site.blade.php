@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <p>
        <form class="form-inline d-flex justify-content-center" action="{{route('site')}}" method="get">

          <div class="form-group mx-sm-3 mb-2">
            <input type="search" class="form-control" name="busca" placeholder="Buscar" value="{{isset($busca) ? $busca : ""}}">
          </div>

          <button type="submit" class="btn btn-info mb-2">Buscar</button>
        </form>
      </p>


      <div class="row">
        @foreach ($lista as $key => $value)
          <artigocard
          titulo="{{str_limit($value->titulo, 20, '...')}}"
          descricao="{{str_limit($value->descricao, 30, '...')}}"
          link="{{route('artigo', [$value->id, str_slug($value->titulo)])}}"
          imagem="https://jovemnerd.com.br/wp-content/uploads/2019/01/kingdom-hearts-iii-review-760x428.jpg"
          data="{{$value->data}}"
          autor="{{$value->autor}}"
          sm="6"
          md="4"
          >
        </artigocard>
      @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">{{$lista->links()}}</div>
  </painel>
</pagina>

@endsection
