<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role - EDVANTAGE</title>
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
            overflow: hidden;
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

        /* Logo Header */
        .logo-header {
            position: absolute;
            top: 2rem;
            left: 2rem;
            z-index: 10;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Main Container */
        .role-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
            position: relative;
            z-index: 5;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .role-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .role-subtitle {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 3rem;
            line-height: 1.6;
        }

        /* Role Options */
        .role-options {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .role-option {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .role-option:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .role-form {
            width: 100%;
        }

        .role-button {
            width: 100%;
            padding: 2rem;
            border: none;
            border-radius: 16px;
            font-size: 1.3rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* User Button */
        .user-button {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .user-button:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.4);
        }

        /* Admin Button */
        .admin-button {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .admin-button:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
        }

        /* Button Icons */
        .role-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 2rem;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .user-button::before {
            content: '👤';
            font-size: 2rem;
            width: auto;
            height: auto;
        }

        .admin-button::before {
            content: '⚙️';
            font-size: 2rem;
            width: auto;
            height: auto;
        }

        /* Button Text */
        .button-text {
            margin-left: 3rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .button-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 0.25rem;
        }

        .button-description {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: normal;
            text-transform: none;
            letter-spacing: normal;
        }

        /* Decorative Elements */
        .role-container::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
            border-radius: 50%;
            z-index: -1;
        }

        .role-container::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
            border-radius: 50%;
            z-index: -1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .role-container {
                padding: 2rem;
                margin: 1rem;
            }

            .role-title {
                font-size: 2rem;
            }

            .role-button {
                padding: 1.5rem;
                font-size: 1.1rem;
            }

            .button-text {
                margin-left: 2.5rem;
            }

            .logo-header {
                top: 1rem;
                left: 1rem;
            }

            .logo {
                font-size: 1.5rem;
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

        .role-container {
            animation: fadeInUp 0.8s ease forwards;
        }

        .role-option:nth-child(1) {
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        .role-option:nth-child(2) {
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.4s;
            opacity: 0;
        }

        /* Ripple Effect */
        .role-button {
            position: relative;
            overflow: hidden;
        }

        .role-button::after {
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

        .role-button:active::after {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
    <!-- Logo Header -->
    <div class="logo-header">
        <div class="logo">EDVANTAGE</div>
    </div>

    <!-- Main Container -->
    <div class="role-container">
        <h2 class="role-title">Select Your Role</h2>
        <p class="role-subtitle">Choose how you'd like to access EDVANTAGE platform</p>

        <div class="role-options">
            <!-- User Option -->
            <div class="role-option">
                <form action="/login/user" method="GET" class="role-form">
                    <button type="submit" class="role-button user-button">
                        <div class="button-text">
                            <div class="button-title">Student</div>
                        </div>
                    </button>
                </form>
            </div>

            <!-- Admin Option -->
            <div class="role-option">
                <form action="/admin" method="GET" class="role-form">
                    <button type="submit" class="role-button admin-button">
                        <div class="button-text">
                            <div class="button-title">Admin</div>
    
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add click sound effect (optional)
        document.querySelectorAll('.role-button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Add a small delay for visual feedback
                setTimeout(() => {
                    // Form will submit naturally
                }, 100);
            });
        });

        // Prevent double clicks
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const button = this.querySelector('button');
                button.disabled = true;
                button.style.opacity = '0.7';
                setTimeout(() => {
                    button.disabled = false;
                    button.style.opacity = '1';
                }, 2000);
            });
        });
    </script>
</body>
</html>