<style>
    .flex-container {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        z-index: 999;
    }

    .float2 {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 110px;
        right: 40px;
        background-color: #2576d3;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        z-index: 999;
    }

    .my-float {
        margin-top: 16px;
        font-size: 28px;
    }

    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1050;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal-overlay.show {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
    }

    .modal-content {
        background: white;
        border-radius: 12px;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow: hidden;
        transform: scale(0.8);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .modal-overlay.show .modal-content {
        transform: scale(1);
    }

    .modal-header {
        padding: 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: between;
        align-items: center;
    }

    .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        color: #374151;
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #6b7280;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background-color 0.2s;
    }

    .modal-close:hover {
        background-color: #f3f4f6;
    }

    .modal-body {
        padding: 20px;
        text-align: center;
    }

    .modal-footer {
        padding: 20px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.2s;
    }

    .btn-secondary {
        background-color: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #4b5563;
    }

    .btn-primary {
        background-color: #3b82f6;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2563eb;
    }

    .search-form {
        margin-bottom: 20px;
    }

    .search-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.2s;
        margin-bottom: 12px;
    }

    .search-input:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .search-select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        background-color: white;
        margin-bottom: 12px;
    }

    .search-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }

    .search-option {
        display: flex;
        align-items: center;
        padding: 15px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        color: #374151;
    }

    .search-option:hover {
        border-color: #3b82f6;
        background-color: #f8fafc;
        color: #374151;
        text-decoration: none;
    }

    .search-option i {
        font-size: 1.5rem;
        margin-right: 12px;
        color: #3b82f6;
    }

    @media (max-width: 768px) {
        .float1 {
            bottom: 90px;
            right: 20px;
            width: 50px;
            height: 50px;
        }

        .float-wa {
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }

        .modal-content {
            width: 95%;
        }

        .search-options {
            grid-template-columns: 1fr;
        }
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<footer
    style="background-color: rgb(30, 37, 52); color: white; text-align: center; padding: 2rem 0; font-size: 1rem; left: 0; bottom: 0; width: 100%; z-index: 100; margin-top:24px">
    <div class="flex-container">
        <div style="margin-bottom: 1rem; margin-right: 10rem; display: flex; align-items: flex-start;">
            <div>
                <p style="font-weight: bold; font-size: 15px; text-align: justify; text-justify: inter-word;">
                    JARINGAN DOKUMENTASI DAN INFORMASI HUKUM</p>
                <h1
                    style="font-size: 31px; font-weight: bold; margin-top: 0px; margin-bottom: 10px; text-align: justify; text-justify: inter-word; color: white;">
                    PROVINSI JAWA TENGAH</h1>
                <div style="display: flex; align-items: center;">
                    <img src="https://jdih.jatengprov.go.id/logo/HomeMenu.png" alt="Logo JDIH"
                        style="margin-top: 0px; height: 160px;">
                    <div
                        style="margin-left: 2rem; max-width: 250px; text-align: left; font-size: 15px; font-weight: lighter;">
                        Jaringan Dokumentasi & Informasi Hukum merupakan suatu sistem pendayagunaan bersama
                        peraturan perundang - undangan, dokumentasi hukum lainnya secara tertib, terpadu,
                        berkesinambungan Dan sarana pelayanan informasi hukum secara mudah, cepat dan akurat.
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: left">
            <p style="font-weight: bold;">Alamat</p>
            <p>Gedung A Lantai 5, Jalan Pahlawan No.9 Semarang <br> 50243, Jawa Tengah, Indonesia<br></p>
            <div style="margin-bottom: 1rem; margin-top:20px ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.646964893624!2d110.420225!3d-6.993856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b5e2e2e2e2f%3A0x2e2e2e2e2e2e2e2e!2sJl.+Pahlawan+No.9+Lantai+5+Mugassari+Kec.+Semarang+Sel.+Kota+Semarang,+Jawa+Tengah+50249!5e0!3m2!1sid!2sid!4v1721568000000!5m2!1sid!2sid"
                    width="300" height="150" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p style="font-weight: bold;">Media Sosial</p>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 12px; margin-bottom: 1rem;">
                <a href="https://www.youtube.com/channel/UCFFZo4PAotie8YCr49chvqg" target="_blank" style="color:#fff;">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/youtube.svg" alt="YouTube"
                        style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                </a>
                <a href="https://www.facebook.com/jdihprovjateng" target="_blank" style="color:#fff;">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook"
                        style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                </a>
                <a href="https://www.instagram.com/jdihprovjateng/" target="_blank" style="color:#fff;">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/instagram.svg" alt="Instagram"
                        style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                </a>
                <a href="https://twitter.com/jdihprovjateng" target="_blank" style="color:#fff;">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter"
                        style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                </a>
                <a href="https://api.whatsapp.com/send?phone=6289502281199&text=Saya%20ingin%20bertanya%20mengenai%20layanan%20JDIH%20Provinsi%20Jawa%20Tengah."
                    target="_blank" style="color:#fff;">
                    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/whatsapp.svg" alt="WhatsApp"
                        style="height:24px; width:24px; vertical-align:middle; filter:invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);">
                </a>
            </div>
        </div>
    </div>
    <div style="margin-top: 3rem;">
        Hak Cipta 2022© Biro Hukum Pemerintah Provinsi Jawa Tengah
    </div>
</footer>

<a href="https://api.whatsapp.com/send?phone=6289502281199&text=Selamat%20Pagi%20Pak,%20Saya%20mau%20tanya%20?"
    class="float" target="_blank">
    <i class="fa fa-whatsapp my-float text-white"></i>
</a>
<button class="float2" onclick="openModal()" type="button" title="Pencarian Dokumen">
    <i class="fa fa-search" style="font-size: 1.2rem;"></i>
</button>


<!-- Search Modal -->
<div class="modal-overlay" id="modalQR">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                <i class="fa fa-search" style="margin-right: 8px;"></i>Pencarian Dokumen
            </h5>
            <button type="button" class="modal-close" onclick="closeModal()">&times;</button>
        </div>
        <div class="modal-body">
            <!-- Search Form -->
            <div class="search-form">
                <input type="text" class="search-input" placeholder="Cari dokumen, peraturan, atau keputusan...">

                <select class="search-select">
                    <option value="">Pilih Jenis Dokumen</option>
                    <option value="peraturan">Peraturan Daerah</option>
                    <option value="keputusan">Keputusan Gubernur</option>
                    <option value="instruksi">Instruksi Gubernur</option>
                    <option value="surat-edaran">Surat Edaran</option>
                    <option value="peraturan-gubernur">Peraturan Gubernur</option>
                </select>

                <select class="search-select">
                    <option value="">Pilih Tahun</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                </select>
            </div>

            <!-- Quick Search Options -->
            <div class="search-options">
                <a href="#" class="search-option">
                    <i class="fa fa-gavel"></i>
                    <div>
                        <div style="font-weight: 600;">Peraturan Daerah</div>
                        <small style="color: #6b7280;">Perda Provinsi Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fa fa-file-alt"></i>
                    <div>
                        <div style="font-weight: 600;">Keputusan Gubernur</div>
                        <small style="color: #6b7280;">Kepgub Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fa fa-clipboard-list"></i>
                    <div>
                        <div style="font-weight: 600;">Peraturan Gubernur</div>
                        <small style="color: #6b7280;">Pergub Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fa fa-envelope"></i>
                    <div>
                        <div style="font-weight: 600;">Surat Edaran</div>
                        <small style="color: #6b7280;">SE Gubernur Jawa Tengah</small>
                    </div>
                </a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="performSearch()">
                <i class="fa fa-search" style="margin-right: 4px;"></i>Cari Dokumen
            </button>
        </div>
    </div>
</div>

<!-- Custom Modal Script -->
<script>
    function openModal() {
        const modal = document.getElementById('modalQR');
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modalQR');
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    function performSearch() {
        const searchInput = document.querySelector('.search-input');
        const searchQuery = searchInput.value.trim();

        if (searchQuery) {
            // Redirect to search page or perform search
            alert('Mencari: ' + searchQuery);
            // You can replace this with actual search functionality
            // window.location.href = '/search?q=' + encodeURIComponent(searchQuery);
        } else {
            alert('Masukkan kata kunci pencarian');
        }
    }

    // Close modal when clicking outside
    document.getElementById('modalQR').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Enter key to search
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                }
            });
        }
    });
</script>
