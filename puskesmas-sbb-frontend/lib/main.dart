import 'package:flutter/material.dart';
import 'screens/main_screen.dart'; // Import MainScreen

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Puskesmas Siborongborong',
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      home: const MainScreen(), // Set MainScreen sebagai halaman utama
    );
  }
}
