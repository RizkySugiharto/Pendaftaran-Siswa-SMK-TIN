<!DOCTYPE html>
<html lang="en" id="formphp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuckbars</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/croc" rel="stylesheet">
                

</head>
    <div class="navbar">
        <a href="index.php">
        <h1 class="logo">TIN</h1>
        </a>
    </div>
<body>
    
<div class="content">
    <div class="sections">
    <div class="sect">
                <div class="div">
                    <label for="NIK">NIK <span>(Nomor Induk Kependudukan)</span></label>
                    <input class="input" type="text" name="NIK" placeholder=" ">
                </div>
                <div class="div">
                    <label for="Name">Nama Lengkap</label>
                    <input class="input" type="text" name="Name" placeholder=" ">
                </div>
            <div class="div">
                <label for="genderInput">Jenis Kelamin</label>
                <div class="radio" id="genderRadioGroup">
                    <input type="hidden" id="genderInput" name="gender" value="">
                    <button class="button" type="button" data-value="Male">Male</button>
                    <button class="button3" type="button" data-value="Female">Female</button>
                </div>
            </div>
                <div class="div">
                    <label for="Name">Tanggal Lahir</label>
                    <input class="input" type="date" name="Name" placeholder=" ">
                </div>

    </div>
    <div class="sect">
                <div class="div">
                    <label for="Email">Email</label>
                    <input class="input" type="text" name="Email" placeholder=" ">
                </div>
                <div class="div">
                    <label for="NoTelp">No Telp</label>
                    <input class="input" type="text" name="NoTelp" placeholder=" ">
                </div>
                <div class="div">
                    <label for="Alamat">Alamat</label>
                    <input class="input" type="text" name="Alamat" placeholder=" ">
                </div>
                <div class="div">
                    <label for="AsalSekolah">Asal Sekolah</label>
                    <input class="input" type="text" name="AsalSekolah" placeholder=" ">
                </div>
        </div>
    </div>
    <br>
    <div class="sections">
    <div class="sect">
                <div class="div">
                    <label for="WNama">Nama Wali</label>
                    <input class="input" type="text" name="WNama" placeholder=" ">
                </div>
                <div class="div">
                    <label for="WNoTelp">Nomor Telefon Wali</label>
                    <input class="input" type="text" name="WNoTelp" placeholder=" ">
                </div>
                <div class="div">
                    <label for="WEmail">Email Wali</label>
                    <input class="input" type="text" name="WEmail" placeholder=" ">
                </div>
    </div>
    <div class="sect">
        <div class="div">
    <label for="jurusanInput">Pilih Jurusan <span>(max. 3)</span></label>
    <div class="radio" id="jurusanGroup">
        <input type="hidden" id="jurusanInput" name="jurusan" value="">
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
</div>

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
