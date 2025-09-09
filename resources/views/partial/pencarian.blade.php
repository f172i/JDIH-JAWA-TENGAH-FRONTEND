<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Custom Styles -->
<style>
    .forms {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 16px;
        padding: 10px;

    }

    .glass-section {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 0px 0px 16px 16px;
        padding: 2.5rem;
        color: #fff;
        transition: all 0.3s ease;
        /* Removed default shadow */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);


    }

    .glass-section:hover {
        transform: scale(1.002);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.2);
    }


    .glass-section label {
        color: #000000;
        font-weight: 500;
    }

    .glass-section .form-control,
    .glass-section .form-select {
        background-color: rgba(255, 255, 255, 0.9);
        color: #212529;
        border: none;
        border-radius: 0.6rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);

    }

    .glass-section .form-control:focus,
    .glass-section .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        border: none;
    }

    .glass-section .btn-primary {
        background-color: #0d6efd;
        border: none;
        /* padding: 0.75rem 2.5rem; */
        font-size: 1.125rem;
        border-radius: 0.75rem;
        transition: all 0.3s ease;
    }

    .glass-section .btn-primary:hover {
        background-color: #0b5ed7;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(13, 110, 253, 0.4);
    }

    .section-header {
        text-align: center;
        color: #ffffff;
        border-radius: 16px 16px 0px 0px;
    }

    .section-header h2 {
        color: rgb(255, 255, 255);
        font-weight: 700;
        font-size: 2rem;
    }

    .section-header p {
        font-size: 1rem;
    }

    /* Responsive max width container */
    .search-container {
        /* max-width: 75%; */
        margin: 0 auto;
    }

    @media (max-width: 767px) {
        .mobile-search-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 15px;
            background-color: var(--semi-transparent);
            /* optional */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .mobile-search-wrapper .glass-section {
            padding: 1.5rem;
            border-radius: 12px;
            width: 100%;
            max-width: 100%;
            box-shadow: none;
        }

        .mobile-search-wrapper .form-control {
            font-size: 1rem;
        }

        /* Optional: Add spacing below search bar */
        .navbar-one .navbar-collapse {
            margin-top: 10px;
        }
    }
</style>


<!-- Section -->
<section class="container my-5">
    <div class="search-container">
        <div class="section-header">
            <h2 style="font-size: 33px">Cari Dokumen</h2>
            <p style="font-size: 22px; ">Jaringan Dokumentasi dan Informasi Hukum Provinsi Jawa Tengah</p>
        </div>

        <div class="glass-section">
            <form>
                <div class="row g-4">
                    <!-- Document Type -->
                    <div class="col-md-4 ">
                        <label for="docType" class="form-label">Document Type</label>
                        <div class="forms">
                            <select class="form-select" id="docType">
                                <option value="">Select type</option>
                                <option value="regulation">Regulation</option>
                                <option value="legal_monograph">Legal Monograph</option>
                                <option value="legal_article">Legal Article</option>
                                <option value="decision">Decision</option>
                            </select>
                        </div>
                    </div>

                    <!-- Document Number -->
                    <div class="col-md-4">
                        <label for="docNumber" class="form-label">Document Number</label>
                        <div class="forms">
                            <input type="text" class="form-control forms" id="docNumber" placeholder="e.g. 12345">
                        </div>
                    </div>

                    <!-- Year -->
                    <div class="col-md-4">
                        <label for="docYear" class="form-label">Year</label>
                        <div class="forms">
                            <select class="form-select" id="docYear">
                                <option value="">Select year</option>
                                <option>2025</option>
                                <option>2024</option>
                                <option>2023</option>
                                <option>2022</option>
                                <option>2021</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Title Search -->
                <div class="mt-4">
                    <label for="docTitle" class="form-label">Document Title</label>
                    <div class="forms">
                        <input type="text" class="form-control form-control-lg forms" id="docTitle"
                            placeholder="Search Document Title...">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search me-2"></i> Search Document
                    </button>
                </div>
            </form>
        </div>


    </div>
</section>
