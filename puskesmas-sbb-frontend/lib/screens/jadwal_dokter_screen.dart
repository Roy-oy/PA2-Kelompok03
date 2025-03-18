import 'package:flutter/material.dart';

class JadwalDokterScreen extends StatelessWidget {
  const JadwalDokterScreen({super.key});

  @override
  Widget build(BuildContext context) {
    List<Map<String, String>> jadwalDokter = [
      {"dokter": "dr. Andi", "hari": "Senin - Rabu", "jam": "08:00 - 12:00"},
      {"dokter": "dr. Siti", "hari": "Kamis - Sabtu", "jam": "09:00 - 13:00"},
    ];

    return Scaffold(
      appBar: AppBar(title: const Text('Jadwal Dokter')),
      body: ListView.builder(
        itemCount: jadwalDokter.length,
        itemBuilder: (context, index) {
          return Card(
            margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
            child: ListTile(
              title: Text("Dokter: ${jadwalDokter[index]['dokter']}"),
              subtitle: Text("Hari: ${jadwalDokter[index]['hari']} | Jam: ${jadwalDokter[index]['jam']}"),
            ),
          );
        },
      ),
    );
  }
}
