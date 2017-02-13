<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Redsocialusuario;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RedsocialusuarioController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:56:36pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RedsocialusuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - redsocialusuario';
        $redsocialusuarios = Redsocialusuario::paginate(6);
        return view('redsocialusuario.index',compact('redsocialusuarios','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - redsocialusuario';
        
        return view('redsocialusuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $redsocialusuario = new Redsocialusuario();

        
        $redsocialusuario->idRedsocial = $request->idRedsocial;

        
        $redsocialusuario->user = $request->user;

        
        $redsocialusuario->pass = $request->pass;

        
        
        $redsocialusuario->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new redsocialusuario has been created !!']);

        return redirect('redsocialusuario');
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
        $title = 'Show - redsocialusuario';

        if($request->ajax())
        {
            return URL::to('redsocialusuario/'.$id);
        }

        $redsocialusuario = Redsocialusuario::findOrfail($id);
        return view('redsocialusuario.show',compact('title','redsocialusuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - redsocialusuario';
        if($request->ajax())
        {
            return URL::to('redsocialusuario/'. $id . '/edit');
        }

        
        $redsocialusuario = Redsocialusuario::findOrfail($id);
        return view('redsocialusuario.edit',compact('title','redsocialusuario'  ));
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
        $redsocialusuario = Redsocialusuario::findOrfail($id);
    	
        $redsocialusuario->idRedsocial = $request->idRedsocial;
        
        $redsocialusuario->user = $request->user;
        
        $redsocialusuario->pass = $request->pass;
        
        
        $redsocialusuario->save();

        return redirect('redsocialusuario');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/redsocialusuario/'. $id . '/delete');

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
     	$redsocialusuario = Redsocialusuario::findOrfail($id);
     	$redsocialusuario->delete();
        return URL::to('redsocialusuario');
    }
}
