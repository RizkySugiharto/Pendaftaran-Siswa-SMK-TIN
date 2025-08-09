import 'package:flutter/material.dart';
import 'package:flutter/scheduler.dart';
import 'package:ppdb_smk_tin/_components/header_content.dart';
import 'package:ppdb_smk_tin/_data/providers/history_manager.dart';

class HistoryRegister extends StatefulWidget {
  const HistoryRegister({super.key});

  @override
  State<HistoryRegister> createState() => _HistoryRegisterState();
}

class _HistoryRegisterState extends State<HistoryRegister> {
  List<String> _histories = [];
  bool _isFetching = false;

  @override
  void initState() {
    super.initState();
    SchedulerBinding.instance.addPostFrameCallback((_) async {
      setState(() {
        _isFetching = true;
      });

      _histories = await HistoryManager.getHistories();

      setState(() {
        _isFetching = false;
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(backAction: true),
      body: Container(
        width: double.infinity,
        padding: EdgeInsets.all(5.0),
        child: SingleChildScrollView(
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 15.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                const SizedBox(height: 40.0),
                const Image(
                  image: AssetImage("asset/icons/logo-no-rmv-bg.jpg"),
                  fit: BoxFit.cover,
                  width: 120.0,
                  height: 120.0,
                ),
                const SizedBox(height: 10.0),
                const Text(
                  "Riwayat Pendaftaran\nPeserta Didik",
                  style: TextStyle(
                    color: Color(0XFF003F8F),
                    fontSize: 26.0,
                    fontFamily: "Poppins",
                    fontWeight: FontWeight.bold,
                  ),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 50.0),
                ...(_isFetching
                    ? [
                      Padding(
                        padding: const EdgeInsets.all(20.0),
                        child: const CircularProgressIndicator(),
                      ),
                    ]
                    : _histories.map((history) {
                      return _HistoryCardWidget(name: history);
                    }).toList()),
              ],
            ),
          ),
        ),
      ),
    );
  }
}

class _HistoryCardWidget extends StatelessWidget {
  final String name;
  const _HistoryCardWidget({required this.name});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 20.0, vertical: 12.0),
      margin: const EdgeInsets.only(bottom: 15.0),
      decoration: BoxDecoration(
        color: const Color.fromARGB(255, 156, 199, 255),
        borderRadius: BorderRadius.circular(10.0),
      ),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Text(
            name,
            style: TextStyle(
              color: Colors.black,
              fontSize: 16.0,
              fontFamily: "Poppins",
            ),
          ),
          const Card(
            color: Color(0XFF003F8F),
            child: Padding(
              padding: EdgeInsets.all(8.0),
              child: Icon(Icons.person, color: Colors.white, size: 16.0),
            ),
          ),
        ],
      ),
    );
  }
}
