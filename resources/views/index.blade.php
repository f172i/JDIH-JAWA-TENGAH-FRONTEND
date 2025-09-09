@extends('app')
@section('head')
    @include('partial.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.5.0/css/flag-icons.min.css" />


    <style>
        /* Tampilan Search */
        .select2-container .select2-selection--single {
            height: auto !important;
        }

        .carousel-container {
            width: 75%;
            margin: 100px auto;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            border-radius: 24px;
        }

        .carousel-banner {
            /* border-radius: 20px 20px 20px 20px; */
            /* background-image: url("{{ asset('media/logoawal.webp') }}"); */
            background-position: center;
            background-size: cover;
            aspect-ratio: 16 / 9;
            */
            /* 3x lebih tinggi dari sebelumnya */
            position: relative;
        }

        .carousel-banner {
            /* border-radius: 20px; */
            /* background-image: url("{{ asset('media/logoawal.webp') }}"); */
            background-position: center;
            background-size: cover;
            /* aspect-ratio: 16 / 9; */
            /* 3x lebih tinggi dari sebelumnya */
            /* position: fixed; */
        }

        .carousel-overlay {
            position: absolute;
            bottom: 5%;
            left: 0;
            right: 0;
            z-index: 1;
        }

        .carousel-content {
            background-color: rgba(63, 64, 61, 0.55);
            border-left: 6px solid #043077;
            border-right: 6px solid #043077;
            /* padding: 1rem 1.5rem;
                                                                                                                                                                                                                        margin: 0 1rem 1rem; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .carousel-text h1 {
            color: white;
            margin: 0;
            font-size: 1.4rem;
            /* sedikit lebih besar biar seimbang */
        }

        .spacer {
            height: 10px;
        }

        .btn-detail {
            display: inline-block;
            padding: 6px 14px;
            border: 2px solid white;
            color: white;
            font-size: 0.9rem;
            text-decoration: none;
            border-radius: 0;
            transition: background 0.3s;
        }

        .btn-detail:hover {
            background: white;
            color: #043077;
        }

        .carousel-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 0.5rem;
        }

        .btn-arrow {
            background: transparent;
            border: 2px solid white;
            border-radius: 50%;
            padding: 6px 10px;
            color: white;
            cursor: pointer;
            font-size: 1rem;
        }

        .carousel-index {
            color: white;
            font-weight: bold;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .carousel-container {
                width: 95%;
                /* lebih fleksibel di HP */
            }

            .carousel-content {
                flex-direction: column;
                text-align: center;
            }

            .carousel-text h1 {
                font-size: 1.1rem;
            }

            .btn-detail {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            .carousel-controls {
                justify-content: center;
            }
        }


        /* Tampilan Search end */








        /* Tampilan Berita*/
        .info-section {
            background: #0f265c;
            /* biru tua */
            color: #fff;
            padding: 2rem;
            border-radius: 16px;
            max-width: 1200px;
            margin: 2rem auto;
        }

        .info-section h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        /* Konten utama kiri */
        .main-news img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .main-news .date {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 0.3rem;
        }

        .main-news .title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .tag {
            display: inline-block;
            background: #16a34a;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .btn-outline {
            display: inline-block;
            border: 1px solid #fff;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background: #fff;
            color: #0f265c;
        }

        /* Daftar berita kanan */
        .side-news {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .side-item {
            display: flex;
            gap: 0.8rem;
        }

        .side-item img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }

        .side-text .date {
            font-size: 0.8rem;
            opacity: 0.7;
            margin-bottom: 0.2rem;
        }

        .side-text .title {
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0.3rem;
        }

        /* Link bawah */
        .see-more {
            display: block;
            text-align: right;
            margin-top: 1.5rem;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
        }

        .see-more:hover {
            text-decoration: underline;
        }

        /* Responsif */
        @media (max-width: 900px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .side-item img {
                width: 100px;
                height: 70px;
            }
        }

        /* Tampilan Berita end*/



        /* Produk Hukum */

        .produk-hukum {
            padding: 50px 0;
            background: #f8f9fa;
        }

        .produk-hukum .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .produk-hukum-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .produk-hukum .card {
            background: #0b3d68;
            color: #fff;
            text-align: center;
            width: 220px;
            padding: 40px 20px 20px;
            border-radius: 12px;
            position: relative;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: transform .3s ease;
        }

        .produk-hukum .card:hover {
            transform: translateY(-8px);
        }

        .produk-hukum .icon {
            width: 100px;
            height: 100px;
            background: #fff;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .produk-hukum .icon img {
            width: 60%;
            height: auto;
        }

        .produk-hukum .card p {
            margin-top: 60px;
            font-size: 16px;
            font-weight: 600;
        }

        /* Produk Hukum END */

        /* Berita Section Styles */
        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 30px;
            padding: 30px 0;
        }

        .content-left {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .section-header {
            background: linear-gradient(135deg, #1994f8, #004499);
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .document-list {
            padding: 20px;
        }

        .document-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s;
        }

        .document-item:hover {
            background-color: #f8f9fa;
        }

        .document-item:last-child {
            border-bottom: none;
        }

        .document-icon {
            width: 40px;
            height: 40px;
            background: #0066cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 15px;
            font-size: 16px;
        }

        .document-info {
            flex: 1;
        }

        .document-title {
            font-weight: bold;
            color: #0066cc;
            margin-bottom: 5px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .document-title:hover {
            color: #004b96;
        }

        .document-meta {
            font-size: 12px;
            color: #666;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-top: 1px solid #eee;
            gap: 15px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            text-decoration: none;
            color: #353535;
            transition: color 0.3s;
            font-size: 14px;
            min-width: 40px;
            text-align: center;
        }

        .pagination a:hover {
            color: #0066cc;
        }

        .pagination .current {
            color: #0066cc;
            font-weight: bold;
        }

        .pagination .disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .pagination .disabled:hover {
            color: #ccc;
        }

        .pagination .ellipsis {
            color: #666;
        }

        .pagination .ellipsis:hover {
            color: #666;
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar-widget {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .widget-content {
            padding: 40px 10px;
        }

        .quick-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .quick-link {
            display: flex;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
        }

        .quick-link:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .quick-link i {
            margin-right: 10px;
            color: #0066cc;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .stat-item1 {
            text-align: center;
            padding: 20px;
            --start-color: #19b9f8;
            --end-color: #004499;
            background: linear-gradient(135deg, var(--start-color), var(--end-color));
            color: white;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out, --start-color 0.3s ease-in-out, --end-color 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .stat-item1::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #19f1f8, #19b9f8);
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
            pointer-events: none;
        }

        .stat-item1:hover {
            transform: scale(1.04);
        }

        .stat-item1:hover::after {
            opacity: 1;
        }

        .stat-item1>* {
            position: relative;
            z-index: 1;
        }

        .stat-item1 .stat-number,
        .stat-item1 .stat-label {
            text-decoration: none;
        }

        .stat-item2 {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #3bf563, #36e40a);
            color: white;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .stat-item2::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #5fff7a, #50ff50);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        .stat-item2:hover {
            transform: scale(1.04);
        }

        .stat-item2:hover::before {
            opacity: 1;
        }

        .stat-item2 .stat-number,
        .stat-item2 .stat-label {
            position: relative;
            z-index: 1;
        }

        .stat-item3 {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #F7BD1E, #f05a03);
            color: white;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .stat-item3::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ffd700, #ff8c00);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        .stat-item3:hover {
            transform: scale(1.04);
        }

        .stat-item3:hover::before {
            opacity: 1;
        }

        .stat-item3 .stat-number,
        .stat-item3 .stat-label {
            position: relative;
            z-index: 1;
        }

        .stat-item4 {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #ff442c, #eb1189);
            color: white;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .stat-item4::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ff5050, #ff3399);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            border-radius: 10px;
        }

        .stat-item4:hover {
            transform: scale(1.04);
        }

        .stat-item4:hover::before {
            opacity: 1;
        }

        .stat-item4 .stat-number,
        .stat-item4 .stat-label {
            position: relative;
            z-index: 1;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            text-decoration: none;
        }

        .stat-label {
            font-size: 12px;
            opacity: 0.9;
            text-decoration: none;
        }

        /* Remove underlines from all stat items when used as links */
        a.stat-item1,
        a.stat-item2,
        a.stat-item3,
        a.stat-item4 {
            text-decoration: none;
        }

        a.stat-item1:hover,
        a.stat-item2:hover,
        a.stat-item3:hover,
        a.stat-item4:hover {
            text-decoration: none;
        }

        /* News Section */
        .news-item {
            display: flex;
            gap: 15px;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .news-item:last-child {
            border-bottom: none;
        }

        .news-image {
            width: 80px;
            height: 60px;
            background: #ddd;
            border-radius: 5px;
            flex-shrink: 0;
        }

        .news-content {
            flex: 1;
        }

        .news-title {
            font-weight: bold;
            color: #0066cc;
            margin-bottom: 5px;
            font-size: 14px;
            line-height: 1.4;
            transition: color 0.3s;
            cursor: pointer;
        }

        .news-title:hover {
            color: #004b96;
        }

        .news-date {
            font-size: 11px;
            color: #666;
        }

        /* Footer */
        .footer {
            background: #0066cc;
            color: white;
            padding: 40px 0 20px;
            margin-top: 40px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            margin-bottom: 10px;
            display: block;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            opacity: 0.8;
        }

        /* Rating Modal */
        .rating-modal {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 300px;
            z-index: 1000;
            display: none;
            /* Initially hidden */
        }

        .rating-modal h4 {
            color: #0066cc;
            margin-bottom: 10px;
        }

        .rating-modal p {
            font-size: 14px;
            margin-bottom: 15px;
            color: #666;
        }

        .rating-buttons {
            display: flex;
            gap: 10px;
        }

        .rating-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s;
        }

        .rating-btn-yes {
            background: #28a745;
            color: white;
        }

        .rating-btn-no {
            background: #6c757d;
            color: white;
        }

        .rating-btn:hover {
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-top: 140px;
                /* More space for mobile nav with search */
            }

            .slideshow-container {
                width: 100%;
                height: 280px;
                margin: 10px auto;
            }

            .slide img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease-in-out;
            }

            .slide:hover img {
                transform: scale(1.05);
            }

            .slide-content {
                padding: 20px 15px 45px;
                display: flex;
                flex-direction: column;
                gap: 0;
                align-items: center;
                justify-content: center;
            }

            .slideshow-container .slide.active .slide-content h2,
            .slideshow-container .slide .slide-content h2,
            .slide-content h2 {
                font-size: 20px !important;
                margin: 0 !important;
                margin-bottom: 0 !important;
                line-height: 1.2;
                border-bottom: 0;
            }

            .slide-title {
                margin-bottom: 0;
            }

            .slide-text {
                margin-top: 0;
            }

            .slideshow-container .slide-content p {
                font-size: 14px;
                margin: 0;
            }

            .slide-prev,
            .slide-next {
                padding: 12px;
                font-size: 16px;
            }

            .slide-prev {
                left: 10px;
            }

            .slide-next {
                right: 10px;
            }

            .header-content {
                flex-direction: column;
                gap: 15px;
            }

            .nav-content {
                flex-direction: column;
                gap: 10px;
                justify-content: center;
            }

            .nav-brand {
                font-size: 14px;
                text-align: center;
                padding-bottom: 5px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                width: 100%;
            }

            .nav-menu {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .nav ul {
                flex-direction: column;
                width: 100%;
            }

            .nav-search {
                width: 100%;
                padding: 0 20px 10px;
            }

            .nav-search .search-box input {
                width: calc(100% - 50px);
            }

            /* Mobile expanded search styles */
            .nav-search.expanded {
                padding: 15px;
                max-width: none;
                width: calc(100% - 30px);
            }

            .nav-search.expanded .search-box input {
                padding: 12px 15px;
                font-size: 14px;
            }

            .nav-search.expanded .search-box button {
                padding: 12px 15px;
            }

            .main-content {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Bidang Section */
        .bidang-section {
            padding: 40px 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }

        .bidang-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 0 20px;
        }

        .bidang-header h2 {
            font-size: 32px;
            font-weight: bold;
            color: #0066cc;
            margin-bottom: 10px;
        }

        .bidang-header p {
            font-size: 16px;
            color: #666;
        }

        .bidang-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 20px;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .bidang-card {
            background: white;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            padding: 20px 10px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            min-height: 110px;
            justify-content: center;
        }

        .bidang-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 102, 204, 0.15);
            border-color: #0066cc;
        }

        .bidang-icon {
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #0066cc, #004499);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            transition: all 0.3s ease;
        }

        .bidang-card:hover .bidang-icon {
            background: linear-gradient(135deg, #004499, #0066cc);
            transform: scale(1.1);
        }

        .bidang-title {
            font-size: 13px;
            font-weight: 600;
            color: #333;
            text-align: center;
            line-height: 1.2;
        }

        .bidang-card:hover .bidang-title {
            color: #0066cc;
        }

        /* Update responsive adjustments for Bidang section */
        @media (max-width: 1024px) {
            .bidang-grid {
                grid-template-columns: repeat(4, 1fr);
                grid-template-rows: auto;
                gap: 18px;
                padding: 0 15px;
            }

            .bidang-card {
                padding: 18px 8px;
                min-height: 105px;
            }

            .bidang-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .bidang-grid {
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: auto;
                gap: 15px;
                padding: 0 15px;
            }

            .bidang-card {
                padding: 15px 8px;
                min-height: 100px;
            }

            .bidang-icon {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }

            .bidang-title {
                font-size: 12px;
            }

            .bidang-header h2 {
                font-size: 28px;
            }

            .bidang-header p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .bidang-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: auto;
                gap: 12px;
            }

            .bidang-card {
                padding: 12px 6px;
                min-height: 90px;
            }

            .bidang-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .bidang-title {
                font-size: 11px;
            }
        }

        /* Berita Section Styles */
        .berita-section {
            padding: 20px 8px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin: 40px 0;
        }

        .berita-header {
            text-align: left;
            margin-bottom: 40px;
            padding: 0 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .layanan-header {
            margin-top: 20px;
            margin-bottom: 40px;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .berita-header h2 {
            font-size: 32px;
            font-weight: bold;
            color: #0066cc;
            margin: 0;
            flex: 1;
        }

        .berita-header p {
            font-size: 16px;
            color: #666;
            margin: 5px 0 0 0;
            flex: 1;
        }

        .layanan-header h2 {
            font-size: 32px;
            font-weight: bold;
            color: #0066cc;
            margin: 0;
            flex: 1;
            line-height: 1;
        }

        .layanan-header p {
            font-size: 16px;
            color: #666;
            margin: 5px 0 0 0;
            flex: 1;
        }


        .lihat-berita-link {
            color: #0066cc;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
            white-space: nowrap;
            margin-left: 20px;
        }

        .lihat-berita-link:hover {
            color: #004499;
        }

        .berita-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .berita-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 102, 204, 0.15);
            border-color: #0066cc;
        }

        .berita-image {
            width: 100%;
            height: 200px;
            background: #f5f5f5;
            border-bottom: 1px solid #e0e0e0;
        }

        .berita-content {
            padding: 20px;
        }

        .berita-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            line-height: 1.4;
            margin: 0 0 12px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .layanan-grid .berita-title {
            text-transform: none;
            text-align: center;
        }

        .layanan-item-hidden {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transform: translateY(-20px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0;
            padding: 0;
        }

        .layanan-item-hidden.show {
            opacity: 1;
            max-height: 500px;
            transform: translateY(0);
            margin: 0;
            padding: 0;
        }

        .layanan-grid .berita-card {
            transition: all 0.3s ease;
        }

        .lihat-selengkapnya-btn {
            display: block;
            margin: 30px auto 0;
            padding: 12px 24px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .lihat-selengkapnya-btn:hover {
            background: #004499;
            transform: translateY(-1px);
        }

        .lihat-selengkapnya-btn.hidden {
            display: none;
        }

        .berita-excerpt {
            font-size: 13px;
            color: #666;
            line-height: 1.5;
            margin: 0;
            text-align: justify;
        }

        /* Responsive adjustments for Berita section */

        /* Custom styles for hero section */
        .custom-hero-area {
            background: white;
            color: #000000;
            padding: 50px 0;
            width: 75%;
            margin: 0 auto;
            /* Centers the entire section */
        }

        /* Ensuring the content inside the container is centered and limited to 75% width */
        .custom-hero-area .container {
            width: 100%;
        }

        /* Ensuring text and video are properly aligned */
        .custom-hero-area .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Text section styling */
        .custom-hero-area .hero-text-wrapper h1 {
            color: #000000;
            font-weight: bold;
            text-align: center;
        }

        /* Styling for iframe container */
        .custom-hero-area .hero-video-wrapper iframe {
            width: 100%;
            min-height: 500px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Optional: For smaller screens, ensure the layout is responsive */
        @media (max-width: 768px) {
            .custom-hero-area {
                width: 100%;
                padding: 30px 15px;
            }

            .custom-hero-area .row {
                flex-direction: column;
                align-items: center;
            }

            .custom-hero-area .col-lg-6 {
                width: 100%;
            }

            .custom-hero-area .hero-video-wrapper iframe {
                max-width: 100%;
            }
        }
    </style>

    <script>
        var year = {{ $tahunberlakutakberlaku }};
        var nama = ["Surat Edaran", "Rekomendasi Kajian", "Peraturan Gubernur", "Peraturan Daerah", "Naskah Akademik",
            "Keputusan Gubernur", "Katalog Produk Hukum", "Instruksi Gubernur"
        ];
        var produk = ['Berlaku', 'Tidak Berlaku'];
        var data_berlaku = {{ $berlaku }};
        var data_tidakberlaku = {{ $tidakberlaku }};
        var grafikkategori = {{ $grafikkategori }};

        var barChartData = {
            labels: year,
            datasets: [{
                label: '{{ __('Berlaku') }}',
                backgroundColor: "#50cd89",
                data: data_berlaku
            }, {
                label: '{{ __('Tidak Berlaku') }}',
                backgroundColor: "#009ef7",
                data: data_tidakberlaku
            }]
        };

        var barChartData2 = {
            labels: nama,
            datasets: [{
                label: '',
                data: grafikkategori,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Website Visitor'
                    }
                }
            });

            var ctx = document.getElementById("canvas2").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData2,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        };
    </script>
@endsection
@section('content')
    @include('partial.topbar')

    <section style="padding-top:5%">
        @include('partial.slideshow')
    </section>


    <section class="mt-16">

        <div>
            @include('partial.pencarian')
        </div>
        </div>

    </section>



    <!--====== Video YT--->
    <section id="hero-area" class="testimonial-one slider-three header-area header-eight custom-hero-area"
        style="min-height: 1000px;justify-items: center;align-items: center;display: flex;"">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <!-- Text Section -->
                    <div class="hero-text-wrapper">
                        <h1 class="text-center fw-bold mb-3" style="color: #000000;">
                            Dukungan Gubernur Jawa Tengah Terhadap Pengelolaan JDIH <br>Provinsi Jawa Tengah
                        </h1>
                        <p class="text-center" style="color: black;">
                            Ini adalah deskripsi singkat yang menjelaskan dukungan dan komitmen Gubernur Jawa Tengah
                            terhadap pengelolaan JDIH.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Video Section -->
                    <div class="hero-video-wrapper" style="background: #fff;">
                        <div style="overflow: hidden; width: 100%; max-width: 800px; max-height:600px;">
                            <iframe class="w-100 min-h-300px rounded"
                                src="https://www.youtube.com/embed/p0De9zIVNyg?si=bH-lqbi1SmdxG7Qc&enablejsapi=1&autoplay=1&mute=1&controls=1&rel=0&showinfo=0&modestbranding=1"
                                title="Dukungan Gubernur Jawa Tengah Terhadap Pengelolaan JDIH Provinsi Jawa Tengah"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partial.produkhukum')




    <!--====== Video YT End--->


    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Left Content -->
            <div class="content-left">
                <div class="section-header">
                    <i class="fas fa-file-alt"></i> Dokumen Hukum Terbaru
                </div>
                <div class="document-list">
                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-gavel"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Daerah Provinsi Jawa Tengah Nomor 15 Tahun 2023</div>
                            <div class="document-meta">Tentang Penyelenggaraan Kebudayaan | 15 Desember 2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Gubernur Jawa Tengah Nomor 89 Tahun 2023</div>
                            <div class="document-meta">Tentang Pedoman Pelaksanaan APBD Tahun 2024 | 10 Desember 2023
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-stamp"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Keputusan Gubernur Jawa Tengah Nomor 440.04/87 Tahun 2023</div>
                            <div class="document-meta">Tentang Penetapan Kawasan Strategis Pariwisata Nasional | 5
                                Desember 2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Instruksi Gubernur Jawa Tengah Nomor 1 Tahun 2024</div>
                            <div class="document-meta">Tentang Percepatan Pelayanan Publik Digital | 2 Januari 2024
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Daerah Provinsi Jawa Tengah Nomor 14 Tahun 2023</div>
                            <div class="document-meta">Tentang Pengendalian Pencemaran dan Kerusakan Lingkungan Hidup |
                                28 November 2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Gubernur Jawa Tengah Nomor 88 Tahun 2023</div>
                            <div class="document-meta">Tentang Standar Pelayanan Minimal Bidang Pendidikan | 20 November
                                2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Keputusan Gubernur Jawa Tengah Nomor 440.04/86 Tahun 2023</div>
                            <div class="document-meta">Tentang Tim Koordinasi Pembangunan Daerah | 15 November 2023
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Daerah Provinsi Jawa Tengah Nomor 13 Tahun 2023</div>
                            <div class="document-meta">Tentang Penyelenggaraan Ketenagakerjaan | 10 November 2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Instruksi Gubernur Jawa Tengah Nomor 15 Tahun 2023</div>
                            <div class="document-meta">Tentang Percepatan Pelayanan Kesehatan Masyarakat | 5 November
                                2023</div>
                        </div>
                    </div>
                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Gubernur Jawa Tengah Nomor 88 Tahun 2023</div>
                            <div class="document-meta">Tentang Standar Pelayanan Minimal Bidang Pendidikan | 20 November
                                2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Keputusan Gubernur Jawa Tengah Nomor 440.04/86 Tahun 2023</div>
                            <div class="document-meta">Tentang Tim Koordinasi Pembangunan Daerah | 15 November 2023
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Peraturan Daerah Provinsi Jawa Tengah Nomor 13 Tahun 2023</div>
                            <div class="document-meta">Tentang Penyelenggaraan Ketenagakerjaan | 10 November 2023</div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="document-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <div class="document-info">
                            <div class="document-title">Instruksi Gubernur Jawa Tengah Nomor 15 Tahun 2023</div>
                            <div class="document-meta">Tentang Percepatan Pelayanan Kesehatan Masyarakat | 5 November
                                2023</div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <a href="#" class="disabled">‹‹</a>
                    <a href="#" class="disabled">‹</a>
                    <span class="current">1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <span class="ellipsis">...</span>
                    <a href="#">15</a>
                    <a href="#">›</a>
                    <a href="#">››</a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Quick Links -->
                <div class="sidebar-widget">
                    <div class="section-header">
                        <i class="fas fa-external-link-alt"></i> Akses Cepat
                    </div>
                    <div class="widget-content">
                        <div class="quick-links">
                            <a href="#" class="quick-link">
                                <i class="fas fa-search"></i>
                                Pencarian Lanjutan
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-download"></i>
                                Download Dokumen
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-bell"></i>
                                Berlangganan Update
                            </a>
                            <a href="#" class="quick-link">
                                <i class="fas fa-question-circle"></i>
                                Bantuan & FAQ
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="sidebar-widget">
                    <div class="section-header">
                        <i class="fas fa-chart-bar"></i> Statistik
                    </div>
                    <div class="widget-content">
                        <div class="stats-grid">
                            <a class="stat-item1" href="">
                                <div class="stat-number">1,247</div>
                                <div class="stat-label">Peraturan Daerah</div>
                            </a>
                            <a class="stat-item2" href="">
                                <div class="stat-number">3,829</div>
                                <div class="stat-label">Peraturan Gubernur</div>
                            </a>
                            <a class="stat-item3" href="">
                                <div class="stat-number">2,156</div>
                                <div class="stat-label">Keputusan Gubernur</div>
                            </a>
                            <a class="stat-item4" href="">
                                <div class="stat-number">892</div>
                                <div class="stat-label">Instruksi Gubernur</div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- News -->
                <div class="sidebar-widget">
                    <div class="section-header">
                        <i class="fas fa-newspaper"></i> Berita Terkini
                    </div>
                    <div class="widget-content">
                        <div class="news-item">
                            <div class="news-image"></div>
                            <div class="news-content">
                                <div class="news-title">Sosialisasi Sistem JDIH Terbaru untuk Pemerintah Daerah</div>
                                <div class="news-date">18 Agustus 2025</div>
                            </div>
                        </div>

                        <div class="news-item">
                            <div class="news-image"></div>
                            <div class="news-content">
                                <div class="news-title">Update Fitur Pencarian dan Aksesibilitas Website JDIH</div>
                                <div class="news-date">15 Agustus 2025</div>
                            </div>
                        </div>

                        <div class="news-item">
                            <div class="news-image"></div>
                            <div class="news-content">
                                <div class="news-title">Peluncuran Aplikasi Mobile JDIH Jawa Tengah</div>
                                <div class="news-date">12 Agustus 2025</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this section after the breadcrumb and before the main-content div -->
    <div class="container">
        <div class="bidang-section">
            <div class="bidang-header">
                <h2>Bidang</h2>
                <p>Daftar bidang yang berkaitan dengan produk hukum</p>
            </div>

            <div class="bidang-grid">
                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="bidang-title">BUMD</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="bidang-title">Desa</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-road"></i>
                    </div>
                    <div class="bidang-title">Infrastruktur</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-ship"></i>
                    </div>
                    <div class="bidang-title">Kelautan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="bidang-title">Kesehatan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="bidang-title">Ketenagakerjaan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="bidang-title">Keuangan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <div class="bidang-title">Komunikasi</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="bidang-title">Lingkungan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="bidang-title">Pariwisata</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="bidang-title">Pemerintahan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="bidang-title">Pendidikan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="bidang-title">Perdagangan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="bidang-title">Perizinan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="bidang-title">Perpustakaan</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-vote-yea"></i>
                    </div>
                    <div class="bidang-title">Politik</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="bidang-title">Retribusi</div>
                </a>

                <a href="#" class="bidang-card">
                    <div class="bidang-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="bidang-title">Sosial</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Berita Section -->
    <div class="container">
        <div class="berita-section">
            <div class="berita-header">
                <div class="berita-header2">
                    <h2>Pengumuman / Berita</h2>
                    <p>Media Informasi dan Berita terkini JDIH Provinsi Jawa Tengah</p>
                </div>
                <a href="#" class="lihat-berita-link">Lihat Berita Lainnya →</a>
            </div>

            <div class="berita-grid">
                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">KEMENTERIAN KOORDINATOR BIDANG INFRASTRUKTUR DAN PEMBANGUNAN
                            KEWILAYAHAN RI MELAKUKAN KUNJUNGAN KERJ...</h3>
                        <p class="berita-excerpt">Semarang, 20 Agustus 2025 – Biro Hukum Sekretariat Daerah (Setda)
                            Provinsi Jawa Tengah menerima kunjungan kerja Tim Teknis Jaringan Dokumentasi dan Informasi
                            Hukum (JDIH) Kementerian Koordinator ...</p>
                    </div>
                </div>

                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">JDIH PROVINSI JAWA TENGAH MENJADI LOKUS KUNJUNGAN KERJA PPATK DALAM
                            RANGKA PENINGKATAN PENGELOLAAN J...</h3>
                        <p class="berita-excerpt">Semarang, 12 Agustus 2025 – Biro Hukum Sekretariat Daerah (Setda)
                            Provinsi Jawa Tengah menerima kunjungan dari Pusat Pelaporan Dan Analisis Transaksi Keuangan
                            (PPATK) dalam rangka ...</p>
                    </div>
                </div>

                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Mahasiswa Teknik Informatika UDINUS Terapkan Ilmu di Pemprov Jateng:
                            Sinergi Kampus dan Pemerintah...</h3>
                        <p class="berita-excerpt">Semarang (13/8/2025) — Inovasi digital dalam pemerintahan tak lagi
                            hanya menjadi wacana. Hal ini mulai diwujudkan melalui kolaborasi nyata antara dunia
                            pendidikan dan sektor publik. Sejumlah mah ...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Grafik Section (Static) -->
    <div class="container" style="margin-top: 24px; margin-bottom: 24px;">
        <div style="display: flex; gap: 24px; flex-wrap: wrap;">
            <!-- Grafik Status Produk Hukum -->
            <div
                style="background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); padding: 24px; flex: 1 1 480px; min-width: 350px; max-width: 600px;">
                <div style="display: flex; align-items: center; margin-bottom: 8px;">
                    <span style="font-weight: bold; font-size: 1.2em;">Grafik Status Produk Hukum</span>
                </div>
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 8px;">
                    <div
                        style="width: 24px; height: 12px; background: #4fc3a1; display: inline-block; border-radius: 2px;">
                    </div>
                    <span style="font-size: 0.95em; margin-right: 12px;">Berlaku</span>
                    <div
                        style="width: 24px; height: 12px; background: #2196f3; display: inline-block; border-radius: 2px;">
                    </div>
                    <span style="font-size: 0.95em;">Tidak Berlaku</span>
                </div>
                <svg width="100%" height="260" viewBox="0 0 500 260">
                    <!-- Y axis lines -->
                    <g stroke="#eee">
                        <line x1="50" y1="40" x2="50" y2="220" />
                        <line x1="50" y1="220" x2="480" y2="220" />
                        <line x1="50" y1="80" x2="480" y2="80" />
                        <line x1="50" y1="120" x2="480" y2="120" />
                        <line x1="50" y1="160" x2="480" y2="160" />
                        <line x1="50" y1="200" x2="480" y2="200" />
                    </g>
                    <!-- Bars: 2025, 2024, 2023, 2022, 2021, 2020, 2019 -->
                    <g>
                        <rect x="70" y="120" width="32" height="100" fill="#4fc3a1" /> <!-- 2025: 500 -->
                        <rect x="120" y="140" width="32" height="80" fill="#4fc3a1" /> <!-- 2024: 350 -->
                        <rect x="170" y="40" width="32" height="180" fill="#4fc3a1" /> <!-- 2023: 1100 -->
                        <rect x="220" y="118" width="32" height="102" fill="#4fc3a1" /> <!-- 2022: 580 -->
                        <rect x="270" y="108" width="32" height="112" fill="#4fc3a1" /> <!-- 2021: 620 -->
                        <rect x="320" y="200" width="32" height="20" fill="#4fc3a1" /> <!-- 2020: 100 -->
                        <rect x="370" y="200" width="32" height="20" fill="#4fc3a1" /> <!-- 2019: 80 -->
                    </g>
                    <!-- X axis labels -->
                    <g font-size="13" fill="#555">
                        <text x="71" y="240">2025</text>
                        <text x="121" y="240">2024</text>
                        <text x="171" y="240">2023</text>
                        <text x="221" y="240">2022</text>
                        <text x="271" y="240">2021</text>
                        <text x="321" y="240">2020</text>
                        <text x="371" y="240">2019</text>
                    </g>
                    <!-- Y axis labels -->
                    <g font-size="12" fill="#888">
                        <text x="10" y="225">0</text>
                        <text x="0" y="165">600</text>
                        <text x="0" y="125">800</text>
                        <text x="0" y="85">1,000</text>
                        <text x="0" y="45">1,200</text>
                    </g>
                </svg>
            </div>

            <!-- Grafik Kategori Produk Hukum -->
            <div
                style="background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); padding: 24px; flex: 1 1 480px; min-width: 350px; max-width: 600px;">
                <div style="display: flex; align-items: center; margin-bottom: 8px;">
                    <span style="font-weight: bold; font-size: 1.2em;">Grafik Kategori Produk Hukum</span>
                </div>
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 8px;">
                    <div
                        style="width: 24px; height: 12px; background: #8e6be6; display: inline-block; border-radius: 2px;">
                    </div>
                    <span style="font-size: 0.95em;">Jumlah Kategori</span>
                </div>
                <svg width="100%" height="300" viewBox="0 0 500 300">
                    <!-- Y axis lines -->
                    <g stroke="#eee">
                        <line x1="50" y1="40" x2="50" y2="220" />
                        <line x1="50" y1="220" x2="480" y2="220" />
                        <line x1="50" y1="80" x2="480" y2="80" />
                        <line x1="50" y1="120" x2="480" y2="120" />
                        <line x1="50" y1="160" x2="480" y2="160" />
                        <line x1="50" y1="200" x2="480" y2="200" />
                    </g>
                    <!-- Bars: 7 categories -->
                    <g>
                        <rect x="70" y="40" width="36" height="180" fill="#8e6be6" />
                        <!-- Keputusan Gubernur: 2000 -->
                        <rect x="120" y="80" width="36" height="140" fill="#ffa42d" />
                        <!-- Peraturan Gubernur: 1300 -->
                        <rect x="170" y="120" width="36" height="100" fill="#6a9ae6" />
                        <!-- Peraturan Daerah: 700 -->
                        <rect x="220" y="180" width="36" height="40" fill="#4fc3a1" />
                        <!-- Keputusan Kepala OPD: 250 -->
                        <rect x="270" y="200" width="36" height="20" fill="#8bc34a" /> <!-- Buku Hukum: 100 -->
                        <rect x="320" y="210" width="36" height="10" fill="#e57373" />
                        <!-- Hasil Fasilitasi: 50 -->
                        <rect x="370" y="210" width="36" height="10" fill="#bdbdbd" />
                        <!-- Raperda Kabupaten/Kota: 50 -->
                    </g>
                    <!-- X axis labels (rotated) -->
                    <g font-size="12" fill="#555" style="font-family: sans-serif;">
                        <g transform="rotate(-20 88 250)">
                            <text x="18" y="240">Kep. Gubernur</text>
                        </g>
                        <g transform="rotate(-20 138 250)">
                            <text x="38" y="240">Peraturan Gubernur</text>
                        </g>
                        <g transform="rotate(-20 188 250)">
                            <text x="100" y="240">Peraturan Daerah</text>
                        </g>
                        <g transform="rotate(-20 238 250)">
                            <text x="118" y="240">Keputusan Kepala OPD</text>
                        </g>
                        <g transform="rotate(-20 288 250)">
                            <text x="228" y="240">Buku Hukum</text>
                        </g>
                        <g transform="rotate(-20 338 250)">
                            <text x="268" y="240">Hasil Fasilitasi</text>
                        </g>
                        <g transform="rotate(-20 388 250)">
                            <text x="268" y="240">Raperda Kabupaten/Kota</text>
                        </g>
                    </g>
                    <!-- Y axis labels -->
                    <g font-size="12" fill="#888">
                        <text x="10" y="225">0</text>
                        <text x="0" y="165">500</text>
                        <text x="0" y="125">1,000</text>
                        <text x="0" y="85">1,500</text>
                        <text x="0" y="45">2,000</text>
                    </g>
                </svg>
            </div>
        </div>
    </div>

    <!-- Layanan Section -->
    <div class="container">
        <div class="berita-section">
            <div class="layanan-header">
                <div class="berita-header2">
                    <h2>Informasi Produk dan Layanan Hukum <br>Jawa Tengah dalam Satu Portal</h2>
                    <p>Biro Hukum Jawa Tengah, Ngayemi, lan Nglayani</p>
                </div>
            </div>

            <div class="layanan-grid">
                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Layanan Pengawasan Produk Hukum Kabupaten/Kota (Waskito Jateng)</h3>
                    </div>
                </div>

                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Elektronik Produk Hukum Daerah (e-PHD)</h3>
                    </div>
                </div>

                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Pemberian Layanan Bantuan Hukum (si BANKUMIS)</h3>
                    </div>
                </div>

                <div class="berita-card">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Rencana Aksi HAM (RANHAM) Provinsi Jawa Tengah</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Elektronik Produk Hukum Daerah (e-PHD)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Pemberian Layanan Bantuan Hukum (si BANKUMIS)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Elektronik Produk Hukum Daerah (e-PHD)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Pemberian Layanan Bantuan Hukum (si BANKUMIS)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Elektronik Produk Hukum Daerah (e-PHD)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Pemberian Layanan Bantuan Hukum (si BANKUMIS)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Elektronik Produk Hukum Daerah (e-PHD)</h3>
                    </div>
                </div>

                <div class="berita-card layanan-item-hidden">
                    <div class="berita-image"></div>
                    <div class="berita-content">
                        <h3 class="berita-title">Pemberian Layanan Bantuan Hukum (si BANKUMIS)</h3>
                    </div>
                </div>
            </div>

            <button class="lihat-selengkapnya-btn" onclick="toggleLayananItems()">Lihat Selengkapnya</button>
        </div>
    </div>

    <!--====== TESTIMONIAL ONE PART ENDS ======-->

    <!--====== Tiny Slider js ======-->
    <script src="https://cdn.ayroui.com/1.0/js/tiny-slider.js"></script>
    </script>

    <script>
        //======== tiny slider for testimonial-one
        // tns({
        //     autoplay: true,
        //     autoplayButtonOutput: false,
        //     mouseDrag: true,
        //     gutter: 0,
        //     container: ".-items-active",
        //     center: false,
        //     nav: true,
        //     navPosition: "bottom",
        //     controls: false,
        //     speed: 400,
        //     controlsText: [
        //         '<i class="lni lni-arrow-left-circle"></i>',
        //         '<i class="lni lni-arrow-right-circle"></i>',
        //     ],
        //     responsive: {
        //         0: {
        //             items: 1,
        //         },

        //         768: {
        //             items: 2,
        //         },
        //         992: {
        //             items: 3,
        //         },
        //     },
        // });
    </script>

    <!--====== HEADER ONE PART ENDS ======-->

    <!-- Start Cta Area -->
    <section id="services" class="latest-news-area section">
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="fw-bold">
                                {{ app()->getLocale() == 'id' ? 'Daftar Produk Hukum' : GoogleTranslate::trans('Daftar Produk Hukum', app()->getLocale()) }}
                            </h1>
                            <p>
                                {{ app()->getLocale() == 'id' ? 'Daftar Peraturan sesuai keterkaitan dengan produk hukum' : GoogleTranslate::trans('Daftar Peraturan sesuai keterkaitan dengan produk hukum', app()->getLocale()) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="col-xl-10 col-lg-8 mx-auto">
                        <div class="section-title text-center">
                            <h3 class="mb-10">
                                {{ app()->getLocale() == 'id' ? 'Populer' : GoogleTranslate::trans('Populer', app()->getLocale()) }}
                            </h3>
                        </div>
                    </div>
                    @foreach ($terpopuler as $key => $var)
                        <div class="d-flex align-items-sm-center">
                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                    <span class="text-gray-600 fw-semibold fs-6 mt-10">
                                        {{ app()->getLocale() == 'id' ? 'Subjek :' : GoogleTranslate::trans('Subjek :', app()->getLocale()) }}
                                        <?php
                                        $separated = explode(',', $var->file_tags);
                                        foreach ($separated as $value) {
                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-uppercase text-gray-900">' . $value . '</a>&nbsp;';
                                        }
                                        ?>
                                    </span>
                                    <h4 class="title">
                                        <a href="{{ url('inventarisasi-hukum/detail/' . $var->link) }}"
                                            class="text-hover-danger text-gray-900">
                                            {{ app()->getLocale() == 'id' ? $var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang : GoogleTranslate::trans($var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang, app()->getLocale()) }}
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center mb-4">
                                        <p class="p-1em">
                                            {{ app()->getLocale() == 'id' ? 'Tentang ' . Helper::string_rmv_html($var->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($var->content), app()->getLocale()) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <span class="badge fs-8 fw-bold my-2">
                                <span class="text-gray-400 fw-semibold fs-7">
                                    # {{ $key + 1 }}
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-12">
                    <div class="col-xl-10 col-lg-8 mx-auto">
                        <div class="section-title text-center">
                            <h3 class="mb-10">
                                {{ app()->getLocale() == 'id' ? 'Terbaru' : GoogleTranslate::trans('Terbaru', app()->getLocale()) }}
                            </h3>
                        </div>
                    </div>
                    @foreach ($terbaru as $key => $var)
                        <div class="d-flex align-items-sm-center">
                            <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                    <span class="text-gray-600 fw-semibold fs-6 mt-10">
                                        {{ app()->getLocale() == 'id' ? 'Subjek :' : GoogleTranslate::trans('Subjek :', app()->getLocale()) }}
                                        <?php
                                        $separated = explode(',', $var->file_tags);
                                        foreach ($separated as $value) {
                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-uppercase text-gray-900">' . $value . '</a>&nbsp;';
                                        }
                                        ?>
                                    </span>
                                    <h4 class="title">
                                        <a href="{{ url('inventarisasi-hukum/detail/' . $var->link) }}"
                                            class="text-hover-danger text-gray-900">
                                            {{ app()->getLocale() == 'id' ? $var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang : GoogleTranslate::trans($var->nama . ' Nomor ' . $var->no_peraturan . ' Tahun ' . $var->tahun_diundang, app()->getLocale()) }}
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center mb-4">
                                        <p class="p-1em">
                                            {{ app()->getLocale() == 'id' ? 'Tentang ' . Helper::string_rmv_html($var->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($var->content), app()->getLocale()) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <span class="badge fs-8 fw-bold my-2">
                                <span class="text-gray-400 fw-semibold fs-7">
                                    # {{ $key + 1 }}
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Cta Area -->

    <!-- Start Brand Area -->
    <section class="slider-three">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h3 class="title">
                            {{ app()->getLocale() == 'id' ? 'Tautan' : GoogleTranslate::trans('Tautan', app()->getLocale()) }}
                        </h3>
                        <p class="text">
                            {{ app()->getLocale() == 'id' ? 'Tautan Terkait JDIH Provinsi jawa tengah' : GoogleTranslate::trans('Tautan Terkait JDIH Provinsi jawa tengah', app()->getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="slider-items-wrapper">
                <div class="row sliders-items-active2">
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/kemendagri.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://www.kemendagri.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Kementrian Dalam Negeri Republik Indonesia' : GoogleTranslate::trans('Kementrian Dalam Negeri Republik Indonesia', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/setneg.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://www.setneg.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Kementerian Sekretariat Negara Republik Indonesia' : GoogleTranslate::trans('Kementerian Sekretariat Negara Republik Indonesia', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/jdihn.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://www.jdihn.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Jaringan Dokumentasi dan Informasi Hukum Nasional' : GoogleTranslate::trans('Jaringan Dokumentasi dan Informasi Hukum Nasional', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/svg/logo-jawa-tengah.svg') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://jdih.dprd.jatengprov.go.id">
                                        {{ __('JDIH DPRD Provinsi Jawa Tengah') }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/bphn.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="http://www.bphn.go.id">
                                        {{ app()->getLocale() == 'id' ? 'Badan Pembinaan Hukum Nasional - Kemenkumhan RI' : GoogleTranslate::trans('Badan Pembinaan Hukum Nasional - Kemenkumhan RI', app()->getLocale()) }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="features-style-two text-center d-flex">
                            <div class="features-icon">
                                <img src="{{ asset('media/pustaka.png') }}">
                            </div>
                            <div class="features-content">
                                <h4 class="">
                                    <a class="text-gray-900 text-hover-danger" href="https://pustaka.ham.go.id/">
                                        Pustaka HAM Indonesia Digital
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Brand Area -->

    <!-- Start Video Area -->
    <section class="slider-three" style="background-color:white;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h3 class="title">
                            {{ app()->getLocale() == 'id' ? 'Video' : GoogleTranslate::trans('Tautan', app()->getLocale()) }}
                        </h3>
                        <p class="text">
                            {{ app()->getLocale() == 'id' ? 'Video Terkait JDIH Provinsi Jawa Tengah' : GoogleTranslate::trans('Video Terkait JDIH Provinsi Jawa Tengah', app()->getLocale()) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="slider-items-wrapper">
                <div class="row videos-items-active">
                    @foreach ($dataVideo as $video)
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="features-style-two  d-flex mb-0">
                                <a href="{{ $video->link_youtube_video }}" target="__blank">
                                    <img src="{{ asset('video/' . $video->thumbnail_video) }}">
                                </a>
                            </div>
                            <div class="features-style-two  d-flex mt-0" style="padding: 0px 20px">
                                <h4 class="section-title text-center">
                                    <a href="{{ $video->link_youtube_video }}" target="__blank"
                                        class="text-hover-danger text-gray-900">
                                        {{ $video->judul_video }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="col-md-7 align-right p-5">
                <a href="{{ url('videos') }}" class="btn primary-btn-outline rounded-full mr-2"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <span>{{ app()->getLocale() == 'id' ? 'Selengkapnya' : GoogleTranslate::trans('Selengkapnya', app()->getLocale()) }}</span>
                    <i class="lni lni-arrow-right fs-2"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Video Area -->

    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
    <script>
        $(document).ready(function() {
            Swal.fire({
                imageUrl: '{{ asset('gambar_survey/' . $survey_gambar->image) }}',
                title: 'Apakah anda berkenan menilai kami?',
                text: 'Silahkan berikan penilaian anda terhadap website kami',
                background: 'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, saya akan menilai!',
                cancelButtonText: 'Tidak, terimakasih'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ $survey->link }}';
                }
            });
        });
    </script>


    <script>
        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".sliders-items-active2",
            center: true,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,
            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });
        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".sliders-items-active3",
            center: true,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,
            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });

        tns({
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            container: ".videos-items-active",
            center: false,
            nav: true,
            navPosition: "bottom",
            controls: false,
            speed: 400,


            controlsText: [
                '<i class="lni lni-arrow-left-circle"></i>',
                '<i class="lni lni-arrow-right-circle"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                },

                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
            },
        });

        $(document).ready(function() {
            $(".kt_advanced_search_button_1").click(function() {
                let namadokumen = $("#nama_dokumen").val();
                let kategori_ = $("#kategori_").val();
                let tahun_ = $("#tahun_").val();
                let nomor_ = $("#nomor_").val();

                let tipe_dokumen = $("#tipe_dokumen").val();
                let status_dokumen = $("#status_dokumen").val();
                let url = "{{ route('pencarian.pencarian') }}?status_dokumen=" + status_dokumen +
                    "&tipe_dokumen=" + tipe_dokumen + "&dokumen=" + namadokumen + "&kategori=" + kategori_ +
                    "&tahun=" + tahun_ + "&nomor=" + nomor_;
                window.location.href = url
            });
        });

        // Slideshow functions with user interaction detection
        let slideIndex = 1;
        let autoSlideTimer = null;
        let userInteractionTimer = null;
        let isUserInteracting = false;
        const AUTO_SLIDE_DELAY = 5000; // 5 seconds between auto slides
        const USER_INTERACTION_DELAY = 8000; // 8 seconds of inactivity before resuming auto slide

        function changeSlide(n) {
            pauseAutoSlide(); // User is interacting
            showSlide(slideIndex += n);
            resetUserInteractionTimer();
        }

        function currentSlide(n) {
            pauseAutoSlide(); // User is interacting
            showSlide(slideIndex = n);
            resetUserInteractionTimer();
        }

        function showSlide(n) {
            const slides = document.getElementsByClassName('slide');
            const dots = document.getElementsByClassName('dot');

            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }

            // First, remove slide-out class from all slides
            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove('slide-out');
            }

            // Add slide-out class to current active slide
            for (let i = 0; i < slides.length; i++) {
                if (slides[i].classList.contains('active')) {
                    slides[i].classList.add('slide-out');
                    slides[i].classList.remove('active');
                }
            }

            // Remove active class from all dots
            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove('active');
            }

            // Add active class to new slide immediately
            if (slides[slideIndex - 1]) {
                slides[slideIndex - 1].classList.add('active');
            }
            if (dots[slideIndex - 1]) {
                dots[slideIndex - 1].classList.add('active');
            }

            // Clean up slide-out classes after animation
            setTimeout(() => {
                for (let i = 0; i < slides.length; i++) {
                    if (!slides[i].classList.contains('active')) {
                        slides[i].classList.remove('slide-out');
                    }
                }
            }, 600);
        }

        // Auto slideshow
        function autoSlide() {
            if (!isUserInteracting) {
                const slides = document.getElementsByClassName('slide');
                if (slides.length === 0) return;

                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }
                showSlide(slideIndex);
            }
        }

        // Start auto slideshow
        function startAutoSlide() {
            if (autoSlideTimer) {
                clearInterval(autoSlideTimer);
            }
            autoSlideTimer = setInterval(autoSlide, AUTO_SLIDE_DELAY);
        }

        // Pause auto slideshow
        function pauseAutoSlide() {
            if (autoSlideTimer) {
                clearInterval(autoSlideTimer);
                autoSlideTimer = null;
            }
            isUserInteracting = true;
        }

        // Reset user interaction timer
        function resetUserInteractionTimer() {
            if (userInteractionTimer) {
                clearTimeout(userInteractionTimer);
            }

            userInteractionTimer = setTimeout(() => {
                isUserInteracting = false;
                startAutoSlide(); // Resume auto slide after user inactivity
            }, USER_INTERACTION_DELAY);
        }

        // Initialize slideshow when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners for slideshow controls
            const slideshowContainer = document.querySelector('.slideshow-container');
            const prevBtn = document.querySelector('.slide-prev');
            const nextBtn = document.querySelector('.slide-next');
            const dots = document.querySelectorAll('.dot');

            // Pause auto slide when user hovers over slideshow
            if (slideshowContainer) {
                slideshowContainer.addEventListener('mouseenter', () => {
                    pauseAutoSlide();
                });

                slideshowContainer.addEventListener('mouseleave', () => {
                    resetUserInteractionTimer();
                });
            }

            // Add click event listeners to navigation buttons
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    changeSlide(-1);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    changeSlide(1);
                });
            }

            // Add click event listeners to dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide(index + 1);
                });
            });

            // Start the auto slideshow kene
            startAutoSlide();

            // Initialize search functionality
            const searchInput = document.querySelector('.nav-search .search-box input');
            const searchButton = document.querySelector('.nav-search .search-box button');
            const navSearch = document.querySelector('.nav-search');
            const nav = document.querySelector('.nav');
            let isSearchExpanded = false;

            // Handle search input click
            searchInput.addEventListener('click', function(e) {
                e.stopPropagation();
                expandSearch();
            });

            // Handle search button click
            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                if (!isSearchExpanded) {
                    expandSearch();
                } else {
                    const searchTerm = searchInput.value.trim();
                    if (searchTerm) {
                        alert(`Mencari: "${searchTerm}" - Fitur pencarian akan segera dikembangkan.`);
                        collapseSearch();
                    }
                }
            });

            // Handle Enter key in search input
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const searchTerm = searchInput.value.trim();
                    if (searchTerm) {
                        alert(`Mencari: "${searchTerm}" - Fitur pencarian akan segera dikembangkan.`);
                        collapseSearch();
                    }
                }
            });

            // Handle clicks outside search when expanded
            document.addEventListener('click', function(e) {
                if (isSearchExpanded && !navSearch.contains(e.target)) {
                    collapseSearch();
                }
            });

            // Handle escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isSearchExpanded) {
                    collapseSearch();
                }
            });

            function expandSearch() {
                if (!isSearchExpanded) {
                    isSearchExpanded = true;
                    navSearch.classList.add('expanded');
                    nav.classList.add('search-expanded');
                    searchInput.focus();
                }
            }

            function collapseSearch() {
                if (isSearchExpanded) {
                    isSearchExpanded = false;
                    navSearch.classList.remove('expanded');
                    nav.classList.remove('search-expanded');
                    searchInput.blur();
                }
            }
        });

        // Accessibility functions
        function adjustAccessibility() {
            alert(
                'Fitur aksesibilitas akan segera tersedia. Tekan Control-F11 untuk penyesuaian screen reader atau Control-F10 untuk menu aksesibilitas.'
            );
        }

        function exploreOptions() {
            alert('Menu eksplorasi aksesibilitas - Fitur akan segera dikembangkan.');
        }

        // Rating functions
        let ratingModalShown = false;

        function giveRating(willRate) {
            const modal = document.getElementById('ratingModal');
            if (willRate) {
                alert('Terima kasih! Anda akan diarahkan ke halaman penilaian.');
                modal.style.display = 'none';
            } else {
                modal.style.display = 'none';
            }
            ratingModalShown = true;
        }

        // Mouse-following zoom effect for slideshow images
        const slides = document.querySelectorAll('.slide');

        slides.forEach(slide => {
            const img = slide.querySelector('img');
            let rafId = null;
            let targetX = 50;
            let targetY = 50;
            let currentX = 50;
            let currentY = 50;

            function updateTransformOrigin() {
                if (img) {
                    // Smooth interpolation towards target
                    currentX += (targetX - currentX) * 0.1;
                    currentY += (targetY - currentY) * 0.1;

                    img.style.transformOrigin = `${currentX}% ${currentY}%`;

                    // Continue animation if not close enough to target
                    if (Math.abs(targetX - currentX) > 0.1 || Math.abs(targetY - currentY) > 0.1) {
                        rafId = requestAnimationFrame(updateTransformOrigin);
                    } else {
                        rafId = null;
                    }
                }
            }

            slide.addEventListener('mousemove', function(e) {
                if (img) {
                    const rect = slide.getBoundingClientRect();
                    targetX = ((e.clientX - rect.left) / rect.width) * 100;
                    targetY = ((e.clientY - rect.top) / rect.height) * 100;

                    if (!rafId) {
                        rafId = requestAnimationFrame(updateTransformOrigin);
                    }
                }
            });

            slide.addEventListener('mouseleave', function() {
                if (img) {
                    targetX = 50;
                    targetY = 50;

                    if (!rafId) {
                        rafId = requestAnimationFrame(updateTransformOrigin);
                    }
                }
            });
        });
        // Show rating modal once after page loads
        // function showRatingModal() {
        //     if (!ratingModalShown) {
        //         document.getElementById('ratingModal').style.display = 'block';

        //         // Hide modal after 25 seconds if no action taken
        //         setTimeout(() => {
        //             const modal = document.getElementById('ratingModal');
        //             if (modal.style.display !== 'none' && !ratingModalShown) {
        //                 modal.style.display = 'none';
        //                 ratingModalShown = true;
        //             }
        //         }, 25000);
        //     }
        // }

        // Show rating modal after 5 seconds when page loads
        setTimeout(showRatingModal, 5000);

        // Toggle layanan items functionality
        function toggleLayananItems() {
            const hiddenItems = document.querySelectorAll('.layanan-item-hidden');
            const button = document.querySelector('.lihat-selengkapnya-btn');

            if (button.textContent === 'Lihat Selengkapnya') {
                // Show all items simultaneously for smooth single slide effect
                hiddenItems.forEach((item) => {
                    item.classList.add('show');
                });
                button.textContent = 'Sembunyikan';
            } else {
                // Hide all items simultaneously for smooth single slide effect
                hiddenItems.forEach((item) => {
                    item.classList.remove('show');
                });
                button.textContent = 'Lihat Selengkapnya';
            }
        }
    </script>
@endsection
