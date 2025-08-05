<style>
    .selamat-main {
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .selamat {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;

        padding: 8px;
    }

    .selamat>img {
        width: 250px;
        height: 250px;
    }

    .selamat>.content {
        padding: 2px !important;
        display: flex;
        align-items: center;
        text-align: center;
        gap: 5px;
    }

    .selamat>.content>p {
        max-width: 585px;
        font-size: 18px;
    }

    button {
        margin-top: 5px;
        padding: 6px;
        border-radius: 4px;
        border: 1px solid #003F8F;
        background-color: white;
        color: #003F8F;
        font-size: 20px;
        cursor: pointer;
    }
</style>

@include('components._header')
@if ($terdaftar)
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<main class="selamat-main">
    <div class="selamat">
        <img src="{{ asset("images/selamat-datang.png") }}" alt="selamat-datang">
        <div class="content">
            <h2>Selamat!!, Kamu telah terdaftar sebagai Calon Peserta Didik Kami</h2>
            <p>Setelah ini, kamu akan mendapatkan informasi terkait sekolah dan tahapan selanjutnya melalui email / no telepon yang sudah didaftarkan ya</p>
            <p>"Tetap Semangat, Jangan Menyerah"</p>
            <button class="btn_back" onclick='location.href = `{{ route("index") }}` '>Kembali Ke Halaman Utama</button>
        </div>
    </div>
</main>
<script type="text/javascript">
    (function() {
        emailjs.init({
            publicKey: "26NxG6cQahGI6ZZP1",
        });
        emailjs.send("{{ env('EMAILJS_SERVICE_ID') }}", "selamat_peserta_didik", {
            "fullname": "{{ $fullname }}",
            "candidate_email": "{{ $email }}"
        });
    })();
</script>
@else
<script>
    location.href = "{{ route("index") }}";
</script>
@endif
@include('components._footer')