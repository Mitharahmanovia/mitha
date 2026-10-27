<div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input id="nim" type="text" name="nim" class="form-control" value="{{ old('nim', $biodata->nim ?? '') }}" required>
    @error('nim') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="nama" class="form-label">Nama Lengkap</label>
    <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama', $biodata->nama ?? '') }}" required>
    @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="prodi" class="form-label">Program Studi</label>
    <input id="prodi" type="text" name="prodi" class="form-control" value="{{ old('prodi', $biodata->prodi ?? '') }}" required>
    @error('prodi') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $biodata->email ?? '') }}" required>
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="no_hp" class="form-label">Nomor HP (opsional)</label>
    <input id="no_hp" type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $biodata->no_hp ?? '') }}">
    @error('no_hp') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat (opsional)</label>
    <textarea id="alamat" name="alamat" class="form-control" rows="3">{{ old('alamat', $biodata->alamat ?? '') }}</textarea>
    @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
</div>
