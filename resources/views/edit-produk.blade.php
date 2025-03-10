<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>

    <form action="{{ route('produk.update', ['id' => $produk['id']]) }}" method="POST">
        @csrf
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" value="{{ $produk['nama'] }}" required>
        <br>
        
        <label for="harga">Harga Produk:</label>
        <input type="number" id="harga" name="harga" value="{{ $produk['harga'] }}" required>
        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
