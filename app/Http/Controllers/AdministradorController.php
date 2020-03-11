<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Ticket;
use App\User;

class AdministradorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets= Ticket::leftjoin('users','users.id','=','ticket.id_user')
                        ->select('ticket.id','ticket.id_user','ticket.ticket_pedido','ticket.created_at','users.name')
                        ->orderBy('ticket.id','ASC')
                        ->get();
        $users=User::all();
        return view('admin.index',compact('tickets','users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ticket=Ticket::create([
            'ticket_pedido'=>$request->ticket,
            'id_user'=>$request->iduser
        ]);
        if( $ticket->save() ){
            Session::flash('save','El Tickets fue enviado Exitosamente');
            return redirect()->route('administrador.index');
        }else{
            Session::flash('error','Ups. El Ticket NO fue creado');
            return redirect()->route('administrador.index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request,$id)
    {
        $ticket=Ticket::find($id);
        $ticket->id_user=$request->id_user;
        

        if( $ticket->save() ){
            Session::flash('save','El Tickets fue enviado Exitosamente');
            return redirect()->route('administrador.index');
        }else{
            Session::flash('error','Ups. El Ticket NO fue creado');
            return redirect()->route('administrador.index');
        }
    }

}
