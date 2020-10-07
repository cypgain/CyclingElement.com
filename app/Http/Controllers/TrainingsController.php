<?php
namespace App\Http\Controllers;

class TrainingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('trainings');
    }
}
