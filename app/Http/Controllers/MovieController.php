<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('name')->get();

        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $movie = Movie::create(
        //     [
        //         "name" => $request->get('name')
        //     ]
        // );   ovo je jedan nacin da kreiramo film

        // ovo je drugi nacin kreiranja
        // $movie = new Movie();
        // $movie->name = $request->get('name');
        // $movie->save(); 
        $validation = $request->validate(
            [
                'name' => 'required'
            ]
        );

        $movie = Movie::create($request->all());
        return redirect()->route('movies.index');
    }


    public function show(int $id)
    {

        // $movie = Movie::findOrFail($id);
        // $actors = $movie->actors;

        // return view('movies.show', [
        //     'movie'=> $movie,
        //     'actors'=>$actors
        // ]);
        $movie = Movie::with('actors')->findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', ['movie' => $movie]);
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

        $file = $request->file('photo');
        $fileName = $file->getClientOriginalName();
        if (Storage::exists('movies/' . $fileName)) { 
            $parts = explode('.', $fileName);
            $extension = array_pop($parts);
            $fileWithoutExtension = implode($parts);
            $fileName = $fileWithoutExtension . Carbon::now()->timestamp . '.' . $extension;

           
        }
       
        $file->storeAs('movies', $fileName);
        // Storage::putFile('movies',$file); ovo ili ovo gore je isto
        $movie = Movie::find($id);
        // $movie->name = $request->name;
        // $movie->save();
        $movie->update(
            array_merge($request->all(), ['photo'=>$fileName])
        );
        return redirect()->route('movies.show', $id)->with('msg', 'uspjesna izmjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('msg', 'Uspjesno obrisano');
    }
}
