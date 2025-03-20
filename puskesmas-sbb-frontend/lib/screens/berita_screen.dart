import 'package:flutter/material.dart';
import 'berita_detail_screen.dart';

class BeritaScreen extends StatelessWidget {
  const BeritaScreen({super.key});

  @override
  Widget build(BuildContext context) {
    List<Map<String, String>> berita = [
      {
        "judul": "Vaksinasi Covid-19 Gelombang 3 dimulai!",
        "gambar": "assets/images/vaksinasi.jpg",
        "deskripsi": "Puskesmas Siborongborong mengadakan vaksinasi Covid-19 gelombang ke-3 mulai minggu ini. Pastikan Anda mendaftar terlebih dahulu!",
      },
      {
        "judul": "Puskesmas akan tutup saat hari libur nasional.",
        "gambar": "assets/images/puskesmas_tutup.jpg",
        "deskripsi": "Penting! Puskesmas akan tutup pada tanggal merah dan hari libur nasional. Harap perhatikan jadwal Anda!",
      },
      {
        "judul": "Layanan telemedisin sekarang tersedia!",
        "gambar": "assets/images/telemedisin.jpg",
        "deskripsi": "Kini Anda bisa berkonsultasi dengan dokter secara online melalui layanan telemedisin Puskesmas Siborongborong.",
      },
    ];

    return Scaffold(
      appBar: AppBar(
        title: const Text('Berita dan Pengumuman'),
        backgroundColor: Colors.blue[700],
      ),
      body: ListView.builder(
        itemCount: berita.length,
        itemBuilder: (context, index) {
          return Card(
            elevation: 4,
            margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
            shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
            child: ListTile(
              contentPadding: const EdgeInsets.all(10),
              leading: Hero(
                tag: "berita-${index}",
                child: ClipRRect(
                  borderRadius: BorderRadius.circular(8),
                  child: Image.asset(
                    berita[index]["gambar"]!,
                    width: 60,
                    height: 60,
                    fit: BoxFit.cover,
                  ),
                ),
              ),
              title: Text(
                berita[index]["judul"]!,
                style: const TextStyle(fontWeight: FontWeight.bold),
              ),
              trailing: const Icon(Icons.arrow_forward_ios, size: 18),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(
                    builder: (context) => BeritaDetailScreen(
                      index: index,
                      judul: berita[index]["judul"]!,
                      gambar: berita[index]["gambar"]!,
                      deskripsi: berita[index]["deskripsi"]!,
                    ),
                  ),
                );
              },
            ),
          );
        },
      ),
    );
  }
}
