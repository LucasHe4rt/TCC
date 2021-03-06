@extends('layouts.dashboard')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title ">Estabelecimentos</h4>
                        <a href="javascript:void(0)" class="card-category" data-toggle="modal" data-target="#establishmentModal">Clique aqui para adicionar um novo estabelecimento</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cnpj</th>
                                <th>Categoria</th>
                                <th>Criado em</th>
                                <th>Atualizado em</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>

                                @foreach($estabs as $e)
                                    <tr>
                                        <td id="teste">{{$e->id}}</td>
                                        <td>{{$e->name}}</td>
                                        <td>{{$e->cnpj}}</td>
                                        <td>{{$e->type->name}}</td>
                                        <td>{{date_format($e->created_at,"d/m/Y")}}</td>
                                        <td>{{date_format($e->updated_at,"d/m/Y")}}</td>
                                        <td>
                                            <a style="color: lightskyblue" href="{{route('establishment.view',['id' => $e->id])}}"><i class="material-icons">visibility</i></a>
                                            <a style="color: #9095a2;" onclick="establishmentEdit({{$e->id}})" href="javascript:void(0)" data-toggle="modal" data-target="#editEstablishmentModal"><i class="material-icons">settings</i></a>
                                            <a style="color: red" href="{{route('establishment.remove',['id' => $e->id])}}"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Modal -->
    <div  class="modal fade" id="establishmentModal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="establishmentModalLabel">Novo Estabelecimento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('establishment.new')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Nome</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" class="bmd-label-floating">Cnpj</label>
                            <input type="text" data-mask="00.000.000/0000-00" class="form-control" name="cnpj" id="cnpj">
                        </div>
                        <div class="form-group">
                            <label for="type_id" class="bmd-label-floating">Categoria</label>
                            <select id="type_id" class="form-control" name="type_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" class="bmd-label-floating">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="description" class="bmd-label-floating">Descrição</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div  class="modal fade" id="editEstablishmentModal" tabindex="-1" role="dialog" aria-labelledby="establishmentModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content dark-edition">
                <div style="background-color: #029eb1" class="modal-header">
                    <h5 style="color: #ffffff" class="modal-title" id="editEstablishmentModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="color: #ffffff" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" name="establishmentForm" action="">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Nome</label>
                            <input type="text" class="form-control" name="name" id="editName">
                        </div>
                        <div class="form-group">
                            <label for="cnpj" >Cnpj</label>
                            <input type="text" data-mask="00.000.000/0000-00" class="form-control" name="cnpj" id="editCnpj">
                        </div>
                        <div class="form-group">
                            <label for="editType_id">Categoria</label>
                            <select id="editType_id" class="form-control" name="type_id">
                                <option value="">Selecione um tipo</option>
                                @foreach($types as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address" >Endereço</label>
                            <input type="text" class="form-control" name="address" id="editAddress">
                        </div>
                        <div class="form-group">
                            <label for="description" >Descrição</label>
                            <textarea class="form-control" name="description" id="editDescription"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
