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
      body: Column(
        children: [
          const SizedBox(height: 40.0),
          const Padding(
            padding: EdgeInsets.all(8.0),
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
                    Text(
                      "TEKNO INFORMATIKA\nNUSANTARA",
                      style: TextStyle(
                        color: Color(0XFF003F8F),
                        fontSize: 22.0,
                        fontFamily: "Poppins",
                        fontWeight: FontWeight.bold,
                      ),
                    ),
              ],
            ),
          ),
          const SizedBox(height: 25.0),
          CustomButton(
            text: "Daftar Sebagai Peserta Didik",
            onTap:
                () => Navigator.of(context).push(
                  MaterialPageRoute(builder: (context) => FormPendaftaran()),
                ),
          ),
          CustomButton(
            text: "Riwayat Pendaftaran",
            onTap:
                () => Navigator.of(context).push(
                  MaterialPageRoute(builder: (context) => HistoryRegister()),
                ),
          ),
        ],
      ),
    );
  }
}
