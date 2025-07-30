import 'dart:collection';

import 'package:flutter/material.dart';
import 'package:ppdb_smk_tin/_components/_header.dart';
import 'package:ppdb_smk_tin/_components/button.dart';

class FormPendaftaran extends StatefulWidget {
  const FormPendaftaran({super.key});

  @override
  State<FormPendaftaran> createState() => _FormPendaftaranState();
}

class _FormPendaftaranState extends State<FormPendaftaran> {
  HashMap<String, String> dataSiswa = HashMap();

  String gender = "L";
  String guard = "A";
  var selectedMajor = [];
  int interestMajorIndex = 0;
  void setSelectedMajors(String major) {
    if (selectedMajor.length == 3) {
      interestMajorIndex = interestMajorIndex >= 2 ? 0 : interestMajorIndex + 1;
      selectedMajor[interestMajorIndex] = major;
      return;
    }
    selectedMajor.add(major);
    interestMajorIndex++;
  }

  bool isSelectedMajor(String major) {
    if (selectedMajor.isEmpty) return false;
    return selectedMajor.contains(major);
  }

  void unSelectedMajor(String major) {
    if (selectedMajor.isEmpty) return;
    selectedMajor.remove(major);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(height: 100.0),
      body: Container(
        padding: EdgeInsets.all(5.0),
        width: MediaQuery.of(context).size.width,
        height: MediaQuery.of(context).size.height,
        child: SingleChildScrollView(
          scrollDirection: Axis.vertical,
          child: Column(
            spacing: 5.0,
            children: [
              SizedBox(height: 5.0),
              SizedBox(
                width: MediaQuery.of(context).size.width - 40.0,
                child: Text(
                  "Data Calon Peserta Didik",
                  style: TextStyle(
                    fontFamily: "Poppins",
                    fontSize: 24.0,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              _textField(
                context,
                "NIK (Nomor Induk Kependudukan)",
                "Masukkan 16 angka",
                "nik",
              ),
              _textField(
                context,
                "Nama Lengkap",
                "Masukkan Nama Lengkap Anda",
                "fullname",
              ),
              _textField(
                context,
                "Tanggal Lahir (tanggal/bulan/tahun)",
                "10/07/08",
                "date_of_birth",
              ),
              _textField(context, "Email", "johndoe@gmail.com", "email"),
              _textField(context, "Nomor Telepon", "081212120123", "no_telp"),
              _textField(
                context,
                "Alamat",
                "Jl. Boulevard Bintaro A92 B1/23, 07/92",
                "address",
              ),
              _textField(
                context,
                "Asal Sekolah",
                "Masukkan asal sekolah anda",
                "prev_school",
              ),
              _genderGroup(context),
              _majorGroupButton(context),
              SizedBox(height: 10.0),
              SizedBox(
                width: MediaQuery.of(context).size.width - 40.0,
                child: _labelText("Data Wali Murid", false),
              ),
              SizedBox(
                width: MediaQuery.of(context).size.width - 40,
                child: Row(
                  children: [
                    _guardButton("A"), // A = ayah
                    _guardButton("B"), // B = Ibu,
                    _guardButton("C"), // C = Other
                  ],
                ),
              ),
              guard == "C"
                  ? _textField(
                    context,
                    "Siapa Yang Akan Menjadi Walimu?",
                    "Paman/Bibi/Kakek/Nenek/Kakak",
                    "guard_type",
                  )
                  : SizedBox(),
              _textField(
                context,
                "Nama",
                "Masukkan Nama Wali Murid",
                "guard_name",
              ),
              _textField(
                context,
                "Email",
                "Masukkan alamat email",
                "guard_email",
                false,
              ),
              _textField(
                context,
                "Nomor Telepon",
                "Masukkan nomor telepon yang dapat dihubungi",
                "guard_no_telp",
              ),
              SizedBox(
                width: MediaQuery.of(context).size.width - 40.0,
                child: Text(
                  "Setiap NIK hanya bisa mengirim satu data, pastikan data yang diberikan sudah benar!",
                  style: TextStyle(fontFamily: "Poppins", fontSize: 14.0),
                  textAlign: TextAlign.center,
                ),
              ),
              Button(text: "Daftar Sekarang", fungsi: () => print(dataSiswa)),
            ],
          ),
        ),
      ),
    );
  }

  SizedBox _majorGroupButton(BuildContext context) {
    return SizedBox(
      width: MediaQuery.of(context).size.width - 40.0,
      child: Column(
        children: [
          _labelText("Minat Jurusan (maximal 3)"),
          Wrap(
            runSpacing: 10.0,
            children: [
              _majorButton("DKV"),
              _majorButton("RPL"),
              _majorButton("TKJ"),
              _majorButton("BC"),
              _majorButton("ANM"),
              _majorButton("GAMEDEV"),
            ],
          ),
        ],
      ),
    );
  }

  SizedBox _genderGroup(BuildContext context) {
    return SizedBox(
      width: MediaQuery.of(context).size.width - 40.0,
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          _labelText("Jenis Kelamin"),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [_genderButton("L", gender), _genderButton("P", gender)],
          ),
        ],
      ),
    );
  }

  GestureDetector _guardButton(String guard) {
    return GestureDetector(
      child: SizedBox(
        width: 110.0,
        height: 50.0,
        child: Card(
          color: guard == this.guard ? Color(0XFF003F8F) : Colors.white,
          child: Center(
            child: Text(
              guard == "A" || guard == "B"
                  ? guard == "A"
                      ? "Ayah"
                      : "Ibu"
                  : "Other",
              style: TextStyle(
                color: guard == this.guard ? Colors.white : Color(0XFF003F8F),
                fontFamily: "Poppins",
                fontWeight: FontWeight.w600,
                fontSize: 16.0,
              ),
            ),
          ),
        ),
      ),
      onTap: () {
        if (guard != "C") {
          dataSiswa["guard_type"] = guard == "A" ? "Ayah" : "Ibu";
        }
        this.guard = guard;
        setState(() {});
      },
    );
  }

  GestureDetector _majorButton(String major) {
    return GestureDetector(
      child: SizedBox(
        width: 110.0,
        height: 50.0,
        child: Card(
          color: isSelectedMajor(major) ? Color(0XFF003F8F) : Colors.white,
          child: Center(
            child: Text(
              major,
              style: TextStyle(
                color:
                    isSelectedMajor(major) ? Colors.white : Color(0XFF003F8F),
                fontFamily: "Poppins",
                fontWeight: FontWeight.w600,
                fontSize: 16.0,
              ),
            ),
          ),
        ),
      ),
      onTap: () {
        if (isSelectedMajor(major)) {
          unSelectedMajor(major);
        } else {
          setSelectedMajors(major);
        }
        setState(() {});
      },
    );
  }

  GestureDetector _genderButton(String gender, String selectedGender) {
    return GestureDetector(
      child: SizedBox(
        width: 135.0,
        height: 50.0,
        child: Card(
          color: gender == selectedGender ? Color(0XFF003F8F) : Colors.white,
          child: Center(
            child: Text(
              gender == "L" ? "Laki - Laki" : "Perempuan",
              style: TextStyle(
                color:
                    gender == selectedGender ? Colors.white : Color(0XFF003F8F),
                fontFamily: "Poppins",
                fontWeight: FontWeight.w600,
                fontSize: 16.0,
              ),
            ),
          ),
        ),
      ),
      onTap: () {
        this.gender = gender;
        dataSiswa["gender"] = gender == "L" ? "Laki - Laki" : "Perempuan";
        setState(() {});
      },
    );
  }

  Column _textField(
    BuildContext context,
    String labelText,
    String hintText,
    String keyName, [
    bool? isMustFill = true,
  ]) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        SizedBox(
          width: MediaQuery.of(context).size.width - 40.0,
          child: _labelText(labelText, isMustFill),
        ),
        SizedBox(height: 2.5),
        SizedBox(
          width: MediaQuery.of(context).size.width - 40.0,
          child: TextField(
            controller: TextEditingController(text: dataSiswa[keyName]),
            decoration: InputDecoration(
              hintText: hintText,
              hintStyle: TextStyle(fontSize: 16.0),
              border: OutlineInputBorder(
                borderSide: BorderSide(color: Color(0xFF003F8F)),
              ),
              focusedBorder: OutlineInputBorder(
                borderSide: BorderSide(color: Color(0xFF003F8F)),
              ),
            ),
            onChanged: (String value) => dataSiswa[keyName] = value,
          ),
        ),
      ],
    );
  }

  Row _labelText(String labelText, [bool? isMustFill = true]) {
    return Row(
      children: [
        Text(
          labelText,
          style: TextStyle(fontFamily: "Poppins", fontSize: 16.0),
        ),
        isMustFill != null && isMustFill
            ? Text(
              "*",
              style: TextStyle(
                fontFamily: "Poppins",
                fontSize: 18.0,
                color: Color(0xFF003F8F),
              ),
            )
            : Text(''),
      ],
    );
  }
}
