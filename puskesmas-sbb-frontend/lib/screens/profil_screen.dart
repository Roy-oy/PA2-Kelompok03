import 'package:flutter/material.dart';
import 'package:puskesmas_siborongborong/screens/login_screen.dart'; // Import halaman login

class ProfilScreen extends StatelessWidget {
  const ProfilScreen({super.key});

  void _logout(BuildContext context) {
    // Navigasi kembali ke halaman login
    Navigator.pushReplacement(
      context,
      MaterialPageRoute(builder: (context) => const LoginScreen()),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Profil Pasien'),
        backgroundColor: Colors.blue[700], // Warna hijau sesuai tema
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            // Avatar pengguna
            const CircleAvatar(
              radius: 50,
              backgroundImage: AssetImage('assets/profile_placeholder.png'), // Ganti dengan gambar profil
            ),
            const SizedBox(height: 16),

            // Nama pasien
            const Text(
              'Nama Pasien',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 8),

            // Informasi pengguna
            Card(
              elevation: 4,
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
              child: ListTile(
                leading: const Icon(Icons.email, color: Colors.blue),
                title: const Text('pasien@email.com'),
              ),
            ),
            Card(
              elevation: 4,
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
              child: ListTile(
                leading: const Icon(Icons.credit_card, color: Colors.blue),
                title: const Text('No. BPJS: 1234567890'),
              ),
            ),
            const SizedBox(height: 20),

            // Tombol Logout
            SizedBox(
              width: double.infinity,
              child: ElevatedButton(
                onPressed: () => _logout(context),
                style: ElevatedButton.styleFrom(
                  backgroundColor: Colors.red,
                  padding: const EdgeInsets.symmetric(vertical: 12),
                  shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(8)),
                ),
                child: const Text(
                  'Logout',
                  style: TextStyle(fontSize: 16, color: Colors.white),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
