<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EDVANTAGE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 2rem 0;
        }

        /* Background Pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80') center/cover;
            opacity: 0.1;
        }

        /* Top Logo */
        .top-logo {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 10;
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Main Container */
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 90%;
            position: relative;
            z-index: 5;
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin: 2rem auto;
        }

        /* Register Header */
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .register-subtitle {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Error Messages */
        .error-messages {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .error-messages ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .error-messages li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .error-messages li:last-child {
            margin-bottom: 0;
        }

        .error-messages li::before {
            content: '⚠️';
            font-size: 0.9rem;
        }

        /* Form Styles */
        .register-form {
            margin-bottom: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            background: white;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-input:hover {
            border-color: #d1d5db;
        }

        /* Input Icons */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.1rem;
        }

        .form-input.with-icon {
            padding-left:1rem;
        }

        /* Register Button */
        .register-button {
            width: 100%;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .register-button:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* Loading State */
        .register-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Login Link */
        .login-link {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }

        .login-link p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .register-container {
                padding: 2rem;
                margin: 1rem;
            }

            .register-title {
                font-size: 1.5rem;
            }

            .top-logo {
                top: 1rem;
                left: 1rem;
                font-size: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-group.full-width {
                grid-column: 1;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-container {
            animation: fadeInUp 0.8s ease forwards;
        }

        /* Ripple Effect */
        .register-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .register-button:active::after {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
    <!-- Top Logo -->
    <div class="top-logo">EDVANTAGE</div>

    <!-- Main Container -->
    <div class="register-container">
        <!-- Header -->
        <div class="register-header">
            <h2 class="register-title">Create Account</h2>
            <p class="register-subtitle">Join EDVANTAGE and start your learning journey</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Register Form -->
        <form action="/register" method="POST" class="register-form" id="registerForm">
            @csrf

            <!-- Name and Phone Row -->
        
                <div class="form-group full-width">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                       
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-input with-icon" 
                            placeholder="Enter your full name"
                            required
                            value="{{ old('name') }}"
                        >
                    </div>
                </div>
             
                <div class="form-group full-width">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                       
                        <input 
                            type="text" 
                            id="phone" 
                            name="phone" 
                            class="form-input with-icon" 
                            placeholder="Enter your phone"
                            required
                            value="{{ old('phone') }}"
                        >
                    </div>
                </div>
        

            <!-- Email Field -->
            <div class="form-group full-width">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input with-icon" 
                        placeholder="Enter your email address"
                        required
                        value="{{ old('email') }}"
                    >
                </div>
            </div>

            <!-- Area of Interest Field -->
            <div class="form-group full-width">
                <label for="field" class="form-label">Area of Interest</label>
                <div class="input-group">
                   
                    <input 
                        type="text" 
                        id="field" 
                        name="field" 
                        class="form-input with-icon" 
                        placeholder="e.g. Data Science, Web Development"
                        value="{{ old('field') }}"
                    >
                </div>
            </div>

            <!-- Password Fields Row -->
            <div class="form-row">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                      
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input with-icon" 
                            placeholder="Create password"
                            required
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                     
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="form-input with-icon" 
                            placeholder="Confirm password"
                            required
                        >
                    </div>
                </div>
            </div>

            <!-- Register Button -->
            <button type="submit" class="register-button" id="registerBtn">
                Create Account
            </button>
        </form>

        <!-- Login Link -->
        <div class="login-link">
            <p>Already have an account? <a href="/login">Sign in here</a></p>
        </div>
    </div>

    <script>
        // Form submission handling
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const button = document.getElementById('registerBtn');
            button.disabled = true;
            button.innerHTML = 'Creating Account...';
            
            // Re-enable button after 5 seconds in case of issues
            setTimeout(() => {
                button.disabled = false;
                button.innerHTML = 'Create Account';
            }, 5000);
        });

        // Input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#e5e7eb';
            }
        });

        // Auto-focus first input
        document.getElementById('name').focus();
    </script>
</body>
</html>