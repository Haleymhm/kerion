@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista de Ticket ADMINISTRADOR
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTicket">
                    Nuevo Ticket
                    </button>
                </div>

                <div class="card-body">
                  <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ticket Pedido</th>
                        <th scope="col">Asignado</th>
                        <th scope="col">creado</th>
                        <th scope="col">&nbps; </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tickets as $ticket)
                      <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->ticket_pedido}}</td>
                        <td>{{$ticket->name}}</td>
                        <td><?php $d=date_create($ticket->created_at); echo date_format($d,'d/m/Y - H:i'); ?></td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTicket-{{$ticket->id}}">Editar</button>
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



<div class="modal" tabindex="-1" role="dialog" id="newTicket">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pedir Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('administrador.store') }}" autocomplete="on" method="POST">
        @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="ticket_pedido">Pedido</label>
              <input type="text" name="ticket" class="form-control" required />
              
            </div>
            <div class="form-group">
              <label for="ticket_pedido">Asignado a:</label>
              <select name="iduser" class="form-control">
                <option value=""></option>
                @foreach ($users as $key=>$user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Descrtar</button>
            <button type="submit" class="btn btn-primary">Agregar Ticket</button>
          </div>
      </form>
    </div>
  </div>
</div>

@foreach ($tickets as $tick)
<div class="modal" tabindex="-1" role="dialog" id="editTicket-{{$tick->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Ticket {{$tick->id}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('administrador.update',$tick->id )}}" autocomplete="on" method="POST">
        @csrf
        @method('PUT')
        <!--<input type="hidden" name="id" value="{{$tick->id}}">-->
          <div class="modal-body">
            <div class="form-group">
              <label for="ticket_pedido">Pedido</label>
              <input type="text" name="ticket" class="form-control" value="{{$tick->id_user}}-{{$tick->ticket_pedido}}" readonly />
              
            </div>
            <div class="form-group">
              <label for="ticket_pedido">Asignado a:</label>
              <select name="id_user" class="form-control">
                <option value=""></option>
                @foreach ($users as $key=>$user)
                  <option value="{{$user->id}}" @if($user->id == $tick->id_user) {{"selected"}} @endif>{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Descrtar</button>
            <button type="submit" class="btn btn-primary">Ediar Ticket</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection
