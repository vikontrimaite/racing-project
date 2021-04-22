<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horses.index', ['horses' => Horse::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $horse = new Horse();

        $this->validate($request, [
            'name' => 'required| max: 20',
            'runs' => 'required|gte: 0',
            'wins' => 'required|gte: 0',
            'about' => 'required'
        ]);

        // 'wins' => 'required|gte: 0|max:' . $horse->runs  . '',

        // if ($horse->wins > $horse->runs){ 
        //     return back()->withErrors(['error' => ['Laimėtų rungtynių skaičius negali būti įvestas didesnis nei dalyvautų']]);
        // }

        // if ($request->runs < $request->wins) {
        //     return redirect()->route('horse.create')->with('status_error', 'Horse addition failed. Number of runs cannot be greater than number of wins.');
        // }

         $horse->fill($request->all());
         $horse->save();

        
        return redirect()->route('horse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horses.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        $this->validate($request, [
            'name' => 'required|max: 20',
            'runs' => 'required|gte:0',
            'wins' => 'required|gte:0',
            'about' => 'required'
        ]);

        if ($request->runs < $request->wins) {
            return redirect()->route('horse.create')->with('status_error', 'Horse addition failed. Number of runs cannot be greater than number of wins.');
        }

        $horse->fill($request->all());
        $horse->save();
        return redirect()->route('horse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if (count($horse->betters) !== 0){ 
            return back()->withErrors(['error' => ['Negalima ištrinti arklio su priskirtais lažybininkais. Pirma prašome ištrinti lažybinkus, kurie turi tam priskirtą arklį']]);
        }

        $horse->delete();
        return redirect()->route('horse.index');
    }
}
