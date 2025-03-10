<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>


    <form action="{{ route('produk.store') }}" method="POST">
        @csrf  
        
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        
        <label for="harga">Harga Produk:</label>
        <input type="number" id="harga" name="harga" required>
        <br>

        <button type="submit">Tambah Produk</button>
    </form>

</body>
</html>
