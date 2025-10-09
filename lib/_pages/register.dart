import 'dart:collection';

import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:nik_validator/nik_validator.dart';
import 'package:ppdb_smk_tin/_components/header_content.dart';
import 'package:ppdb_smk_tin/_components/button.dart';
import 'package:ppdb_smk_tin/_data/providers/candidates_api.dart';
import 'package:ppdb_smk_tin/_data/providers/history_manager.dart';
import 'package:ppdb_smk_tin/_pages/registered.dart';

class FormPendaftaran extends StatefulWidget {
  const FormPendaftaran({super.key});

  @override
  State<FormPendaftaran> createState() => _FormPendaftaranState();
}

class _FormPendaftaranState extends State<FormPendaftaran> {
  final HashMap<String, TextEditingController> _textControllers = HashMap.from({
    "nik": TextEditingController(),
    "fullname": TextEditingController(),
    "birth_date": TextEditingController(),
    "email": TextEditingController(),
    "no_telp": TextEditingController(),
    "address": TextEditingController(),
    "prev_school": TextEditingController(),
    "parent_name": TextEditingController(),
    "parent_telp": TextEditingController(),
    "parent_email": TextEditingController(),
    "gender": TextEditingController(),
    "major": TextEditingController(),
  });
  bool _isLoading = false;

  @override
  void dispose() {
    for (var key in _textControllers.keys) {
      _textControllers[key]!.dispose();
    }

    super.dispose();
  }

  bool _isAllFieldIsEmpty() {
    for (var key in _textControllers.keys) {
      if (key != "gender" && _textControllers[key]!.text.isNotEmpty) {
        return false;
      }
    }
    return true;
  }

  bool _isAllFieldIsFilled() {
    for (var key in _textControllers.keys) {
      if (key == 'parent_email') {
        continue;
      }
      if (_textControllers[key]!.text.isEmpty) {
        return false;
      }
    }
    return true;
  }

  Future<void> _onRegisterTap() async {
    try {
      setState(() {
        _isLoading = true;
      });

      if (!_isAllFieldIsFilled()) {
        showDialog(
          context: context,
          builder:
              (context) => AlertDialog(
                title: Text("Mohon isi semua data!"),
                content: Text(
                  "Mohon isi semua data yang dibutuhkan untuk melengkapi pengisian calon peserta didik!",
                ),
                actions: [
                  TextButton(
                    onPressed: () => Navigator.of(context).pop(),
                    child: Text("Oke"),
                  ),
                ],
              ),
        );
        setState(() {
          _isLoading = false;
        });
        return;
      }

      NIKModel nikResult = await NIKValidator.instance.parse(
        nik: _textControllers['nik']?.text ?? '',
      );
      if (!(nikResult.valid ?? false)) {
        if (!mounted) return;
        showDialog(
          context: context,
          builder:
              (context) => AlertDialog(
                title: Text("NIK tidak valid"),
                content: Text("NIK tidak valid"),
                actions: [
                  TextButton(
                    onPressed: () => Navigator.of(context).pop(),
                    child: Text("Oke"),
                  ),
                ],
              ),
        );
        setState(() {
          _isLoading = false;
        });
        return;
      }

      final responseData = await CandidatesApi.register(
        fields: _textControllers.map((key, value) => MapEntry(key, value.text)),
      );

      if (!mounted) return;

      if (responseData['error']?.isNotEmpty ?? false) {
        print(responseData);
        final errorMessageText = responseData['error'] ?? "";
        final errorFieldsText =
            responseData['fields'] != null
                ? (responseData['fields'] as Map<String, dynamic>)
                    .map(
                      (fieldName, fieldErrors) =>
                          MapEntry(fieldName, "• ${fieldErrors[0]}"),
                    )
                    .values
                    .join("\n")
                : "";

        showDialog(
          context: context,
          builder:
              (context) => AlertDialog(
                title: Text("Error"),
                content: Text("$errorMessageText\n\n$errorFieldsText"),
                actions: [
                  TextButton(
                    onPressed: () => Navigator.of(context).pop(),
                    child: Text("Oke"),
                  ),
                ],
              ),
        );
        setState(() {
          _isLoading = false;
        });
        return;
      }

      HistoryManager.addHistory(name: _textControllers["fullname"]!.text);
      Navigator.push(
        context,
        MaterialPageRoute(
          builder:
              (context) => Registered(
                fullname: _textControllers["fullname"]?.text ?? "",
              ),
        ),
      );

      setState(() {
        _isLoading = false;
      });
    } catch (e) {
      showDialog(
        context: context,
        builder:
            (context) => AlertDialog(
              title: Text("Error"),
              content: Text(e.toString()),
              actions: [
                TextButton(
                  onPressed: () => Navigator.of(context).pop(),
                  child: Text("Oke"),
                ),
              ],
            ),
      );
      setState(() {
        _isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(
        backAction: true,
        checkEnableAlert: () => !_isAllFieldIsEmpty(),
      ),
      body: Container(
        padding: EdgeInsets.all(5.0),
        child: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            spacing: 5.0,
            children: [
              SizedBox(height: 8.0),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 15.0),
                child: Center(
                  child: Text(
                    "Data Calon Peserta Didik",
                    style: TextStyle(
                      fontFamily: "Poppins",
                      fontSize: 24.0,
                      fontWeight: FontWeight.bold,
                    ),
                    textAlign: TextAlign.center,
                  ),
                ),
              ),
              SizedBox(height: 10.0),
              _TextFieldWidget(
                labelText: "NIK (Nomor Induk Kependudukan)",
                hintText: "Masukkan 16 angka",
                controller: _textControllers["nik"],
                isRequired: true,
                maxLength: 16,
                keyboardType: TextInputType.number,
              ),
              _TextFieldWidget(
                labelText: "Nama Lengkap",
                hintText: "Masukkan nama lengkap Anda",
                controller: _textControllers["fullname"],
                isRequired: true,
                maxLength: 255,
              ),
              _DateFieldWidget(
                labelText: "Tanggal Lahir",
                hintText: "2008/07/31",
                controller: _textControllers["birth_date"],
                isRequired: true,
                minDate: DateTime.now().subtract(Duration(days: 365 * 18)),
                maxDate: DateTime.now().subtract(Duration(days: 365 * 14 + 4)),
              ),
              _TextFieldWidget(
                labelText: "Email",
                hintText: "johndoe@gmail.com",
                controller: _textControllers["email"],
                isRequired: true,
                maxLength: 255,
                keyboardType: TextInputType.emailAddress,
              ),
              _TextFieldWidget(
                labelText: "Nomor Telepon",
                hintText: "081212120123",
                controller: _textControllers["no_telp"],
                isRequired: true,
                maxLength: 12,
                keyboardType: TextInputType.phone,
              ),
              _TextFieldWidget(
                labelText: "Alamat",
                hintText: "Jl. Boulevard Bintaro A92 B1/23, 07/92",
                controller: _textControllers["address"],
                isRequired: true,
              ),
              _TextFieldWidget(
                labelText: "Asal Sekolah",
                hintText: "Masukkan asal sekolah anda",
                controller: _textControllers["prev_school"],
                isRequired: true,
              ),
              _GenderGroupWidget(controller: _textControllers["gender"]),
              _MajorGroupWidget(controller: _textControllers["major"]),
              SizedBox(height: 10.0),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 15.0),
                child: Center(
                  child: Text(
                    "Data Wali Siswa",
                    style: TextStyle(
                      fontFamily: "Poppins",
                      fontSize: 18.0,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ),
              ),
              SizedBox(height: 2.0),
              _TextFieldWidget(
                labelText: "Nama",
                hintText: "Masukkan nama wali murid Anda",
                controller: _textControllers["parent_name"],
                isRequired: true,
                maxLength: 255,
              ),
              _TextFieldWidget(
                labelText: "Email",
                hintText: "Masukkan alamat email wali murid Anda",
                controller: _textControllers["parent_email"],
                maxLength: 255,
                keyboardType: TextInputType.emailAddress,
              ),
              _TextFieldWidget(
                labelText: "Nomor Telepon",
                hintText: "Masukkan nomor telepon yang dapat dihubungi",
                controller: _textControllers["parent_telp"],
                isRequired: true,
                maxLength: 12,
                keyboardType: TextInputType.phone,
              ),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 15.0),
                child: Center(
                  child: Text(
                    "Setiap NIK hanya bisa mengirim satu data, pastikan data yang diberikan sudah benar!",
                    style: TextStyle(fontFamily: "Poppins", fontSize: 14.0),
                    textAlign: TextAlign.center,
                  ),
                ),
              ),
              _isLoading
                  ? Padding(
                    padding: const EdgeInsets.all(15.0),
                    child: LinearProgressIndicator(),
                  )
                  : CustomButton(
                    text: "Daftar Sekarang",
                    onTap: _onRegisterTap,
                  ),
            ],
          ),
        ),
      ),
    );
  }
}

class _TextFieldWidget extends StatelessWidget {
  final TextEditingController? controller;
  final String labelText;
  final bool isRequired;
  final String hintText;
  final int? maxLength;
  final TextInputType? keyboardType;

  const _TextFieldWidget({
    required this.labelText,
    required this.hintText,
    this.controller,
    this.isRequired = false,
    this.maxLength,
    this.keyboardType,
  });

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 15, vertical: 4),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text.rich(
            TextSpan(
              text: labelText,
              style: TextStyle(
                fontFamily: "Poppins",
                fontSize: 16.0,
                color: Colors.black,
              ),
              children: [
                if (isRequired)
                  WidgetSpan(
                    child: Text(
                      "*",
                      style: TextStyle(
                        fontFamily: "Poppins",
                        fontSize: 18,
                        color: Color(0xFF003F8F),
                      ),
                    ),
                  ),
              ],
            ),
          ),
          const SizedBox(height: 4),
          TextField(
            decoration: InputDecoration(
              hintText: hintText,
              hintStyle: TextStyle(fontSize: 16.0, color: Colors.grey),
              border: OutlineInputBorder(
                borderSide: BorderSide(color: Color(0xFF003F8F)),
              ),
              focusedBorder: OutlineInputBorder(
                borderSide: BorderSide(color: Color(0xFF003F8F)),
              ),
              counterText: "",
            ),
            controller: controller,
            maxLength: maxLength,
            keyboardType: keyboardType,
          ),
        ],
      ),
    );
  }
}

class _DateFieldWidget extends StatefulWidget {
  final TextEditingController? controller;
  final String labelText;
  final bool isRequired;
  final String hintText;
  final DateTime? minDate;
  final DateTime? maxDate;

  const _DateFieldWidget({
    required this.labelText,
    required this.hintText,
    this.controller,
    this.isRequired = false,
    this.minDate,
    this.maxDate,
  });

  @override
  State<_DateFieldWidget> createState() => __DateFieldWidgetState();
}

class __DateFieldWidgetState extends State<_DateFieldWidget> {
  Future<void> _selectDate() async {
    final dateNow = DateTime.now();
    final DateTime? picked = await showDatePicker(
      context: context,
      initialDate: widget.minDate ?? dateNow,
      firstDate: widget.minDate ?? DateTime(dateNow.year - 100),
      lastDate: widget.maxDate ?? DateTime(dateNow.year + 100),
    );

    if (picked != null) {
      setState(() {
        widget.controller!.text = DateFormat('yyyy/MM/dd').format(picked);
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 15, vertical: 4),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text.rich(
            TextSpan(
              text: widget.labelText,
              style: TextStyle(
                fontFamily: "Poppins",
                fontSize: 16.0,
                color: Colors.black,
              ),
              children: [
                if (widget.isRequired)
                  WidgetSpan(
                    child: Text(
                      "*",
                      style: TextStyle(
                        fontFamily: "Poppins",
                        fontSize: 18,
                        color: Color(0xFF003F8F),
                      ),
                    ),
                  ),
              ],
            ),
          ),
          const SizedBox(height: 4),
          GestureDetector(
            onTap: _selectDate,
            child: Container(
              padding: const EdgeInsets.symmetric(
                horizontal: 12.0,
                vertical: 4.0,
              ),
              decoration: BoxDecoration(
                border: Border.all(color: Colors.black54),
                borderRadius: BorderRadius.circular(4.0),
              ),
              child: Row(
                children: [
                  Expanded(
                    child: TextField(
                      decoration: InputDecoration(
                        hintText: widget.hintText,
                        hintStyle: TextStyle(
                          fontSize: 16.0,
                          color: Colors.grey,
                        ),
                        border: InputBorder.none,
                      ),
                      controller: widget.controller,
                      enabled: false,
                      style: TextStyle(fontSize: 16.0, color: Colors.black),
                    ),
                  ),
                  const SizedBox(height: 4),
                  Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 8.0),
                    child: Icon(Icons.calendar_month_outlined, size: 25),
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}

class _GenderGroupWidget extends StatefulWidget {
  final TextEditingController? controller;
  const _GenderGroupWidget({this.controller});

  @override
  State<_GenderGroupWidget> createState() => __GenderGroupWidgetState();
}

class __GenderGroupWidgetState extends State<_GenderGroupWidget> {
  final List<String> genders = ["male", "female"];
  final List<String> gendersTitle = ["Laki-Laki", "Perempuan"];
  late final TextEditingController controller =
      widget.controller ?? TextEditingController();
  late String selectedGender = genders[0];

  @override
  void initState() {
    super.initState();
    controller.text = selectedGender;
  }

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 15, vertical: 4),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          const Text.rich(
            TextSpan(
              text: "Jenis Kelamin",
              style: TextStyle(
                fontFamily: "Poppins",
                fontSize: 16.0,
                color: Colors.black,
              ),
              children: [
                TextSpan(
                  text: "*",
                  style: TextStyle(
                    fontFamily: "Poppins",
                    fontSize: 18,
                    color: Color(0xFF003F8F),
                  ),
                ),
              ],
            ),
          ),
          const SizedBox(height: 4),
          Row(
            spacing: 10.0,
            children:
                genders.map((gender) {
                  int index = genders.indexOf(gender);
                  return _buildButton(
                    name: gendersTitle[index],
                    value: gender,
                    index: index,
                  );
                }).toList(),
          ),
        ],
      ),
    );
  }

  Widget _buildButton({
    required String name,
    required String value,
    required int index,
  }) {
    bool isSelected = value == selectedGender;

    return InkWell(
      onTap: () {
        setState(() {
          selectedGender = value;
          controller.text = value;
        });
      },
      borderRadius: BorderRadius.circular(8.0),
      child: Container(
        padding: const EdgeInsets.symmetric(horizontal: 18.0, vertical: 8.0),
        decoration: BoxDecoration(
          color: isSelected ? Color(0XFF003F8F) : Colors.white,
          borderRadius: BorderRadius.circular(8.0),
          border: Border.all(
            color: isSelected ? Colors.white : Color(0XFF003F8F),
          ),
        ),
        child: Text(
          name,
          style: TextStyle(
            color: isSelected ? Colors.white : Color(0XFF003F8F),
            fontFamily: "Poppins",
            fontWeight: FontWeight.w600,
            fontSize: 16.0,
          ),
        ),
      ),
    );
  }
}

class _MajorGroupWidget extends StatefulWidget {
  final TextEditingController? controller;
  const _MajorGroupWidget({this.controller});

  @override
  State<_MajorGroupWidget> createState() => __MajorGroupWidgetState();
}

class __MajorGroupWidgetState extends State<_MajorGroupWidget> {
  final List<String> majors = ["DKV", "RPL", "TKJ", "BC", "ANM", "GAMEDEV"];
  late final TextEditingController controller =
      widget.controller ?? TextEditingController();
  late ListQueue<String> selectedMajors = ListQueue<String>();

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 15, vertical: 4),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          const Text.rich(
            TextSpan(
              text: "Minat Jurusan (maksimal 3)",
              style: TextStyle(
                fontFamily: "Poppins",
                fontSize: 16.0,
                color: Colors.black,
              ),
              children: [
                TextSpan(
                  text: "*",
                  style: TextStyle(
                    fontFamily: "Poppins",
                    fontSize: 18,
                    color: Color(0xFF003F8F),
                  ),
                ),
              ],
            ),
          ),
          const SizedBox(height: 4),
          Wrap(
            spacing: 12.0,
            runSpacing: 10.0,
            children:
                majors.map((major) {
                  return _buildButton(value: major);
                }).toList(),
          ),
        ],
      ),
    );
  }

  Widget _buildButton({required String value}) {
    bool isSelected = selectedMajors.contains(value);

    return InkWell(
      onTap: () {
        setState(() {
          if (isSelected) {
            selectedMajors.remove(value);
          } else if (selectedMajors.length >= 3) {
            selectedMajors.removeFirst();
            selectedMajors.addLast(value);
          } else {
            selectedMajors.addLast(value);
          }
          controller.text = selectedMajors.join(',');
        });
      },
      borderRadius: BorderRadius.circular(8.0),
      child: Container(
        padding: const EdgeInsets.symmetric(horizontal: 18.0, vertical: 8.0),
        decoration: BoxDecoration(
          color: isSelected ? Color(0XFF003F8F) : Colors.white,
          borderRadius: BorderRadius.circular(8.0),
          border: Border.all(
            color: isSelected ? Colors.white : Color(0XFF003F8F),
          ),
        ),
        child: Text(
          value,
          style: TextStyle(
            color: isSelected ? Colors.white : Color(0XFF003F8F),
            fontFamily: "Poppins",
            fontWeight: FontWeight.w600,
            fontSize: 16.0,
          ),
        ),
      ),
    );
  }
}
