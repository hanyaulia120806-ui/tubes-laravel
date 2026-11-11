
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - Sports Venue</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sports Venue</h1>
    </header>

    <main>
        <h2>Edit Pelanggan</h2>

        <div class="form-container">
            <form action="{{ url('/pelanggan/update/' . $pelanggan->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama"
                        value="{{ old('nama', $pelanggan->nama) }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                        value="{{ old('email', $pelanggan->email) }}" required>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon"
                        value="{{ old('telepon', $pelanggan->telepon) }}" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat"
                        value="{{ old('alamat', $pelanggan->alamat) }}" required>
                </div>

                <div class="form-group">
                    <label>Level Member</label>
                    <select name="level_member" required>
                        <option value="Basic" {{ $pelanggan->level_member == 'Basic' ? 'selected' : '' }}>Basic</option>
                        <option value="Gold" {{ $pelanggan->level_member == 'Gold' ? 'selected' : '' }}>Gold</option>
                        <option value="VIP" {{ $pelanggan->level_member == 'VIP' ? 'selected' : '' }}>VIP</option>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="simpan">
                        Simpan Perubahan
                    </button>
                    <a href="{{ url('/') }}">Batal</a>
                </div>
            </form>

            @if ($errors->any())
                <div class="pesan">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</body>
</html>
