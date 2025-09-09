<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/5.0.0/css/flag-icon.min.css" />

<style>
    .lang-dropdown {
        position: relative;
        width: 190px;
        font-family: Arial, sans-serif;
    }

    .lang-selected {
        width: 140px;
        margin-left: 40px;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 50px;
        /* Increase border-radius for round effect */
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        transition: border-color 0.3s ease;
    }

    .lang-selected .fi {
        margin-right: 10px;
    }

    .lang-options {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        border: 1px solid #ccc;
        background-color: #fff;
        border-radius: 12px;
        /* Round borders */
        max-height: 200px;
        overflow-y: auto;
        display: none;
        z-index: 10;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Add shadow for better visual effect */
    }

    .lang-option {
        padding: 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s ease;
    }

    .lang-option:hover {
        background-color: #f0f0f0;
    }

    .lang-option .fi {
        margin-right: 10px;
    }

    /* Add rounded corners to the last option */
    .lang-option:last-child {
        border-bottom: none;
    }

    .lang-dropdown.open .lang-options {
        display: block;
        /* Display the options when the dropdown is open */
    }
</style>

<div class="lang-dropdown" id="langDropdown">
    @php
        $current_flag = strtolower(substr($current_locale, strpos($current_locale, '_') + 1));
    @endphp
    <div class="lang-selected" id="selectedLang" onclick="toggleLangOptions()">
        <span><span class="fi fi-{{ $current_flag }}"></span>
            {{ array_search($current_locale, $available_locales) }}</span>
        <span>▼</span>
    </div>
    <div class="lang-options" id="langOptions">
        @foreach ($available_locales as $locale_name => $available_locale)
            @php
                $flag = strtolower(substr($available_locale, strpos($available_locale, '_') + 1));
                $url = URL('language/' . $available_locale);
            @endphp
            <div class="lang-option" data-url="{{ $url }}">
                <span class="fi fi-{{ $flag }}"></span>
                <span>{{ $locale_name }}</span>
            </div>
        @endforeach
    </div>
</div>

<script>
    function toggleLangOptions() {
        var dropdown = document.getElementById('langDropdown');
        dropdown.classList.toggle('open');
    }

    // Optional: Close the dropdown if clicked outside
    document.addEventListener('click', function(event) {
        var dropdown = document.getElementById('langDropdown');
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('open');
        }
    });
</script>
