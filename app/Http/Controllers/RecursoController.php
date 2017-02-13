<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RecursoController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:07:09pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - recurso';
        $recursos = Recurso::paginate(6);
        return view('recurso.index',compact('recursos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - recurso';
        
        return view('recurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recurso = new Recurso();

        
        $recurso->titulo = $request->titulo;

        
        $recurso->descripcion = $request->descripcion;

        
        $recurso->contenido = $request->contenido;

        
        $recurso->img = $request->img;

        
        $recurso->fechaPost = $request->fechaPost;

        
        $recurso->fechaInicio = $request->fechaInicio;

        
        $recurso->fechaFin = $request->fechaFin;

        
        $recurso->rangoEdad = $request->rangoEdad;

        
        $recurso->relevancia = $request->relevancia;

        
        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;

        
        $recurso->activo = $request->activo;

        
        
        $recurso->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new recurso has been created !!']);

        return redirect('recurso');
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
        $title = 'Show - recurso';

        if($request->ajax())
        {
            return URL::to('recurso/'.$id);
        }

        $recurso = Recurso::findOrfail($id);
        return view('recurso.show',compact('title','recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - recurso';
        if($request->ajax())
        {
            return URL::to('recurso/'. $id . '/edit');
        }

        
        $recurso = Recurso::findOrfail($id);
        return view('recurso.edit',compact('title','recurso'  ));
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
        $recurso = Recurso::findOrfail($id);
    	
        $recurso->titulo = $request->titulo;
        
        $recurso->descripcion = $request->descripcion;
        
        $recurso->contenido = $request->contenido;
        
        $recurso->img = $request->img;
        
        $recurso->fechaPost = $request->fechaPost;
        
        $recurso->fechaInicio = $request->fechaInicio;
        
        $recurso->fechaFin = $request->fechaFin;
        
        $recurso->rangoEdad = $request->rangoEdad;
        
        $recurso->relevancia = $request->relevancia;
        
        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;
        
        $recurso->activo = $request->activo;
        
        
        $recurso->save();

        return redirect('recurso');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/recurso/'. $id . '/delete');

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
     	$recurso = Recurso::findOrfail($id);
     	$recurso->delete();
        return URL::to('recurso');
    }
}
