<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventory Management System</title>
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
        
        .register-container {
            background-color: #002540;
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .register-container::before {
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
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
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
        
        .password-requirements {
            color: #e0e0e0;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .terms {
            display: flex;
            align-items: flex-start;
            margin: 20px 0 30px;
            color: #e0e0e0;
            font-size: 14px;
        }
        
        .terms input {
            width: auto;
            margin-right: 10px;
            margin-top: 3px;
            accent-color: #35ABC8;
        }
        
        .terms a {
            color: #35ABC8;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .terms a:hover {
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
        
        .login-link {
            margin-top: 25px;
            text-align: center;
            color: #e0e0e0;
            font-size: 14px;
        }
        
        .login-link a {
            color: #35ABC8;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .login-link a:hover {
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
        
        @media (max-width: 600px) {
            .register-container {
                padding: 30px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create <span class="highlight">your account</span></h2>
        <p class="description">Register to access the Inventory Management System</p>
        
        @if($errors->any())
            <div class="error-message" style="display: block;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/register" method="POST">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" value="{{ old('firstname') }}" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" value="{{ old('lastname') }}" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="name">Username</label>
                <div class="input-with-icon">
                    <i class="fas fa-at"></i>
                    <input type="text" id="name" name="name" placeholder="Choose a username" value="{{ old('name') }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>
                <p class="password-requirements">Use at least 8 characters with a mix of letters, numbers & symbols</p>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                </div>
            </div>
            
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
            </div>
            
            <button type="submit">Register</button>
        </form>
        
        <p class="login-link">Already have an account? <a href="/login">Login now</a></p>
    </div>

    <script>
        // Simple password strength indicator
        const passwordInput = document.getElementById('password');
        const requirementsText = document.querySelector('.password-requirements');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check password strength
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/\d/)) strength++;
            if (password.match(/[^a-zA-Z\d]/)) strength++;
            
            // Update requirements text
            if (password.length === 0) {
                requirementsText.textContent = 'Use at least 8 characters with a mix of letters, numbers & symbols';
                requirementsText.style.color = '#e0e0e0';
            } else if (strength < 2) {
                requirementsText.textContent = 'Password is weak';
                requirementsText.style.color = '#ff6b6b';
            } else if (strength < 4) {
                requirementsText.textContent = 'Password is medium';
                requirementsText.style.color = '#f8c471';
            } else {
                requirementsText.textContent = 'Password is strong';
                requirementsText.style.color = '#35ABC8';
            }
        });
    </script>
</body>
</html>