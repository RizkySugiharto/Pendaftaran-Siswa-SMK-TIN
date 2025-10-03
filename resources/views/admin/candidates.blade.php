@include("components._header-admin")
@include("components._menu-profile-admin")
<div class="below">
    @include("components._side-bar-admin")
    <div class="content">
        <style>
            .row p
            {
                color: #003F8F;
                font-weight: 500;
            }
            .row:hover
            {
                background-color: #edededff;
            }
        </style>
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
                        @foreach ($candidates as $candidate )
                        <a href="candidates/{{ $candidate->nik }}">    
                        <div class="row">
                            <p>{{ $candidate->nik }}</p>
                            <p>{{ $candidate->fullname }}</p>
                            <p>{{ explode(" ", $candidate->birth_date)[0] }}</p>
                            <p>{{ $candidate->gender }}</p>
                            <p>{{ $candidate->email }}</p>
                            <p>{{ $candidate->no_telp }}</p>
                            <p>{{ $candidate->major }}</p>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="tableclosing"></div>
        </div>
    </div>
</div>

@include("components._footer-admin")