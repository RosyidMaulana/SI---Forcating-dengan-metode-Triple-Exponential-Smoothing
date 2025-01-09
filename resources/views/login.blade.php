<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    .login-container {
  width: 300px;
  margin: 100px auto;
  padding: 20px 40px;
  background-color: #FFF8DC;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

p {
  text-align: center;
}

a {
  color: #007bff;
}

a:hover {
  text-decoration: underline;
}

@media (max-width: 600px) {
  .login-container {
    width: 90%;
    margin: 50px auto;
  }

  input[type="text"], input[type="password"], button[type="submit"] {
    font-size: 16px;
  }
}
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Silakan login terlebih dahulu</h2>
    <form action="{{ route('login.submit') }}" method="POST">
      @csrf
      <label for="email">Email :</label>
      <input type="text" id="email" name="email" placeholder="Masukkan alamat email" required>

      <label for="password">Kata sandi:</label>
      <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>

      <label>
        <input type="checkbox" name="remember"> Ingat saya
      </label>
      <button type="submit">Login</button>
      <p><a href="{{route('dashboard')}}">Ke Halaman Dashboard</a></p>
    </form>
    @if(session('gagal'))
    <p>{{ session('gagal')}}</p>
    @endif
  </div>
</body>
</html>