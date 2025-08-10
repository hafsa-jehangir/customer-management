<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="email"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-btn:hover {
            background-color: darkgreen;
        }
        .register-text {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
        .register-btn {
            background-color: blue;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .register-btn:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Customer Login</h2>

    <form>
        <!-- Email Field -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <!-- Password Field -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <!-- Login Button -->
        <button type="submit" class="login-btn">Login</button>
    </form>

    <!-- Register Section -->
    <div class="register-text">
        Don't have an account?  
        <button class="register-btn">Register</button>
    </div>
</div>

</body>
</html>

