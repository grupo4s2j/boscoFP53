<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Evento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class EventoController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:54:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
//        $search = \Request::get('search');
//
//        $paginate = \Request::get('rows');
//        if ($paginate=="") {
//            $paginate = 6;
//        }
//        if ($search=="") {
//
//            $eventos = Evento::where('activo', '=', '1')->paginate($paginate);
//        }else {
//            $eventos = Evento::where('titulo', 'like', '%' . $search . '%')->where('activo', '=', '1')
//                ->paginate(1000);
//        }
        $title = 'Index - Evento';
        $eventos = Evento::where('activo', '=', '1')->get();
        return view('evento.index', compact('eventos', 'title'));
    }

    public function indexFront()
    {
        $eventos = \App\Evento::all();

        return view('fo.evento', compact('eventos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - evento';
        
        return view('evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();

        
        $evento->titulo = $request->titulo;

        
        $evento->descripcion = $request->descripcion;

        
        if ($request->hasFile('img')) {
           
             
            $directorio=  '/img/banner/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

            $evento->img = $file->getClientOriginalName();
        }

        
        $evento->fechaInicio = $request->fechaInicio;

        
        $evento->fechaFin = $request->fechaFin;


        
        
        $evento->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new evento has been created !!']);

        return redirect('evento');
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
        $title = 'Show - evento';

        if($request->ajax())
        {
            return URL::to('evento/'.$id);
        }

        $evento = Evento::findOrfail($id);
        return view('evento.show',compact('title','evento'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - evento';
        if($request->ajax())
        {
            return URL::to('evento/'. $id . '/edit');
        }

        
        $evento = Evento::findOrfail($id);
        return view('evento.edit',compact('title','evento'  ));
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
        $evento = Evento::findOrfail($id);
    	
        $evento->titulo = $request->titulo;
        
        $evento->descripcion = $request->descripcion;
        
        if ($request->hasFile('img')) {
           
            
            $directorio=  '/img/banner/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

            $evento->img = $file->getClientOriginalName();
        }
        
        $evento->fechaInicio = $request->fechaInicio;
        
        $evento->fechaFin = $request->fechaFin;
        
        
        $evento->save();

        return redirect('evento');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/evento/'. $id . '/delete');

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
     	$evento = Evento::findOrfail($id);
     	$evento->activo = 0;
        $evento->save();
        return URL::to('evento');
    }
}
