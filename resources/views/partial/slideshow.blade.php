<style>
    .carousel {
        position: relative;
        width: 75%;
        overflow: hidden;
        border-radius: 20px;
        background: linear-gradient(135deg, #222, #444);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        margin: 0 auto;
        /* centers horizontally in parent container */
    }

    .slides {
        display: flex;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        will-change: transform;
    }

    .slide {
        min-width: 100%;
        user-select: none;
        position: relative;
        padding-top: 56.25%;
        /* 16:9 Aspect Ratio */
    }

    .slide iframe,
    .slide img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        bottom: 0;
        border-radius: 16px;
        object-fit: fill;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.6));
        background: #000;
    }

    /* Arrows */
    .arrow {
        display: none;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.25);
        border: none;
        padding: 14px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
        z-index: 10;
        color: #fff;
        font-size: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
        user-select: none;
    }

    .arrow:hover {
        background: rgba(255, 255, 255, 0.8);
        transform: translateY(-50%) scale(1.1);
    }

    .arrow.left {
        left: 16px;
    }

    .arrow.right {
        right: 16px;
    }

    /* Dots */
    .dots {
        display: none;
        position: hidden;
        text-align: center;
        padding: 14px 0;
        border-radius: 0 0 16px 16px;
        box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.05);
    }

    .dot {
        display: none;
        width: 14px;
        height: 14px;
        margin: 0 8px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
    }

    .dot:hover {
        background: #ccc;
        transform: scale(1.2);
    }

    .dot.active {
        background: #fff;
    }

    @media (max-width: 600px) {
        .arrow {
            padding: 10px;
            font-size: 18px;
        }

        .dot {
            width: 12px;
            height: 12px;
            margin: 0 6px;
        }
    }
</style>

<div class="carousel" aria-label="Image and video carousel">
    <div class="slides">
        <!-- YouTube video -->
        <div class="slide" role="group" aria-roledescription="slide" aria-label="YouTube video slide" controls muted>
            <iframe id="video-frame" class="w-100 min-h-300px rounded"
                src="https://www.youtube.com/embed/p0De9zIVNyg?si=bH-lqbi1SmdxG7Qc&enablejsapi=1&autoplay=1&mute=1&loop=1"
                title="Dukungan Gubernur Jawa Tengah Terhadap Pengelolaan JDIH Provinsi Jawa Tengah" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen>
            </iframe>
        </div>
        <!-- Image 1 -->
        <div class="slide" role="group" aria-roledescription="slide" aria-label="Image slide 1">
            <img src="{{ asset('media/logoawal.webp') }}" alt="JDIH">
        </div>
        <!-- Image 2 -->
        <div class="slide" role="group" aria-roledescription="slide" aria-label="Image slide 2">
            <img src="{{ asset('media/logoawal.webp') }}" alt="JDIH">
        </div>
    </div>

    <button class="arrow left" aria-label="Previous slide">&#10094;</button>
    <button class="arrow right" aria-label="Next slide">&#10095;</button>

    <div class="dots" role="tablist" aria-label="Select slide">
        <button class="dot active" aria-selected="true" aria-label="Slide 1" role="tab"></button>
        <button class="dot" aria-selected="false" aria-label="Slide 2" role="tab"></button>
        <button class="dot" aria-selected="false" aria-label="Slide 3" role="tab"></button>
    </div>
</div>

<script>
    const slides = document.querySelector('.slides');
    const dots = document.querySelectorAll('.dot');
    const leftArrow = document.querySelector('.arrow.left');
    const rightArrow = document.querySelector('.arrow.right');
    const totalSlides = dots.length;
    let currentIndex = 0;
    let autoSlideInterval;
    let isVideoPlaying = false; // Flag to track video state

    const iframe = document.getElementById('video-frame');
    let player;

    // Initialize YouTube Player API
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('video-frame', {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
            isVideoPlaying = true;
            clearInterval(autoSlideInterval); // Pause auto-slide when video is playing
        } else if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.ENDED) {
            isVideoPlaying = false;
            startAutoSlide(); // Resume auto-slide when video is paused or ended
        }

    }

    function updateCarousel(index) {
        if (isVideoPlaying) return; // Prevent updating carousel if video is playing

        if (index < 0) index = totalSlides - 1;
        if (index >= totalSlides) index = 0;
        currentIndex = index;
        slides.style.transform = `translateX(-${index * 100}%)`;

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
            dot.setAttribute('aria-selected', i === index);
        });

        // Pause YouTube video if slide is not 0 (YouTube video slide)
        if (iframe) {
            if (index !== 0 && player && player.getPlayerState() === YT.PlayerState.PLAYING) {
                player.pauseVideo(); // Pause video if not in the video slide
            }
        }
    }

    leftArrow.addEventListener('click', () => {
        updateCarousel(currentIndex - 1);
        resetAutoSlide();
    });

    rightArrow.addEventListener('click', () => {
        updateCarousel(currentIndex + 1);
        resetAutoSlide();
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            updateCarousel(i);
            resetAutoSlide();
        });
    });

    // Auto slide every 5 seconds
    function startAutoSlide() {
        if (isVideoPlaying) return; // Prevent auto-slide if video is playing

        autoSlideInterval = setInterval(() => {
            updateCarousel(currentIndex + 1);
        }, 5000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Enable YouTube iframe API for pause
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    document.body.appendChild(tag);

    // Initialize carousel at first slide
    updateCarousel(0);
    startAutoSlide();
</script>
