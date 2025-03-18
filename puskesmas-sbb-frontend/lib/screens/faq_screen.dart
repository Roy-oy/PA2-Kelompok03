import 'package:flutter/material.dart';

class FAQScreen extends StatelessWidget {
  const FAQScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('FAQ - Puskesmas')),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: const [
          ExpansionTile(
            title: Text("Bagaimana cara mendaftar?"),
            children: [Padding(padding: EdgeInsets.all(8.0), child: Text("Anda bisa mendaftar melalui aplikasi atau datang langsung ke Puskesmas."))],
          ),
          ExpansionTile(
            title: Text("Jam operasional Puskesmas?"),
            children: [Padding(padding: EdgeInsets.all(8.0), child: Text("Senin - Jumat: 08.00 - 16.00, Sabtu - Minggu: Tutup."))],
          ),
          ExpansionTile(
            title: Text("Apakah menerima pasien BPJS?"),
            children: [Padding(padding: EdgeInsets.all(8.0), child: Text("Ya, kami menerima pasien dengan kartu BPJS."))],
          ),
        ],
      ),
    );
  }
}
