
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Data Pelanggan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login Data Pelanggan</h2>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form action="/login" method="POST">
            @csrf

            <label>Email</label>
            <input type="email" name="email"
                placeholder="Masukkan email" required>

            <label>Password</label>
            <input type="password" name="password"
                placeholder="Masukkan password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
