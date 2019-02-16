@extends('layouts.app')

@section('content')
  <pagina tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>

    @endif
    <painel titulo="Lista de Admin">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
      <tabela-lista
      v-bind:titulos="['ID', 'Nome', 'Email']"
      v-bind:itens="{{json_encode($listaModelo)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" editar="/admin/adm/" detalhe="/admin/adm/"
      modal="sim"
      ></tabela-lista>
      <div class="center">
        {{$listaModelo->links()}}
      </div>
    </painel>
  </pagina>
  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('adm.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="admin">Admin</label>
        <select class="form-control" name="admin" id="admin">
          <option {{(old('admin') && old('admin') == 'N' ? 'selected' : '')}} value="N">Não</option>
          <option {{(old('admin') && old('admin') == 'S' ? 'selected' : '')}} {{(!old('admin') ? 'selected' : '')}} value="S">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="{{old('password')}}">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/adm/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="admin">Admin</label>
        <select class="form-control" name="admin" id="admin" v-model="$store.state.item.admin">
          <option value="N">Não</option>
          <option value="S">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Senha" v-model="$store.state.item.password">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </slot>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p>@{{$store.state.item.email}}</p>
  </modal>

@endsection
