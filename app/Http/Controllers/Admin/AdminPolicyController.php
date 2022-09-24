<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class AdminPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $policies=Policy::all();
        return  view('admin.policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('admin.policies.create');
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
        $validate=$request->validate([
            'category'=>'required',
            'status'=>'required|max:3',
            'text'=>'required'
        ]);
        $policy=Policy::create([
            'category'=>$validate['category'],
            'status'=>$validate['status'],
            'text'=>$validate['text'],
        ]);
        return redirect('admin/policies')->with('status','Policy created successfully');
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
        $policy=Policy::findOrfail($id);
        return view('admin.policies.show', compact('policy'));
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
        $policy=Policy::findOrFail($id);
        return  view('admin.policies.edit', compact('policy'));
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
        $policy=Policy::findOrFail($id);
        $validate=$request->validate([
            'category'=>'required',
            'status'=>'required|max:3',
            'text'=>'required'
        ]);
        $policy->update([
            'category'=>$validate['category'],
            'status'=>$validate['status'],
            'text'=>$validate['text'],
        ]);
        return redirect('admin/policies')->with('status','Policy updated');
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
        $policy=Policy::findOrFail($id);
        $policy->delete();
        return redirect('admin/policies')
            ->with('status','Policy deleted');
    }
}
