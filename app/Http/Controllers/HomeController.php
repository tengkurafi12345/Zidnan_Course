<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $packets = Packet::all()->sortByDesc('created_at');
        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.index', compact(['packets', 'students']));
    }


    public function mengaji() {
        $packets = Packet::all()->sortByDesc('created_at');
        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.mengaji', compact(['packets', 'students']));
    }
}
