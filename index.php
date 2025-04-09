<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign Up </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-container {
            background: #1e1e2f;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
            width: 350px;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .signup-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.8);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #e94560;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 25px;
            background: #2b2b3c;
            color: #fff;
            outline: none;
            transition: border 0.3s, background 0.3s;
        }

        input::placeholder {
            color: #aaa;
        }

        input:focus {
            border: 1px solid #e94560;
            background: #333344;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #e94560;
            border: none;
            color: #fff;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            font-size: 16px;
        }

        .btn:hover {
            background: #ff4d6d;
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #ccc;
        }

        .login-link a {
            color: #e94560;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #ff4d6d;
        }
    </style>
</head>

<body>

    <div class="signup-container">
        <h2>Create Account</h2>
        <form action="#" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm-password" placeholder="Confirm Password" required>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Log In</a></p>
    </div>

</body>

</html>
