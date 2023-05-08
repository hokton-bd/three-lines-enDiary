<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'created_date'
    ];

    public function insertDiary(Request $req) 
    {
        $validated = $req->validate([
            'content' => ['regex:/^(?:\S.*?[.?!])(?:\s+\S.*?[.?!]){2}$/']
        ]);
        return $this->create([
                    'user_id' => Auth::id(),
                    'content' => $req->content,
                    'created_date' => date('Y-m-d')
                ]);
    }

    public function showUsersDiaries($id)
    {
        $diaries = Diary::where('user_id', $id)
                        ->OrderByDesc('created_date')
                        ->get();
        $diaries->each(function($item, $key) use(&$dates) {
        $item->created_date = Carbon::parse($item->created_date)->format('Y年m月d日');
        });

        return $diaries;
    }
}
