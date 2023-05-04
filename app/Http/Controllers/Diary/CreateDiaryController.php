<?php

namespace App\Http\Controllers\Diary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class CreateDiaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
                        'content' => ['regex:/^(?:\S.*?[.?!])(?:\s+\S.*?[.?!]){2}$/']
                    ]);
        $diary = Diary::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return redirect()->route('dashboard');
    }
}
