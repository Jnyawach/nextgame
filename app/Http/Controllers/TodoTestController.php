<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Database\Seeders\TodoSeeder;
use Illuminate\Http\Request;

class TodoTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks=Todo::query()
        ->when(request('sort'),function ($query,$sort){
            $query->where('status',$sort);
        })
            ->select(['id','name','status','order'])->orderBy('order')->get();
        $sort=request()->only('sort');
        return response()->json([
            'tasks'=>$tasks,
            'sort'=>$sort
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'status'=>'required|string|max:255'
        ]);
        $todo=Todo::create([
            'name'=>$validated['name'],
            'status'=>$validated['status']
        ]);

        $todo->update(['order'=>$todo->id]);
        $tasks=Todo::select(['id','name','status','order'])->orderBy('order')->get();
        return response()->json([
            'message' => 'To do list added successfully',
            'todo'=>$todo,
            'tasks'=>$tasks
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $todo=Todo::findOrfail($id);
        if($todo->status=='complete'){
            $todo->update(['status'=>'active']);
        }else{
            $todo->update(['status'=>'complete']);
        }

        $tasks=Todo::select(['id','name','status','order'])->orderBy('order')->get();

        return response()->json([
            'message' => 'To do deleted successfully',
            'tasks'=>$tasks
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $todo=Todo::findOrFail($id);
         $todo->delete();
         $tasks=Todo::select(['id','name','status','order'])->orderBy('order')->get();
        return response()->json([
            'message' => 'To do deleted successfully',
            'tasks'=>$tasks
        ],200);

    }

    public function clearComplete(){
        $complete=Todo::where('status','complete')->delete();
        $tasks=Todo::select(['id','name','status','order'])->orderBy('order')->get();

        return response()->json([
            'message' => 'To do deleted successfully',
            'tasks'=>$tasks
        ],200);

    }


    public  function updateAll(Request $request){
        $todos=Todo::all();
        foreach ($todos as $todo){
            $id=$todo->id;
            foreach ($request->tasks as $task){
                if ($task['id']==$id){
                    $todo->update(['order'=>$task['order']]);
                }
            }
        }
        return response('Update Successful.', 200);
    }



}
