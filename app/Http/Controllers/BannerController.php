<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class BannerController.
 *
 */
class BannerController extends Controller
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

            $banners = Banner::where('activo', '=', '1')->paginate($paginate);
        }else {
            $banners = Banner::where('url', 'like', '%' . $search . '%')->where('activo', '=', '1')
                ->paginate(1000);
        }
        $title = 'Index - Banner';

        return view('banner.index', compact('banners', 'title'));
    }

    public function indexFront()
    {
        $banners = \App\Categoria::all();

        return view('fo.banner', compact('banners'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - banner';

        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();


        if ($request->hasFile('img')) {
           
           
            $directorio=  '/img/banner/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

            $banner->img = $file->getClientOriginalName();
        }


        $banner->url = $request->url;
        

        $banner->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
            'test-event',
            ['message' => 'A new banner has been created !!']);

        return redirect('banner');
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
        $title = 'Show - banner';

        if ($request->ajax()) {
            return URL::to('banner/' . $id);
        }

        $banner = Banner::findOrfail($id);
        return view('banner.show', compact('title', 'banner'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - banner';
        if ($request->ajax()) {
            return URL::to('banner/' . $id . '/edit');
        }


        $banner = Banner::findOrfail($id);
        return view('banner.edit', compact('title', 'banner'));
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
        $banner = Banner::findOrfail($id);

       if ($request->hasFile('img')) {
           
             
            $directorio=  '/img/banner/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

            $banner->img = $file->getClientOriginalName();
        }

        $banner->url = $request->url;

        $banner->save();

        return redirect('banner');
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
        $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/banner/' . $id . '/delete');

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
        $banner = Banner::findOrfail($id);
        $banner->activo = 0;
        $banner->save();
        return URL::to('banner');
    }
}
