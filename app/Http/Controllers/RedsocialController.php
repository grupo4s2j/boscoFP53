<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Redsocial;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RedsocialController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:55:44pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RedsocialController extends Controller
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
//            $redsocials = Redsocial::paginate($paginate);
//        }else {
//            $redsocials = Redsocial::where('redSocial', 'like', '%' . $search . '%')
//                ->paginate(1000);
//        }
        $title = 'Index - Red Sociales';
        $redsocials = Redsocial::orderBy('redSocial','asc')->get();
        return view('redsocial.index', compact('redsocials', 'title'));
    }

    public function indexFront()
    {
        $redsocials = \App\Redsocial::all();

        return view('fo.redsocial', compact('redsocials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - redsocial';
        
        return view('redsocial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $redsocial = new Redsocial();

        
        $redsocial->redSocial = $request->redSocial;

        
        $redsocial->link = $request->link;

        if ($request->hasFile('img')) {
           
            $directorio=  '/img/redsocial/';
          
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));

            $recurso->img = $file->getClientOriginalName();
        }
        
        $redsocial->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new redsocial has been created !!']);

        return redirect('redsocial');
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
        $title = 'Show - redsocial';

        if($request->ajax())
        {
            return URL::to('redsocial/'.$id);
        }

        $redsocial = Redsocial::findOrfail($id);
        return view('redsocial.show',compact('title','redsocial'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - redsocial';
        if($request->ajax())
        {
            return URL::to('redsocial/'. $id . '/edit');
        }

        
        $redsocial = Redsocial::findOrfail($id);
        return view('redsocial.edit',compact('title','redsocial'  ));
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
        $redsocial = Redsocial::findOrfail($id);
    	
        $redsocial->redSocial = $request->redSocial;
        
        $redsocial->link = $request->link;
        
        if ($request->hasFile('img')) {
           
            $directorio=  '/img/redsocial/';
          
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));

            $redsocial->logo = $file->getClientOriginalName();
        }
        
        $redsocial->save();

        return redirect('redsocial');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/redsocial/'. $id . '/delete');

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
     	$redsocial = Redsocial::findOrfail($id);
     	$redsocial->delete();
        return URL::to('redsocial');
    }
}
