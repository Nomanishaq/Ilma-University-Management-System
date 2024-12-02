<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestion;
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

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'faculty_id'   => 'nullable|exists:faculties,id',
            'program_id'   => 'nullable|exists:programs,id',
            'session_id'   => 'nullable|exists:sessions,id',
            'semester_id'  => 'nullable|exists:semesters,id',
            'section_id'   => 'nullable|exists:sections,id',
            'subject_id'   => 'nullable|exists:subjects,id',
            'teacher'      => 'nullable|string|max:255',
            'exam_time'    => 'nullable|integer|min:1',
            'exam_type'    => 'nullable|in:quiz,mid_term,final_term,assignment,class_participation',
            'quiz_type'    => 'nullable|in:quiz_1,quiz_2',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($validated);
        Toastr::success(__('Question Paper updated successfully'), __('msg_success'));

        return redirect()->back()->with('success', '!');
    }

    public function storeQuestions(Request $request)
    {
        // Get the quiz ID and questions data from the request
        $quizId = $request->input('quiz_id');
        $questions = $request->input('questions');

        // Loop through each question and save to the database
        foreach ($questions as $questionData) {
            // return response()->json($questionData['options']);
            // Prepare the data to be saved
            $question = new QuizQuestion();
            $question->quiz_id = $quizId;
            $question->question_type = $questionData['question_type'];
            $question->question = $questionData['question'];
            if($questionData['question_type'] === 'quiz_base'){
                $question->options = json_encode($questionData['options']);
            } // Store options as JSON
            $question->clo = $questionData['domain']['clo'];
            $question->plo = $questionData['domain']['plo'];
            $question->total_marks = (int) $questionData['domain']['total_marks']; // Convert to integer
            $question->cognitive = $questionData['domain']['cognitive'];
            $question->psychomotor = $questionData['domain']['psychomotor'];
            $question->affective = $questionData['domain']['affective'];

            // Save the question
            $question->save();
        }

        return response()->json(['success' => true]);
    }
}
