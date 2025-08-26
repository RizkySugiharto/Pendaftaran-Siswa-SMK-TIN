@include("components._header-admin")
@include("components._menu-profile-admin")
<div class="below">
    @include("components._side-bar-admin")
    <div class="content">
        <div class="upper">
        <div class="counter">
            <div>
                <img src="{{ asset('icons/personbox.svg') }}" alt="icon person">
            </div>
            <div>
                <h3> Calon Peserta Didik <br> Terdaftar</h3>
                <p>{{ count($candidates)  }}</p>
            </div>
        </div>
        <a href="{{ route('candidates.create') }}">
        <div class="counter-button">
            <div>
                <h3> Tambah Peserta Didik</h3>
            </div>
        </div>
    </a>
</div>

        <div class="table">
            <div class="tableopening">
                <p>Data calon peserta didik <br>2026</p>
                <div class="search">
                    <button><img src="{{ asset("icons/filter.svg")  }}" alt=""></button>
                    <input type="text">
                    <button> <img src="{{ asset("icons/search.svg")  }}" alt=""></button>
                </div>
            </div>
            <div class="tablecontent">
                <div class="tablewrapper">
                    <div class="top">
                        <p>NIK</p>
                        <p>Nama Lengkap</p>
                        <p>Tanggal Lahir</p>
                        <p>Jenis Kelamin</p>
                        <p>Alamat Email</p>
                        <p>Nomor Telepon</p>
                        <p>Minat Jurusan</p>
                    </div>
                    <div class="bottom">
                        <!-- <div class="row">
                            <p>001</p>
                            <p>917498172984</p>
                            <p>Wildan Izhar Al Haqq</p>
                            <p>9/11/2025</p>
                            <p>Female</p>
                            <p>wildan@gmail.com</p>
                            <p>08123456789</p>
                            <p>RPL, DKV, TKJ</p>
                        </div> -->
                        @foreach ($candidates as $candidate )
                             <div class="row">
                            <p><a href="candidates/{{ $candidate->nik }}" style="text-decoration:underline">{{ $candidate->nik }}</a></p>
                            <p>{{ $candidate->fullname }}</p>
                            <p>{{ explode(" ", $candidate->birth_date)[0] }}</p>
                            <p>{{ $candidate->gender }}</p>
                            <p>{{ $candidate->email }}</p>
                            <p>{{ $candidate->no_telp }}</p>
                            <p>{{ $candidate->major }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="tableclosing"></div>
        </div>
    </div>
</div>

@include("components._footer-admin")