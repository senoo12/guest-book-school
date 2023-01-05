<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class Tampilan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guests.index');
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
        Guest::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'pihak_dituju' => $request->pihak_dituju,
            'keperluan' => $request->keperluan
        ]);

        return redirect()->route('guests.index');
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
    public function edit(Guest $guest)
    {
        return view('livewire.edit', compact('guest'));
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

        return redirect()->route('dashboard');
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

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
