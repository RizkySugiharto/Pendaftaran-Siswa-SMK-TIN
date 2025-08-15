@include("components._header-admin")
@include("components._menu-profile-admin")
<style>
    main {
        padding: 20px;
        color: #003F8F;
    }

    h1 {
        color: #003F8F;
    }

    .card-detail {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .candidate-details {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .card-detail > button {
        width: 100%;
        height: 50px;
        background-color: #003F8F;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1.2rem;
        cursor: pointer;
    }

    .wrapper-input {
        max-width: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }

    .wrapper-input > label {
        font-size: 1.2rem;
    }

    .wrapper-input > input {
        outline: none;
        border: none;
        border-bottom: 1px solid #003F8F;
        font-size: 1.2rem;
        padding: 2px 5px;
    }

    .wrapper-input > input:focus {
        outline: #003F8F solid 2px;
    }

    select{
        font-size: 1rem;
        padding: 8px;
        color: #003F8F;
    }

    .ke-kanan{
        justify-self: flex-end;
    }

</style>
<main>
    <!-- DATA SISWA -->
    @php
        $needeGrades = [
        "MTK" => "Matematika", 
        "IPA" => "Ilmu Pengetahuan Alam", 
        "IPS" => "Ilmu Pengetahuan Sosial", 
        "English" => "Bahasa Inggris", 
        "BIndo" => "Bahasa Indonesia"
    ];
    @endphp
    <form class="card-detail" action="#" method="POST">
        @csrf
        @method('PUT')
        <div class="candidate-details">
            <h1>Detail Candidate</h1>
            <div class="wrapper-input">
                <label for="nik">NIK</label>
                <input type="text" inputmode="numeric" name="nik" id="nik" placeholder="Masukkan NIK berupa 16 angka"
                    minlength="16" maxlength="16" value="{{ $candidate->nik }}" readonly>
            </div>
            <div class="wrapper-input">
                <label for="fullname">FullName</label>
                <input type="text" name="fullname" id="fullname" placeholder="Masukkan Nama Lengkap" minlength="3"
                    maxlength="120" value="{{ $candidate->fullname }}">
            </div>
            <div class="wrapper-input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" minlength="8" maxlength="120"
                    value="{{ $candidate->email }}">
            </div>
            <div class="wrapper-input">
                <label for="no_telp">No Telephone</label>
                <input type="text" inputmode="numeric" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telepon"
                    minlength="11" maxlength="12" value="{{ $candidate->no_telp }}">
            </div>
            <div class="wrapper-input">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date"
                    value="{{ explode(" ", $candidate->birth_date)[0] }}">
            </div>
            <div class="wrapper-input">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="male" @selected($candidate->gender == $genders[0])>Laki - Laki</option>
                    <option value="female" @selected($candidate->gender == $genders[1])>Perempuan</option>
                </select>
            </div>
            <div class="wrapper-input">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Masukkan Alamat Rumah"
                    value="{{ $candidate->address }}">
            </div>
            <div class="wrapper-input">
                <label for="prev_school">Previous School</label>
                <input type="text" id="prev_school" name="prev_school" placeholder="Masukkan Sekolah Sebelumnya"
                    value="{{ $candidate->prev_school }}">
            </div>
            <div class="wrapper-input">
                <label for="major">Major <span style="font-size: .8rem;">(exg: GMV, RPL, DKV)</span></label>
                <input type="text" id="major" name="major" placeholder="GMV, RPL, DKV" value="{{ $candidate->major }}">
            </div>
            <div class="wrapper-input">
                <label for="submit_date">Submit Date</label>
                <input type="text" id="submit_date" name="submit_date"
                value="{{ explode(" ", $candidate->submit_date)[0] }}" disabled>
            </div>
            <div class="wrapper-input">
                <label for="phase">Phase</label>
                <input type="text" id="phase" name="phase" placeholder="Masukkan Gelombang Berapa Beliau Join" value="{{ $candidate->phase }}" readonly>
            </div>
            <div class="wrapper-input">
                <label for="status">Status Data</label>
                <select name="status" id="status">
                    <option value="unverified" @selected($candidate->status == $statuses[0])>Belum Verifikasi</option>
                    <option value="verified" @selected($candidate->status == $statuses[1])>Terverifikasi</option>
                    <option value="active" @selected($candidate->status == $statuses[2])>Siswa Sudah Aktif</option>
                </select>
            </div>
        </div>
        <br>
        <div class="candidate-details">
            <h1>Detail Parent Candidate</h1>
            <div class="wrapper-input">
                <label for="parent_name">Parent Name</label>
                <input type="text" name="parent_name" id="parent_name"
                    placeholder="Masukkan nama wali murid" minlength="3" maxlength="120"
                    value="{{ $candidate->parent_name }}">
            </div>
            <div class="wrapper-input">
                <label for="parent_email">Parent Email</label>
                <input type="email" name="parent_email" id="parent_email" placeholder="Masukkan Alamat Email Orang Tua"
                    minlength="3" maxlength="120" value="{{ $candidate->parent_email }}">
            </div>
            <div class="wrapper-input">
                <label for="parent_telp">Parent Telephone</label>
                <input type="text" inputmode="numeric" name="parent_telp" id="parent_telp"
                    placeholder="Masukkan Nomor Telepon" minlength="11" maxlength="12"
                    value="{{ $candidate->parent_telp }}">
            </div>
        </div>
        <button type="submit" id="submit_data">UPDATE DATA</button>
    </form>

    <!-- FORM INPUT NILAI -->
    <br><br>
    <form class="card-detail" action="{{ route("candidates.grades-update", $candidate) }}" method="POST">
        @csrf
        @method("PUT")
        <h1>Candidate Scores</h1>
        <div class="candidate-details">
           @foreach ($grades as $grade)
                @php
                    $name = $grade["name"];
                    $key = $grade["name"];
                    $isExist = array_key_exists($name, $needeGrades);
                    if($isExist) {
                        $name = $needeGrades[$name];
                        $needeGrades[$key] = "filled";
                    }
                @endphp
                <div class="wrapper-input">
                    <label for="{{ $key }}">{{ $name }}</label>
                    <input type="number" name="{{  $key  }}" id="{{  $key  }}" placeholder="Masukkan nilai {{ $name }}" min="0" max="100" step="1" value="{{ $grade["value"] ?? 0 }}">
                </div>
           @endforeach
            @foreach ($needeGrades as $grade)
                @php
                    $key = array_search($grade, $needeGrades);    
                @endphp
                @if ($grade != "filled")
                    <div class="wrapper-input">
                        <label for="{{ $key }}">{{ $grade }}</label>
                        <input type="number" name="{{  $key  }}" id="{{  $key  }}" placeholder="Masukkan nilai {{ $key }}" min="0" max="100" step="1" value="0">
                    </div>
                @endif
           @endforeach
        </div>
        <button type="submit" id="submit_grades">UPDATE NILAI</button>
    </form>
</main>
@includeWhen($errors->any(), 'components._error-message')
@includeWhen(Session::has("message"),'components._success-message')
@include("components._footer-admin")
