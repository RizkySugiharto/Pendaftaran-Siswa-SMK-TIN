@include('components._header')
@vite(["resources/css/stupid-style.css"])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-primary mb-4" style="color: #003f8f !important;">Selamat Datang di SMK Teknologi Nusantara</h1>
                    <p class="lead text-dark mb-4">Membentuk generasi teknologi masa depan dengan pendidikan berkualitas dan fasilitas modern.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('candidates.create') }}" class="btn">
                            <i class="fas fa-user-plus me-2" ></i>Daftar Sekarang
                        </a>
                        <a href="#about" class="btn">
                            <i class="fas fa-info-circle me-2"></i> Tentang Kami 
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/logo tin.png')  }}" alt="SMK Teknologi Nusantara" width="100%">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="text-primary8">Tentang SMK <br>Teknologi Nusantara</h2>
                    <p class="lead">SMK Teknologi Nusantara adalah sekolah menengah kejuruan yang fokus pada bidang teknologi informasi dan multimedia. Kami berkomitmen untuk menghasilkan lulusan yang siap kerja dan mampu bersaing di era digital.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-medal text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Akreditasi A</h5>
                            <p class="card-text">Terakreditasi A dengan standar pendidikan berkualitas tinggi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-users text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Tenaga Pengajar Profesional</h5>
                            <p class="card-text">Didukung oleh guru-guru berpengalaman di bidang teknologi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="fas fa-laptop text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Fasilitas Modern</h5>
                            <p class="card-text">Laboratorium komputer dan multimedia dengan teknologi terkini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Majors Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="text-primary9">Program Keahlian</h2>
                <p class="lead">Pilih program keahlian yang sesuai dengan minat dan bakatmu</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <i class="fas fa-code text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Rekayasa Perangkat Lunak (RPL)</h5>
                            <p class="card-text">Mempelajari pengembangan aplikasi, web development, dan mobile development</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Programming</li>
                                <li><i class="fas fa-check text-success me-2"></i>Database</li>
                                <li><i class="fas fa-check text-success me-2"></i>Web Development</li>
                                <li><i class="fas fa-check text-success me-2"></i>Mobile Development</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <i class="fas fa-network-wired text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Teknik Komputer & Jaringan (TKJ)</h5>
                            <p class="card-text">Mempelajari instalasi, konfigurasi, dan maintenance sistem komputer dan jaringan</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Hardware & Software</li>
                                <li><i class="fas fa-check text-success me-2"></i>Jaringan Komputer</li>
                                <li><i class="fas fa-check text-success me-2"></i>Server Administration</li>
                                <li><i class="fas fa-check text-success me-2"></i>Cybersecurity</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <i class="fas fa-paint-brush text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Desain Komunikasi Visual (DKV)</h5>
                            <p class="card-text">Mempelajari desain grafis, branding, dan komunikasi visual</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Graphic Design</li>
                                <li><i class="fas fa-check text-success me-2"></i>Typography</li>
                                <li><i class="fas fa-check text-success me-2"></i>Branding</li>
                                <li><i class="fas fa-check text-success me-2"></i>Digital Illustration</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <i class="fas fa-gamepad text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Game Development</h5>
                            <p class="card-text">Mempelajari pengembangan game dari konsep hingga implementasi</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Game Design</li>
                                <li><i class="fas fa-check text-success me-2"></i>Game Programming</li>
                                <li><i class="fas fa-check text-success me-2"></i>3D Modeling</li>
                                <li><i class="fas fa-check text-success me-2"></i>Game Engine</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/animasi.png')  }}" alt="Animasi" width="50px" height="50px">
                             <img src="" alt="">
                            <h5 class="card-title">Animation</h5>
                            <p class="card-text">Mempelajari animasi 2D, 3D, dan motion graphics</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>2D Animation</li>
                                <li><i class="fas fa-check text-success me-2"></i>3D Animation</li>
                                <li><i class="fas fa-check text-success me-2"></i>Motion Graphics</li>
                                <li><i class="fas fa-check text-success me-2"></i>Video Editing</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow major-card">
                        <div class="card-body text-center">
                            <i class="fas fa-video text-primary fa-3x mb-3"></i>
                            <h5 class="card-title">Broadcast</h5>
                            <p class="card-text">Mempelajari cara broadcast seperti di game growtopia</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Cameramen</li>
                                <li><i class="fas fa-check text-success me-2"></i>Script Writing</li>
                                <li><i class="fas fa-check text-success me-2"></i>Event Presenter</li>
                                <li><i class="fas fa-check text-success me-2"></i>Product Management</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="display-5 fw-bold mb-4" style="color: #003f8f !important;">Siap Bergabung dengan Kami?</h2>
            <p class="lead mb-4">Daftarkan dirimu sekarang dan jadilah bagian dari generasi teknologi masa depan!</p>
            <a href="{{ route('candidates.create') }}" class="btn btn-light btn-lg">
                <i class="fas fa-user-plus me-2"></i>Daftar Siswa Baru
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
                <div class="left">
                    <h5>SMK Teknologi Nusantara</h5>
                    <p>Jl. Teknologi No. 123, Jakarta<br>
                    Telp: (021) 12345678<br>
                    Email: info@smkteknologi.ac.id</p>
                </div>
                <div class="right">
                    <p>&copy; 2024 SMK Teknologi Nusantara. All rights reserved.</p>
                </div>
            
        </div>
    </footer>

    @includeWhen($errors->any(), 'components._error-message')
    @includeWhen(Session::has("message"),'components._success-message')
@include('components._footer')
