import 'package:flutter/material.dart';

class HeaderContent extends StatelessWidget implements PreferredSizeWidget {
  final bool backAction;
  final bool alertBeforeBack;
  const HeaderContent({
    super.key,
    this.backAction = false,
    this.alertBeforeBack = false,
  });

  @override
  Size get preferredSize => Size.fromHeight(88.0);

  @override
  Widget build(BuildContext context) {
    return AppBar(
      backgroundColor: Color(0xFF003F8F),
      toolbarHeight: 84.0,
      title: Row(
        crossAxisAlignment: CrossAxisAlignment.center,
        spacing: 10.0,
        children: [
          Image(
            image: AssetImage("asset/icons/icon-white.png"),
            fit: BoxFit.contain,
            height: 60.0,
          ),
          Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Text(
                "TEKNO INFORMATIKA",
                style: TextStyle(
                  color: Colors.white,
                  fontFamily: "Poppins",
                  fontWeight: FontWeight.bold,
                  fontSize: 18.0,
                ),
              ),
              Text(
                "NUSANTARA",
                style: TextStyle(
                  color: Colors.white,
                  fontFamily: "Poppins",
                  fontWeight: FontWeight.bold,
                  fontSize: 18.0,
                ),
              ),
            ],
          ),
        ],
      ),
      leading:
          backAction
              ? GestureDetector(
                onTap:
                    () =>
                        alertBeforeBack
                            ? showDialog(
                              context: context,
                              builder:
                                  (context) => AlertDialog(
                                    title: Text(
                                      "Anda yakin ingin membatalkan perubahan?",
                                    ),
                                    content: Text(
                                      "Perubahan yang sudah dilakukan tidak disimpan",
                                    ),
                                    actions: [
                                      TextButton(
                                        onPressed: () {
                                          Navigator.pop(context);
                                          Navigator.pop(context);
                                        },
                                        child: Text("Keluar"),
                                      ),
                                      TextButton(
                                        onPressed: () {
                                          Navigator.pop(context);
                                        },
                                        child: Text("Batalkan"),
                                      ),
                                    ],
                                  ),
                            )
                            : Navigator.pop(context),
                child: Icon(
                  Icons.arrow_back_outlined,
                  color: Colors.white,
                  size: 40.0,
                ),
              )
              : SizedBox.shrink(),
    );
  }
}
