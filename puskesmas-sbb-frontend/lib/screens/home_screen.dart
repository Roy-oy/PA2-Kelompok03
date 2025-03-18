import 'package:flutter/material.dart';
import 'pendaftaran_screen.dart';
import 'rekam_medis_screen.dart';
import 'jadwal_dokter_screen.dart';
import 'feedback_screen.dart';
import 'berita_screen.dart';
import 'login_screen.dart'; // Tambahkan file login

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  void _logout(BuildContext context) {
    // Navigasi ke LoginScreen dan hapus semua halaman sebelumnya
    Navigator.pushAndRemoveUntil(
      context,
      MaterialPageRoute(builder: (context) => const LoginScreen()),
      (route) => false, // Hapus semua halaman sebelumnya
    );

    // Snackbar untuk notifikasi logout
    ScaffoldMessenger.of(context).showSnackBar(
      const SnackBar(content: Text('Logout berhasil!')),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.blue[700],
        title: const Text('Puskesmas Siborongborong'),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout, color: Colors.white),
            onPressed: () => _logout(context),
          ),
        ],
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: GridView.count(
          crossAxisCount: 2,
          crossAxisSpacing: 10,
          mainAxisSpacing: 10,
          children: [
            _menuItem(context, 'Pendaftaran', Icons.app_registration, const PendaftaranScreen()),
            _menuItem(context, 'Rekam Medis', Icons.medical_services, const RekamMedisScreen()),
            _menuItem(context, 'Jadwal Dokter', Icons.schedule, const JadwalDokterScreen()),
            _menuItem(context, 'Feedback', Icons.feedback, const FeedbackScreen()),
            _menuItem(context, 'Berita', Icons.article, const BeritaScreen()),
          ],
        ),
      ),
    );
  }

  Widget _menuItem(BuildContext context, String title, IconData icon, Widget screen) {
    return GestureDetector(
      onTap: () {
        Navigator.push(context, MaterialPageRoute(builder: (context) => screen));
      },
      child: Column(
        children: [
          Container(
            width: 90,
            height: 90,
            decoration: BoxDecoration(
              color: Colors.blue[100],
              shape: BoxShape.circle,
              boxShadow: [
                BoxShadow(
                  color: Colors.grey.withOpacity(0.3),
                  blurRadius: 5,
                  spreadRadius: 2,
                  offset: const Offset(2, 3),
                ),
              ],
            ),
            child: Center(
              child: Icon(icon, size: 40, color: Colors.blue[700]),
            ),
          ),
          const SizedBox(height: 10),
          Text(
            title,
            textAlign: TextAlign.center,
            style: TextStyle(fontSize: 14, fontWeight: FontWeight.bold, color: Colors.blue[900]),
          ),
        ],
      ),
    );
  }
}
