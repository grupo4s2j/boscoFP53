<?php

namespace App\Http\Controllers;

use App\Entidadorganizativa;
use App\Tag;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;
use App\Recursotag;

use Amranidev\Ajaxis\Ajaxis;
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
        $title = 'Index - recurso';
        $recursos = Recurso::paginate(6);

        return view('recurso.index', compact('recursos', 'title'));
    }

    public function indexFront()
    {
        //return \View::make('fo.categorias');

        return view('fo.recursos');
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


        $recurso->img = $request->img;


        $recurso->fechaPost = $request->fechaPost;


        $recurso->fechaInicio = $request->fechaInicio;


        $recurso->fechaFin = $request->fechaFin;


        $recurso->rangoEdad = $request->rangoEdad;


        $recurso->relevancia = $request->relevancia;


        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;


        $recurso->activo = $request->activo;


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

        return view('recurso.edit', compact('title', 'recurso', 'entidades', 'tags'));
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

        $recurso->img = "img/recurs/" . $request->img;

        $recurso->fechaPost = $request->fechaPost;

        $recurso->fechaInicio = $request->fechaInicio;

        $recurso->fechaFin = $request->fechaFin;

        $recurso->rangoEdad = $request->rangoEdad;

        $recurso->relevancia = $request->relevancia;

        $recurso->idEntidadOrganizativa = $request->idEntidadOrganizativa;

        $recurso->activo = $request->activo;

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
        $recurso->delete();
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
