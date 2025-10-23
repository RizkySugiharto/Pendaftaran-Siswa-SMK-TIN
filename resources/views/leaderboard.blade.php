@include("components._header")
<style>
    *
    {
        font-family: inter;
    }
    h1{
        font-size: 1em;
        font-weight: 700;
        color: #003F8F;
    }
    
    h3 {
        font-size: 1em;
        font-weight: 500;
        color: #003F8F;
    }

    .leaderboard
    {
        padding: 40px 30px;
        display: grid;
        gap: 10px;
    }

    .information>p {
        position: relative;
        font-size: 1em;
    }

    .information>p:not(:first-child) {
        margin-top: 8px;
    }

    .kanan-kiri {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-refresh>img {
        width: 20px;
        height: 20px;
    }

    .btn-refresh {
        padding: 5px;
        min-width: 100px;
        max-width: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        border-radius: 10px;
        background: #003F8F;
        outline: 2px solid #003F8F;
    }
    
    .btn-refresh:hover {
        box-shadow: 0 0 1px 1px #003F8F;
    }

    .btn-refresh>p {
        color: white;
        font-weight: normal;
    }

    table {
        border-collapse: collapse;
        border-radius: 10px;
        border: 2px solid #003F8F;
        border-style: hidden;
        outline: 2px solid #003F8F;
    }
    
    tbody tr:last-child td:first-child {
    border-bottom-left-radius: 10px;
    }
    
    tbody tr:last-child td:last-child {
    border-bottom-right-radius: 10px;
    }
    thead tr:last-child td:first-child {
    border-top-left-radius: 10px;
    }
    
    thead tr:last-child td:last-child {
    border-top-right-radius: 10px;
    }

    td {
        padding: 5px;
        color: #000;
    }
    thead tr td{
        background: #003F8F;
        color: #fff !important;
        border-radius: 0;
    }

    tbody>tr:nth-child(odd) {
        background-color: #fff;
        color: #000;
    }
    
    tbody>tr:nth-child(even) {
        background-color: #335c9158;
        color: #000;
    }

</style>

<main class="leaderboard">
    <h1>Ranking Calon Peserta Didik</h1>
    <div class="information">
        <h3>Informasi Beasiswa SMK TECHNO INFORMATIKA NUSANTARA</h3>
        <br>
        <br>
        <p>Peringkat 1. Mendapatkan 50% Potongan SPP</p>
        <p>Peringkat 2. Mendapatkan 30% Potongan SPP</p>
        <p>Peringkat 3. Mendapatkan 30% Potongan Uang Pangkal</p>
        <br>
    </div>
    <div class="kanan-kiri">
        <a href="{{ route('candidates.leaderboard') }}" class="btn-refresh">
            <img src="{{ asset('icons/icon-refresh.svg?fill=#003F8F') }}" alt="icon refresh">
            <p>Refresh</p>
        </a>
        <p>Periode: 12 September - 12 Desember 2025</p>
    </div>
    <table border="1">
        <thead>
            <tr>
                <td>Peringkat</td>
                <td>Nama</td>
                <td>Asal Sekolah</td>
                <td>Rata Rata Nilai</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $cpd)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $cpd->fullname }}</td>
                    <td>{{ $cpd->prev_school }}</td>
                    <td>{{ $cpd->avg_value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@include("components._footer")