<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        }

        .login-container {
            background: #1e1e2f;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7);
            width: 350px;
            transition: 0.4s;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.8);
        }

        .login-container h2 {
            text-align: center;
            color: #e94560;
            margin-bottom: 25px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 25px;
            background: #2c2c3e;
            color: #fff;
            outline: none;
            transition: 0.3s;
        }

        input::placeholder {
            color: #aaa;
        }

        input:focus {
            background: #333344;
            box-shadow: 0 0 5px #e94560;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #e94560;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff4d6d;
            transform: translateY(-2px);
        }

        .text-center {
            text-align: center;
            margin-top: 15px;
            color: #aaa;
        }

        .text-center a {
            color: #e94560;
            text-decoration: none;
            transition: 0.3s;
        }

        .text-center a:hover {
            color: #ff4d6d;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="home.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
        <p class="text-center">Don't have an account? <a href="index.php">Sign Up</a></p>
    </div>

</body>

</html>
