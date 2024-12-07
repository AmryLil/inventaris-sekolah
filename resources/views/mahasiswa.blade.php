<html>

<body>
    <h2>Input Mahasiswa</h2>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{ url('mahasiswa/create') }}">
        @csrf
        <input type="text" name="nim" placeholder="Nim" value="{{ old('nim') }}">
        @error('nim')
            {{ $message }}
        @enderror
        <br><br>

        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}">
        @error('nama')
            {{ $message }}
        @enderror
        <br><br>

        <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
        @error('alamat')
            {{ $message }}
        @enderror
        <br><br>

        <input type="text" name="kodejurusan" placeholder="Kode Jurusan" value="{{ old('kodejurusan') }}">
        @error('kodejurusan')
            {{ $message }}
        @enderror
        <br><br>

        <input type="submit" value="Proses">
    </form>
</body>

</html>
