<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>

    <h2>Daftar Produk</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach($produkList as $produk)
        <tr id="row-{{ $produk['id'] }}">
            <td>{{ $produk['id'] }}</td>
            <td>{{ $produk['nama'] }}</td>
            <td>Rp {{ number_format($produk['harga'], 0, ',', '.') }}</td>
            <td>
                <button onclick="deleteProduk({{ $produk['id'] }})">Hapus</button>
            </td>
        </tr>
        @endforeach
    </table>

    <script>
        function deleteProduk(id) {
            if (confirm("Yakin ingin menghapus produk ini?")) {
                fetch(`/produk/${id}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    document.getElementById(`row-${id}`).remove(); // Hapus baris tabel dari tampilan
                })
                .catch(error => console.error("Error:", error));
            }
        }
    </script>

</body>
</html>
