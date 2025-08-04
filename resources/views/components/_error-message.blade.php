@php
    $random_id_number_script = "script" . rand();
@endphp

@if ($errors->any())
    @vite(["resources/css/alert.css"])
    <div class="floating-area">
        <div class="section-error">
            @foreach ($errors->all() as $error)
                <div class="wrapper-error">
                    <p>Periksa Kembali: {{ $error }}</p>
                    <span id="close">X</span>
                </div>
            @endforeach
        </div>
    </div>
    <script id="{{ $random_id_number_script }}">
        let wrapper_errors = document.querySelectorAll(".wrapper-error");
        wrapper_errors.forEach((wraperr_error) => {
            wraperr_error.children[1].addEventListener('click', (e) => {
                wraperr_error.remove();
                if (document.querySelectorAll(".wrapper-error").length == 0) {
                    document.querySelector('.floating-area').remove();
                    document.getElementById("random_id_number_script").remove();
                }
            });
        });
    </script>
@endif