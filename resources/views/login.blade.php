<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventory Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-container {
            background-color: #002540;
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #35ABC8, #f5f5dc);
        }
        
        h2 {
            color: #35ABC8;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 600;
        }
        
        h2 .highlight {
            color: #fff;
        }
        
        p.description {
            color: #e0e0e0;
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #fff;
            font-weight: 500;
            font-size: 14px;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #35ABC8;
        }
        
        input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background-color: rgba(245, 245, 220, 0.95);
            font-size: 16px;
            transition: all 0.3s ease;
            color: #002540;
        }
        
        input:focus {
            outline: none;
            border-color: #35ABC8;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(53, 171, 200, 0.2);
        }
        
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0 30px;
            font-size: 14px;
        }
        
        .remember {
            display: flex;
            align-items: center;
            color: #fff;
        }
        
        .remember input {
            width: auto;
            margin-right: 8px;
            accent-color: #35ABC8;
        }
        
        .forgot-password {
            color: #35ABC8;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
            color: #f5f5dc;
            text-decoration: underline;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #35ABC8, #2e4a6c);
            color: #f5f5dc;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        button:hover {
            background: linear-gradient(to right, #2e4a6c, #35ABC8);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .signup-link {
            margin-top: 25px;
            text-align: center;
            color: #e0e0e0;
            font-size: 14px;
        }
        
        .signup-link a {
            color: #35ABC8;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .signup-link a:hover {
            color: #f5f5dc;
            text-decoration: underline;
        }
        
        .error-message {
            color: #ff6b6b;
            background-color: rgba(255, 107, 107, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
            display: none;
        }
        
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
            
            .options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .forgot-password {
                margin-left: auto;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login <span class="highlight">to your account</span></h2>
        <p class="description">Enter your credentials to access your Inventory Management System</p>
        
        @if($errors->any())
            <div class="error-message" style="display: block;">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="loginname">Username</label>
                <div class="input-with-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="loginname" name="loginname" placeholder="Enter your username" required value="{{ old('loginname') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="loginpassword">Password</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="loginpassword" name="loginpassword" placeholder="Enter your password" required>
                </div>
            </div>
            
            <div class="options">
                <label class="remember">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <p class="signup-link">Don't have an account? <a href="{{ route('register') }}">Sign up now</a></p>
    </div>
</body>
</html>