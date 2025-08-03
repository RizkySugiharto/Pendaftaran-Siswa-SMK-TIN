import 'package:flutter/material.dart';
import 'package:ppdb_smk_tin/_components/header_content.dart';
import 'package:ppdb_smk_tin/_pages/history_register.dart';
import 'package:ppdb_smk_tin/_pages/home.dart';

class Registered extends StatefulWidget {
  const Registered({super.key, required this.fullname});
  final String fullname;
  @override
  State<Registered> createState() => _RegisteredState();
}

class _RegisteredState extends State<Registered> {
  String fullname = "";
  @override
  void initState() {
    fullname = widget.fullname;
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(),
      body: SizedBox(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Icon(Icons.check, color: Colors.green, size: 120.0),
            Text(
              "Pendafataran Berhasil!",
              style: TextStyle(fontFamily: "Poppins", fontSize: 18.0),
            ),
            Padding(
              padding: EdgeInsets.all(8.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Text(
                    "Selamat $fullname, Kamu telah berhasil mendaftar sebagai calon peserta didik SMK Techno Informatika Nusantara",
                    style: TextStyle(fontFamily: "Poppins", fontSize: 14.0),
                    textAlign: TextAlign.center,
                  ),
                  Text(
                    "Informasi terkait calon peserta didik dan lainnya, akan kami kirimkan melalui email / no telepon yang didaftarkan",
                    style: TextStyle(fontFamily: "Poppins", fontSize: 14.0),
                    textAlign: TextAlign.center,
                  ),
                ],
              ),
            ),
            SizedBox(height: 12.0),
            Text(
              "Sukses selalu ya nak $fullname!",
              style: TextStyle(fontFamily: "Poppins", fontSize: 18.0),
            ),
            SizedBox(height: 15.0),
            GestureDetector(
              onTap:
                  () => Navigator.of(context).pushReplacement(
                    MaterialPageRoute(builder: (context) => HistoryRegister()),
                  ),
              child: SizedBox(
                width: MediaQuery.of(context).size.width - 60.0,
                height: 60.0,
                child: Card(
                  shape: const RoundedRectangleBorder(
                    borderRadius: BorderRadius.all(Radius.circular(3.0)),
                    side: BorderSide(color: Color(0XFF003F8F)),
                  ),
                  color: Color(0XFF003F8F),
                  child: Center(
                    child: Text(
                      "Lihat Riwayat Pendaftaran",
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 18.0,
                        fontFamily: "Poppins",
                      ),
                    ),
                  ),
                ),
              ),
            ),
            SizedBox(height: 10.0),
            GestureDetector(
              onTap:
                  () => Navigator.of(context).pushReplacement(
                    MaterialPageRoute(builder: (context) => HomeDart()),
                  ),
              child: SizedBox(
                width: MediaQuery.of(context).size.width - 60.0,
                height: 60.0,
                child: Card(
                  shape: const RoundedRectangleBorder(
                    borderRadius: BorderRadius.all(Radius.circular(3.0)),
                    side: BorderSide(color: Color(0XFF003F8F)),
                  ),
                  color: Colors.white,
                  child: Center(
                    child: Text(
                      "Kembali ke halaman utama",
                      style: TextStyle(
                        color: Color(0XFF003F8F),
                        fontSize: 18.0,
                        fontFamily: "Poppins",
                      ),
                    ),
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
