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
        $search = \Request::get('search');

        $paginate = \Request::get('rows');
        if ($paginate=="") {
            $paginate = 6;
        }
        if ($search=="") {

            $recursos = Recurso::where('activo', '=', '1')->paginate($paginate);
        }else {
                $recursos = Recurso::where('activo', '=', '1')
                                    ->where( function ($query ) use ($search){
                                            $query->where('titulo', 'like', '%' . $search . '%')
                                                    ->orWhere('descripcion', 'like', '%' . $search . '%');
            })->paginate(1000);
        }
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
        //return \View::make('fo.categorias');
        $recursos = Recurso::all();
        foreach($recursos as $recurso){
            $recurso->fechaPosteo = $this->formatFecha($recurso->fechaPost);
        }

        return view('fo.tablon_recursos', compact('recursos'));
    }
    
    /**
     * Formatea la fecha para que se muestre como queremos
     *
     * @return  $recurso->fecha
     */
    public function formatFecha($fechaPosteo)
    {
        $fecha = explode('-', $fechaPosteo);
        switch($fecha[1]){
            case '01' : $fecha[1] = 'January';break;
            case '02' : $fecha[1] = 'February';break;
            case '03' : $fecha[1] = 'March';break;
            case '04' : $fecha[1] = 'April';break;
            case '05' : $fecha[1] = 'May';break;
            case '06' : $fecha[1] = 'June';break;
            case '07' : $fecha[1] = 'July';break;
            case '08' : $fecha[1] = 'August';break;
            case '09' : $fecha[1] = 'September';break;
            case '10' : $fecha[1] = 'October';break;
            case '11' : $fecha[1] = 'November';break;
            case '12' : $fecha[1] = 'December';break;
        }
        return $fechaFormat = $fecha[1] . ' ' . $fecha[2] . ', ' . $fecha[0];
    }
    
    /**
     * Nos muestra un post/recurso
     *
     * @return  recursos/id
     */
    public function showRecurso($id)
    {
        $recurso = Recurso::find($id);
        $recurso->fechaPosteo = $this->formatFecha($recurso->fechaPost);

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
        $entidades = $this->getEntidadOrganizativas();
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


        if ($request->hasFile('imgen')) {
            echo "<script>alert('Hay imagen')</script>";
            $file = $request->file('imgen');
            $nombreimagen = '/img/recursos/' . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));


            $recurso->img = $nombreimagen;
        }


        $recurso->fechaPost = $request->fechaPost;


        $recurso->fechaInicio = $request->fechaInicio;


        $recurso->fechaFin = $request->fechaFin;


        $recurso->rangoEdad = $request->rangoEdad;


        $recurso->relevancia = $request->relevancia;


        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;



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

        return redirect('recurso');
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
        $entidades = $this->getEntidadOrganizativas();

        $recurso = Recurso::findOrfail($id);

        $tags = Recursotag::findTagsInRecurs($id);

        $subcategorias = Subcategoria::all();
        $recursoSubcategorias = $recurso->recursosubcategorias;
        $ficheros = Fichero::all();

        return view('recurso.edit', compact('title', 'recurso', 'entidades', 'tags', 'subcategorias', 'ficheros', 'recursoSubcategorias'));
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
        $subcategoria = Recursossubcategoria::findOrfail($subcat[0]->id);
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
        if ($request->hasFile('imgen')) {
            echo "<script>alert('Hay imagen')</script>";
            $file = $request->file('imgen');
            $nombreimagen = '/img/recursos/' . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));


            $recurso->img = $nombreimagen;
        }
        $recurso->fechaPost = $request->fechaPost;

        $recurso->fechaInicio = $request->fechaInicio;

        $recurso->fechaFin = $request->fechaFin;

        $recurso->rangoEdad = $request->rangoEdad;

        $recurso->relevancia = $request->relevancia;

        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;

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
