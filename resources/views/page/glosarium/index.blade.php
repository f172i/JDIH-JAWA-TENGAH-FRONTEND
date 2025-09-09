@extends('app')
@section('head')
    @include('partial.head')
@endsection

@section('content')
    @include('partial.topbar')

<!-- Modern User Style CSS - Similar to Admin -->
<style>
    :root {
        --primary-color: #667eea;
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-color: #f093fb;
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-color: #4ecdc4;
        --danger-color: #ff6b6b;
        --warning-color: #feca57;
        --card-shadow: 0 10px 25px rgba(0,0,0,0.1);
        --card-hover-shadow: 0 20px 40px rgba(0,0,0,0.15);
        --border-radius: 15px;
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    html, body {
        overflow-x: hidden;
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Hero Section - Enhanced with Modern Design */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        margin-bottom: 3rem;
        color: white;
        text-align: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('{{ asset('images/gambar1.JPG') }}') center/cover;
        opacity: 0.2;
        z-index: -2;
        filter: blur(2px);
    }

    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 30% 70%, rgba(102, 126, 234, 0.3) 0%, transparent 50%), 
                    radial-gradient(circle at 70% 30%, rgba(118, 75, 162, 0.3) 0%, transparent 50%);
        z-index: -1;
    }

    @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.05"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    }

    .hero-content {
        text-align: center;
        color: white;
        z-index: 2;
        position: relative;
        max-width: 800px;
        padding: 0 2rem;
        animation: heroFloat 6s ease-in-out infinite;
    }

    .hero-content::before {
        content: '⚖️';
        position: absolute;
        top: -50px;
        left: -50px;
        font-size: 3rem;
        opacity: 0.6;
        animation: floatLeft 8s ease-in-out infinite;
    }

    .hero-content::after {
        content: '📖';
        position: absolute;
        bottom: -50px;
        right: -50px;
        font-size: 3rem;
        opacity: 0.6;
        animation: floatRight 8s ease-in-out infinite reverse;
    }

    @keyframes heroFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes floatLeft {
        0%, 100% { transform: translate(0px, 0px) rotate(0deg); }
        33% { transform: translate(30px, -30px) rotate(10deg); }
        66% { transform: translate(-20px, 20px) rotate(-5deg); }
    }

    @keyframes floatRight {
        0%, 100% { transform: translate(0px, 0px) rotate(0deg); }
        33% { transform: translate(-30px, -30px) rotate(-10deg); }
        66% { transform: translate(20px, 20px) rotate(5deg); }
    }

    /* Floating Particles */
    .particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        animation: particleFloat 20s infinite linear;
    }

    .particle:nth-child(1) {
        left: 10%;
        animation-delay: 0s;
        animation-duration: 25s;
    }

    .particle:nth-child(2) {
        left: 20%;
        animation-delay: 2s;
        animation-duration: 30s;
        width: 6px;
        height: 6px;
    }

    .particle:nth-child(3) {
        left: 30%;
        animation-delay: 4s;
        animation-duration: 35s;
    }

    .particle:nth-child(4) {
        left: 40%;
        animation-delay: 6s;
        animation-duration: 25s;
        width: 3px;
        height: 3px;
    }

    .particle:nth-child(5) {
        left: 50%;
        animation-delay: 8s;
        animation-duration: 40s;
        width: 5px;
        height: 5px;
    }

    .particle:nth-child(6) {
        left: 60%;
        animation-delay: 10s;
        animation-duration: 30s;
    }

    .particle:nth-child(7) {
        left: 70%;
        animation-delay: 12s;
        animation-duration: 35s;
        width: 7px;
        height: 7px;
    }

    .particle:nth-child(8) {
        left: 80%;
        animation-delay: 14s;
        animation-duration: 25s;
        width: 4px;
        height: 4px;
    }

    .particle:nth-child(9) {
        left: 90%;
        animation-delay: 16s;
        animation-duration: 30s;
        width: 3px;
        height: 3px;
    }

    .particle:nth-child(10) {
        left: 15%;
        animation-delay: 18s;
        animation-duration: 40s;
        width: 6px;
        height: 6px;
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        background-size: 300% 300%;
        animation: gradientShift 4s ease-in-out infinite, fadeInUp 1s ease-out;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        letter-spacing: -1px;
        line-height: 1.1;
        text-align: center;
        position: relative;
    }

    .hero-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 120px;
        height: 4px;
        background: linear-gradient(45deg, #667eea, #764ba2);
        border-radius: 2px;
        animation: fadeInUp 1s ease-out 0.5s both;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-subtitle {
        font-size: 1.7rem;
        margin-bottom: 2.5rem;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 300;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        animation: fadeInUp 1s ease-out 0.3s both;
        letter-spacing: 1px;
        line-height: 1.4;
        text-align: center;
        position: relative;
        font-style: italic;
    }

    .hero-subtitle::before {
        content: '"';
        font-size: 2.5rem;
        position: absolute;
        left: -30px;
        top: -10px;
        color: rgba(255, 255, 255, 0.6);
        font-family: serif;
    }

    .hero-subtitle::after {
        content: '"';
        font-size: 2.5rem;
        position: absolute;
        right: -30px;
        bottom: -20px;
        color: rgba(255, 255, 255, 0.6);
        font-family: serif;
    }

    .hero-divider {
        width: 120px;
        height: 1px;
        background: transparent;
        margin: 0 auto 2.5rem;
        border-radius: 2px;
        position: relative;
        animation: fadeInUp 1s ease-out 0.6s both;
    }

    .hero-divider::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.8) 20%, rgba(255,255,255,1) 50%, rgba(255,255,255,0.8) 80%, transparent 100%);
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 1; }
    }

    .hero-description {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
        text-align: center;
        font-weight: 400;
        letter-spacing: 0.8px;
        line-height: 1.6;
        animation: fadeInUp 1s ease-out 0.8s both;
        position: relative;
        padding: 1rem 2rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .hero-description::before {
        content: '📚';
        margin-right: 0.8rem;
        font-size: 1.5rem;
        animation: bounce 2s ease-in-out infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-8px); }
        60% { transform: translateY(-4px); }
    }

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

    /* Main Container - Similar to Admin */
    .modern-container {
        max-width: 1500px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    /* Search Section - Enhanced Design */
    .action-bar {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-bottom: 3rem;
        padding: 2.5rem;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        position: relative;
        overflow: hidden;
    }

    .action-bar::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.05) 100%);
        border-radius: 50%;
        transform: rotate(45deg);
    }

    .search-container {
        flex: 1;
        max-width: 800px;
        position: relative;
        z-index: 10;
    }

    .google-search-wrapper {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        transition: var(--transition);
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
    }

    .google-search-wrapper.focused {
        max-width: 750px;
        transform: scale(1.03);
        filter: drop-shadow(0 8px 25px rgba(102, 126, 234, 0.2));
    }

    .search-input {
        width: 100%;
        padding: 18px 25px;
        border: 3px solid #e2e8f0;
        border-radius: 50px;
        background: white;
        font-size: 18px;
        font-weight: 500;
        transition: var(--transition);
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        outline: none;
        color: #374151;
        letter-spacing: 0.3px;
        position: relative;
        z-index: 5;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.25), 0 0 0 4px rgba(102, 126, 234, 0.1);
        background: #fefefe;
        transform: translateY(-2px);
    }

    .search-input::placeholder {
        color: #9ca3af;
        font-style: italic;
        font-weight: 400;
        letter-spacing: 0.5px;
    }

    .search-icon {
        display: none;
    }

    /* Search Enhancement Effects */
    .search-input::-webkit-input-placeholder {
        transition: var(--transition);
    }

    .search-input:focus::-webkit-input-placeholder {
        opacity: 0.6;
        transform: translateX(5px);
    }

    .google-search-wrapper::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: calc(100% + 10px);
        height: calc(100% + 10px);
        border-radius: 60px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
        pointer-events: none;
    }

    .google-search-wrapper.focused::after {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1.05);
    }

    /* Stats Bar - Similar to Admin */
    .stats-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        flex: 1;
        text-align: center;
        min-width: 200px;
        max-width: 300px;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
        letter-spacing: -0.5px;
    }

    .stat-label {
        color: #64748b;
        font-size: 1rem;
        margin: 0.25rem 0 0 0;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    /* Cards Grid - Exactly like Admin but without actions */
    .cards-grid {
        display: grid;
        gap: 2rem;
        grid-template-columns: 1fr;
        margin-top: 1.5rem;
    }

    .modern-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        display: flex;
        gap: 2rem;
        align-items: flex-start;
        min-height: 160px;
        cursor: pointer;
        transform-origin: center;
    }

    .modern-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--primary-gradient);
        opacity: 0;
        transition: var(--transition);
    }

    .modern-card::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(102, 126, 234, 0.03) 0%, transparent 70%);
        opacity: 0;
        transition: var(--transition);
        pointer-events: none;
        z-index: 1;
    }

    .modern-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15), 
                    0 10px 20px rgba(102, 126, 234, 0.1);
        border-color: rgba(102, 126, 234, 0.2);
    }

    .modern-card:hover::before {
        opacity: 1;
        width: 6px;
    }

    .modern-card:hover::after {
        opacity: 1;
    }

    .modern-card:active {
        transform: translateY(-4px) scale(0.98);
    }

    .card-main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        min-width: 0;
        position: relative;
        z-index: 2;
        transition: var(--transition);
    }

    .card-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        line-height: 1.4;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        position: relative;
        transition: var(--transition);
        cursor: pointer;
    }

    .card-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-gradient);
        transition: var(--transition);
    }

    .modern-card:hover .card-title {
        color: var(--primary-color);
        transform: translateX(8px);
    }

    .modern-card:hover .card-title::after {
        width: 60px;
    }

    .card-content {
        color: #475569;
        line-height: 1.8;
        margin: 0;
        font-size: 1.15rem;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: justify;
        transition: var(--transition);
        position: relative;
        font-weight: 400;
        letter-spacing: 0.3px;
    }

    .modern-card:hover .card-content {
        color: #475569;
        transform: translateX(4px);
    }

    .card-footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-top: auto;
        padding-top: 0.75rem;
    }

    .source-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%);
        color: #0369a1;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        border: 1px solid rgba(3, 105, 161, 0.1);
        position: relative;
        overflow: hidden;
        letter-spacing: 0.3px;
    }

    .source-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.4) 50%, transparent 100%);
        transition: var(--transition);
    }

    .source-badge:hover {
        background: linear-gradient(135deg, #0369a1 0%, #0284c7 100%);
        color: white;
        text-decoration: none;
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(3, 105, 161, 0.3);
        border-color: #0369a1;
    }

    .source-badge:hover::before {
        left: 100%;
    }

    .source-badge i {
        font-size: 0.75rem;
        transition: var(--transition);
    }

    .modern-card:hover .source-badge i {
        transform: rotate(5deg) scale(1.1);
    }

    .loading-modern {
        display: flex;
        justify-content: center;
        padding: 2rem;
    }

    .spinner-modern {
        width: 50px;
        height: 50px;
        border: 4px solid #f1f5f9;
        border-top: 4px solid var(--primary-color);
        border-radius: 50%;
        animation: modernSpin 1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
        position: relative;
    }

    .spinner-modern::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        right: 2px;
        bottom: 2px;
        border: 2px solid transparent;
        border-top: 2px solid rgba(102, 126, 234, 0.3);
        border-radius: 50%;
        animation: modernSpin 0.7s linear infinite reverse;
    }

    @keyframes modernSpin {
        0% { 
            transform: rotate(0deg) scale(1);
            border-top-color: var(--primary-color);
        }
        50% { 
            transform: rotate(180deg) scale(1.1);
            border-top-color: #764ba2;
        }
        100% { 
            transform: rotate(360deg) scale(1);
            border-top-color: var(--primary-color);
        }
    }

    .no-results-modern {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
    }

    .no-results-modern i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .action-bar {
            flex-direction: column;
            align-items: stretch;
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
        }

        .search-container {
            max-width: none;
        }

        .google-search-wrapper {
            max-width: 100%;
        }

        .google-search-wrapper.focused {
            max-width: 100%;
            transform: scale(1.01);
        }

        .search-input {
            padding: 16px 20px;
            font-size: 16px;
        }

        .modern-card {
            flex-direction: column;
            gap: 1rem;
            min-height: auto;
        }

        .stats-bar {
            flex-direction: column;
        }

        .stat-card {
            min-width: 100%;
            max-width: 100%;
        }

        .hero-title {
            font-size: 3.5rem;
        }

        .card-title {
            font-size: 1.4rem;
        }

        .card-content {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .modern-container {
            padding: 1rem 0.5rem;
        }

        .action-bar {
            padding: 1.5rem 1rem;
            margin-bottom: 1.5rem;
        }

        .search-input {
            padding: 14px 18px;
            font-size: 15px;
        }

        .modern-card {
            padding: 1rem;
        }

        .hero-title {
            font-size: 3rem;
        }

        .hero-subtitle {
            font-size: 1.4rem;
        }

        .card-title {
            font-size: 1.3rem;
        }

        .card-content {
            font-size: 1rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <!-- Floating Particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <div class="hero-content">
        <h1 class="hero-title">Glosarium Hukum</h1>
        <p class="hero-subtitle">Kamus Istilah Hukum JDIH Provinsi Jawa Tengah</p>
        <div class="hero-divider"></div>
        <p class="hero-description">Koleksi lengkap terminologi hukum untuk referensi profesional dan akademis</p>
    </div>
</div>

<div class="modern-container">
    @if($kamus->count())
        <!-- Stats Bar -->
        <div class="stats-bar">
            <div class="stat-card">
                <div class="stat-number">{{ $kamus->total() }}</div>
                <div class="stat-label">Total Istilah</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $kamus->currentPage() }}</div>
                <div class="stat-label">Halaman</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $kamus->lastPage() }}</div>
                <div class="stat-label">Total Halaman</div>
            </div>
        </div>

        <!-- Cards Grid (Live Search Results) -->
        <div class="cards-grid" id="cardsGrid">
            @foreach($kamus as $item)
            <div class="modern-card" data-title="{{ strtolower($item->judul) }}" 
                 data-description="{{ strtolower($item->deskripsi) }}">
                
                <div class="card-main-content">
                    <h3 class="card-title">{{ $item->judul }}</h3>
                    <div class="card-content">{{ $item->deskripsi }}</div>
                    
                    <div class="card-footer"> 
                        @if ($item->link_perda)
                            <a href="{{ $item->link_perda }}" target="_blank" class="source-badge">
                                <i class="fas fa-external-link-alt"></i>
                                {{ Str::limit($item->judul_perda ?: 'Lihat Perda', 40) }}
                            </a>
                        @elseif ($item->sumber_pdf)
                            <span class="source-badge">
                                <i class="fas fa-file-pdf"></i>
                                PDF Source
                            </span>
                        @else
                            <span class="source-badge">
                                <i class="fas fa-book"></i>
                                Istilah Hukum
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4" id="paginationContainer">
            {{ $kamus->links() }}
        </div>
    @else
        <div class="no-results-modern">
            <i class="fas fa-book-open"></i>
            <h4>Belum ada istilah tersedia</h4>
            <p>Mohon tunggu, konten sedang ditambahkan</p>
        </div>
    @endif
</div>

<script>
// Live search enhancement with AJAX - Auto Search
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('modernSearchInput');
    const searchWrapper = document.getElementById('searchWrapper');
    const cardsGrid = document.querySelector('.cards-grid');
    const statsBar = document.querySelector('.stats-bar');
    const paginationContainer = document.querySelector('#paginationContainer');
    let searchTimeout;
    let isSearching = false;
    
    // Focus/blur effects
    if (searchInput && searchWrapper) {
        searchInput.addEventListener('focus', function() {
            searchWrapper.classList.add('focused');
        });

        searchInput.addEventListener('blur', function(e) {
            setTimeout(() => {
                if (!searchWrapper.contains(e.relatedTarget)) {
                    searchWrapper.classList.remove('focused');
                }
            }, 150);
        });

        // Auto search on typing (no button required)
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();

            // Perform search immediately if query length >= 1, or show all if empty
            searchTimeout = setTimeout(() => {
                performAutoSearch(query);
            }, 200); // Very quick response - 200ms
        });

        // Also search on Enter key for immediate response
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                clearTimeout(searchTimeout);
                performAutoSearch(query);
            }
        });
    }

    // Auto search function
    function performAutoSearch(query) {
        if (isSearching) return;
        
        isSearching = true;
        showLoadingState();

        // Update URL without page reload
        const newUrl = new URL(window.location);
        if (query.length > 0) {
            newUrl.searchParams.set('query', query);
        } else {
            newUrl.searchParams.delete('query');
        }
        window.history.pushState({query: query}, '', newUrl);

        // Use API for live search
        const apiUrl = query.length > 0 
            ? `/api/glosarium/search?query=${encodeURIComponent(query)}`
            : `/api/glosarium/search`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                updateSearchResults(data, query);
                isSearching = false;
            })
            .catch(error => {
                console.error('Search error:', error);
                isSearching = false;
                hideLoadingState();
                // Fallback: reload page with query
                if (query.length > 0) {
                    window.location.href = `{{ route('glosarium.index') }}?query=${encodeURIComponent(query)}`;
                } else {
                    window.location.href = `{{ route('glosarium.index') }}`;
                }
            });
    }

    // Update search results
    function updateSearchResults(data, query) {
        hideLoadingState();
        
        // Update stats
        updateStats(data);
        
        // Update results
        if (data.data && data.data.length > 0) {
            renderResults(data.data, query);
        } else {
            renderNoResults(query);
        }
        
        // Hide pagination for live search
        if (paginationContainer) {
            paginationContainer.style.display = 'none';
        }
    }

    // Update statistics
    function updateStats(data) {
        if (statsBar) {
            statsBar.innerHTML = `
                <div class="stat-card">
                    <div class="stat-number">${data.total || 0}</div>
                    <div class="stat-label">${data.total > 0 ? 'Hasil Ditemukan' : 'Total Istilah'}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">${data.current_page || 1}</div>
                    <div class="stat-label">Halaman</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">${data.last_page || 1}</div>
                    <div class="stat-label">Total Halaman</div>
                </div>
            `;
        }
    }

    // Render search results
    function renderResults(items, query) {
        if (!cardsGrid) return;

        let html = '';
        items.forEach((item, index) => {
            const highlightedTitle = highlightText(item.judul, query);
            const highlightedDesc = highlightText(item.deskripsi, query);
            
            // Create badge content
            let badgeContent = '';
            if (item.link_perda) {
                badgeContent = `
                    <a href="${item.link_perda}" target="_blank" class="source-badge">
                        <i class="fas fa-external-link-alt"></i>
                        ${item.judul_perda ? limitText(item.judul_perda, 40) : 'Lihat Perda'}
                    </a>
                `;
            } else if (item.sumber_pdf) {
                badgeContent = `
                    <span class="source-badge">
                        <i class="fas fa-file-pdf"></i>
                        PDF Source
                    </span>
                `;
            } else {
                badgeContent = `
                    <span class="source-badge">
                        <i class="fas fa-book"></i>
                        Istilah Hukum
                    </span>
                `;
            }
            
            html += `
                <div class="modern-card" style="opacity: 0; transform: translateY(30px); animation: fadeInUp 0.6s ease-out ${index * 100}ms forwards;" 
                     data-title="${item.judul.toLowerCase()}" 
                     data-description="${item.deskripsi.toLowerCase()}">
                    <div class="card-main-content">
                        <h3 class="card-title">${highlightedTitle}</h3>
                        <div class="card-content">${highlightedDesc}</div>
                        <div class="card-footer"> 
                            ${badgeContent}
                        </div>
                    </div>
                </div>
            `;
        });

        cardsGrid.innerHTML = html;
    }

    // Render no results
    function renderNoResults(query) {
        if (!cardsGrid) return;

        const message = query.length > 0 
            ? `Pencarian untuk "<strong>${escapeHtml(query)}</strong>" tidak ditemukan.`
            : 'Belum ada istilah tersedia.';
        
        const actionButton = query.length > 0 
            ? `<button onclick="clearAutoSearch()" class="btn" style="background: var(--primary-gradient); color: white; padding: 12px 24px; border: none; border-radius: 8px; cursor: pointer; margin-top: 1rem;">
                   <i class="fas fa-arrow-left"></i> Tampilkan Semua Data
               </button>`
            : '';

        cardsGrid.innerHTML = `
            <div class="no-results-modern" style="grid-column: 1 / -1;">
                <i class="fas fa-search"></i>
                <h4>Tidak ada hasil ditemukan</h4>
                <p>${message}</p>
                ${actionButton}
            </div>
        `;
    }

    // Highlight search terms
    function highlightText(text, query) {
        if (!query || query.length === 0) return escapeHtml(text);
        
        const terms = query.toLowerCase().split(' ').filter(term => term.length > 0);
        let highlightedText = escapeHtml(text);
        
        terms.forEach(term => {
            const regex = new RegExp(`(${escapeRegExp(term)})`, 'gi');
            highlightedText = highlightedText.replace(regex, 
                '<mark style="background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); color: white; padding: 2px 6px; border-radius: 4px; font-weight: 600;">$1</mark>'
            );
        });
        
        return highlightedText;
    }

    // Show loading state
    function showLoadingState() {
        if (cardsGrid) {
            cardsGrid.innerHTML = `
                <div class="loading-modern" style="grid-column: 1 / -1; text-align: center; padding: 3rem 2rem;">
                    <div class="spinner-modern" style="margin: 0 auto;"></div>
                    <p style="color: #666; margin-top: 1rem;">Mencari istilah...</p>
                </div>
            `;
        }
    }

    // Hide loading state
    function hideLoadingState() {
        const loadingState = document.querySelector('.loading-modern');
        if (loadingState) {
            loadingState.remove();
        }
    }

    // Global function to clear search
    window.clearAutoSearch = function() {
        searchInput.value = '';
        searchInput.dispatchEvent(new Event('input'));
        searchInput.focus();
    }

    // Handle browser back/forward
    window.addEventListener('popstate', function(e) {
        if (e.state && typeof e.state.query !== 'undefined') {
            searchInput.value = e.state.query;
            performAutoSearch(e.state.query);
        } else {
            window.location.reload();
        }
    });

    // Utility functions
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    function limitText(text, limit) {
        return text.length > limit ? text.substring(0, limit) + '...' : text;
    }

    // Add initial animation for existing cards
    const existingCards = document.querySelectorAll('.modern-card');
    existingCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px) scale(0.9)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';
        }, index * 100);
        
        // Click effect
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: radial-gradient(circle, rgba(102, 126, 234, 0.3) 0%, transparent 70%);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
                z-index: 3;
            `;
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Highlight search terms in existing results
    const query = '{{ request("query") }}';
    if (query) {
        highlightSearchTermsInDom(query);
    }

    function highlightSearchTermsInDom(searchQuery) {
        const terms = searchQuery.toLowerCase().split(' ');
        const cards = document.querySelectorAll('.modern-card');
        
        cards.forEach(card => {
            const title = card.querySelector('.card-title');
            const content = card.querySelector('.card-content');
            
            terms.forEach(term => {
                if (term.length >= 1) {
                    highlightInElement(title, term);
                    highlightInElement(content, term);
                }
            });
        });
    }

    function highlightInElement(element, term) {
        if (!element || !element.textContent) return;
        
        const regex = new RegExp(`(${escapeRegExp(term)})`, 'gi');
        const originalText = element.textContent;
        
        if (regex.test(originalText)) {
            const highlightedText = originalText.replace(regex, 
                '<mark style="background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); color: white; padding: 2px 6px; border-radius: 4px; font-weight: 600;">$1</mark>'
            );
            element.innerHTML = highlightedText;
        }
    }
});

// Add CSS animations
const autoSearchStyle = document.createElement('style');
autoSearchStyle.textContent = `
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
    
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .modern-card {
        position: relative;
        overflow: hidden;
    }
    
    .loading-modern .spinner-modern {
        animation: modernSpin 1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
    }
`;
document.head.appendChild(autoSearchStyle);
</script>

@endsection

@section('footer')
    @include('partial.footer')
    @include('partial.script')
@endsection
