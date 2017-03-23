<?php

namespace App\Http\Controllers;

use App\Entidadorganizativa;
use App\Fichero;
use App\Recursossubcategoria;
use App\Subcategoria;
use App\Tag;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;
use App\Recursotag;

use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use URL;
use Carbon\Carbon;
use App\Notifications;
use Thujohn\Twitter\Facades;
use Collective\Html;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
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
        $recursos = Recurso::where('recursos.activo', '=', '1')->orderBy('titulo','asc')
            -> join('entidadorganizativas', 'recursos.idEntidadOrganizativa', '=', 'entidadorganizativas.id')
            ->select('recursos.*','entidadorganizativas.nombre')->get();
        $title = 'Index - Recurso';

        return view('recurso.index', compact('recursos', 'title'));
    }
    /**
     * Mustra un tablón con todos los posts/recursos
     *
     * @return  \Illuminate\Http\Response
     */
    public function indexFront()
    {        
        if (\Cookie::get('tsfi_role') !== null){
            $tsfi_role = \Cookie::get('tsfi_role');
            if($tsfi_role == 'profesor'){
                $rol = 2;
            }
            elseif($tsfi_role == 'alumno'){
                $rol = 1;
            }
        }
        
        $recursos = Recurso::where('activo', 1)
                    ->where('fechaPost', '<=', Carbon::now()->format('Y-m-d'))
                    ->where(function ($query) use ($rol) {
                        $query->where('rol', '=', 0)
                              ->orWhere('rol', '=', $rol);
                    })
                    ->orderBy('fechaPost', 'desc')
                    ->get();
        
        foreach($recursos as $recurso){
            $recurso->fechaPosteo = Recurso::formatFecha($recurso->fechaPost);
        }

        return view('fo.tablon_recursos', compact('recursos'));
    }
    
    /**
     * Nos muestra un post/recurso
     *
     * @return  recursos\id
     */
    public function showRecurso($id)
    {
        $recurso = Recurso::find($id);
        $recurso->fechaPosteo = Recurso::formatFecha($recurso->fechaPost);

        return view('fo.recurso_post', compact('recurso'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - recurso';
        $entidades = Entidadorganizativa::where('activo', '=', '1')->orderBy('nombre', 'asc')->get();
        return view('recurso.create', compact('entidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recurso = new Recurso();


        $recurso->titulo = $request->titulo;


        $recurso->descripcion = $request->descripcion;


        $recurso->contenido = $request->contenido;


        if ($request->hasFile('img')) {
           
            $directorio=  '/img/recursos/';
            if( !file_exists($directorio) ){
                //mkdir($directorio, 077, true);
                //Controlar excepcion
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));

            $recurso->img = $file->getClientOriginalName();
        }


        $recurso->fechaPost = $request->fechaPost;


        $recurso->fechaInicio = $request->fechaInicio;


        $recurso->fechaFin = $request->fechaFin;


        $recurso->rangoEdad = $request->rangoEdad;


        $recurso->relevancia = $request->relevancia;


        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;
        
        $recurso->alumno = $request->alumno;

        $recurso->profesor = $request->profesor;
        
        if($request->alumno == 1 && $request->profesor == 1) $rol = 0;
        if($request->alumno == 1 && $request->profesor == 0) $rol = 1;
        if($request->alumno == 0 && $request->profesor == 1) $rol = 2;
        
        $recurso->rol = $rol;

        

        $recurso->save();


        foreach ($request->tag_list as $tag) {
            $ptag = Tag::searchTag($tag, 1);
            $p = $ptag . hasItems();
            if ($p == "[]()") {
                $newTag = new Tag();
                $newTag->nombre = $tag;
                $newTag->usado = 1;
                $newTag->save();

                $newRecTag = new Recursotag();
                $newRecTag->idTag = $newTag->id;
                $newRecTag->idRecursos = $recurso->id;
                $newRecTag->activo = 1;
                $newRecTag->save();
            } else {
                $tag = Tag::findOrfail($ptag[0]->id);
                $tag->usado = $tag->usado + 1;
                $tag->save();

                $newRecTag = new Recursotag();
                $newRecTag->idTag = $ptag[0]->id;
                $newRecTag->idRecursos = $recurso->id;
                $newRecTag->activo = 1;
                $newRecTag->save();

            }
        }


        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
            'test-event',
            ['message' => 'A new recurso has been created !!']);
        $Recurso= Recurso::orderBy('id', 'desc')->first();
        $link = URL::to('/recursos/' . $Recurso->id);
        $Tweet = $request->titulo . "\n" . $link;
        $Imagen = \Twitter::uploadMedia(['media' => \File::get(public_path($nombreimagen))]);
        \Twitter::postTweet(['status' => $Tweet, 'media_ids' => $Imagen->media_id_string, 'format' => 'json']);

        $title = 'Edit - Recurso';
        $entidades = Entidadorganizativa::where('activo', '=', '1')->orderBy('nombre', 'asc')->get();
        $tags =  Recursotag::findTagsInRecurs($recurso->id);
        $subcategorias = Subcategoria::orderBy('nombre', 'asc')->get();
        $ficheros = $recurso->ficheros;

        $profesor = 0;
        $alumno = 0;
        if($recurso->rol == 2 || $recurso->rol == 0){ $profesor = 1; }
        if($recurso->rol == 1 || $recurso->rol == 0){ $alumno = 1; }
        $recursoSubcategorias = $recurso->subcategorias;
        return view ('recurso.edit', compact('title', 'recurso', 'entidades', 'tags', 'subcategorias', 'ficheros', 'recursoSubcategorias', 'profesor', 'alumno'));
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $title = 'Show - recurso';

        if ($request->ajax()) {
            return URL::to('recurso/' . $id);
        }

        $recurso = Recurso::findOrfail($id);
        return view('recurso.show', compact('title', 'recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - recurso';
        if ($request->ajax()) {
            return URL::to('recurso/' . $id . '/edit');
        }
        $entidades = Entidadorganizativa::where('activo', '=', '1')->orderBy('nombre', 'asc')->get();

        $recurso = Recurso::findOrfail($id);

        $tags = Recursotag::findTagsInRecurs($id);

        $subcategorias = Subcategoria::orderBy('nombre', 'asc')->get();
        $recursoSubcategorias = $recurso->subcategorias;
        $ficheros = Fichero::all();
        
        $profesor = 0;
        $alumno = 0;
        if($recurso->rol == 2 || $recurso->rol == 0){ $profesor = 1; }
        if($recurso->rol == 1 || $recurso->rol == 0){ $alumno = 1; }
        return view('recurso.edit', compact('title', 'recurso', 'entidades', 'tags', 'subcategorias', 'ficheros', 'recursoSubcategorias', 'profesor', 'alumno'));
    }


    public function addSubcategoria(Request $request)
    {
        //$user = \App\User::findOrfail($request->user_id);
        //$user->assignRole($request->role_name);
        $recsub = new Recursossubcategoria();
        $recsub->IdRecursos = $request->idRecursos;
        $recsub->IdSubCategorias = $request->subcategoria_id;
        $recsub->save();
        return redirect('recurso/' . $request->idRecursos . '/edit/');
    }

    public function removeSubcategoria($idsub, $idrec)
    {
//        $idsub = preg_replace('/\d/', '', $idsub);
//        $idrec = preg_replace('/\d/', '', $idrec);
        $subcat = DB::table('recursossubcategorias')
            ->select('recursossubcategorias.id')
            ->join('subcategorias', 'recursossubcategorias.idSubcategorias', '=', 'subcategorias.id')
            ->join('recursos', 'recursos.id', '=', 'recursossubcategorias.idRecursos')
            ->where('recursossubcategorias.idSubcategorias', '=', $idsub)
            ->where('recursossubcategorias.idRecursos', '=', $idrec)
            ->get();
        $subcategoria = Recursossubcategoria::findOrf.ail($subcat[0]->id);
        $subcategoria->delete();
        return redirect('recurso/' . $idrec . '/edit/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $recurso = Recurso::findOrfail($id);

        $recurso->titulo = $request->titulo;

        $recurso->descripcion = $request->descripcion;

        $recurso->contenido = $request->contenido;
        if ($request->hasFile('img')) {
             
            $directorio= '/img/recursos/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));


            $recurso->img = $file->getClientOriginalName();
        }
        $recurso->fechaPost = $request->fechaPost;

        $recurso->fechaInicio = $request->fechaInicio;

        $recurso->fechaFin = $request->fechaFin;

        $recurso->rangoEdad = $request->rangoEdad;

        $recurso->relevancia = $request->relevancia;

        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;

        $recurso->alumno = $request->alumno;

        $recurso->profesor = $request->profesor;
        
        if($request->alumno == 1 && $request->profesor == 1) $rol = 0;
        if($request->alumno == 1 && $request->profesor == 0) $rol = 1;
        if($request->alumno == 0 && $request->profesor == 1) $rol = 2;
        
        $recurso->rol = $rol;

        /* $img=$request->file('img');
         $name_img=$request->img;
         $img->move('/img/recur/',$name_img);
 */
        //\Storage::disk('recurs')->put($name_img,\File::get($img));

        $recurso->save();
        //Falta que no elimine siempre para no resetear los contadores
        $ptags = Recursotag::findTagsInRecurs($id);
        foreach ($ptags as $ptag) {
            $pid = $ptag->idrs;

            Recursotag::destroy($pid);

        }

        if(isset($request->tag_list)){
            //TODO: Delete this to count tags on TagController with count(*)
            foreach ($request->tag_list as $tag) {
                $ptag = Tag::searchTag($tag, 1);
                $p = $ptag . hasItems();
                if ($p == "[]()") {
                    $newTag = new Tag();
                    $newTag->nombre = $tag;
                    $newTag->usado = 1;
                    $newTag->save();

                    $newRecTag = new Recursotag();
                    $newRecTag->idTag = $newTag->id;
                    $newRecTag->idRecursos = $recurso->id;
                    $newRecTag->activo = 1;
                    $newRecTag->save();
                } else {
                    $tag = Tag::findOrfail($ptag[0]->id);
                    $tag->usado = $tag->usado + 1;
                    $tag->save();

                    $newRecTag = new Recursotag();
                    $newRecTag->idTag = $ptag[0]->id;
                    $newRecTag->idRecursos = $recurso->id;
                    $newRecTag->activo = 1;
                    $newRecTag->save();
                }
        }
        
        }
        return redirect('recurso');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     *
     * @param    \Illuminate\Http\Request $request
     * @return  String
     */
    public function DeleteMsg($id, Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/recurso/' . $id . '/delete');

        if ($request->ajax()) {
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
        $recurso->activo = 0;
        $recursossubcategorias = $recurso->recursosubcategorias;
      
        foreach ($recursossubcategorias as $rec){
            $rec->delete();
        }

        $recurso->save();
        return URL::to('recurso');
    }

    /**
     * get all Entidades organizativas
     */
    public function getEntidadOrganizativas()
    {
        $entdades = Entidadorganizativa::all();
        return $entdades;
    }
}
