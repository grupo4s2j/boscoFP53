<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entidadorganizativa;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class EntidadorganizativaController.
 *
 */
class EntidadorganizativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - entidadorganizativa';
        $entidadorganizativas = Entidadorganizativa::paginate(6);
        return view('entidadorganizativa.index',compact('entidadorganizativas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - entidadorganizativa';
        
        return view('entidadorganizativa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entidadorganizativa = new Entidadorganizativa();

        
        $entidadorganizativa->nombre = $request->nombre;

        
        $entidadorganizativa->direccion = $request->direccion;

        
        $entidadorganizativa->geolocalizacion = $request->geolocalizacion;

        
        $entidadorganizativa->activo = $request->activo;

        
        
        $entidadorganizativa->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new entidadorganizativa has been created !!']);

        return redirect('entidadorganizativa');
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
        $title = 'Show - entidadorganizativa';

        if($request->ajax())
        {
            return URL::to('entidadorganizativa/'.$id);
        }

        $entidadorganizativa = Entidadorganizativa::findOrfail($id);
        return view('entidadorganizativa.show',compact('title','entidadorganizativa'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - entidadorganizativa';
        if($request->ajax())
        {
            return URL::to('entidadorganizativa/'. $id . '/edit');
        }

        
        $entidadorganizativa = Entidadorganizativa::findOrfail($id);
        return view('entidadorganizativa.edit',compact('title','entidadorganizativa'  ));
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
        $entidadorganizativa = Entidadorganizativa::findOrfail($id);
    	
        $entidadorganizativa->nombre = $request->nombre;
        
        $entidadorganizativa->direccion = $request->direccion;
        
        $entidadorganizativa->geolocalizacion = $request->geolocalizacion;
        
        $entidadorganizativa->activo = $request->activo;
        
        
        $entidadorganizativa->save();

        return redirect('entidadorganizativa');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/entidadorganizativa/'. $id . '/delete');

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
     	$entidadorganizativa = Entidadorganizativa::findOrfail($id);
     	$entidadorganizativa->delete();
        return URL::to('entidadorganizativa');
    }
}
