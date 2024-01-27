<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6; 
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-section {
            text-align: center;
        }

        .login-btn {
            display: block;
            margin: 10px auto;
            padding: 16px 32px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #02876A;
            color: #ffffff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            width: 200px;
        }

        .login-btn:hover {
            background-color: #45a049;
        }

        h1 {
            color: #8B0000; 
        }
    </style>
</head>
<body>
    <h1>Welcome To Home Page</h1>
    <div class="login-section">
        <a href="<?php echo base_url('index.php/login'); ?>" class="login-btn">Student Login</a>
        <a href="<?php echo base_url('index.php/admin/login'); ?>" class="login-btn">Admin Login</a>
    </div>
</body>
</html>
