@include("components._header")

<style>
    h2,
    h3 {
        color: #003F8F;
    }

    .leaderboard {
        padding: 10px;
        display: grid;
        gap: 10px;
    }

    .information {}

    .information>p {
        position: relative;
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
        background-color: #003F8F;
        border-radius: 2px;
    }

    .btn-refresh:hover {
        box-shadow: 0 0 20px #670e9adf;
    }

    .btn-refresh>p {
        color: white;
        font-weight: normal;
    }

    table {
        border: 2px solid #003F8F;
        border-collapse: collapse;
    }

    td {
        padding: 5px;
    }

    tbody>tr:nth-child(odd) {
        background-color: #3666a5ff;
        color: white;
    }

    tbody>tr:nth-child(even) {
        background-color: #1b3e6bff;
        color: white;
    }
</style>

<main class="leaderboard">
    <h2>Ranking Calon Peserta Didik</h2>
    <div class="information">
        <h3>Informasi Beasiswa SMK TECHNO INFORMATIKA NUSANTARA</h3>
        <p>Peringkat 1. Mendapatkan 50% Potongan SPP</p>
        <p>Peringkat 2. Mendapatkan 30% Potongan SPP</p>
        <p>Peringkat 3. Mendapatkan 30% Potongan Uang Pangkal</p>
    </div>
    <div class="kanan-kiri">
        <a href="{{ route("candidates.leaderboard") }}" class="btn-refresh">
            <img src="{{ asset("icons/icon-refresh.svg?color=") }}" alt="icon refresh">
            <p>Refresh</p>
        </a>
        <p>Periode: 1 Januari - 18 Juni 2025</p>
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