<?php

namespace App\Http\Controllers;

use App\Models\Better;
use Illuminate\Http\Request;

class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->horse_id) && $request->horse_id !== 0)
        $betters = \App\Models\Better::where('horse_id', $request->horse_id)->orderBy('name')->get();
    else
        $betters = \App\Models\Better::orderBy('name')->get();
        
        $horses = \App\Models\Horse::orderBy('name')->get();
        return view('betters.index', ['betters' => $betters, 'horses' => $horses]);

        // return view('betters.index', ['betters'=> Better::orderBy('bet')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses=\App\Models\Horse::orderBy('name')->get();
        return view('betters.create', ['horses'=> $horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max: 20',
            'surname' => 'required|max: 20',
            'bet' => 'required|gte: 0'
        ]);

        $better=new better();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $better->fill($request->all());
        $better->save();
        return redirect()->route('better.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        $horses=\App\Models\Horse::orderBy('name')->get();
        return view('betters.edit', ['better'=> $better, 'horses'=> $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $this->validate($request, [
            'name' => 'required|max: 20',
            'surname' => 'required|max: 20',
            'bet' => 'required|gte: 0'
        ]);

        $better->fill($request->all());
        $better->save();
        return redirect()->route('better.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
        return redirect()->route('better.index');
    }
}
