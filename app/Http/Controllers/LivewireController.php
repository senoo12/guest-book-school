<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class LivewireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = Guest::all();
        return view('livewire.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create post
        Guest::create([
            'nama'     => $request->nama,
            'kategori'     => $request->kategori,
            'pihak_dituju'   => $request->pihak_dituju,
            'keperluan' => $request->keperluan
        ]);

        //redirect to index
        return redirect()->route('livewire.index');
    }

    public function edit(Guest $guest)
    {
        return view('livewire.edit', compact('guests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'pihak_dituju' => 'required',
            'keperluan' => 'required'
        ]);

        $guest->update($request->all());

        return redirect()->route('livewire.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('livewire.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
