
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Venue - Daftar Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sports Venue</h1>

        <div>
            <span>
                {{ Auth::user()->name }} |
                {{ ucfirst(Auth::user()->role) }}
            </span>

            <form action="{{ url('/logout') }}" method="POST"
                  style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <main>
        <a href="{{ url('/pelanggan/tambah') }}" class="tombol">
            + Tambah Pelanggan
        </a>

        @if (session('success'))
            <div class="pesan">{{ session('success') }}</div>
        @endif

        <h2>Daftar Pelanggan & Member</h2>

        @forelse ($pelanggan as $data)
            <div class="pelanggan">
                <h3>{{ $data->nama }}</h3>
                <p>Email: {{ $data->email }}</p>
                <p>Telepon: {{ $data->telepon }}</p>
                <p>Alamat: {{ $data->alamat }}</p>
                <p>
                    Level Member:
                    <span class="level {{ strtolower($data->level_member) }}">
                        {{ $data->level_member }}
                    </span>
                </p>

                <a href="{{ url('/pelanggan/edit/' . $data->id) }}"
                   class="tombol">
                    Edit
                </a>

                @if (Auth::user()->role == 'admin')
                    <form action="{{ url('/pelanggan/hapus/' . $data->id) }}"
                          method="POST"
                          style="display: inline;"
                          onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                        @csrf
                        <button type="submit" class="simpan">
                            Hapus
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <p>Belum ada data pelanggan.</p>
        @endforelse
    </main>

    <footer>
        <p>Sports Venue - Daftar Pelanggan & Member</p>
    </footer>
</body>
</html>
