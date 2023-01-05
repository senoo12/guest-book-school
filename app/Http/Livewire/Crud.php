<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guest;

class Crud extends Component
{
    public $guests, $nama, $kategori, $pihak_dituju, $keperluan, $guest_id;
    public $message = '';
    public $isModalOpen = false;
    public $updateGuest = false;
    public function render()
    {
        $this->guests = Guest::all();
        return view('livewire.index');
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm()
    {
        $this->nama = '';
        $this->kategori = '';
        $this->pihak_dituju = '';
        $this->keperluan = '';
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'pihak_dituju' => 'required',
            'keperluan' => 'required',
        ]);

        Guest::updateOrCreate(['id' => $this->guest_id], [
            'nama' => $this->nama,
            'kategori' => $this->kategori,
            'pihak_dituju' => $this->pihak_dituju,
            'keperluan' => $this->keperluan,
        ]);
        session()->flash('message', $this->guest_id ? 'Guest updated.' : 'Guest created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        $this->guest_id = $id;
        $this->nama = $guest->nama;
        $this->kategori = $guest->kategori;
        $this->pihak_dituju = $guest->pihak_dituju;
        $this->keperluan = $guest->keperluan;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Guest::find($id)->delete();
        session()->flash('message', 'Guest Deleted');
    }
}
