@extends('layouts.app')

@if(session('error'))
    <div class="alert alert-danger custom-alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        {{ session('error') }}
    </div>
@endif

@section('content')
<div class="dashboard-container">
    {{-- Custom Header --}}
    <header class="dashboard-header">
        <div class="header-content">
            <div class="header-left">
                <h1 class="dashboard-title">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </h1>
                <p class="dashboard-subtitle">Track your learning progress</p>
            </div>
            <div class="header-right">
                <div class="user-welcome">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <p class="welcome-text">Welcome back,</p>
                        <p class="user-name">{{ explode(' ', auth()->user()->name)[0] }}</p>
                    </div>
                </div>
                <form id="logout-form" action="/logout" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    {{-- Stats Overview --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="stat-content">
                <h3>{{ count($courseProgress) }}</h3>
                <p>Enrolled Courses</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="stat-content">
                <h3>{{ collect($courseProgress)->where('completion_percentage', 100)->count() }}</h3>
                <p>Completed</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-certificate"></i>
            </div>
            <div class="stat-content">
                <h3>{{ collect($courseProgress)->where('completion_percentage', 100)->where('average_percentage', '>=', 70)->count() }}</h3>
                <p>Certificates</p>
            </div>
        </div>
    </div>

    {{-- Courses Section --}}
    <div class="courses-section">
        <h2 class="section-title">
            <i class="fas fa-graduation-cap me-2"></i>
            Your Courses
        </h2>
        
        @forelse($courseProgress as $progress)
            <div class="course-card">
                <div class="course-header">
                    <div class="course-info">
                        <h4 class="course-title">
                            <a data-bs-toggle="collapse" href="#course{{ $progress['course_id'] }}" class="course-link">
                                {{ $progress['course_name'] }}
                                <i class="fas fa-chevron-down collapse-icon"></i>
                            </a>
                        </h4>
                        <div class="course-meta">
                            <span class="video-count">
                                <i class="fas fa-play-circle me-1"></i>
                                {{ $progress['completed_videos'] }} / {{ $progress['total_videos'] }} videos
                            </span>
                        </div>
                    </div>
                    <div class="course-actions">
                        @if($progress['completion_percentage'] == 100 && $progress['average_percentage'] >= 70)
                            <a href="{{ route('certificate.generate', [
                                'userId' => auth()->id(),
                                'courseId' => $progress['course_id'],
                            ]) }}" 
                            class="btn-certificate" target="_blank">
                                <i class="fas fa-certificate me-1"></i>
                                Download Certificate
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Progress Bar --}}
                <div class="progress-section">
                    <div class="progress-info">
                        <span class="progress-label">Progress</span>
                        <span class="progress-percentage">{{ $progress['completion_percentage'] }}%</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: {{ $progress['completion_percentage'] }}%;">
                            <div class="progress-bar-glow"></div>
                        </div>
                    </div>
                </div>

                {{-- Collapsible Quiz Section --}}
                <div class="collapse quiz-section" id="course{{ $progress['course_id'] }}">
                    <div class="quiz-header">
                        <h6><i class="fas fa-clipboard-list me-2"></i>Quiz Results</h6>
                    </div>
                    @if(count($progress['quiz_marks']) > 0)
                        <div class="quiz-list">
                            @foreach($progress['quiz_marks'] as $quiz)
                                <div class="quiz-item">
                                    <div class="quiz-info">
                                        <span class="quiz-title">{{ $quiz['quiz_title'] }}</span>
                                    </div>
                                    <div class="quiz-score">
                                        <span class="score-badge">{{ $quiz['score'] }}%</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="no-quizzes">
                            <i class="fas fa-info-circle me-2"></i>
                            No quizzes taken yet for this course.
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3>No Courses Yet</h3>
                <p>You haven't enrolled in any courses yet. Start your learning journey today!</p>
                <a href="/courses" class="btn-primary">
                    <i class="fas fa-search me-1"></i>
                    Browse Courses
                </a>
            </div>
        @endforelse
    </div>
</div>

<style>
/* Custom CSS for Edvantage Dashboard */
.dashboard-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    min-height: 100vh;
}

.dashboard-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.2);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.dashboard-title {
    color: white;
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
}

.dashboard-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0.5rem 0 0 0;
    font-size: 1rem;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.user-welcome {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: white;
}

.user-avatar {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
    backdrop-filter: blur(10px);
}

.welcome-text {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.user-name {
    margin: 0;
    font-weight: 600;
    font-size: 1.1rem;
}

.btn-logout {
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-logout:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.4);
    transform: translateY(-2px);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #3b82f6, #1e3a8a);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.stat-content h3 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    color: #1e3a8a;
}

.stat-content p {
    margin: 0;
    color: #64748b;
    font-weight: 500;
}

.section-title {
    color: #1e3a8a;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.course-card {
    background: white;
    border-radius: 16px;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.course-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.course-header {
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 1rem;
}

.course-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.course-link {
    color: #1e3a8a;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: color 0.3s ease;
}

.course-link:hover {
    color: #3b82f6;
}

.collapse-icon {
    font-size: 0.8rem;
    transition: transform 0.3s ease;
}

.course-link[aria-expanded="true"] .collapse-icon {
    transform: rotate(180deg);
}

.course-meta {
    margin-top: 0.5rem;
    color: #64748b;
    font-size: 0.9rem;
}

.btn-certificate {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.btn-certificate:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    color: white;
}

.progress-section {
    padding: 0 1.5rem 1.5rem;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.progress-label {
    font-weight: 500;
    color: ##0E1B33;
}

.progress-percentage {
    font-weight: 600;
    color: ##0E1B33;
}

.progress-bar-container {
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    overflow: hidden;
    position: relative;
}

.progress-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #3b82f6, #1e3a8a);
    border-radius: 4px;
    transition: width 0.8s ease;
    position: relative;
}

.progress-bar-glow {
    position: absolute;
    top: 0;
    right: 0;
    width: 20px;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4));
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-20px); }
    100% { transform: translateX(20px); }
}

.quiz-section {
    border-top: 1px solid #e5e7eb;
    padding: 1.5rem;
}

.quiz-header h6 {
    color: #0E1B33;
    font-weight: 600;
    margin-bottom: 1rem;
}

.quiz-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.quiz-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
    transition: background 0.3s ease;
}

.quiz-item:hover {
    background: #f1f5f9;
}

.quiz-title {
    font-weight: 500;
    color: #374151;
}

.score-badge {
    background: linear-gradient(135deg, #3b82f6, #1e3a8a);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
}

.no-quizzes {
    color: #64748b;
    font-style: italic;
    padding: 1rem;
    text-align: center;
    background: #f8fafc;
    border-radius: 8px;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.empty-icon {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: #374151;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #64748b;
    margin-bottom: 2rem;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #1e3a8a);
    color: white;
    padding: 1rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    color: white;
}

.custom-alert {
    border-radius: 8px;
    border: none;
    box-shadow: 0 4px 6px rgba(220, 38, 38, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .course-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .user-welcome {
        justify-content: center;
    }
}
</style>
@endsection
