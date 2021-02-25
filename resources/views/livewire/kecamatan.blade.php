<div>
    <div class="form-group">
        <div>
            <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control select2">
                <option value="" selected>--Pilih Provinsi--</option>
                @foreach ($provinsi as $provinsis)
                    <option value="{{ $provinsis->id }}">{{ $provinsis->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div>
            @if (!is_null($selectedProvinsi))
                <label for="kota">Kota</label>
                <select wire:model="selectedKota" class="form-control select2" name="id_kota">
                    <option value="" selected>--Pilih Kota--</option>
                    @foreach ($kota as $kotas)
                        <option value="{{ $kotas->id }}">{{ $kotas->nama_kota }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
