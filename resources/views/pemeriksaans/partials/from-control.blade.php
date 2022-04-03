<div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <select name="pasien_id" id="pasien_id">
        @foreach($pasiens as $pasien)
        <option value="{{ $pasien->id }}" >{{ $pasien->nama_pasien }}</option>
        @endforeach
        </select>
        <br>
        <label for="nama_dokter">Nama Doctor</label>
        <select name="dokter_id" id="dokter_id">
        @foreach($dokters as $dokter)
        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
        @endforeach
        </select>
        <br>
        <label for="poli">Poli</label>
        <select name="poli" id="" class="form-control">
        <option value="kebidanan" {{($pemeriksaan->poli == "kebidanan") ? 'selected' : ''}}>Kebidanan</option>
        <option value="anak" {{($pemeriksaan->poli == "anak") ? 'selected' : ''}}>Anak</option>
        <option value="kembang" {{($pemeriksaan->poli == "kembang") ? 'selected' : ''}}>Tumbuh Kembang</option>
        <option value="jantung" {{($pemeriksaan->poli == "jantung") ? 'selected' : ''}}>Jantung</option>
        <option value="bedah" {{($pemeriksaan->poli == "bedah") ? 'selected' : ''}}>Bedah Umum</option>
        <option value="pencernaan" {{($pemeriksaan->poli == "pencernaan") ? 'selected' : ''}}>Pencernaan</option>
        <option value="gigi" {{($pemeriksaan->poli == "gigi") ? 'selected' : ''}}>GIGI</option>
        <option value="mulut" {{($pemeriksaan->poli == "mulut") ? 'selected' : ''}}>Mulut</option>
        </select>
        @error('poli')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="keluhan">Keluhan</label>
        <input type="text" name="keluhan" value="{{ old('keluhan') ?? $pemeriksaan->keluhan }}" id="keluhan" class="form-control">
        @error('keluhan')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="diagnosa">Diagnosa</label>
        <input type="text" name="diagnosa" value="{{ old('diagnosa') ?? $pemeriksaan->diagnosa}}" id="diagnosa" class="form-control">
        @error('diagnosa')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="obat">Obat</label>
        <input type="text" name="obat" value="{{ old('obat') ?? $pemeriksaan->obat }}" id="obat" class="form-control">
        @error('obat')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
</div>