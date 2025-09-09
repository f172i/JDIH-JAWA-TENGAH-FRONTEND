@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection

@section('content')

<!-- Modern Style CSS -->
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

    .modern-container {
    max-width: 1100px;
    margin-left: 0;
    margin-right: auto;
    padding: 0 0.5rem 1rem 0.5rem;
    }

    .page-header {
    background: var(--primary-gradient);
    border-radius: var(--border-radius);
    padding: 0.5rem 2rem 1rem 2rem; /* lebih rapat ke atas */
    margin-bottom: 0.5rem; /* lebih rapat ke bawah */
    color: white;
    position: relative;
    overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }

    .page-header h1 {
        font-size: 3.5rem;
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        margin: 0;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .page-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 1.1rem;
    }

    .action-bar {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
    }

    .btn-modern {
        background: var(--secondary-gradient);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        color: white;
    }

    .btn-upload {
        background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
    }

    .search-container {
        flex: 1;
        max-width: 500px;
        position: relative;
        transition: var(--transition);
    }

    .google-search-wrapper {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        transition: var(--transition);
    }

    .google-search-wrapper.focused {
        max-width: 600px;
        transform: scale(1.02);
    }

    .search-input {
        width: 100%;
        padding: 12px 20px 12px 50px;
        border: 2px solid #e0e7ff;
        border-radius: 50px;
        background: white;
        font-size: 16px;
        transition: var(--transition);
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        outline: none;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.15);
        background: #fafbff;
    }

    .search-input::placeholder {
        color: #9ca3af;
        font-style: italic;
    }

    .search-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 16px;
        transition: var(--transition);
        pointer-events: none;
        z-index: 2;
    }

    .google-search-wrapper.focused .search-icon {
        color: var(--primary-color);
        transform: translateY(-50%) scale(1.1);
    }

    .search-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        border: 1px solid #e2e8f0;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--transition);
        margin-top: 8px;
        max-height: 300px;
        overflow-y: auto;
    }

    .search-suggestions.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .suggestion-item {
        padding: 12px 20px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .suggestion-item:hover {
        background: #f8fafc;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    .suggestion-icon {
        color: #9ca3af;
        font-size: 14px;
        width: 16px;
    }

    .clear-search {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #9ca3af;
        cursor: pointer;
        font-size: 18px;
        padding: 4px;
        border-radius: 50%;
        transition: var(--transition);
        opacity: 0;
        visibility: hidden;
    }

    .clear-search.show {
        opacity: 1;
        visibility: visible;
    }

    .clear-search:hover {
        background: #f1f5f9;
        color: #64748b;
    }

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

    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover-shadow);
    }

    .modern-card:hover::before {
        opacity: 1;
    }

    .card-main-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        min-width: 0; /* Allows flex item to shrink */
    }

    .card-actions {
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 10;
        flex-shrink: 0;
        display: flex;
        align-items: flex-start;
        background: none;
        box-shadow: none;
    }

    .card-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        margin-bottom: 0;
    }

    .card-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        line-height: 1.3;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
    }

    .card-content {
        color: #64748b;
        line-height: 1.7;
        margin: 0;
        font-size: 1.05rem;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
        gap: 0.25rem;
        padding: 0.25rem 0.75rem;
        background: #e0f2fe;
        color: #0369a1;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
    }

    .source-badge:hover {
        background: #0369a1;
        color: white;
        text-decoration: none;
    }

    .dropdown-modern {
        position: relative;
    }

    .dropdown-trigger {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        color: #64748b;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
    }

    .dropdown-trigger:hover {
        background: #e2e8f0;
        color: #334155;
        transform: scale(1.1);
    }

    .dropdown-menu-modern {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        border: 1px solid #e2e8f0;
        min-width: 150px;
        overflow: hidden;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--transition);
    }

    /* Fallback untuk dropdown yang terpotong di bawah */
    .dropdown-menu-modern.show-above {
        top: auto;
        bottom: 100%;
        transform: translateY(10px);
    }

    .dropdown-menu-modern.show-above.show {
        transform: translateY(0);
    }

    .dropdown-menu-modern.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item-modern {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: #374151;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .dropdown-item-modern:hover {
        background: #f8fafc;
        color: #111827;
    }

    .dropdown-item-modern.edit:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .dropdown-item-modern.delete:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    .dropdown-item-modern i {
        width: 16px;
        flex-shrink: 0;
    }

    .stats-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        flex: 1;
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .stat-label {
        color: #64748b;
        font-size: 0.875rem;
        margin: 0.25rem 0 0 0;
    }

    .loading-modern {
        display: flex;
        justify-content: center;
        padding: 2rem;
    }

    .spinner-modern {
        width: 40px;
        height: 40px;
        border: 3px solid #f1f5f9;
        border-top: 3px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .no-results-modern {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
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
        }

        .search-container {
            max-width: none;
        }

        .modern-card {
            flex-direction: column;
            gap: 1rem;
        }

        .card-actions {
            align-self: flex-end;
        }

        .stats-bar {
            flex-direction: column;
        }

        .page-header h1 {
            font-size: 2.8rem;
        }

        .card-title {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 480px) {
        .modern-container {
            padding: 1rem 0.5rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .action-bar {
            padding: 1rem;
        }

        .modern-card {
            padding: 1rem;
        }
    }
</style>

<div class="modern-container" style="margin-top:0!important;padding-top:0!important;">
    <!-- Page Header -->
    <div class="page-header">
        <h1>Admin Dashboard</h1>
        <p>Kelola istilah hukum dengan mudah dan efisien</p>
    </div>

    <!-- Action Bar - Selalu tampil -->
    <div class="action-bar">
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('admin.master.glosarium.upload.form') }}" class="btn-modern btn-upload">
                <i class="fas fa-file-pdf"></i>
                Upload PDF
            </a>
            <a href="{{ route('admin.master.glosarium.create') }}" class="btn-modern">
                <i class="fas fa-plus"></i>
                Tambah Manual
            </a>
        </div>

        @if($kamus->count())
        <div class="search-container">
            <div class="google-search-wrapper" id="searchWrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="modernSearchInput" class="search-input" 
                       placeholder="Cari istilah hukum..." value="{{ request('query') }}">
                <button type="button" class="clear-search" id="clearSearch">
                    <i class="fas fa-times"></i>
                </button>
                <div class="search-suggestions" id="searchSuggestions">
                    <!-- Suggestions will be populated by JavaScript -->
                </div>
            </div>
        </div>
        @endif
    </div>

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

        <!-- Cards Grid -->
        <div class="cards-grid" id="cardsGrid">
            @foreach($kamus as $item)
            <div class="modern-card" data-title="{{ strtolower($item->judul) }}" 
                 data-description="{{ strtolower($item->deskripsi) }}" style="position:relative;">
                <div class="card-actions">
                    <div class="dropdown-modern">
                        <button class="dropdown-trigger" onclick="toggleDropdown('{{ $item->id }}')">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu-modern" id="dropdown-{{ $item->id }}">
                            <a href="{{ route('admin.master.glosarium.edit', $item->id) }}" 
                               class="dropdown-item-modern edit">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('admin.master.glosarium.delete', $item->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus istilah ini?')" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item-modern delete">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-main-content">
                    <div class="card-header">
                        <h3 class="card-title">{{ $item->judul }}</h3>
                    </div>

                    <div class="card-content">
                        {{ $item->deskripsi }}
                    </div>

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
                                <i class="fas fa-keyboard"></i>
                                Manual Entry
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Loading Indicator -->
        <div id="loadingModern" class="loading-modern" style="display: none;">
            <div class="spinner-modern"></div>
        </div>

        <!-- No Results -->
        <div id="noResultsModern" class="no-results-modern" style="display: none;">
            <i class="fas fa-search"></i>
            <h4>Tidak ada hasil ditemukan</h4>
            <p>Coba gunakan kata kunci yang berbeda</p>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4" id="paginationContainer">
            {{ $kamus->links() }}
        </div>
    @else
        <div class="no-results-modern">
            <i class="fas fa-book-open"></i>
            <h4>Belum ada data glosarium</h4>
            <p>Gunakan tombol di atas untuk menambah istilah baru atau upload PDF</p>
        </div>
    @endif
</div>

<script>
// Global variables
let currentDropdown = null;

// Toggle dropdown function
function toggleDropdown(id) {
    const dropdown = document.getElementById(`dropdown-${id}`);
    
    // Close any open dropdown
    if (currentDropdown && currentDropdown !== dropdown) {
        currentDropdown.classList.remove('show');
        currentDropdown.classList.remove('show-above');
    }
    
    // Remove any previous position classes
    dropdown.classList.remove('show-above');
    
    // Toggle current dropdown
    const isShowing = dropdown.classList.contains('show');
    dropdown.classList.toggle('show');
    
    // Check if dropdown needs to show above to avoid being cut off
    if (!isShowing && dropdown.classList.contains('show')) {
        const dropdownRect = dropdown.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        
        // If dropdown extends beyond bottom of screen, show it above
        if (dropdownRect.bottom > windowHeight - 20) {
            dropdown.classList.add('show-above');
        }
    }
    
    currentDropdown = dropdown.classList.contains('show') ? dropdown : null;
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown-modern') && currentDropdown) {
        currentDropdown.classList.remove('show');
        currentDropdown.classList.remove('show-above');
        currentDropdown = null;
    }
});

// Modern search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('modernSearchInput');
    const searchWrapper = document.getElementById('searchWrapper');
    const clearSearch = document.getElementById('clearSearch');
    const searchSuggestions = document.getElementById('searchSuggestions');
    const cardsGrid = document.getElementById('cardsGrid');
    const loadingIndicator = document.getElementById('loadingModern');
    const noResults = document.getElementById('noResultsModern');
    const paginationContainer = document.getElementById('paginationContainer');
    
    // Google-like search behavior
    if (searchInput && searchWrapper) {
        // Focus/blur effects
        searchInput.addEventListener('focus', function() {
            searchWrapper.classList.add('focused');
            showSuggestions();
        });

        searchInput.addEventListener('blur', function(e) {
            // Delay to allow clicking on suggestions
            setTimeout(() => {
                if (!searchWrapper.contains(e.relatedTarget)) {
                    searchWrapper.classList.remove('focused');
                    hideSuggestions();
                }
            }, 150);
        });

        // Clear search functionality
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            if (query.length > 0) {
                clearSearch.classList.add('show');
                generateSuggestions(query);
            } else {
                clearSearch.classList.remove('show');
                hideSuggestions();
            }

            // Perform search with debounce
            performDebouncedSearch(query);
        });

        clearSearch.addEventListener('click', function() {
            searchInput.value = '';
            searchInput.focus();
            clearSearch.classList.remove('show');
            hideSuggestions();
            performModernSearch('');
        });

        // Generate search suggestions
        function generateSuggestions(query) {
            if (!cardsGrid || query.length < 2) {
                hideSuggestions();
                return;
            }

            const cards = cardsGrid.querySelectorAll('.modern-card');
            const suggestions = new Set();

            cards.forEach(card => {
                const title = card.getAttribute('data-title') || '';
                const description = card.getAttribute('data-description') || '';
                
                if (title.includes(query.toLowerCase())) {
                    const originalTitle = card.querySelector('.card-title')?.textContent || '';
                    if (originalTitle && suggestions.size < 5) {
                        suggestions.add(originalTitle);
                    }
                }
            });

            if (suggestions.size > 0) {
                const suggestionHTML = Array.from(suggestions).map(suggestion => `
                    <div class="suggestion-item" onclick="selectSuggestion('${suggestion.replace(/'/g, "\\'")}')">
                        <i class="fas fa-search suggestion-icon"></i>
                        <span>${suggestion}</span>
                    </div>
                `).join('');

                searchSuggestions.innerHTML = suggestionHTML;
                showSuggestions();
            } else {
                hideSuggestions();
            }
        }

        function showSuggestions() {
            if (searchSuggestions.innerHTML.trim()) {
                searchSuggestions.classList.add('show');
            }
        }

        function hideSuggestions() {
            searchSuggestions.classList.remove('show');
        }

        // Global function for suggestion selection
        window.selectSuggestion = function(suggestion) {
            searchInput.value = suggestion;
            clearSearch.classList.add('show');
            hideSuggestions();
            performModernSearch(suggestion.toLowerCase());
        };

        let searchTimeout;
        function performDebouncedSearch(query) {
            clearTimeout(searchTimeout);
            if (loadingIndicator) loadingIndicator.style.display = 'flex';
            
            searchTimeout = setTimeout(function() {
                performModernSearch(query.toLowerCase());
                if (loadingIndicator) loadingIndicator.style.display = 'none';
            }, 300);
        }
        
        function performModernSearch(query) {
            if (!cardsGrid) return;
            
            const cards = cardsGrid.querySelectorAll('.modern-card');
            let visibleCount = 0;
            let matchedCards = [];
            
            if (query === '') {
                // Show all cards in original order
                cards.forEach(function(card) {
                    card.style.display = 'block';
                    card.style.order = '';
                    removeHighlight(card);
                });
                visibleCount = cards.length;
                
                // Show pagination
                if (paginationContainer) {
                    paginationContainer.style.display = 'flex';
                }
            } else {
                // Hide pagination during search
                if (paginationContainer) {
                    paginationContainer.style.display = 'none';
                }
                
                // Collect and score matching cards
                cards.forEach(function(card, index) {
                    const title = card.getAttribute('data-title') || '';
                    const description = card.getAttribute('data-description') || '';
                    
                    const titleMatch = title.includes(query);
                    const descMatch = description.includes(query);
                    
                    if (titleMatch || descMatch) {
                        let score = 0;
                        let relevanceScore = 0;
                        
                        if (titleMatch) {
                            score = 100;
                            if (title === query) {
                                relevanceScore = 1000;
                            } else if (title.startsWith(query)) {
                                relevanceScore = 500;
                            } else {
                                const position = title.indexOf(query);
                                relevanceScore = 300 - position;
                            }
                        } else if (descMatch) {
                            score = 50;
                            if (description.startsWith(query)) {
                                relevanceScore = 200;
                            } else {
                                const position = description.indexOf(query);
                                relevanceScore = 100 - (position / 10);
                            }
                        }
                        
                        matchedCards.push({
                            element: card,
                            score: score + relevanceScore,
                            index: index
                        });
                        
                        card.style.display = 'block';
                        visibleCount++;
                        highlightText(card, query);
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Sort matched cards by score
                matchedCards.sort((a, b) => b.score - a.score);
                
                // Apply order to matched cards
                matchedCards.forEach(function(item, index) {
                    item.element.style.order = index;
                });
            }
            
            // Show/hide no results
            if (noResults) {
                if (visibleCount === 0 && query !== '') {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            }
        }
        
        function highlightText(card, query) {
            const title = card.querySelector('.card-title');
            const content = card.querySelector('.card-content');
            
            if (title && title.textContent) {
                const originalText = title.textContent;
                const highlightedText = originalText.replace(
                    new RegExp(`(${escapeRegExp(query)})`, 'gi'), 
                    '<mark style="background: linear-gradient(120deg, #667eea 0%, #764ba2 100%); color: white; padding: 2px 6px; border-radius: 4px; font-weight: 600;">$1</mark>'
                );
                title.innerHTML = highlightedText;
            }
            
            if (content && content.textContent) {
                const originalText = content.textContent;
                const highlightedText = originalText.replace(
                    new RegExp(`(${escapeRegExp(query)})`, 'gi'), 
                    '<mark style="background: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); color: white; padding: 2px 6px; border-radius: 4px;">$1</mark>'
                );
                content.innerHTML = highlightedText;
            }
        }
        
        function removeHighlight(card) {
            const title = card.querySelector('.card-title');
            const content = card.querySelector('.card-content');
            
            if (title && title.textContent) {
                title.innerHTML = title.textContent;
            }
            if (content && content.textContent) {
                content.innerHTML = content.textContent;
            }
        }
        
        function escapeRegExp(string) {
            return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }
    }

    // Add smooth animations on load
    const cards = document.querySelectorAll('.modern-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s cubic-bezier(0.25, 0.8, 0.25, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>

@endsection