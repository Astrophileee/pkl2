<div class="form-group">
<label for="nama">Nama Dokter</label>
<input type="text" name="nama" value="{{ old('nama') ?? $dokter->nama }}" id="nama" class="form-control">
        @error('nama')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="no_izin">No Izin</label>
        <input type="number" name="no_izin" value="{{ old('no_izin') ?? $dokter->no_izin }}" id="no_izin" class="form-control">
        @error('no_izin')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="{{ old('alamat') ?? $dokter->alamat }}" id="alamat" class="form-control">
        @error('alamat')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
</div>