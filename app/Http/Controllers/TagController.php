<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

use App\Tag;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use DB;


/**
 * Class TagController.
 *
 */
class TagController extends Controller
{
    /**
     * Buscador de Tags
     *
     * @return  los tags
     */
    public function find2(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            /*$data = DB::table("tags")
            		->select("id","nombre")
            		->where('nombre','LIKE',"%$search%")
            		->get();
            */
            $data = Tag::select("id","nombre")
            		->where('nombre','LIKE',"%$search%")
            		->get();
        }

        return response()->json($data);
    }
    
    /**
     * Buscador de Tags
     *
     * @return  los tags
     */
    public function search(Request $request)
    {

        /*if($request->has('tags')){
            $search = $request->tags;
        }

        return view('fo.search',compact('search'));*/
        $input = Request::all();
        
        return $input;
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - tag';
        $tags = Tag::paginate(6);
        return view('tag.index',compact('tags','title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * NO FUNCIONA
     */
    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Tag::searchTag("%".$term."%",5);
            //Tag::searchTag("%".$term."%",5);
            //Tag::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->nombre, 'text' => $tag->nombre];
        }

        return \Response::json($formatted_tags);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - tag';
        
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();

        
        $tag->nombre = $request->nombre;

        
        $tag->usado = $request->usado;

        
        
        $tag->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new tag has been created !!']);

        return redirect('tag');
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
        $title = 'Show - tag';

        if($request->ajax())
        {
            return URL::to('tag/'.$id);
        }

        $tag = Tag::findOrfail($id);
        return view('tag.show',compact('title','tag'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - tag';
        if($request->ajax())
        {
            return URL::to('tag/'. $id . '/edit');
        }

        
        $tag = Tag::findOrfail($id);
        return view('tag.edit',compact('title','tag'  ));
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
        $tag = Tag::findOrfail($id);
    	
        $tag->nombre = $request->nombre;
        
        $tag->usado = $request->usado;
        
        
        $tag->save();

        return redirect('tag');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/tag/'. $id . '/delete');

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
     	$tag = Tag::findOrfail($id);
     	$tag->delete();
        return URL::to('tag');
    }
}
