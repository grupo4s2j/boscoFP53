<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recursossubcategoria;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RecursossubcategoriaController.
 *
 * @author  The scaffold-interface created at 2017-02-09 03:31:25pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RecursossubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - recursossubcategoria';
        $recursossubcategorias = Recursossubcategoria::paginate(6);
        return view('recursossubcategoria.index',compact('recursossubcategorias','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - recursossubcategoria';
        
        return view('recursossubcategoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recursossubcategoria = new Recursossubcategoria();

        
        $recursossubcategoria->idRecursos = $request->idRecursos;

        
        $recursossubcategoria->idSubcategorias = $request->idSubcategorias;

        
        
        $recursossubcategoria->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new recursossubcategoria has been created !!']);

        return redirect('recursossubcategoria');
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
        $title = 'Show - recursossubcategoria';

        if($request->ajax())
        {
            return URL::to('recursossubcategoria/'.$id);
        }

        $recursossubcategoria = Recursossubcategoria::findOrfail($id);
        return view('recursossubcategoria.show',compact('title','recursossubcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - recursossubcategoria';
        if($request->ajax())
        {
            return URL::to('recursossubcategoria/'. $id . '/edit');
        }

        
        $recursossubcategoria = Recursossubcategoria::findOrfail($id);
        return view('recursossubcategoria.edit',compact('title','recursossubcategoria'  ));
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
        $recursossubcategoria = Recursossubcategoria::findOrfail($id);
    	
        $recursossubcategoria->idRecursos = $request->idRecursos;
        
        $recursossubcategoria->idSubcategorias = $request->idSubcategorias;
        
        
        $recursossubcategoria->save();

        return redirect('recursossubcategoria');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/recursossubcategoria/'. $id . '/delete');

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
     	$recursossubcategoria = Recursossubcategoria::findOrfail($id);
     	$recursossubcategoria->delete();
        return URL::to('recursossubcategoria');
    }
}
