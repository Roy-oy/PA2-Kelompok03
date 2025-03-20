import 'package:sqflite/sqflite.dart';
import 'package:path/path.dart';

class DatabaseHelper {
  static Database? _database;

  Future<Database> get database async {
    if (_database != null) return _database!;
    _database = await _initDatabase();
    return _database!;
  }

  Future<Database> _initDatabase() async {
    String path = join(await getDatabasesPath(), 'puskesmas.db');
    return await openDatabase(
      path,
      version: 3, // UPDATE versi database ke 3
      onCreate: (db, version) {
        db.execute(
          "CREATE TABLE users(id INTEGER PRIMARY KEY, email TEXT UNIQUE, password TEXT)",
        );
        db.execute(
          "CREATE TABLE patients(id INTEGER PRIMARY KEY, name TEXT, nik TEXT, birthdate TEXT, phone TEXT)",
        );
        db.execute(
          "CREATE TABLE rekam_medis(id INTEGER PRIMARY KEY, patient_id INTEGER, tanggal_kunjungan TEXT, diagnosa TEXT, pengobatan TEXT, dokter TEXT, FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE)",
        );
      },
      onUpgrade: (db, oldVersion, newVersion) {
        if (oldVersion < 3) {
          db.execute(
            "CREATE TABLE rekam_medis(id INTEGER PRIMARY KEY, patient_id INTEGER, tanggal_kunjungan TEXT, diagnosa TEXT, pengobatan TEXT, dokter TEXT, FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE)",
          );
        }
      },
    );
  }

  // ==========================
  // 🔹 LOGIN & REGISTER USER
  // ==========================
  Future<int> registerUser(String email, String password) async {
    final db = await database;
    return await db.insert(
      'users',
      {'email': email, 'password': password},
      conflictAlgorithm: ConflictAlgorithm.replace,
    );
  }

  Future<Map<String, dynamic>?> loginUser(String email, String password) async {
    final db = await database;
    List<Map<String, dynamic>> result = await db.query(
      'users',
      where: "email = ? AND password = ?",
      whereArgs: [email, password],
    );
    return result.isNotEmpty ? result.first : null;
  }

  // ==========================
  // 🔹 PENDAFTARAN PASIEN
  // ==========================
  Future<int> registerPatient(String name, String nik, String birthdate, String phone) async {
    final db = await database;
    return await db.insert(
      'patients',
      {'name': name, 'nik': nik, 'birthdate': birthdate, 'phone': phone},
      conflictAlgorithm: ConflictAlgorithm.replace,
    );
  }

  Future<List<Map<String, dynamic>>> getAllPatients() async {
    final db = await database;
    return await db.query('patients', orderBy: "id DESC");
  }

  // ==========================
  // 🔹 REKAM MEDIS
  // ==========================
  Future<int> addRekamMedis(int patientId, String tanggal, String diagnosa, String pengobatan, String dokter) async {
    final db = await database;
    return await db.insert(
      'rekam_medis',
      {
        'patient_id': patientId,
        'tanggal_kunjungan': tanggal,
        'diagnosa': diagnosa,
        'pengobatan': pengobatan,
        'dokter': dokter
      },
      conflictAlgorithm: ConflictAlgorithm.replace,
    );
  }

  Future<List<Map<String, dynamic>>> getRekamMedisByPatient(int patientId) async {
    final db = await database;
    return await db.query(
      'rekam_medis',
      where: "patient_id = ?",
      whereArgs: [patientId],
      orderBy: "tanggal_kunjungan DESC",
    );
  }
}
