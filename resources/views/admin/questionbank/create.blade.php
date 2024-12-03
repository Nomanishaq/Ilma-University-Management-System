@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Card ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('modal_add') }} {{ $title }}</h5>
                    </div>
                    <div class="card-block">
                        <a href="{{ route('admin.questionbank.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> {{ __('btn_back') }}</a>

                        <a href="" class="btn btn-info"><i class="fas fa-sync-alt"></i> {{ __('btn_refresh') }}</a>
                    </div>
                    <form class="needs-validation" novalidate action="{{ route('admin.quiz.update', $quizzes->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block">
                            <div class="row gy-4">
                                <!-- Form Start -->
                                <div class="form-group col-md-4">
                                    <label for="title">{{ __('field_title') }} <span>*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{  $quizzes->title }}" required>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="faculty">{{ __('field_faculty') }} <span>*</span></label>
                                    <select class="form-control faculty" name="faculty_id" id="faculty" required>
                                        <option value="">{{ __('select') }}</option>
                                        @if(isset($faculties))
                                        @foreach( $faculties->sortBy('title') as $faculty )
                                        <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_faculty') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program">{{ __('field_program') }} <span>*</span></label>
                                    <select class="form-control program" name="program_id" id="program" required>
                                        <option value="">{{ __('select') }}</option>
                                        @if(isset($programs))
                                        @foreach( $programs->sortBy('title') as $program )
                                        <option value="{{ $program->id }}" @if( $selected_program==$program->id) selected @endif>{{ $program->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_program') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="session">{{ __('field_session') }} <span>*</span></label>
                                    <select class="form-control session" name="session_id" id="session" required>
                                        <option value="">{{ __('select') }}</option>
                                        @if(isset($sessions))
                                        @foreach( $sessions->sortByDesc('id') as $session )
                                        <option value="{{ $session->id }}" @if( $selected_session==$session->id) selected @endif>{{ $session->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_session') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="semester">{{ __('field_semester') }} <span>*</span></label>
                                    <select class="form-control semester" name="semester_id" id="semester" required>
                                        <option value="0">{{ __('all') }}</option>
                                        @if(isset($semesters))
                                        @foreach( $semesters->sortBy('id') as $semester )
                                        <option value="{{ $semester->id }}" @if( $selected_semester==$semester->id) selected @endif>{{ $semester->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_semester') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="section">{{ __('field_section') }} <span>*</span></label>
                                    <select class="form-control section" name="section_id" id="section" required>
                                        <option value="0">{{ __('all') }}</option>
                                        @if(isset($sections))
                                        @foreach( $sections->sortBy('title') as $section )
                                        <option value="{{ $section->id }}" @if( $selected_section==$section->id) selected @endif>{{ $section->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_section') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="subject">{{ __('field_subject') }} <span>*</span></label>
                                    <select class="form-control subject" name="subject_id" id="subject" required>
                                        <option value="">{{ __('select') }}</option>
                                        @if(isset($subjects))
                                        @foreach( $subjects->sortBy('code') as $subject )
                                        <option value="{{ $subject->id }}" @if( $selected_subject==$subject->id) selected @endif>{{ $subject->code }} - {{ $subject->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('field_subject') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title">Teacher<span>*</span></label>
                                    <input type="text" class="form-control" name="teacher" id="teacher" value="{{Auth::user()->first_name }} {{ Auth::user()->last_name}}" readonly required />
                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="title">Exam Time<span>*</span></label>
                                    <input type="text" class="form-control" name="exam_time" value="{{ $quizzes->exam_time }}" id="exam_time" required />
                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>



                                <div class="form-group col-md-4">
                                    <label for="title">Select Exam Type<span>*</span></label>
                                    <select class="form-control" name="exam_type" id="exam_type" required>
                                        <option value="">Select</option>
                                        <option value="quiz" @if( $quizzes->exam_type == 'quiz') selected @endif>Quiz</option>
                                        <option value="mid_term" @if( $quizzes->exam_type == 'mid_term') selected @endif>Mid Term</option>
                                        <option value="final_term" @if( $quizzes->exam_type == 'final_term') selected @endif>Final Term</option>
                                        <option value="assignment" @if( $quizzes->exam_type == 'assignment') selected @endif>Assignment</option>
                                        <option value="class_participation" @if( $quizzes->exam_type == 'class_participation') selected @endif>Class Participation</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>


                                <div class="col-4" id="quiz_type">
                                    <div class="form-group">
                                        <label for="title">Select Quiz Type<span>*</span></label>
                                        <select class="form-control" name="quiz_type" id="">
                                            <option value="">Select</option>
                                            <option value="quiz_1" @if($quizzes->quiz_type === 'quiz_1') selected @endif>Quiz 1</option>
                                            <option value="quiz_2" @if($quizzes->quiz_type === 'quiz_2') selected @endif>Quiz 2</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('    ') }}
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="container">
                        <h3 class="my-3">Existing Questions</h3>
                        <table class="table table-bordered w-75 mx-auto">
                            <thead>
                                <tr>
                                    <th>Question ID</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                    <th>Total Marks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($quizzes->questions)
                                    @foreach ($quizzes->questions as $question)
                                        <tr>
                                            <td>{{ $question->id }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                @if($question->question_type === 'quiz_base')
                                                    <ul>
                                                        @foreach (json_decode($question->options, true) as $key => $option)
                                                            <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $option }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif 
                                            </td>
                                            <td>{{ $question->total_marks }}</td>
                                            <td>
                                                <!-- Delete Option -->
                                                <form action="{{ route('admin.question.delete', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else

                                    <tr>
                                        <td colspan="5" style="text-align: center;">No question created</td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>


                    <form class="needs-validation" novalidate onsubmit="event.preventDefault(); submitQuizForm();" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-block">
                            <div class="row gy-4">


                                <div class="col-md-12">
                                    <h3>Questions</h3>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Select Qustion Type<span>*</span></label>
                                        <select class="form-control" name="qustion_type" id="qustion_type" required>
                                            <option value="">Select</option>
                                            <option value="quiz_base">ADD MCQS</option>
                                            <option value="question_base">ADD QUESTION</option>
                                        </select>

                                        <div class="invalid-feedback">
                                            {{ __('required_field') }} {{ __('    ') }}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4 d-flex align-items-end">
                                    <!-- Add Question Button -->
                                    <div class="form-group">
                                        <button type="button" id="add-question" class="btn btn-primary">Add Question</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p id="remaining-marks"></p>
                                </div>
                                <input type="hidden" name="quiz-id" id="quiz_id" value="{{ $quizzes->id }}">
                                <div id="questions-container" class="container">

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> {{ __('btn_save') }}</button>
                                </div>
                    </form>
                </div>
            </div>
            <!-- [ Card ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<script src="{{ asset('dashboard/plugins/jquery/js/jquery.min.js') }}"></script>

<script>
    jQuery('document').ready(function() {
        jQuery("#quiz_type").hide();

        let marks = {
            'quiz': 5,
            'mid_term': 20,
            'final_term': 45,
            'assignment': 15,
            'class_participation': 10
        };

        let exam_type_marks;
        let totalMarks = 0; // Track the total marks
        let remainingMarks = 0;
        const examType = @json($quizzes->exam_type);

        if(examType){
            $("#exam_type").val(examType).trigger('change');
            examTypeChange()
        }

        jQuery('#exam_type').change(function() {
            examTypeChange();
        });

        function examTypeChange(){
            let exam_type = jQuery('#exam_type').val();

            // Set the exam type marks
            switch (exam_type) {
                case 'quiz':
                    exam_type_marks = marks.quiz;
                    break;
                case 'mid_term':
                    exam_type_marks = marks.mid_term;
                    break;
                case 'final_term':
                    exam_type_marks = marks.final_term;
                    break;
                case 'assignment':
                    exam_type_marks = marks.assignment;
                    break;
                case 'class_participation':
                    exam_type_marks = marks.class_participation;
                    break;
                default:
                    exam_type_marks = 0;
            }

            // Hide or show quiz type options based on selection
            if (exam_type === "quiz") {
                jQuery("#quiz_type").show();
            } else {
                jQuery("#quiz_type").hide();
            }

            remainingMarks = exam_type_marks; // Set remaining marks on exam type change
            updateRemainingMarksDisplay();
        }

        let questionIndex = 1;

        // Function to calculate the total marks from input fields
        function calculateTotalMarks() {
            totalMarks = 0; // Reset total marks
            document.querySelectorAll('input[name^="total_marks"]').forEach((input) => {
                const value = parseFloat(input.value);
                if (!isNaN(value)) {
                    totalMarks += value; // Add valid numbers
                }
            });

            remainingMarks = exam_type_marks - totalMarks; // Calculate remaining marks
            updateRemainingMarksDisplay();

            // Disable or enable the "Add Question" button based on remaining marks
            if (remainingMarks <= 0) {
                jQuery('#add-question').prop('disabled', true);
            } else {
                jQuery('#add-question').prop('disabled', false);
            }
        }

        // Function to update the remaining marks display
        function updateRemainingMarksDisplay() {
            jQuery('#remaining-marks').text('Remaining Marks: ' + remainingMarks);
        }

        // Function to add a question dynamically
        function addQuestion(isQuizBase) {
            let qustion_type = jQuery('#qustion_type').val();

            if (qustion_type === "") {
                alert("Please Select Question Type");
                return;
            }

            const questionContainer = document.getElementById('questions-container');

            // Create the base structure for the question
            const questionRow = document.createElement('div');
            questionRow.classList.add('row', 'question-row');
            questionRow.innerHTML = `
                <input type="hidden" name="type_question_${questionIndex}" id="type_question_${questionIndex}" value="${qustion_type}"/>
                <div class="py-4"></div>
                <div class="form-group col-md-4">
                    <label for="question_${questionIndex}" class="form-label">Question<span>*</span></label>
                    <input type="text" class="form-control" name="question[${questionIndex}]" id="question_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                ${
                    isQuizBase
                        ? `
                <div class="form-group col-md-2">
                    <label for="option_a_${questionIndex}" class="form-label">Option (A) <span>*</span></label>
                    <input type="text" class="form-control" name="option_a[${questionIndex}]" id="option_a_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="option_b_${questionIndex}" class="form-label">Option (B) <span>*</span></label>
                    <input type="text" class="form-control" name="option_b[${questionIndex}]" id="option_b_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="option_c_${questionIndex}" class="form-label">Option (C) <span>*</span></label>
                    <input type="text" class="form-control" name="option_c[${questionIndex}]" id="option_c_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="option_d_${questionIndex}" class="form-label">Option (D) <span>*</span></label>
                    <input type="text" class="form-control" name="option_d[${questionIndex}]" id="option_d_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>`
                        : ''
                }
            `;

            const domainRow = document.createElement('div');
            domainRow.classList.add('row', 'question-row-2', 'mt-2');
            domainRow.innerHTML = `
                <div class="form-group col-md-4">
                    <label for="clo_${questionIndex}" class="form-label">CLO<span>*</span></label>
                    <select class="form-control" name="clo[${questionIndex}]" id="clo_${questionIndex}" required>
                        <option value="">Select</option>
                        <option value="CLO1">CLO1</option>
                        <option value="CLO2">CLO2</option>
                        <option value="CLO3">CLO3</option>
                        <option value="CLO4">CLO4</option>
                        <option value="CLO5">CLO5</option>
                        <option value="CLO6">CLO6</option>
                        <option value="CLO7">CLO7</option>
                        <option value="CLO8">CLO8</option>
                        <option value="CLO9">CLO9</option>
                        <option value="CLO10">CLO10</option>
                        <option value="CLO11">CLO11</option>
                        <option value="CLO12">CLO12</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="plo_${questionIndex}" class="form-label">PLO<span>*</span></label>
                    <select class="form-control" name="plo[${questionIndex}]" id="plo_${questionIndex}" required>
                        <option value="">Select</option>
                        <option value="PLO1">PLO1</option>
                        <option value="PLO2">PLO2</option>
                        <option value="PLO3">PLO3</option>
                        <option value="PLO4">PLO4</option>
                        <option value="PLO5">PLO5</option>
                        <option value="PLO6">PLO6</option>
                        <option value="PLO7">PLO7</option>
                        <option value="PLO8">PLO8</option>
                        <option value="PLO9">PLO9</option>
                        <option value="PLO10">PLO10</option>
                        <option value="PLO11">PLO11</option>
                        <option value="PLO12">PLO12</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="total_marks_${questionIndex}" class="form-label">Total Marks<span>*</span></label>
                    <input type="text" class="form-control" name="total_marks[${questionIndex}]" id="total_marks_${questionIndex}" required>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="col-md-12 py-3">
                    <h3 class="fs-5">Domain Selection:</h3>
                </div>
                <div class="form-group col-md-4">
                    <label for="cognitive_selection_${questionIndex}" class="form-label">Cognitive<span>*</span></label>
                    <select name="cognitive_selection[${questionIndex}]" id="cognitive_selection_${questionIndex}" class="form-control" required>
                        <option value="">Select Cognitive</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                        <option value="C4">C4</option>
                        <option value="C5">C5</option>
                        <option value="C6">C6</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="psychomotor_selection_${questionIndex}" class="form-label">Psychomotor<span>*</span></label>
                    <select name="psychomotor_selection[${questionIndex}]" id="psychomotor_selection_${questionIndex}" class="form-control" required>
                        <option value="">Select Psychomotor</option>
                        <option value="P1">P1</option>
                        <option value="P2">P2</option>
                        <option value="P2">P3</option>
                        <option value="P2">P4</option>
                        <option value="P2">P5</option>
                        <option value="P2">P6</option>
                        <option value="P2">P7</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="affective_selection_${questionIndex}" class="form-label">Affective<span>*</span></label>
                    <select name="affective_selection[${questionIndex}]" id="affective_selection_${questionIndex}" class="form-control" required>
                        <option value="">Select Affective</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A2">A3</option>
                        <option value="A2">A4</option>
                        <option value="A2">A5</option>
                    </select>
                    <div class="invalid-feedback">
                        {{ __('required_field') }}
                    </div>
                </div>
            `;

            // Append the rows to the container
            questionContainer.appendChild(questionRow);
            questionContainer.appendChild(domainRow);

            // After appending, recalculate total marks
            calculateTotalMarks();
        }

        // Add event listener to the "Add Question" button
        const addQuestionButton = document.getElementById('add-question');
        addQuestionButton.addEventListener('click', function() {
            const isQuizBase = jQuery('#qustion_type').val() === 'quiz_base';
            // Only add question if total marks do not exceed limit
            if (remainingMarks > 0) {
                alert(remainingMarks)
                addQuestion(isQuizBase);
                questionIndex++;
            } else {
                alert("Total marks exceeded the allowed limit. Cannot add more questions.");
            }
        });

        document.getElementById('questions-container').addEventListener('input', function(event) {
            if (event.target.name && event.target.name.startsWith('total_marks')) {
                calculateTotalMarks();
            }
        });
    });
</script>

<script>
    // Function to handle form submission
    function submitQuizForm() {
        // Create an array to store the question data
        let questions = [];

        document.querySelectorAll('.question-row').forEach((row, index) => {
            const question_type = row.querySelector('input[name^="type_question_"]') ? row.querySelector('input[name^="type_question_"]').value : '';
            const question = row.querySelector('input[name^="question"]') ? row.querySelector('input[name^="question"]').value : '';
            const optionA = row.querySelector('input[name^="option_a"]') ? row.querySelector('input[name^="option_a"]').value : '';
            const optionB = row.querySelector('input[name^="option_b"]') ? row.querySelector('input[name^="option_b"]').value : '';
            const optionC = row.querySelector('input[name^="option_c"]') ? row.querySelector('input[name^="option_c"]').value : '';
            const optionD = row.querySelector('input[name^="option_d"]') ? row.querySelector('input[name^="option_d"]').value : '';

            // Validation: Check if required fields are not empty
            if (!question) {
                isValid = false;
                row.classList.add('error'); // Highlight the row with an error
                alert('Please fill out the question for question ' + (index + 1));
            } else if (question_type !== 'question_base' && (!optionA || !optionB || !optionC || !optionD)) {
                isValid = false;
                row.classList.add('error'); // Highlight the row with an error
                alert('Please fill out all options for question ' + (index + 1));
            } else {
                row.classList.remove('error'); // Remove error class if valid
                questions.push({
                    question_type,
                    question,
                    options: question_type !== 'question_base' ? {
                        option_a: optionA,
                        option_b: optionB,
                        option_c: optionC,
                        option_d: optionD
                    } : undefined // Skip options for 'question_base'
                });
            }
        });

        document.querySelectorAll('.question-row-2').forEach((row, index) => {
            const totalMarks = row.querySelector('input[name^="total_marks"]') ? row.querySelector('input[name^="total_marks"]').value : '';
            const clo = row.querySelector('select[name^="clo"]') ? row.querySelector('select[name^="clo"]').value : '';
            const plo = row.querySelector('select[name^="plo"]') ? row.querySelector('select[name^="plo"]').value : '';
            const cognitive = row.querySelector('select[name^="cognitive_selection"]') ? row.querySelector('select[name^="cognitive_selection"]').value : '';
            const psychomotor = row.querySelector('select[name^="psychomotor_selection"]') ? row.querySelector('select[name^="psychomotor_selection"]').value : '';
            const affective = row.querySelector('select[name^="affective_selection"]') ? row.querySelector('select[name^="affective_selection"]').value : '';


            // Validation: Check if domain-related fields are not empty
            if (!totalMarks || !clo || !plo || !cognitive || !psychomotor || !affective) {
                isValid = false;
                row.classList.add('error'); // Highlight the row with an error
                alert('Please fill out all domain-related fields for question ' + (index + 1));
            } else {
                row.classList.remove('error'); // Remove error class if valid
                if (questions[index]) {
                    questions[index].domain = {
                        total_marks: totalMarks,
                        clo,
                        plo,
                        cognitive,
                        psychomotor,
                        affective
                    };
                }
            }
        });

        console.log(questions);


        // Prepare data for submission
        const quizId = document.querySelector('#quiz_id').value; // Assuming quiz_id is part of the form
        const data = {
            quiz_id: quizId,
            questions: questions
        };

        console.log(data);
        // Send the data to the backend using fetch (AJAX)
        fetch('/admin/save-quiz-questions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Questions saved successfully!');
                    window.location.reload();
                } else {
                    alert('Error saving questions!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong!');
            });
    }
</script>
<!-- End Content-->
<script type="text/javascript">
    "use strict";

    const faculty_id = @json($quizzes->faculty_id);
        const subject_id = @json($quizzes->subject_id);
        const program_id = @json($quizzes->program_id);
        const session_id = @json($quizzes->session_id);
        const section_id = @json($quizzes->section_id);
        const semester_id = @json($quizzes->semester_id);
    $(document).ready(function() {

        if (faculty_id) {
            setTimeout(function () {
                $(".faculty").val(faculty_id).trigger('change'); // Triggers the change event
                changeFaculty();
            }, 500);
        }

    });

    console.log(program_id)
    $(".faculty").on('change', function(){
        changeFaculty()
    });
    function changeFaculty(){
        // e.preventDefault(e);
        var program = $(".program");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('filter-program') }}",
            data: {
                _token: $('input[name=_token]').val(),
                faculty: $('.faculty').val()
            },
            success: function(response) {
                // var jsonData=JSON.parse(response);
                $('option', program).remove();
                $('.program').append('<option value="">{{ __("select") }}</option>');
                $.each(response, function() {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.title
                    }).appendTo('.program');
                });
                if(program_id){
                    setTimeout(function(){
                        program.val(program_id).trigger('change');
                        programChange()
                    }, 500)
                }
            }

        });
    }

    $(".program").on('change', function(e) {
        // e.preventDefault(e);
        programChange();
        
    });

    function programChange(){
        var session = $(".session");
        var semester = $(".semester");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('filter-session') }}",
            data: {
                _token: $('input[name=_token]').val(),
                program: $('.program').val()
            },
            success: function(response) {
                // var jsonData=JSON.parse(response);
                $('option', session).remove();
                $('.session').append('<option value="">{{ __("select") }}</option>');
                $.each(response, function() {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.title
                    }).appendTo('.session');
                });

                if(session_id){
                    setTimeout(function(){
                        session.val(session_id).trigger('change');
                        sessionChange()
                    }, 500)
                }
            }

        });

        $.ajax({
            type: 'POST',
            url: "{{ route('filter-semester') }}",
            data: {
                _token: $('input[name=_token]').val(),
                program: $('.program').val()
            },
            success: function(response) {
                // var jsonData=JSON.parse(response);
                $('option', semester).remove();
                $('.semester').append('<option value="0">{{ __("all") }}</option>');
                $.each(response, function() {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.title
                    }).appendTo('.semester');
                });

                if(semester_id){
                    semester.val(semester_id).trigger('change');
                    semesterChange()
                }
            }

        });
    }

    $(".semester").on('change', function(e) {
        // e.preventDefault(e);
        semesterChange();
    });
    function semesterChange(){
        var section = $(".section");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('filter-section') }}",
            data: {
                _token: $('input[name=_token]').val(),
                semester: $('.semester').val(),
                program: $('.program option:selected').val()
            },
            success: function(response) {

                // var jsonData=JSON.parse(response);
                $('option', section).remove();
                $('.section').append('<option value="0">{{ __("all") }}</option>');
                $.each(response, function() {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.title
                    }).appendTo('.section');
                });
                if(section_id){
                    section.val(section_id).trigger('change');
                }
            }

        });
    }

    $(".session").on('change', function(e) {
        // e.preventDefault(e);
        sessionChange()
    });

    function sessionChange(){
        var subject = $(".subject");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('filter-quiz-subject') }}",
            data: {
                _token: $('input[name=_token]').val(),
                session: $('.session').val(),
                program: $('.program option:selected').val()
            },
            success: function(response) {
                console.log("Subjects", response);

                // Check if the response contains an array of subjects inside another array
                var subjects = response[0]; // Access the first array (which contains the subjects)

                // Clear existing options
                $('option', subject).remove();

                // Append the default "select" option
                $('.subject').append('<option value="">{{ __("select") }}</option>');

                // Loop through each subject and append the options
                $.each(subjects, function() {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.code + ' - ' + this.title
                    }).appendTo('.subject');
                });
                if(subject_id){
                    subject.val(subject_id).trigger('change')
                }
            }


        });
    }


    

</script>



@endsection