<!DOCTYPE html>
<html lang="en" id="formphp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuckbars</title>


    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/croc" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset("css/style.css")  }}">

</head>
<div class="navbar">
    <a href="index.php">
        <h1 class="logo">TIN</h1>
    </a>
</div>

<body>

    <form class="content" method="post" action="#">
        <div class="sections">
            <div class="sect">
                <div class="div">
                    <label for="nik">NIK <span>(Nomor Induk Kependudukan)</span></label>
                    <input class="input" type="number" name="nik" id="nik" placeholder="Masukkan NIK berupa 16 angka"  minlength="16" maxlength="16" required>
                </div>
                <div class="div">
                    <label for="name">Nama Lengkap</label>
                    <input class="input" type="text" name="name" id="name" placeholder="Masukkan nama calon peserta didik" minlength="3" maxlength="120" required>
                </div>
                <div class="div">
                    <label for="genderInput">Jenis Kelamin</label>
                    <div class="radio" id="genderRadioGroup">
                        <input type="hidden" id="genderInput" name="gender" value="" required readonly>
                        <button class="button" type="button" data-value="Male">Male</button>
                        <button class="button3" type="button" data-value="Female">Female</button>
                    </div>
                </div>
                <div class="div">
                    <label for="date_birth">Tanggal Lahir</label>
                    <input class="input" type="date" name="date-chose" id="date_birth"  placeholder="" required>
                </div>
            </div>
            <div class="sect">
                <div class="div">
                    <label for="email">Email</label>
                    <input class="input" type="email" name="email" id="email" placeholder="Masukkan alamat email calon peserta didik" minlength="8" maxlength="120" required>
                </div>
                <div class="div">
                    <label for="no_telp">No Telp</label>
                    <input class="input" type="number" name="no_telp" id="no_telp" placeholder="Masukkan no telepon calon peserta didik" minlength="11" maxlength="12" required>
                </div>
                <div class="div">
                    <label for="address">Alamat</label>
                    <input class="input" type="text" name="address" id="address" placeholder="Masukkan alamat rumah anda" required>
                </div>
                <div class="div">
                    <label for="prev_school">Asal Sekolah</label>
                    <input class="input" type= "text" name="prev_school" id="prev_school" placeholder="Masukkan nama sekolah sebelumnya" minlength="8" maxlength="220" required>
                </div>
            </div>
        </div>
        <br>
        <div class="sections">
            <div class="sect">
                <div class="div">
                    <label for="parent_name">Nama Wali</label>
                    <input class="input" type="text" name="parent_name" id="parent_name" placeholder="Masukkan wali calon peserta didik" minlength="3" maxlength="120" required>
                </div>
                <div class="div">
                    <label for="parent_Telp">Nomor Telefon Wali</label>
                    <input class="input" type="text" name="parent_Telp" id="parent_Telp" placeholder="Masukkan nomor telepon wali" required>
                </div>
                <div class="div">
                    <label class="label-optional" for="parent_email">Email Wali</label>
                    <input class="input" type="text" name="parent_email" id="parent_email" placeholder="Masukkan alamat email wali" minlength="8" maxlength="220">
                </div>
            </div>
            <div class="sect">
                <div class="div">
                    <label for="jurusanInput">Pilih Jurusan <span>(max. 3)</span></label>
                    <div class="radio" id="jurusanGroup">
                        <input type="hidden" id="jurusanInput" name="jurusan" value="" readonly required>
                        <div>
                            <button class="button3" type="button" data-value="BC"> BC </button>
                            <button class="button3" type="button" data-value="RPL">RPL </button>
                            <button class="button3" type="button" data-value="DKV">DKV </button>
                        </div>
                        <div>
                            <button class="button3" type="button" data-value="TKJ">TKJ </button>
                            <button class="button3" type="button" data-value="GMDV">GMDV</button>
                            <button class="button3" type="button" data-value="ANIM">ANIM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" class="button3" value="Submit">
    </form>   
    <script>
        function setupMultiSelect(groupId, inputId, maxSelections = 3) {
            const group = document.getElementById(groupId);
            const input = document.getElementById(inputId);
            const buttons = group.querySelectorAll('button');
            let selected = [];

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const value = button.dataset.value;

                    if (button.classList.contains('button')) {
                        button.classList.remove('button');
                        button.classList.add('button3');
                        selected = selected.filter(v => v !== value);
                    } else {
                        if (selected.length >= maxSelections) {
                            const removed = selected.shift();
                            const btnToDeselect = [...buttons].find(b => b.dataset.value === removed);
                            btnToDeselect.classList.remove('button');
                            btnToDeselect.classList.add('button3');
                        }

                        button.classList.remove('button3');
                        button.classList.add('button');
                        selected.push(value);
                    }

                    input.value = selected.join(',');
                });
            });
        }
        setupMultiSelect('jurusanGroup', 'jurusanInput', 3);
    </script>


    <script>
        function setupRadioButtons(groupId, inputId) {
            const group = document.getElementById(groupId);
            const input = document.getElementById(inputId);
            const buttons = group.querySelectorAll('button');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => {
                        btn.classList.remove('button');
                        btn.classList.add('button3');
                    });

                    button.classList.remove('button3');
                    button.classList.add('button');
                    input.value = button.dataset.value;
                });
            });
        }

        setupRadioButtons('genderRadioGroup', 'genderInput');
    </script>

</body>

</html>