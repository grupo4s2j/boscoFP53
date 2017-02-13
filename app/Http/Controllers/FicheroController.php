<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fichero;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class FicheroController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:39:51pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FicheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - fichero';
        $ficheros = Fichero::paginate(6);
        return view('fichero.index',compact('ficheros','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - fichero';
        
        return view('fichero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fichero = new Fichero();

        
        $fichero->url = $request->url;

        
        $fichero->idRecurso = $request->idRecurso;

        
        
        $fichero->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new fichero has been created !!']);

        return redirect('fichero');
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
        $title = 'Show - fichero';

        if($request->ajax())
        {
            return URL::to('fichero/'.$id);
        }

        $fichero = Fichero::findOrfail($id);
        return view('fichero.show',compact('title','fichero'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - fichero';
        if($request->ajax())
        {
            return URL::to('fichero/'. $id . '/edit');
        }

        
        $fichero = Fichero::findOrfail($id);
        return view('fichero.edit',compact('title','fichero'  ));
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
        $fichero = Fichero::findOrfail($id);
    	
        $fichero->url = $request->url;
        
        $fichero->idRecurso = $request->idRecurso;
        
        
        $fichero->save();

        return redirect('fichero');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/fichero/'. $id . '/delete');

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
     	$fichero = Fichero::findOrfail($id);
     	$fichero->delete();
        return URL::to('fichero');
    }
}
