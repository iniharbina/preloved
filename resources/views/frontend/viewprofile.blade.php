<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h2>Profil</h2>
    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('path/to/default/photo.jpg') }}" alt="Foto Profil">
    <p>Nama: {{ $user->nama_customer }}</p>
    <p>Email: {{ $user->email_customer }}</p>
    <p>No HP: {{ $user->no_hp }}</p>
    <a href="{{ route('editprofile') }}">Edit Profil</a>
</body>
</html>
