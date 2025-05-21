<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Ekskul</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-image: url('file/bg.png'); /* Ganti dengan path gambar kamu */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            background: #ffffff;
            max-width: 500px;
            margin: 35 auto;
            padding: 35px 45px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .illustration {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }

        h2 {
            color:rgb(84, 98, 142);
        }

        p {
            color: #555;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px auto; /* Menambahkan auto untuk margin horizontal */
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            color: white;
            transition: 0.3s;
            text-align: center; /* Memastikan teks di dalam tombol terpusat */
        }

               .btn-login {
            background-color:rgb(94, 172, 150);
        }

        .btn-login:hover {
            background-color:rgb(29, 109, 103);
        }

        .btn-register {
            background-color: #ffb4a2;
        }

        .btn-register:hover {
            background-color:rgb(226, 137, 118);
        }

        .footer-link {
            margin-top: 15px;
            font-size: 13px;
        }

        .footer-link a {
            color:rgb(251, 176, 177);
            text-decoration: none;
            font-weight: bold;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        .image-banner {
            max-width: 300px;
            margin: 20px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="file/logo.png" alt="Logo">

        <h2>Selamat Datang di EAPP!</h2>
        <p>EAPP atau Extracurricular Aplication adalah Aplikasi untuk membantu siswa/siswi SMKN 1 Jakarta mendaftarkan diri ke ekstrakurikuler secara mudah dan cepat.</p>

        <a href="login.php" class="btn btn-login">Masuk Sebagai Siswa</a>
        <a href="register.php" class="btn btn-register">Daftar Akun Baru</a>

        <div class="footer-link">
            Admin? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>
