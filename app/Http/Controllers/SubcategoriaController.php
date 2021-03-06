<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\Categoria;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class SubcategoriaController.
 *
 * @author  The scaffold-interface created at 2017-02-09 02:57:29pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SubcategoriaController extends Controller
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
//            $subcategorias = Subcategoria::paginate($paginate);
//        }else {
//            $subcategorias = Subcategoria::where('nombre', 'like', '%' . $search . '%')->where('activo', '=', '1')
//                ->paginate(1000);
//        }
            $subcategorias = Subcategoria::where('activo', '=', '1')->orderBy('orden','asc')->orderBy('nombre','asc')->get();
        $title = 'Index - Subcategoria';

        return view('subcategoria.index', compact('subcategorias', 'title'));
    }

/*
    public function indexFront()
=======

    public function getAllSubcategorias()
    {
        $subcategorias = Subcategoria::all();

        return view('fo.subcategorias', compact('subcategorias'));
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    
    public function indexFront($id)
    {
        $categoria = Categoria::find($id);
        return view('fo.subcategorias',compact('categoria'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - subcategoria';
        $categorias = Categoria::where('activo', '=', '1')->orderBy('nombre', 'asc')->get();
        return view('subcategoria.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategoria = new Subcategoria();

        
        $subcategoria->idCategoria = $request->idCategoria;

        
        $subcategoria->nombre = $request->nombre;

        


        
        $subcategoria->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new subcategoria has been created !!']);
        if ($request->hasFile('img')) {
            $Subcategoria= Subcategoria::orderBy('id', 'desc')->first();
            $directorio=  '/img/subcategorias/';
           
            $file = $request->file('img');
            $extension = '.' . substr(strchr($file->getClientOriginalName(),'.'),1);
            $imgname = 'img_' . $Subcategoria->id . $extension;
            $nombreimagen = $directorio . $imgname;              
            \Storage::disk('local')->put($nombreimagen, \File::get($file));

            $Subcategoria->img = $imgname;
            $Subcategoria->save();
        }
        return redirect('subcategoria');
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
        $title = 'Show - subcategoria';

        if($request->ajax())
        {
            return URL::to('subcategoria/'.$id);
        }

        $subcategoria = Subcategoria::findOrfail($id);
        return view('subcategoria.show',compact('title','subcategoria'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - subcategoria';
        if($request->ajax())
        {
            return URL::to('subcategoria/'. $id . '/edit');
        }

        
        $subcategoria = Subcategoria::findOrfail($id);
        $categorias = Categoria::where('activo', '=', '1')->orderBy('nombre', 'asc')->get();
        return view('subcategoria.edit',compact('title','subcategoria','categorias'  ));
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
        $subcategoria = Subcategoria::findOrfail($id);
    	
        if ($request->hasFile('img')) {
            
            $directorio=  '/img/subcategorias/';
        
            $file = $request->file('img');
            $extension = '.' . substr(strchr($file->getClientOriginalName(),'.'),1);
            $imgname = 'img_' . $subcategoria->id . $extension;
            $nombreimagen = $directorio . $imgname; 
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

        $subcategoria->img = $imgname;
        }

        $subcategoria->idCategoria = $request->idCategoria;
        
        $subcategoria->nombre = $request->nombre;
        
        
        $subcategoria->save();

        return redirect('subcategoria');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/subcategoria/'. $id . '/delete');

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
     	$subcategoria = Subcategoria::findOrfail($id);
     	$subcategoria->activo = 0;
        $recursossubcategorias = $subcategoria->recursosubcategorias;
      
        foreach ($recursossubcategorias as $rec){
            $rec->delete();
        }
        $directorio= '/img/subcategorias/';
        $Imagen = $directorio . $subcategoria->img;

        if(\Storage::disk('local')->has($Imagen)){
            \Storage::disk('local')->delete($Imagen);
        }
        $subcategoria->save();
        return URL::to('subcategoria');
    }
}
