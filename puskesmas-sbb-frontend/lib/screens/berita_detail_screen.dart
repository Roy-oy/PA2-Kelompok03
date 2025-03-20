import 'package:flutter/material.dart';

class BeritaDetailScreen extends StatelessWidget {
  final int index;
  final String judul;
  final String gambar;
  final String deskripsi;

  const BeritaDetailScreen({
    super.key,
    required this.index,
    required this.judul,
    required this.gambar,
    required this.deskripsi,
  });

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Detail Berita'),
        backgroundColor: Colors.blue[700],
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Hero(
              tag: "berita-$index",
              child: ClipRRect(
                borderRadius: BorderRadius.circular(10),
                child: Image.asset(gambar, width: double.infinity, height: 200, fit: BoxFit.cover),
              ),
            ),
            const SizedBox(height: 16),
            Text(
              judul,
              style: const TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 10),
            Text(
              deskripsi,
              style: const TextStyle(fontSize: 16),
            ),
          ],
        ),
      ),
    );
  }
}
