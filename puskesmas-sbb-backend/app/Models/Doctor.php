<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'nama',
        'spesialisasi',
        'email',
        'no_telepon',
        'no_str',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'foto_profil',
        'status'
    ];

    // Format data otomatis
    protected $casts = [
        'tanggal_lahir' => 'date',
        'status' => 'string',
    ];

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir->age . ' tahun';
    }

    /**
     * Relasi ke tabel lain
     */

    // 1. Relasi dengan tabel jadwal dokter (One-to-Many)
    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'doctor_id');
    }

    // 2. Relasi dengan rekam medis pasien (One-to-Many)
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }

    // 3. Relasi dengan janji temu pasien (One-to-Many)
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    // 5. Relasi dengan feedback pasien (One-to-Many)
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'doctor_id');
    }
}
