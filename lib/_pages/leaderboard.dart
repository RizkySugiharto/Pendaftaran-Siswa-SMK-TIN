import 'dart:collection';

import 'package:flutter/material.dart';
import 'package:flutter/scheduler.dart';
import 'package:ppdb_smk_tin/_components/header_content.dart';
import 'package:ppdb_smk_tin/_data/providers/scores_api.dart';

class Leaderboard extends StatefulWidget {
  const Leaderboard({super.key});

  @override
  State<Leaderboard> createState() => _LeaderboardState();
}

class _LeaderboardState extends State<Leaderboard> {
  HashMap<String, dynamic> _data = HashMap<String, dynamic>();
  bool _isFetching = false;

  @override
  void initState() {
    super.initState();
    SchedulerBinding.instance.addPostFrameCallback((_) async {
      await _fetchAllScores();
    });
  }

  Future<void> _fetchAllScores() async {
    setState(() {
      _isFetching = true;
    });

    _data = await ScoresApi.getAllScores();
    if (!mounted) return;

    print(_data);

    setState(() {
      _isFetching = false;
    });
  }

  Future<void> _onRefresh() async {
    await _fetchAllScores();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: HeaderContent(backAction: true),
      body: RefreshIndicator(
        onRefresh: _onRefresh,
        child: SingleChildScrollView(
          physics: const AlwaysScrollableScrollPhysics(),
          child: SizedBox(
            width: double.infinity,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                const SizedBox(height: 35),
                const Padding(
                  padding: EdgeInsets.symmetric(horizontal: 18.0),
                  child: Text(
                    "Peringkat Calon Peserta Didik SMK Techno Informatika 2026",
                    style: TextStyle(
                      color: Color(0XFF003F8F),
                      fontSize: 26.0,
                      fontFamily: "Poppins",
                      fontWeight: FontWeight.bold,
                    ),
                    textAlign: TextAlign.center,
                  ),
                ),
                const SizedBox(height: 35),
                _isFetching
                    ? const Padding(
                      padding: EdgeInsets.all(8.0),
                      child: CircularProgressIndicator(),
                    )
                    : ListView.builder(
                      shrinkWrap: true,
                      physics: const NeverScrollableScrollPhysics(),
                      itemCount: _data['scores']?.length ?? 0,
                      itemBuilder:
                          (context, index) => Container(
                            margin: const EdgeInsets.symmetric(
                              vertical: 6.0,
                              horizontal: 12.0,
                            ),
                            padding: const EdgeInsets.all(18.0),
                            decoration: BoxDecoration(
                              color: const Color.fromARGB(255, 156, 199, 255),
                              borderRadius: BorderRadius.circular(8.0),
                            ),
                            child: Row(
                              children: [
                                Text(
                                  "${index + 1}.",
                                  style: const TextStyle(
                                    color: Color(0XFF003F8F),
                                    fontSize: 16.0,
                                    fontFamily: "Poppins",
                                    fontWeight: FontWeight.bold,
                                  ),
                                ),
                                const SizedBox(width: 18),
                                Text(
                                  _data['scores'][index]["fullname"],
                                  style: const TextStyle(
                                    color: Colors.black,
                                    fontSize: 14.0,
                                    fontFamily: "Poppins",
                                    fontWeight: FontWeight.normal,
                                  ),
                                ),
                                const SizedBox(width: 12),
                                Text(
                                  "●",
                                  style: const TextStyle(
                                    color: Colors.black,
                                    fontSize: 14.0,
                                    fontFamily: "Poppins",
                                    fontWeight: FontWeight.normal,
                                  ),
                                ),
                                const SizedBox(width: 12),
                                Text(
                                  _data['scores'][index]["prev_school"],
                                  style: const TextStyle(
                                    color: Colors.black,
                                    fontSize: 14.0,
                                    fontFamily: "Poppins",
                                    fontWeight: FontWeight.normal,
                                  ),
                                ),
                                const Spacer(),
                                Container(
                                  width: 50,
                                  padding: const EdgeInsets.all(6),
                                  decoration: BoxDecoration(
                                    color: Colors.white,
                                    borderRadius: BorderRadius.circular(8.0),
                                    border: Border.all(
                                      color: const Color(0XFF003F8F),
                                    ),
                                  ),
                                  child: Text(
                                    _data['scores'][index]["avg_value"]
                                        .toString(),
                                    style: const TextStyle(
                                      color: Color(0XFF003F8F),
                                      fontSize: 14.0,
                                      fontFamily: "Poppins",
                                      fontWeight: FontWeight.normal,
                                    ),
                                    textAlign: TextAlign.center,
                                  ),
                                ),
                              ],
                            ),
                          ),
                    ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
