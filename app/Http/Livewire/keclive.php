<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;


class keclive extends Component
{
    public $provinsi;
    public $kota;

    public $selectedProvinsi = null;
    public $selectedKota = null;

    public function mount($selectedKota = null)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->selectedKota = $selectedKota;

        if (!is_null($selectedKota)) {
            $kota = Kota::with('provinsi')->find($selectedKota);
            if ($kota) {
                $this->kota = Kota::where('id_provinsi', $kota->id_provinsi)->get();
                $this->selectedKota = $kota->id_provinsi;
            }
        }
    }

    public function render()
    {
        return view('livewire.kecamatan');
    }

    // public function updateSelectedProvinsi($provinsi)
    // {
    //     $this->kota = Kota::where('id_provinsi', $kota)->get();
    //     $this->selectedKota = NULL;
    // }

    public function updatedSelectedProvinsi($provinsi)
    {
        if (!is_null($provinsi)) {
            $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        }else{
            $this->selected = NULL;
        }
    }
}