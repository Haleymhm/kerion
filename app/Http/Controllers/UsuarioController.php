<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Ticket;

class UsuarioController extends Controller
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
        $tickets=Ticket::where('id_user','=',auth()->user()->id)->get();
        return view('usuario.index',compact('tickets'));
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
            'ticket_pedido'=>$request->ticket
        ]);
        if( $ticket->save() ){
            Session::flash('save','El Tickets fue enviado Exitosamente');
            return redirect()->route('usuario.index');
        }else{
            Session::flash('error','Ups. El Ticket NO fue creado');
            return redirect()->route('usuario.index');
        }
    }

}
