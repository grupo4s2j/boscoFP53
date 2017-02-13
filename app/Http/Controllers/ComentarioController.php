<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ComentarioController. 
 */
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - comentario';
        $comentarios = Comentario::paginate(6);
        return view('comentario.index',compact('comentarios','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - comentario';
        
        return view('comentario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comentario = new Comentario();

        
        $comentario->numero = $request->numero;

        
        $comentario->nombre = $request->nombre;

        
        $comentario->email = $request->email;

        
        $comentario->mensaje = $request->mensaje;

        
        $comentario->aprobado = $request->aprobado;

        
        $comentario->numContestado = $request->numContestado;

        
        $comentario->activo = $request->activo;

        
        $comentario->idRecurso = $request->idRecurso;

        
        
        $comentario->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new comentario has been created !!']);

        return redirect('comentario');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - comentario';

        if($request->ajax())
        {
            return URL::to('comentario/'.$id);
        }

        $comentario = Comentario::findOrfail($id);
        return view('comentario.show',compact('title','comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - comentario';
        if($request->ajax())
        {
            return URL::to('comentario/'. $id . '/edit');
        }

        
        $comentario = Comentario::findOrfail($id);
        return view('comentario.edit',compact('title','comentario'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $comentario = Comentario::findOrfail($id);
    	
        $comentario->numero = $request->numero;
        
        $comentario->nombre = $request->nombre;
        
        $comentario->email = $request->email;
        
        $comentario->mensaje = $request->mensaje;
        
        $comentario->aprobado = $request->aprobado;
        
        $comentario->numContestado = $request->numContestado;
        
        $comentario->activo = $request->activo;
        
        $comentario->idRecurso = $request->idRecurso;
        
        
        $comentario->save();

        return redirect('comentario');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * 
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/comentario/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$comentario = Comentario::findOrfail($id);
     	$comentario->delete();
        return URL::to('comentario');
    }
}
