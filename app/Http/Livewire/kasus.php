<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\RW;
use App\Models\Kasus2;


class kasus extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $idT;
    public $idRw;
    public $cek1 = NULL;

    public $pprovinsi = NULL;
    public $pkota = NULL;
    public $pkecamatan = NULL;
    public $pkelurahan = NULL;
    public $prw = NULL;

    public function mount($idt = NULL,$idrw = NULL, $cek = NULL)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();

        if(!is_null($idt)){
            $kasus2 = Kasus2::findOrFail($idt);
            
        }
        if (!is_null($idrw)) {
            $rw = RW::with('kelurahan.kecamatan.kota.provinsi')->find($idrw);
        
            if($rw){
                $this->rw = RW::where('id_kelurahan', $rw->id_kelurahan)->get();
                $this->kelurahan = Kelurahan::where('id_kecamatan', $rw->kelurahan->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->kelurahan->kecamatan->kota->id_provinsi)->get();

                $this->pprovinsi = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->pkota = $rw->kelurahan->kecamatan->id_kota;
                $this->pkecamatan = $rw->kelurahan->id_kecamatan;
                $this->pkelurahan = $rw->id_kelurahan;
                $this->prw = $rw->id;
                if ($cek == 1) {
                    $this->cek1 = $cek;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.kasus');

        
    }

    public function updatedpprovinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->pkota = NULL;
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkecamatan($kecamatan)
    {
        $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkelurahan($kelurahan)
    {
        $this->rw = RW::where('id_kelurahan', $kelurahan)->get();
        $this->prw = NULL;
    }


}