import 'package:flutter/material.dart';

class HeaderContent extends StatelessWidget implements PreferredSizeWidget {
  final double height;
  const HeaderContent({super.key, required this.height});

  @override
  Size get preferredSize => Size.fromHeight(height);

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
    );
  }
}
