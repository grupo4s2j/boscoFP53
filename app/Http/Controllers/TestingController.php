<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Recurso;
use Carbon\Carbon;

class TestingController extends Controller
{
    public function queries($id)
    {
        switch ($id) {
            case 0: $this->queryRecursos();break;
            case 1: ;break;
            case 2: ;break;
        }
    }  
    
    public function queryRecursos()
    {
        $recursos = Recurso::where('activo', 1)
                    ->where('fechaPost', '<=', Carbon::now('Europe/London')->format('Y-m-d H:i:s'))
                    ->orderBy('fechaPost', 'desc')
                    ->paginate(4);
        
        dd($recursos);
    }
}
