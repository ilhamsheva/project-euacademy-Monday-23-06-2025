<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Pastikan model Course sudah ada dan terhubung dengan User

class LearningController extends Controller
{
    /**
     * Tampilkan kursus yang di-enroll oleh pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil kursus yang sudah di-enroll oleh pengguna
        $courses = auth()->user()->courses; // Menggunakan relasi many-to-many antara User dan Course

        return view('my-learning', compact('courses')); // Mengirim data kursus ke view 'my-learning'
    }
}
