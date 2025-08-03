import 'package:flutter/material.dart';

class CustomButton extends StatelessWidget {
  final dynamic fungsi;
  final String text;

  const CustomButton({super.key, required this.fungsi, required this.text});

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: fungsi,
      child: SizedBox(
        width: MediaQuery.of(context).size.width - 30.0,
        height: 65.0,
        child: Card(
          color: Color(0xFF003F8F),
          child: Center(
            child: Text(
              text,
              style: TextStyle(
                color: Colors.white,
                fontFamily: "Poppins",
                fontWeight: FontWeight.bold,
                fontSize: 21.0,
              ),
            ),
          ),
        ),
      ),
    );
  }
}
