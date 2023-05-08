<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    private $diary;

    public function __construct() 
    {
        $this->diary = new Diary();
    }

    public function store(Request $request)
    {
        $this->diary->insertDiary($request);
        return redirect()->route('dashboard');
    }

    public function index()
    {
        $diaries = $this->diary->showUsersDiaries(Auth::id());
        return view('diary.index', ['diaries' => $diaries]);
    }

}
