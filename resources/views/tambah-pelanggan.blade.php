
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan - Sports Venue</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sports Venue</h1>
    </header>

    <main>
        <h2>Tambah Pelanggan</h2>

        <div class="form-container">
            <form action="{{ url('/pelanggan/simpan') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" required>
                </div>

                <div class="form-group">
                    <label>Level Member</label>
                    <select name="level_member" required>
                        <option value="">Pilih level member</option>
                        <option value="Basic">Basic</option>
                        <option value="Gold">Gold</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="simpan">Simpan</button>
                    <button type="reset" class="reset">Reset</button>
                </div>
            </form>

            @if ($errors->any())
                <div class="pesan">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <p><a href="{{ url('/') }}">Kembali ke daftar pelanggan</a></p>
        </div>
    </main>
</body>
</html>
