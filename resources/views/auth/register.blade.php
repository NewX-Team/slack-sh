<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="{{ url('register') }}" method="POST">
        @csrf
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" required>
        <br>

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required>
        <br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
