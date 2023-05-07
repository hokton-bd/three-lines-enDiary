<?php

namespace App\Http\Controllers\Diary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon; 

class IndexDiaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $diaries = Diary::where('user_id', Auth::id())
                        ->OrderByDesc('created_date')
                        ->get();
        $diaries->each(function($item, $key) use(&$dates) {
            $item->created_date = Carbon::parse($item->created_date)->format('Y年m月d日');
        });
        return view('diary.index', ['diaries' => $diaries]);
    }
}
