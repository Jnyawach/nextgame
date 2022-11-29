<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function clearComplete(){
        // $complete=Todo::where('status','complete')->delete();
        $tasks=Todo::select(['id','name','status'])->latest()->get();

        return response()->json([
            'message' => 'To do deleted successfully',
            'tasks'=>$tasks
        ],200);

    }
}
