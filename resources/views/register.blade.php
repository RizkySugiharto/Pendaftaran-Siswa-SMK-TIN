@include('components._header')   
   <form class="content" method="post" action="#">
        @csrf
        <div class="sections">
            <div class="sect">
                <div class="div">
                    <label for="nik">NIK <span>(Nomor Induk Kependudukan)</span></label>
                    <input class="input" type="text" inputmode="numeric" name="nik" id="nik"
                        placeholder="Masukkan NIK berupa 16 angka" minlength="16" maxlength="16" value="{{ old("nik") }}" required>
                        <input type="hidden" name="nik_validate" id="nik_validate" value="{{ old("nik_validate") ?? false }}" readonly required>
                    <p style="color: red; font-size: 12px;" id="nikError"></p>
                </div>
                <div class="div">
                    <label for="fullname">Nama Lengkap</label>
                    <input class="input" type="text" name="fullname" id="fullname"
                        placeholder="Masukkan nama calon peserta didik" minlength="3" maxlength="120" value="{{ old("fullname") }}" required>
                </div>
                <div class="div">
                    <label for="genderInput">Jenis Kelamin</label>
                    <div class="radio" id="genderRadioGroup">
                        <input type="hidden" id="genderInput" name="gender" value="{{ old("gender") ?? 'male' }}" required readonly>
                        <button class="button" type="button" data-value="male">Male</button>
                        <button class="button3" type="button" data-value="female">Female</button>
                    </div>
                </div>
                <div class="div">
                    <label for="birth_date">Tanggal Lahir</label>
                    <input class="input" type="date" name="birth_date" id="birth_date" placeholder="" value="{{ old("birth_date") }}" required>
                </div>
            </div>
            <div class="sect">
                <div class="div">
                    <label for="email">Email</label>
                    <input class="input" type="email" name="email" id="email"
                        placeholder="Masukkan alamat email calon peserta didik" minlength="8" maxlength="120" value="{{ old("email") }}" required>
                </div>
                <div class="div">
                    <label for="no_telp">No Telp</label>
                    <input class="input" type="text" inputmode="numeric" name="no_telp" id="no_telp"
                        placeholder="Masukkan no telepon calon peserta didik" minlength="11" maxlength="12" value="{{ old("no_telp") }}" required>
                </div>
                <div class="div">
                    <label for="address">Alamat</label>
                    <input class="input" type="text" name="address" id="address"
                        placeholder="Masukkan alamat rumah anda" value="{{ old("address") }}" required>
                </div>
                <div class="div">
                    <label for="prev_school">Asal Sekolah</label>
                    <input class="input" type="text" name="prev_school" id="prev_school"
                        placeholder="Masukkan nama sekolah sebelumnya" minlength="8" maxlength="220" value="{{ old("prev_school") }}" required>
                </div>
            </div>
        </div>
        <br>
        <div class="sections">
            <div class="sect">
                <div class="div">
                    <label for="parent_name">Nama Wali</label>
                    <input class="input" type="text" name="parent_name" id="parent_name"
                        placeholder="Masukkan wali calon peserta didik" minlength="3" maxlength="120" value="{{ old("parent_name") }}" required>
                </div>
                <div class="div">
                    <label for="parent_Telp">Nomor Telefon Wali</label>
                    <input class="input" type="text" inputmode="numeric" name="parent_telp" id="parent_Telp"
                        placeholder="Masukkan nomor telepon wali" minlength="11" maxlength="12" value="{{ old("parent_telp") }}" required>
                </div>
                <div class="div">
                    <label class="label-optional" for="parent_email">Email Wali</label>
                    <input class="input" type="text" name="parent_email" id="parent_email"
                        placeholder="Masukkan alamat email wali" minlength="8" maxlength="220" value="{{ old("parent_email") }}">
                </div>
            </div>
            <div class="sect">
                <div class="div">
                    <label for="jurusanInput">Pilih Jurusan <span>(max. 3)</span></label>
                    <div class="radio" id="jurusanGroup">
                        <input type="hidden" id="jurusanInput" name="major" value="{{ old("major") ?? '' }}" readonly required>
                        <div>
                            <button class="button3" type="button" data-value="BC"> BC </button>
                            <button class="button3" type="button" data-value="RPL">RPL </button>
                            <button class="button3" type="button" data-value="DKV">DKV </button>
                        </div>
                        <div>
                            <button class="button3" type="button" data-value="TKJ">TKJ </button>
                            <button class="button3" type="button" data-value="GMV">GMDV</button>
                            <button class="button3" type="button" data-value="ANM">ANIM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="button3" value="Submit">
    </form>

    @includeWhen($errors->any(), 'components._error-message')
    @includeWhen(Session::has("message"),'components._success-message')

    <script defer>
        let isValidNik = false;
        function setupMultiSelect(groupId, inputId, maxSelections = 3) {
            const group = document.getElementById(groupId);
            const input = document.getElementById(inputId);
            const buttons = group.querySelectorAll('button');
            let selected = [];

            buttons.forEach(button => {
                input.value.split(",").forEach((m) => {
                    if(m == button.dataset.value){
                        button.classList.remove('button3');
                        button.classList.add('button');
                        if(!selected.find(cm => cm == button.dataset.value)){
                            selected.push(button.dataset.value);
                        }
                    }
                });
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
        const nikErrorMessage = document.getElementById('nikError');
        document.getElementById("nik").addEventListener("change", (e) => {
            console.log(e.target.value)
            isValidNik = NIKFormatter.validate(e.target.value);
            nikErrorMessage.innerText = isValidNik ? 'NIK valid!, Silahkan lanjutkan ke tahap berikutnya...' : 'NIK tidak valid!';
            nikErrorMessage.style.color = isValidNik? "green" : "red";
            document.getElementById('nik_validate').value = isValidNik;
        });
    </script>


    <script>
        function setupRadioButtons(groupId, inputId) {
            const group = document.getElementById(groupId);
            const input = document.getElementById(inputId);
            const buttons = group.querySelectorAll('button');

            buttons.forEach(button => {
                if(input.value == button.dataset.value){
                    button.classList.remove('button3');
                    button.classList.add('button');
                }else{
                    button.classList.add('button3');
                    button.classList.remove('button');
                }
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
@include('components._footer')