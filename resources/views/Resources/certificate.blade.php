<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .certificate-wrapper {
            max-width: 700px;
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .certificate {
            background: #fff;
            width: 100%;
            min-height: 500px;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 35px;
        }

      

        /* Background pattern */
        .certificate::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 70%, rgba(245, 87, 108, 0.05) 0%, transparent 50%);
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
            max-width: 700px;
        }

        .header {
            margin-bottom: 30px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            position: relative;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

    

        .company-name {
            font-size: 30px;
            font-weight: 600;
            color: #2d3748;
        }

        .certificate-title {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .certificate-subtitle {
            font-size: 16px;
            color: #718096;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .main-content {
            margin-bottom: 30px;
        }

        .awarded-text {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .recipient-name {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            word-wrap: break-word;
            max-width: 100%;
        }

        .recipient-name::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .completion-text {
            font-size: 16px;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .course-name {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
            font-style: italic;
            word-wrap: break-word;
            max-width: 100%;
        }

        .score-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 6px 18px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            width: 100%;
        }

        .date-section {
            text-align: left;
            flex: 1;
        }

        .date-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .date {
            font-size: 16px;
            font-weight: 600;
            color: #2d3748;
        }

        .signature-section {
            text-align: right;
            flex: 1;
        }

        .signature-line {
            width: 100%;
            max-width: 200px;
            height: 1px;
            background: #cbd5e0;
            margin-bottom: 8px;
            margin-left: auto;
        }

        .signature-label {
            font-size: 12px;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .decorative-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .corner-decoration {
            position: absolute;
            width: 60px;
            height: 60px;
            opacity: 0.1;
        }

        .corner-decoration.top-left {
            top: 35px;
            left: 35px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 0 0 60px 0;
        }

        .corner-decoration.top-right {
            top: 35px;
            right: 35px;
            background: linear-gradient(225deg, #f093fb, #f5576c);
            border-radius: 0 0 0 60px;
        }

        .corner-decoration.bottom-left {
            bottom: 35px;
            left: 35px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            border-radius: 0 60px 0 0;
        }

        .corner-decoration.bottom-right {
            bottom: 35px;
            right: 35px;
            background: linear-gradient(315deg, #fa709a, #fee140);
            border-radius: 60px 0 0 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
                margin-left: -60px; 
            }
            
            .certificate-wrapper {
                padding: 20px;
            }
            
            .certificate {
                padding: 30px 25px;
                border-radius: 10px;
            }
            
            .certificate-title {
                font-size: 24px;
            }
            
            .recipient-name {
                font-size: 28px;
            }
            
            .course-name {
                font-size: 20px;
            }
            
            .footer {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .date-section,
            .signature-section {
                text-align: center;
            }
            
            .signature-line {
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 480px) {
            .certificate {
                padding: 25px 20px;
            }
            
            .company-name {
                font-size: 24px;
            }
            
            .certificate-title {
                font-size: 22px;
            }
            
            .recipient-name {
                font-size: 24px;
            }
            
            .course-name {
                font-size: 18px;
            }
            
            .completion-text {
                font-size: 14px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
                 width: 100%;
                 height: 100%;
            }
            
            .certificate-wrapper {
                box-shadow: none;
                border-radius: 0;
                background: white;
                padding: 0;
                max-width: none;
            }
            
            .certificate {
                box-shadow: none;
                border-radius: 0;
                width: 100%;
                min-height: 100vh;
                padding: 60px 40px;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-wrapper">
        <div class="certificate">
            <div class="decorative-elements">
                <div class="corner-decoration top-left"></div>
                <div class="corner-decoration top-right"></div>
                <div class="corner-decoration bottom-left"></div>
                <div class="corner-decoration bottom-right"></div>
            </div>

            <div class="content">
                <div class="header">
                    <div class="logo-section">
                        <div class="logo"></div>
                        <div class="company-name">{{ $company_name ?? 'Edvantage' }}</div>
                    </div>
                    <h1 class="certificate-title">Certificate of Completion</h1>
                    <p class="certificate-subtitle">Professional Achievement Award</p>
                </div>

                <div class="main-content">
                    <p class="awarded-text">This certificate is proudly awarded to</p>
                    
                    <h2 class="recipient-name">{{ $user->name ?? $student_name ?? 'Student Name' }}</h2>
                    
                    <p class="completion-text">
                        For successfully completing all course requirements and demonstrating 
                        exceptional dedication in mastering the comprehensive curriculum of
                    </p>
                    
                    <h3 class="course-name">"{{ $course->title ?? $course_name ?? 'Course Title' }}"</h3>
                    
                    @if(isset($avgScore) || isset($score))
                    <div class="score-badge">
                        Final Score: {{ round($avgScore ?? $score) }}%
                    </div>
                    @endif
                </div>

                <div class="footer">
                    <div class="date-section">
                        <div class="date-label">Date of Completion</div>
                        <div class="date">{{ $completion_date ?? date('F j, Y') }}</div>
                    </div>
                    
                    <div class="signature-section">
                        <div class="signature-line"></div>
                        <div class="signature-label">{{ $signature_title ?? 'Director of Education' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>