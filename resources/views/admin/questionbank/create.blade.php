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

                    <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
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

                                @include('common.inc.quiz_search_filter')

                                <div class="form-group col-md-4">
                                    <label for="title">Teacher<span>*</span></label>
                                    <input type="text" class="form-control" name="teacher" id="teacher" value="{{Auth::user()->first_name }} {{ Auth::user()->last_name}}" readonly required />
                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>
                                

                                <div class="form-group col-md-4">
                                    <label for="title">Exam Hours<span>*</span></label>
                                    <input type="number" class="form-control" name="exam_time" id="exam_time" required />
                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>
                                


                                <div class="form-group col-md-4">
                                    <label for="title">Select Exam Type<span>*</span></label>
                                    <select class="form-control" name="exam_type" id="exam_type" required>
                                        <option value="">Select</option>
                                        <option value="quiz">Quiz</option>
                                        <option value="mid_term">Mid Term</option>
                                        <option value="final_term">Final Term</option>
                                        <option value="assignment">Assignment</option>
                                        <option value="class_participation">Class Participation</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>
                                </div>
                                

                                <div class="col-4" id="quiz_type">
                                <div class="form-group">
                                    <label for="title">Select Quiz Type<span>*</span></label>
                                    <select class="form-control" name="quiz_type" id="" required>
                                        <option value="">Select</option>
                                        <option value="quiz_1">Quiz 1</option>
                                        <option value="quiz_2">Quiz 2</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        {{ __('required_field') }} {{ __('    ') }}
                                    </div>

                                    </div>
                                </div>


                              
                                <div class="col-md-12">
                                    <h3>Questions</h3>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Select Qustion Type<span>*</span></label>
                                        <select class="form-control" name="qustion_type" id="qustion_type" required>
                                            <option value="">Select</option>
                                            <option value="quiz_base">Quiz Base</option>
                                            <option value="question_base">Question Base</option>
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


<script>

jQuery('document').ready(function(){
        jQuery("#quiz_type").hide();

        let marks = {'quiz': 5, 'mid_term': 20, 'final_term': 45, 'assignment': 15,'class_participation' : 10 };
        let exam_type_marks;

        jQuery('#exam_type').change(function(){
            
            let  exam_type = jQuery('#exam_type').val();

            if(exam_type == 'quiz'){
                 exam_type_marks = marks.quiz;
            }
            else if(exam_type == 'mid_term'){
                 exam_type_marks = marks.mid_term;
            }
            else if(exam_type == 'final_term'){
                 exam_type_marks = marks.final_term;
            }

            else if(exam_type == 'assignment'){
                 exam_type_marks = marks.assignment;
            }
            else if(exam_type == 'class_participation'){
                 exam_type_marks = marks.class_participation;
            }

            // console.log(exam_type_marks);

            
            // calculate marks
            function calculateTotalMarks() {
                let totalMarks = 0;

                // Select all total_marks input fields
                document.querySelectorAll('input[name^="total_marks"]').forEach((input) => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        totalMarks += value; // Add valid numbers
                    }
                });

                if(totalMarks > exam_type_marks){
                    alert("error");
                }

                // Log the total marks to the console
                // console.log('Total Marks:', totalMarks);
            }

            // Attach event listeners to all total_marks input fields
            document.addEventListener('input', function (event) {
                if (event.target && event.target.name.startsWith('total_marks')) {
                    calculateTotalMarks();
                }
            });



            
            if (exam_type === "quiz") {
                jQuery("#quiz_type").show(); // Show the element if value is "quiz"
            } else {
                jQuery("#quiz_type").hide(); // Hide the element otherwise
            }
            
        });
    });


    let questionIndex = 1;

// Function to add questions dynamically
function addquestion(isQuizBase) {

    let qustion_type = jQuery('#qustion_type').val();

    if (qustion_type == "") {
        alert("Please Select Qustion Type");
        return; 
    }

    const questionContainer = document.getElementById('questions-container');

    // Create the base structure for the question
    const questionRow = document.createElement('div');
    questionRow.classList.add('row', 'question-row');
    questionRow.innerHTML = `
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
}

// Add event listener to the "Add Question" button
jQuery('document').ready(function () {
    const addQuestionButton = document.getElementById('add-question');
    const questionTypeSelect = document.getElementById('qustion_type');

    addQuestionButton.addEventListener('click', function () {
        const isQuizBase = questionTypeSelect.value === 'quiz_base';
        addquestion(isQuizBase);
        questionIndex++;
    });

});



</script>
<!-- End Content-->

@endsection