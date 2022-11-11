<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Brewerie;
use App\Models\User;
use App\Models\Beer;
use App\Http\Requests\BrewerieRequest;
use Illuminate\Support\Facades\Auth;

class BrewerieController extends Controller{

    public function index (){
        $breweries = Brewerie::orderByDesc('created_at')->paginate(12);
        return view('breweries.index', ['breweries' => $breweries]);
    }

    public function proposals (User $user){
        $breweries = Brewerie::whereBelongsTo($user)->paginate(12);
        $filter = $user->name;
        return view('breweries.index', compact('breweries', 'filter'));
    }

    public function breweriebeers (Beer $beer){

        $breweries = Brewerie::whereHas('beers', function($q) use ($beer){
            $q->where ('beer_id', $beer->id);
        })->paginate(12);
        $filter = $beer->name;
        return view('breweries.index', compact('breweries', 'filter'));
    }

    public function create() {
        $beers = Beer::all();
        return view ('breweries.create', compact ('beers'));
    }

    public function store(BrewerieRequest $request) {
        $img = Storage::url ($request->file('img')->store('public/breweries'));
        //$name = $request->name;
        //Lo valido
        $brewerie = Brewerie::create ([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'url' => $img
        ]);
        $beers = $request->get('beers');
        $brewerie->beers()->attach($beers);

        $brewerie->saveOrFail();

        return redirect()->route('breweriehome')->with ('success', 'Los datos de la cervecería han sido enviados.');

    }

    public function show($id) {
        $objBrewerie = Brewerie::findOrFail($id);
        return view('breweries.brewerie', ['brewerie' => $objBrewerie]);
    }

    public function edit(Brewerie $brewerie) {
        $beers = Beer::all();
        return view('breweries.edit', compact('brewerie', 'beers'));
    }

    public function update(BrewerieRequest $request, Brewerie $brewerie){
        $brewerie->fill($request->validated());
        $img = Storage::url ($request->file('img')->store('public/breweries'));
        $brewerie->url = $img;

        $beers = $request->get('beers');
        $brewerie->beers()->sync($beers);

        $brewerie->saveOrFail();
        return redirect()->route('breweriehome')->with ('success', 'Hemos guardado corectamente la cervecería.');
    }

    public function destroy (Brewerie $brewerie){
        $brewerie->beers()->detach();
        $brewerie->delete();

        return redirect()->route ('breweriehome')->with('success','Cervecería eliminada correctamente');
    }

    public function friendly ($name){
        $brewerie = Brewerie::where ('name', $name)->firstOrFail();
        return view ('breweries.brewerie', compact ('brewerie'));
    }

    public function login(){
        return view ('breweries.index', [
            'texto' => 'Usuario no autenticado',
            'breweries' => $this->breweries
        ]);
    }
}
