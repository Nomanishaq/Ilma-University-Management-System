<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create a new QuizBank entry
        Quiz::create([
            'title' => $validated['title'],
        ]);

        Toastr::success(__('msg_updated_successfully'), __('msg_success'));
        return redirect()->back();
        // Redirect back or to another page with a success message
        // return redirect()->route('admin.questionbank.index')->with('success', 'Quiz created successfully!');

    }
}
