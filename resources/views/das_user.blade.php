

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Sesuaikan dengan nama file CSS Anda -->
    <style>
        /* Tambahkan gaya CSS di sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
            /* Hilangkan margin yang ada secara default */
            display: flex;
            /* Terapkan flexbox untuk body */
            justify-content: center;
            /* Memposisikan konten secara horizontal di tengah-tengah */
            align-items: center;
            /* Memposisikan konten secara vertikal di tengah-tengah */
            min-height: 100vh;
            /* Mencegah konten agar tetap di tengah saat halaman kurang tinggi */
        }

        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #FFA500, #FF6347);
            border-radius: 2%;
            /* Hilangkan border-radius agar loading mengisi seluruh laman */
            opacity: 0.7;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            /* Untuk mengatur overflow agar animasi tetap terlihat di belakang form */
        }

        h2 {
            color: #333;
            text-align: center;
        }

        p {
            color: #666;
            margin-bottom: 10px;
        }

        .user-info {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            position: relative;
            /* Menjadikan posisi relatif untuk loading */
        }

        form {
            margin-top: 20px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(45deg, #FFA500, #FF6347);
            position: relative;
            z-index: 1;
            /* Pastikan form berada di depan loading */
        }

        form input {
            width: calc(100% - 20px);
            /* Menyesuaikan lebar input dengan padding */
            margin-bottom: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Warna latar belakang input */
        }

        form input:focus {
            outline: none;
            /* Hilangkan outline saat input di-focus */
        }

        form button {
            width: 100%;
            /* Menyesuaikan lebar button dengan padding */
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
            /* Warna button saat di-hover */
        }

        a.logout-button {
            display: inline-block;
            background-color: #dc3545;
            /* Warna background tombol */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            text-align: center;
            margin-top: 20px;
            /* Efek transisi untuk perubahan warna */
        }

        a.logout-button:hover {
            background-color: #c82333;
            /* Warna background saat tombol di-hover */
        }
    </style>
</head>

<body>
    <div class="loading"></div> <!-- Tambahkan elemen loading di awal body -->
    <div class="container">
        <h2>Dashboard</h2>
        <p>Selamat datang, {{ $user->full_name }}!</p>
        <p>Email: {{ $user->email }}</p>
        <div class="user-info">
            <form action="{{ route('edit') }}" method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                <input type="text" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
                <input type="password" name="password" placeholder="Password"  >
                <input type="password" name="confirm_password" placeholder="Confirm Password">

                <button type="submit">Update Profile</button>
            </form>
            <a href="{{ route('logout') }}" class="logout-button">Logout</a>
</body>

</html>
