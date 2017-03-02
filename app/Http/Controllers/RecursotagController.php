<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recursotag;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RecursotagController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:51:20pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RecursotagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - recursotag';
        $recursotags = Recursotag::paginate(6);
        return view('recursotag.index',compact('recursotags','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - recursotag';
        
        return view('recursotag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recursotag = new Recursotag();

        
        $recursotag->idRecursos = $request->idRecursos;

        
        $recursotag->idTag = $request->idTag;

        

        
        
        $recursotag->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new recursotag has been created !!']);

        return redirect('recursotag');
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
        $title = 'Show - recursotag';

        if($request->ajax())
        {
            return URL::to('recursotag/'.$id);
        }

        $recursotag = Recursotag::findOrfail($id);
        return view('recursotag.show',compact('title','recursotag'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - recursotag';
        if($request->ajax())
        {
            return URL::to('recursotag/'. $id . '/edit');
        }

        
        $recursotag = Recursotag::findOrfail($id);
        return view('recursotag.edit',compact('title','recursotag'  ));
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
        $recursotag = Recursotag::findOrfail($id);
    	
        $recursotag->idRecursos = $request->idRecursos;
        
        $recursotag->idTag = $request->idTag;
        
        
        
        $recursotag->save();

        return redirect('recursotag');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/recursotag/'. $id . '/delete');

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
     	$recursotag = Recursotag::findOrfail($id);
     	$recursotag->delete();
        return URL::to('recursotag');
    }
}
