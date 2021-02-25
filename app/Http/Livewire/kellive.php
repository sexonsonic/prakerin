<?php

namespace App\Http\Livewire;

use App\Models\Rw;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Kasus;
use Livewire\Component;

class kellive extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;

    public function mount($selectedKecamatan = null)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->selectedKecamatan = $selectedKecamatan;

        if (!is_null($selectedKecamatan)) {
            $kecamatan = Kecamatan::with('kota.provinsi')->find($selectedKecamatan);
            
            if ($kecamatan) {
                $this->kecamatan = Kecamatan::where('id_kota', $kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $kecamatan->kota->id_provinsi)->get();
                $this->selectedKecamatan = $kecamatan->id_kota;
                $this->updatedSelectedKota = $kecamatan->kota->id_provinsi;
            }
        }
    }

    public function render()
    {
        return view('livewire.kelurahan');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKota = NULL;
        $this->selectedKecamatan = NULL;
    }
    public function updatedSelectedKota($kota)
    {
        if (!is_null($kota)) {
            $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        }else{
            $this->selectedKecamatan = NULL;
        }
    }
}