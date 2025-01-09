<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrator</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.dashboard {
    display: flex;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: white;
    padding: 20px;
}

.sidebar h2 {
    text-align: center;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
}

.sidebar ul li a:hover {
    text-decoration: underline;
}

.main-content {
    flex: 1;
    padding: 20px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
}

.cards {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.card {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 30%;
    text-align: center;
}

.card h3 {
    margin: 0;
}

.card p {
    font-size: 24px;
    font-weight: bold;
}

@media (max-width: 768px) {
    .cards {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 80%;
        margin-bottom: 20px;
    }
}
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Pengguna</a></li>
                <li><a href="#">Konten</a></li>
                <li><a href="#">Pengaturan</a></li>
                <li><a href="/logout">Keluar</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Dashboard</h1>
                <div class="user-info">
                    <p>Selamat datang, Admin</p>
                </div>
            </header>
            <section class="cards">
                <div class="card">
                    <h3>Total Pengguna</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Total Konten</h3>
                    <p>75</p>
                </div>
                <div class="card">
                    <h3>Total Komentar</h3>
                    <p>200</p>
                </div>
            </section>
            <section class="table-section">
                <h2>Daftar Pengguna</h2>
                <table>
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama</th>
                            <th>alamat</th>
                            <th>nomor hp</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($data as $dt)
                        <tr>
                            <td>{{ $dt['id'] }}</td>
                            <td>{{ $dt['name'] }}</td>
                            <td>{{ $dt['alamat'] }}</td>
                            <td>{{ $dt['nomorhp'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="">
                    @csrf
                    <input type="text">
                    <input type="text">
                </form>
            </section>
        </div>
    </div>
</body>
</html>