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
  HashMap<String, String> data_siswa = HashMap();

  bool isMale = true;

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
            children: [
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
              SizedBox(height: 15.0),
              Row(
                children: [
                  GestureDetector(
                    child: SizedBox(
                      width: 150.0,
                      height: 55.0,
                      child: Card(
                        color: Color(0XFF003F8F),
                        child: Center(
                          child: Text(
                            "Laki - Laki",
                            style: TextStyle(
                              color: Colors.white,
                              fontFamily: "Poppins",
                              fontWeight: FontWeight.bold,
                              fontSize: 18.0,
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                  GestureDetector(
                    child: SizedBox(
                      width: 100.0,
                      height: 45.0,
                      child: Card(
                        color: Colors.white,
                        child: Center(
                          child: Text(
                            "Perempuan",
                            style: TextStyle(
                              color: Colors.white,
                              fontFamily: "Poppins",
                              fontWeight: FontWeight.bold,
                              fontSize: 14.0,
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                ],
              ),
              Button(
                text: "Daftar Sekarang",
                fungsi: () => print("kepencet daftar"),
              ),
            ],
          ),
        ),
      ),
    );
  }

  Column _textField(
    BuildContext context,
    String labelText,
    String hintText,
    String keyName,
  ) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        SizedBox(
          width: MediaQuery.of(context).size.width - 40.0,
          child: Row(
            children: [
              Text(
                labelText,
                style: TextStyle(fontFamily: "Poppins", fontSize: 16.0),
              ),
              Text(
                "*",
                style: TextStyle(
                  fontFamily: "Poppins",
                  fontSize: 18.0,
                  color: Color(0xFF003F8F),
                ),
              ),
            ],
          ),
        ),
        SizedBox(height: 2.5),
        SizedBox(
          width: MediaQuery.of(context).size.width - 40.0,
          child: TextField(
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
            onChanged: (String value) => data_siswa[keyName] = value,
          ),
        ),
      ],
    );
  }
}
