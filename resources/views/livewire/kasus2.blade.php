<div class="form-group">
    <div class ="m-auto">
        <div class="mb-8 form-group">
            <label class="inline-block w-32 font-bold mr-5">provinsi : </label><br>
            <select name="nama_provinsi" wire:model="pprovinsi" 
            class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group">
                <option value='' >-- pilih provinsi --</option>
                @foreach($provinsi as $data)
                    <option value={{ $data->id }}>{{ $data->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        @if(!is_null($pprovinsi))
            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">Kota :</label><br>
                <select name="id_kota" wire:model="pkota" 
                    class=" form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value='' >-- pilih kota --</option>
                    @foreach($kota as $item)
                        <option value={{ $item->id }} <?= (!is_null($pprovinsi) && $item->id_provinsi == $pprovinsi)? 'selected' : '';?>>{{ $item->nama_kota }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkota))
            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">kecamatan :</label><br>
                <select name="id_kecamatan" wire:model="pkecamatan" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih kecamatan --</option>
                    @foreach($kecamatan as $kec)
                        <option value={{ $kec->id }} <?= (!is_null($pkota) && $kec->id_kota == $pkota)? 'selected' : '';?>>{{ $kec->nama_kecamatan }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkecamatan))

            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">kelurahan :</label><br>
                <select name="id_kelurahan" wire:model="pkelurahan" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih kelurahan --</option>
                    @foreach($kelurahan as $kel)
                        <option value={{ $kel->id }} <?= (!is_null($pkecamatan) && $kel->id_kecamatan == $pkecamatan)? 'selected' : '';?>>{{ $kel->nama_kelurahan }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkelurahan))

            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">rw :</label><br>
                <select name="id_rw" wire:model="prw" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih RW --</option>
                    @foreach($rw as $r)
                        <option value={{ $r->id }} <?= (!is_null($pkelurahan) && $r->id_kelurahan == $pkelurahan)? 'selected' : '';?>>{{ $r->nama }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>