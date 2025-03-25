import 'package:flutter/material.dart';
import 'home_screen.dart';
import 'berita_screen.dart';
// import 'kartu_screen.dart';
import 'faq_screen.dart';
import 'profil_screen.dart';

class MainScreen extends StatefulWidget {
  const MainScreen({super.key});

  @override
  State<MainScreen> createState() => _MainScreenState();
}

class _MainScreenState extends State<MainScreen> {
  int _selectedIndex = 0; // Menyimpan indeks halaman yang dipilih

  // List halaman yang akan ditampilkan berdasarkan index
  final List<Widget> _pages = [
    const HomeScreen(),
    const BeritaScreen(),
    // const KartuScreen(),
    const FAQScreen(), 
    const ProfilScreen(),
  ];

  // Fungsi untuk mengganti halaman saat menu di-klik
  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: _pages[_selectedIndex], // Menampilkan halaman sesuai menu yang ditekan
      bottomNavigationBar: BottomNavigationBar(
        selectedItemColor: Colors.blue[700], // Warna saat menu dipilih
        unselectedItemColor: Colors.grey, // Warna menu yang tidak dipilih
        currentIndex: _selectedIndex, // Indeks halaman yang sedang ditampilkan
        onTap: _onItemTapped, // Event ketika menu ditekan
        type: BottomNavigationBarType.fixed, // Menjaga teks tetap terlihat
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Home'),
          BottomNavigationBarItem(icon: Icon(Icons.article), label: 'Berita'),
          // BottomNavigationBarItem(icon: Icon(Icons.credit_card), label: 'Kartu'),
          BottomNavigationBarItem(icon: Icon(Icons.help), label: 'FAQ'),
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Profil'),
        ],
      ),
    );
  }
}
