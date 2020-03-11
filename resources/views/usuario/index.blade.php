@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tickets Asignados        
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
					      <th scope="col">creado</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($tickets as $key=>$ticket)
					    <tr>
					      <td>{{$key + 1}}</td>
					      <td>{{$ticket->ticket_pedido}}</td>
					      <td><?php $d=date_create($ticket->created_at); echo date_format($d,'d/m/Y - H:i'); ?></td>
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
      <form action="{{ route('usuario.store') }}" autocomplete="on" method="POST">
      	@csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="ticket_pedido">Pedido</label>
              <input type="text" name="ticket" class="form-control" required />
              
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
@endsection
