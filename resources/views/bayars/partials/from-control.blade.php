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
        <label for="pembayaran">Pembayaran</label>
        <input type="text" name="pembayaran" value="{{ old('pembayaran') ?? $bayar->pembayaran }}" id="pembayaran" class="form-control" placeholder="Rp.">
        @error('pembayaran')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <label for="bayar">Pembayaran</label>
        <select name="bayar" id="" class="form-control">
        <option value="Sudah Bayar" {{($bayar->bayar == "Sudah Bayar") ? 'selected' : ''}}>Sudah Bayar</option>
        <option value="Belum Bayar" {{($bayar->bayar == "Belum Bayar") ? 'selected' : ''}}>Belum Bayar</option>
        <option value="Nyicil" {{($bayar->bayar == "Nyicil") ? 'selected' : ''}}>Nyicil</option>
        </select>
        @error('jenis_kelamin')
        <div class="mt-2 text-danger">
        {{ $message }}  
        </div>
        @enderror
        <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>