import 'package:flutter/material.dart';
import 'pendaftaran_screen.dart';
import 'rekam_medis_screen.dart';
import 'jadwal_dokter_screen.dart';
import 'feedback_screen.dart';
import 'berita_screen.dart';
import 'login_screen.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  void _logout(BuildContext context) {
    Navigator.pushAndRemoveUntil(
      context,
      MaterialPageRoute(builder: (context) => const LoginScreen()),
      (route) => false,
    );

    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: const Text('Logout berhasil!'),
        backgroundColor: Colors.red[400],
        behavior: SnackBarBehavior.floating,
        duration: const Duration(seconds: 2),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.blue[700],
        title: Row(
          children: [
            Image.asset(
              "assets/images/logo_puskesmas.jpg", 
              height: 28,  // 🔹 Sesuaikan ukuran logo
            ),
            const SizedBox(width: 5), // 🔹 Jarak antara logo dan teks
            const Text(
              'Puskesmas Siborongborong',
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
          ],
        ),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: () => _logout(context),
            tooltip: 'Logout',
          ),
        ],
      ),
      body: Stack(
        children: [
          // 🔹 Background Image
          Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage("assets/images/background.jpg"), // 🔹 Ganti dengan gambar kamu
                fit: BoxFit.cover,
              ),
            ),
          ),

          // 🔹 Overlay Gelap Agar Teks Jelas
          Container(
            color: Colors.black.withOpacity(0.3),
          ),

          // 🔹 Konten
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 20),
            child: GridView.count(
              crossAxisCount: 2,
              crossAxisSpacing: 15,
              mainAxisSpacing: 15,
              children: [
                _menuItem(context, 'Pendaftaran', Icons.app_registration, const PendaftaranScreen()),
                _menuItem(context, 'Rekam Medis', Icons.medical_services, const RekamMedisScreen()),
                _menuItem(context, 'Jadwal Dokter', Icons.schedule, const JadwalDokterScreen()),
                _menuItem(context, 'Feedback', Icons.feedback, const FeedbackScreen()),
                _menuItem(context, 'Berita', Icons.article, const BeritaScreen()),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _menuItem(BuildContext context, String title, IconData icon, Widget screen) {
    return InkWell(
      onTap: () {
        Navigator.push(context, MaterialPageRoute(builder: (context) => screen));
      },
      borderRadius: BorderRadius.circular(12),
      splashColor: Colors.blue[200],
      child: Container(
        decoration: BoxDecoration(
          color: Colors.blue.withOpacity(0.8),
          borderRadius: BorderRadius.circular(12),
          boxShadow: [
            BoxShadow(
              color: Colors.blue.withOpacity(0.2),
              blurRadius: 5,
              spreadRadius: 2,
              offset: const Offset(2, 3),
            ),
          ],
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Icon(icon, size: 50, color: Colors.white),
            const SizedBox(height: 8),
            Text(
              title,
              textAlign: TextAlign.center,
              style: const TextStyle(
                fontSize: 14,
                fontWeight: FontWeight.bold,
                color: Colors.white,
              ),
            ),
          ],
        ),
      ),
    );
  }
}
