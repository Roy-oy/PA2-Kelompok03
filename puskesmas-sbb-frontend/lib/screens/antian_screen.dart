import 'package:flutter/material.dart';
import 'package:puskesmas_siborongborong/screens/database_helper.dart';

class AntrianScreen extends StatefulWidget {
  const AntrianScreen({super.key});

  @override
  State<AntrianScreen> createState() => _AntrianScreenState();
}

class _AntrianScreenState extends State<AntrianScreen> {
  final DatabaseHelper _dbHelper = DatabaseHelper();
  List<Map<String, dynamic>> _patients = [];

  @override
  void initState() {
    super.initState();
    _loadPatients();
  }

  void _loadPatients() async {
    List<Map<String, dynamic>> data = await _dbHelper.getAllPatients();
    setState(() {
      _patients = data;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("Daftar Antrian")),
      body: _patients.isEmpty
          ? const Center(child: Text("Belum ada pendaftaran"))
          : ListView.builder(
              itemCount: _patients.length,
              itemBuilder: (context, index) {
                return Card(
                  margin: const EdgeInsets.all(10),
                  child: ListTile(
                    title: Text(_patients[index]['name']),
                    subtitle: Text(
                      "NIK: ${_patients[index]['nik']}\nKeluhan: ${_patients[index]['phone']}",
                      style: const TextStyle(fontSize: 14),
                    ),
                    isThreeLine: true,
                  ),
                );
              },
            ),
    );
  }
}
