<div class="home-hero">
    <div class="flexslider home-slider">
        <div id="Cont">
            <img src="https://picsum.photos/id/381/1920/1080"/>
        </div>
    </div>
    <div class="hero-divider"></div>
    <div class="hero-content">
        <div class="container">
            <h1><span>Selamat Datang di Portal Resmi</span><br>JDIH Pemerintah Provinsi Jawa Tengah</h1>
            <div class="hero-search">
                <div class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-body p-5 w-xxl-600px h-lg-60px me-lg-10 my-5">
                    <div class="row flex-grow-1 mb-5 mb-lg-0">
                        <div class="col col-lg-12 d-flex align-items-center mb-3 mb-lg-0 search-box">
                            <input type="text" class="mr-2 form-control-search form-control-flush flex-grow-1" id="nama_dokumen" value="" placeholder="Ketikkan Nama Dokumen Hukum">
                        </div>
                    </div>
                    <div class="min-w-150px search-box">
                        <button type="button" class="btn css-w9xr1c btn-lg" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="bi bi-funnel-fill text-gray-900" style="color: #0b0e18"></i>Filter</button>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_620793350b8bd">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-bold">Kategori:</label>
                                    <div>
                                        <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Pilih Kategori" data-dropdown-parent="#kt_menu_620793350b8bd" data-allow-clear="true" id="kategori_">
                                            <option></option>
                                            @foreach($kategori as $k)
                                                <option value="{{ $k->link }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-bold">Nomor:</label>
                                    <div>
                                        <input class="form-control form-control-solid" placeholder="Nomor" id="nomor_">
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-bold">Tahun:</label>
                                    <div>
                                        <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Pilih Tahun" data-dropdown-parent="#kt_menu_620793350b8bd" data-allow-clear="true" id="tahun_">
                                            <option></option>
                                            @foreach ( range( date('Y'),1950 ) as $i )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="css-w9xr1c btn" data-kt-menu-dismiss="true">Terapkan</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-danger btn btn-lg" id="kt_advanced_search_button_1">
                            <i class="bi bi-search" style="color: #0b0e18"></i>Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
