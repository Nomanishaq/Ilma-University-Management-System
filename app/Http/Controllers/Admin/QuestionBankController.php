<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Subject;
use App\User;
use Illuminate\Support\Facades\Auth;

class QuestionBankController extends Controller
{
    public function index()
    {

        $data['title'] = "Quiz Paper";
        // Question bank list show karne ke liye logic

        $data['quizzes'] = Quiz::all();

        return view('admin.questionbank.index', $data);
    }


    public function create(Request $request, $id)
    {

         // Set the title
    $data['title'] = "Add Quiz Paper";

    // Fetch all quizzes from the database
    $data['quizzes'] = Quiz::findOrFail($id);
    if(!empty($request->faculty) || $request->faculty != null){
        $data['selected_faculty'] = $faculty = $request->faculty;
    }
    else{
        $data['selected_faculty'] = '0';
    }

    if(!empty($request->program) || $request->program != null){
        $data['selected_program'] = $program = $request->program;
    }
    else{
        $data['selected_program'] = '0';
    }

    if(!empty($request->session) || $request->session != null){
        $data['selected_session'] = $session = $request->session;
    }
    else{
        $data['selected_session'] = '0';
    }

    if(!empty($request->semester) || $request->semester != null){
        $data['selected_semester'] = $semester = $request->semester;
    }
    else{
        $data['selected_semester'] = '0';
    }

    if(!empty($request->section) || $request->section != null){
        $data['selected_section'] = $section = $request->section;
    }
    else{
        $data['selected_section'] = '0';
    }

    if(!empty($request->subject) || $request->subject != null){
        $data['selected_subject'] = $subject = $request->subject;
    }
    else{
        $data['selected_subject'] = '0';
    }


    // Search Filter
    $data['faculties'] = Faculty::where('status', '1')->orderBy('title', 'asc')->get();


    if(!empty($request->faculty) && !empty($request->program) && !empty($request->session) && !empty($request->semester) && !empty($request->section))
    {
        $data['programs'] = Program::where('faculty_id', $faculty)->where('status', '1')->orderBy('title', 'asc')->get();

        $sessions = Session::where('status', 1);
        $sessions->with('programs')->whereHas('programs', function ($query) use ($program){
            $query->where('program_id', $program);
        });
        $data['sessions'] = $sessions->orderBy('id', 'desc')->get();

        $semesters = Semester::where('status', 1);
        $semesters->with('programs')->whereHas('programs', function ($query) use ($program){
            $query->where('program_id', $program);
        });
        $data['semesters'] = $semesters->orderBy('id', 'asc')->get();

        $sections = Section::where('status', 1);
        $sections->with('semesterPrograms')->whereHas('semesterPrograms', function ($query) use ($program, $semester){
            $query->where('program_id', $program);
            $query->where('semester_id', $semester);
        });
        $data['sections'] = $sections->orderBy('title', 'asc')->get();
        

        // Access Data
        $teacher_id = Auth::guard('web')->user()->id;
        $user = User::where('id', $teacher_id)->where('status', '1');
        $user->with('roles')->whereHas('roles', function ($query){
            $query->where('slug', 'super-admin');
        });
        $superAdmin = $user->first();

        // Filter Subject
        $subjects = Subject::where('status', '1');
        $subjects->with('classes')->whereHas('classes', function ($query) use ($teacher_id, $session, $superAdmin){
            if(isset($session)){
                $query->where('session_id', $session);
            }
            if(!isset($superAdmin)){
                $query->where('teacher_id', $teacher_id);
            }
        });
        $subjects->with('programs')->whereHas('programs', function ($query) use ($program){
            $query->where('program_id', $program);
        });
        $data['subjects'] = $subjects->orderBy('code', 'asc')->get();
    }
    // Pass both the title and quizzes to the view
    return view('admin.questionbank.create', $data);
    }
    //

}
