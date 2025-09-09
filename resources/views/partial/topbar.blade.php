<style>
    .search {
        display: flex;
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-right: 10px
    }

    .search-box {
        display: flex;
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .search-box input {
        border: none;
        padding: 10px 15px;
        font-size: 14px;
        width: 160px;
        outline: none;
    }

    .search-box button {
        background: #0066cc;
        border: none;
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-box button {
        transition: color 0.3s;
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


    .navbar-brand {
        width: 10%;
    }

    @media (max-width:767px) {
        .navbar-brand {
            width: 34%;
        }

        #searh {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .search {
            padding: 10px 15px;
            width: 100%;
            justify-content: center;
            background-color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .search .nav-search {
            width: 100%;
        }

        .search-box {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .search-box input {
            width: 100%;
            font-size: 1rem;
            color: #000;
        }

        .search-box button {
            font-size: 1.2rem;
            color: #0d6efd;
        }

        /* Optional: Add spacing below the search */
        .navbar-one .navbar-collapse {
            margin-top: 10px;
        }
    }
</style>

<section id="header" class="navbar-area navbar-one sticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('') }}">
                        <img src="{{ asset('media/logo.png') }}" alt="JDIH" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOne"
                        aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne" style="box-shadow: none">
                        <ul class="navbar-nav m-auto">

                            <div class="search d-md-none">
                                <div class="nav-search h-4 w-10">
                                    <div class="search-box">
                                        <input type="text" onclick="openModal()" placeholder="Cari dokumen hukum...">
                                        <button onclick="openModal()" type="button" title="Pencarian Dokumen"
                                            type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav1"
                                    aria-controls="sub-nav1" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Profil Kami' : GoogleTranslate::trans('Profil Kami', app()->getLocale()) }}
                                    <span><i class="lni lni-chevron-down"></i></span>

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav1">
                                    <li><a
                                            href="{{ route('visi.misi') }}">{{ app()->getLocale() == 'id' ? 'Visi Misi' : GoogleTranslate::trans('Visi Misi', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('dasar.hukum') }}">{{ app()->getLocale() == 'id' ? 'Dasar Hukum' : GoogleTranslate::trans('Dasar Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('struktur.organisasi') }}">{{ app()->getLocale() == 'id' ? 'Struktur Organisasi' : GoogleTranslate::trans('Struktur Organisasi', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('tupoksi') }}">{{ app()->getLocale() == 'id' ? 'Tupoksi Biro Hukum' : GoogleTranslate::trans('Tupoksi Biro Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('anggota-jdih') }}">{{ app()->getLocale() == 'id' ? 'Anggota JDIH PROV JATENG' : GoogleTranslate::trans('Anggota JDIH PROV JATENG', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('kedudukan.alamat') }}">{{ app()->getLocale() == 'id' ? 'Kedudukan dan Alamat' : GoogleTranslate::trans('Kedudukan dan Alamat', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('sop') }}">{{ app()->getLocale() == 'id' ? 'SOP' : GoogleTranslate::trans('SOP', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav2"
                                    aria-controls="sub-nav2" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Peraturan Perundang-Undangan' : GoogleTranslate::trans('Peraturan Perundang-Undangan', app()->getLocale()) }}
                                    <span><i class="lni lni-chevron-down"></i></span>

                                </a>
                                <ul class="sub-menu collapse" id="sub-nav2">
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['peraturan-daerah']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Daerah' : GoogleTranslate::trans('Peraturan Daerah', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['peraturan-gubernur']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Gubernur' : GoogleTranslate::trans('Peraturan Gubernur', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.subjek', ['Terjemahan']) }}">{{ app()->getLocale() == 'id' ? 'Dokumen Hukum Terjemahan' : GoogleTranslate::trans('Dokumen Hukum Terjemahan', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/kategori/keputusan-gubernur') }}">{{ app()->getLocale() == 'id' ? 'Keputusan Gubernur' : GoogleTranslate::trans('Keputusan Gubernur', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['instruksi-gubernur']) }}">{{ app()->getLocale() == 'id' ? 'Instruksi Gubernur' : GoogleTranslate::trans('Instruksi Gubernur', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/kategori/keputusan-sekretaris-daerah') }}">{{ app()->getLocale() == 'id' ? 'Keputusan Sekretaris Daerah' : GoogleTranslate::trans('Keputusan Sekretaris Daerah', app()->getLocale()) }}</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Peraturan/Keputusan Kepala OPD' : GoogleTranslate::trans('Peraturan/Keputusan Kepala OPD', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['peraturan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Kepala OPD' : GoogleTranslate::trans('Peraturan Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['keputusan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Keputusan Kepala OPD' : GoogleTranslate::trans('Keputusan Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Dokumen Kerjasama' : GoogleTranslate::trans('Dokumen Kerjasama', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['nota-kesepakatan']) }}">{{ app()->getLocale() == 'id' ? 'Nota Kesepakatan' : GoogleTranslate::trans('Nota Kesepakatan', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['kesepakatan-bersama']) }}">{{ app()->getLocale() == 'id' ? 'Kesepakatan Bersama' : GoogleTranslate::trans('Kesepakatan Bersama', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['perjanjian-kerja-sama']) }}">{{ app()->getLocale() == 'id' ? 'Perjanjian Kerjasama' : GoogleTranslate::trans('Perjanjian Kerjasama', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['memorandum-of-understanding']) }}">{{ app()->getLocale() == 'id' ? 'Memorandum of Understanding' : GoogleTranslate::trans('Memorandum of Understanding', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['letter-of-intent']) }}">{{ app()->getLocale() == 'id' ? 'Letter of Intent' : GoogleTranslate::trans('Letter of Intent', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="{{ route('inventarisasi-hukum.kategori', ['peraturan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Peraturan Kepala OPD' : GoogleTranslate::trans('Peraturan Kepala OPD', app()->getLocale()) }}</a></li>
                                    <li><a href="{{ route('inventarisasi-hukum.kategori', ['keputusan-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Keputusan Kepala OPD' : GoogleTranslate::trans('Keputusan Kepala OPD', app()->getLocale()) }}</a></li> -->
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['dokumen-hukum-langka']) }}">{{ app()->getLocale() == 'id' ? 'Dokumen Hukum Langka' : GoogleTranslate::trans('Dokumen Hukum Langka', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.subjek', ['Propemperda']) }}">{{ app()->getLocale() == 'id' ? 'Propemperda' : GoogleTranslate::trans('Propemperda', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.subjek', ['Propempergub']) }}">{{ app()->getLocale() == 'id' ? 'Propempergub' : GoogleTranslate::trans('Propempergub', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="https://jdihn.go.id/">{{ app()->getLocale() == 'id' ? 'Peraturan Pusat' : GoogleTranslate::trans('Peraturan Pusat', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav3"
                                    aria-controls="sub-nav3" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Monografi Hukum' : GoogleTranslate::trans('Monografi Hukum', app()->getLocale()) }}
                                    <span><i class="lni lni-chevron-down"></i></span>
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav3">
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['naskah-akademik']) }}">{{ app()->getLocale() == 'id' ? 'Naskah Akademik' : GoogleTranslate::trans('Naskah Akademik', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['raperda']) }}">{{ app()->getLocale() == 'id' ? 'Raperda' : GoogleTranslate::trans('Raperda', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['rekomendasi-kajian']) }}">{{ app()->getLocale() == 'id' ? 'Analisis Dan Evaluasi Hukum' : GoogleTranslate::trans('Analisis Dan Evaluasi Hukum', app()->getLocale()) }}</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi' : GoogleTranslate::trans('Hasil Fasilitasi', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-provinsi']) }}">{{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi Raperda Provinsi' : GoogleTranslate::trans('Hasil Fasilitasi Raperda Provinsi', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['hasil-fasilitasi-raperda-kabko']) }}">{{ app()->getLocale() == 'id' ? 'Hasil Fasilitasi Raperda Kabupaten/Kota' : GoogleTranslate::trans('Hasil Fasilitasi Raperda Kabupaten/Kota', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#sub-nav4"
                                            aria-controls="sub-nav4" aria-expanded="false"
                                            aria-label="Toggle navigation" href="javascript:void(0)">
                                            {{ app()->getLocale() == 'id' ? 'Surat Edaran' : GoogleTranslate::trans('Surat Edaran', app()->getLocale()) }}
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="sub-nav4">
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-gubernur']) }}">{{ app()->getLocale() == 'id' ? 'Gubernur/Wakil Gubernur' : GoogleTranslate::trans('Gubernur/Wakil Gubernur', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-sekretaris']) }}">{{ app()->getLocale() == 'id' ? 'Sekretaris Daerah' : GoogleTranslate::trans('Sekretaris Daerah', app()->getLocale()) }}</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('inventarisasi-hukum.kategori', ['surat-edaran-kepala-opd']) }}">{{ app()->getLocale() == 'id' ? 'Kepala OPD' : GoogleTranslate::trans('Kepala OPD', app()->getLocale()) }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li></li>
                                    <li><a
                                            href="{{ route('inventarisasi-hukum.kategori', ['ranham']) }}">{{ app()->getLocale() == 'id' ? 'RANHAM' : GoogleTranslate::trans('RANHAM', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('inventarisasi-hukum.kategori', ['artikel-bidang-hukum']) }}">{{ app()->getLocale() == 'id' ? 'Artikel Bidang Hukum' : GoogleTranslate::trans('Artikel Bidang Hukum', app()->getLocale()) }}</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="{{ route('inventarisasi-hukum.kategori', ['putusan']) }}">{{ app()->getLocale() == 'id' ? 'Putusan' : GoogleTranslate::trans('Putusan', app()->getLocale()) }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://jdih.jatengprov.go.id/perpus/"
                                    target="_blank">{{ app()->getLocale() == 'id' ? 'Perpustakaan' : GoogleTranslate::trans('Perpustakaan', app()->getLocale()) }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll active" data-bs-toggle="collapse" data-bs-target="#sub-nav5"
                                    aria-controls="sub-nav5" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">
                                    {{ app()->getLocale() == 'id' ? 'Informasi' : GoogleTranslate::trans('Informasi', app()->getLocale()) }}
                                    <span><i class="lni lni-chevron-down"></i></span>
                                </a>
                                <ul class="sub-menu collapse" id="sub-nav5">
                                    <li><a
                                            href="{{ url('artikel') }}">{{ GoogleTranslate::trans('Berita', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('glosarium') }}">{{ GoogleTranslate::trans('Glosarium', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('unduh') }}">{{ GoogleTranslate::trans('Download', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('galeris') }}">{{ GoogleTranslate::trans('Galeri', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('videos') }}">{{ GoogleTranslate::trans('Video', app()->getLocale()) }}</a>
                                    </li>
                                    <li><a
                                            href="{{ url('inventarisasi-hukum/katalog') }}">{{ app()->getLocale() == 'id' ? 'Katalog' : GoogleTranslate::trans('Katalog', app()->getLocale()) }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="search" id="searh">
                            <div class="nav-search h-4 w-10">
                                <div class="search-box">
                                    <input type="text" onclick="openModal()" placeholder="Cari dokumen hukum...">
                                    <button onclick="openModal()" type="button" title="Pencarian Dokumen"
                                        type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        @include('partial/language_switcher')
                    </div>
                </nav>
                <!-- navbar -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>



<!-- Search Modal -->
<div class="modal-overlay" id="modalQR">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                <i class="fas fa-search" style="margin-right: 8px;"></i>Pencarian Dokumen
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
                    <i class="fas fa-gavel"></i>
                    <div>
                        <div style="font-weight: 600;">Peraturan Daerah</div>
                        <small style="color: #6b7280;">Perda Provinsi Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fas fa-file-alt"></i>
                    <div>
                        <div style="font-weight: 600;">Keputusan Gubernur</div>
                        <small style="color: #6b7280;">Kepgub Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fas fa-clipboard-list"></i>
                    <div>
                        <div style="font-weight: 600;">Peraturan Gubernur</div>
                        <small style="color: #6b7280;">Pergub Jawa Tengah</small>
                    </div>
                </a>

                <a href="#" class="search-option">
                    <i class="fas fa-envelope"></i>
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
                <i class="fas fa-search" style="margin-right: 4px;"></i>Cari Dokumen
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
