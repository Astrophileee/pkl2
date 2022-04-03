<div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" name="nama_pasien" value="{{ old('nama_pasien') ?? $pasien->nama_pasien }}" id="nama_pasien" class="form-control">
        @error('nama_pasien')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="" class="form-control">
        <option value="L" {{($pasien->jenis_kelamin == "L") ? 'selected' : ''}}>Laki-Laki</option>
        <option value="P" {{($pasien->jenis_kelamin == "P") ? 'selected' : ''}}>Perempuan</option>
        </select>
        @error('jenis_kelamin')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat') ?? $pasien->alamat }}" id="alamat" class="form-control">
        @error('alamat')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') ?? (isset($pasien->tgl_lahir)) ? $pasien->tgl_lahir->format('Y-m-d') : '' }}" id="tgl_lahir" class="form-control">
        @error('tgl_lahir')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="no_tlp">No telpon</label>
        <input type="number" name="no_tlp" value="{{ old('no_tlp') ?? $pasien->no_tlp}}" id="no_tlp" class="form-control">
        @error('no_tlp')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="no_ktp">No KTP</label>
        <input type="number" name="no_ktp" value="{{ old('no_ktp') ?? $pasien->no_ktp }}" id="no_ktp" class="form-control">
        @error('no_ktp')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>