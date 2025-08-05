@include("components._header-admin")
@include("components._menu-profile-admin")
@include("components._side-bar-admin")
<div class="content">
    <div class="widgets">
        <div class="calonpesdik">
            <img src="{{ asset("icons/personbox.svg") }}" alt="icon person">
            <h3>Calon Peserta Didik</h3>
            <h1>{{ $candidates  }}</p>
            <h2>Jumlah</h2>
        </div>
        <div class="pesdik">
            <img src="{{ asset("icons/personbox.svg") }}" alt="icon person">
            <h3>Peserta Didik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>

        </div>
        <div class="guru">
            <img src="{{ asset("icons/personbox.svg")  }}" alt="icon person">
            <h3>Pendidik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>

        </div>
        <div class="nonguru">
            <img src="{{ asset("icons/personbox.svg")  }}" alt="icon person">
            <h3>Non Kependidik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>
        </div>
    </div>

    <div class="calendar">
        <p>Calendar</p>
        <hr>
        <h3>July 2025</h3>
    </div>

    <div class="something">

    </div>
</div>

@include("components._footer-admin")