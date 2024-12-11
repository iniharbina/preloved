<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 30px;
            width: 100%;
            max-width: 600px;
        }

        .card-header {
            background-color: #6c63ff;
            color: white;
            text-align: center;
            font-size: 1.8rem;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a4bdb;
        }

        .btn-back {
            background-color: #f5f5f5;
            color: #333;
            border: none;
            font-size: 0.9rem;
            width: 100%;
            border-radius: 8px;
            padding: 8px 16px;
            margin-top: 10px;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #ddd;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table th {
            font-weight: 600;
            color: #333;
        }

        table td {
            color: #666;
        }

        hr {
            margin: 20px 0;
            border-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">Profil Pengguna</div>
        
        <!-- Foto Profil -->
        <div class="text-center mb-4">
            @if(!empty($user->foto))
                <img src="{{ asset('profile_pictures/' . $user->foto) }}" alt="Foto Profil" class="profile-img">
            @else
                <img src="{{ asset('profile_pictures/default.png') }}" alt="Foto Profil Default" class="profile-img">
            @endif
        </div>

        <!-- Tombol Edit Profil -->
        <div class="text-center mb-4">
            <a href="{{ route('editprofile') }}" class="btn btn-primary">Edit Profil</a>
        </div>

        <!-- Informasi Pengguna -->
        <table class="table table-borderless">
            <tr>
                <th>Nama</th>
                <td>{{ $user->nama_customer }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email_customer }}</td>
            </tr>
            <tr>
                <th>No. HP</th>
                <td>{{ $user->no_hp }}</td>
            </tr>
        </table>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('home.index') }}" class="btn btn-back">Back</a>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
