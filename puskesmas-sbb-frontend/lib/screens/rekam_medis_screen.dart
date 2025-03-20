import 'package:flutter/material.dart';
import 'package:puskesmas_siborongborong/screens/database_helper.dart';

class RekamMedisScreen extends StatefulWidget {
  const RekamMedisScreen({super.key});

  @override
  State<RekamMedisScreen> createState() => _RekamMedisScreenState();
}

class _RekamMedisScreenState extends State<RekamMedisScreen> {
  final DatabaseHelper _dbHelper = DatabaseHelper();
  List<Map<String, dynamic>> _patients = [];
  List<Map<String, dynamic>> _rekamMedis = [];
  int? _selectedPatientId;

  @override
  void initState() {
    super.initState();
    _loadPatients();
  }

  Future<void> _loadPatients() async {
    final patients = await _dbHelper.getAllPatients();
    setState(() {
      _patients = patients;
    });
  }

  Future<void> _loadRekamMedis(int patientId) async {
    final rekamMedis = await _dbHelper.getRekamMedisByPatient(patientId);
    setState(() {
      _selectedPatientId = patientId;
      _rekamMedis = rekamMedis;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.blue[700],
        title: const Text("Rekam Medis", style: TextStyle(color: Colors.white)),
        iconTheme: const IconThemeData(color: Colors.white),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            // Dropdown untuk memilih pasien
            Container(
              padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              decoration: BoxDecoration(
                color: Colors.blue[100],
                borderRadius: BorderRadius.circular(12),
              ),
              child: DropdownButtonFormField<int>(
                value: _selectedPatientId,
                hint: const Text("Pilih Pasien", style: TextStyle(color: Colors.black87)),
                items: _patients.map((patient) {
                  return DropdownMenuItem<int>(
                    value: patient['id'],
                    child: Text("${patient['name']} - ${patient['nik']}"),
                  );
                }).toList(),
                onChanged: (value) {
                  if (value != null) {
                    _loadRekamMedis(value);
                  }
                },
                decoration: const InputDecoration(
                  border: InputBorder.none,
                ),
              ),
            ),
            const SizedBox(height: 20),

            // List Rekam Medis
            Expanded(
              child: _rekamMedis.isEmpty
                  ? Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(Icons.medical_services, size: 80, color: Colors.blue[300]),
                        const SizedBox(height: 10),
                        const Text(
                          "Belum ada rekam medis",
                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.w500),
                        ),
                      ],
                    )
                  : ListView.builder(
                      itemCount: _rekamMedis.length,
                      itemBuilder: (context, index) {
                        final rekam = _rekamMedis[index];
                        return Card(
                          elevation: 4,
                          margin: const EdgeInsets.symmetric(vertical: 8),
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(12),
                          ),
                          child: ListTile(
                            contentPadding: const EdgeInsets.all(16),
                            leading: Icon(Icons.health_and_safety, color: Colors.blue[700], size: 40),
                            title: Text(
                              rekam['diagnosa'],
                              style: const TextStyle(fontWeight: FontWeight.bold),
                            ),
                            subtitle: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text("📅 ${rekam['tanggal_kunjungan']}"),
                                Text("💊 ${rekam['pengobatan']}"),
                                Text("👨‍⚕️ ${rekam['dokter']}"),
                              ],
                            ),
                          ),
                        );
                      },
                    ),
            ),
          ],
        ),
      ),
    );
  }
}
