<?php

namespace App\Http\Livewire;

use App\Models\Rw;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Kasus;
use Livewire\Component;

class rwlive extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = null)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        if (!is_null($selectedKelurahan)) {
            $kelurahan = Kelurahan::with('kecamatan.kota.provinsi')->find($selectedKelurahan);

            if ($kelurahan) {
                $this->kelurahan = Kelurahan::where('id_kecamatan', $kelurahan->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $kelurahan->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->selectedKelurahan = $kelurahan->id_kecamatan;
                $this->selectedKecamatan = $kelurahan->kecamatan->id_kota;
                $this->selectedKota = $kelurahan->kecamatan->kota->id_provinsi;
            }
        }
    }

    public function render()
    {
        return view('livewire.rw');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKota = NULL;
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
    }
     public function updatedSelectedKecamatan($kecamatan)
    {
        if (!is_null($kecamatan)) {
            $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        }else{
            $this->selectedKelurahan = NULL;
        }
    }
}