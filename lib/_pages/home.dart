import 'package:flutter/material.dart';
import 'package:ppdb_smk_tin/_components/header_content.dart';
import 'package:ppdb_smk_tin/_components/button.dart';
import 'package:ppdb_smk_tin/_pages/history_register.dart';
import 'package:ppdb_smk_tin/_pages/register.dart';

class HomeDart extends StatefulWidget {
  const HomeDart({super.key});

  @override
  State<HomeDart> createState() => _HomeDartState();
}

class _HomeDartState extends State<HomeDart> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(),
      body: SizedBox(
        height: MediaQuery.of(context).size.height,
        child: Column(
          children: [
            SizedBox(height: 40.0),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.center,
                spacing: 8.0,
                children: [
                  Image(
                    image: AssetImage("asset/icons/logo-no-rmv-bg.jpg"),
                    fit: BoxFit.cover,
                    width: 120.0,
                    height: 120.0,
                  ),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        "TEKNO INFORMATIKA",
                        style: TextStyle(
                          color: Color(0XFF003F8F),
                          fontSize: 22.0,
                          fontFamily: "Poppins",
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      Text(
                        "NUSANTARA",
                        style: TextStyle(
                          color: Color(0XFF003F8F),
                          fontSize: 22.0,
                          fontFamily: "Poppins",
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
            SizedBox(height: 25.0),
            CustomButton(
              text: "Daftar Sebagai Peserta Didik",
              fungsi:
                  () => Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => FormPendaftaran()),
                  ),
            ),
            SizedBox(height: 15.0),
            CustomButton(
              text: "Riwayat Pendaftaran",
              fungsi:
                  () => Navigator.of(context).push(
                    MaterialPageRoute(builder: (context) => HistoryRegister()),
                  ),
            ),
          ],
        ),
      ),
    );
  }
}
