@php
    $random_id_number_script = "script" . rand();
@endphp
@if(session()->has("message"))
    <div class="floating-area">
        <div class="section-error">
            <div class="wrapper-success">
                <p>{{ Session::get("message") }}</p>
                <span id="close">X</span>
            </div>
        </div>
    </div>
    <script id="{{ $random_id_number_script }}">
        let wrapper_successs = document.querySelectorAll(".wrapper-success");
        wrapper_successs.forEach((wraperr_success) => {
            wraperr_success.children[1].addEventListener('click', (e) => {
                wraperr_success.remove();
                if (document.querySelectorAll(".wrapper-success").length == 0) {
                    document.querySelector('.floating-area').remove();
                    document.getElementById("random_id_number_script").remove();
                }
            });
        });
    </script>
@endif