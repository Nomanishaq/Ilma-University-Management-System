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
                      <div class="row">
                        <!-- Form Start -->
                        <div class="form-group col-md-8">
                            <label for="title">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{  $quizzes->title }}" required>

                            <div class="invalid-feedback">
                              {{ __('required_field') }} {{ __('    ') }}
                            </div>
                        </div>

                        @include('common.inc.quiz_search_filter')

                        <div class="col-md-4"></div>

                        <div id="questions-container" class="container">
    <div class="row question-row">
        <!-- Question Field -->
        <div class="form-group col-md-4">
            <label for="question_1" class="form-label">Question<span>*</span></label>
            <input type="text" class="form-control" name="question[1]" id="question_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- Option A -->
        <div class="form-group col-md-2">
            <label for="option_a_1" class="form-label">Option (A) <span>*</span></label>
            <input type="text" class="form-control" name="option_a[1]" id="option_a_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- Option B -->
        <div class="form-group col-md-2">
            <label for="option_b_1" class="form-label">Option (B) <span>*</span></label>
            <input type="text" class="form-control" name="option_b[1]" id="option_b_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- Option C -->
        <div class="form-group col-md-2">
            <label for="option_c_1" class="form-label">Option (C) <span>*</span></label>
            <input type="text" class="form-control" name="option_c[1]" id="option_c_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- Option D -->
        <div class="form-group col-md-2">
            <label for="option_d_1" class="form-label">Option (D) <span>*</span></label>
            <input type="text" class="form-control" name="option_d[1]" id="option_d_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>
    </div>

    <div class="row question-row mt-2">
        <!-- CLO -->
        <div class="form-group col-md-4">
            <label for="clo_1" class="form-label">CLO<span>*</span></label>
            <select class="form-control" name="clo[1]" id="clo_1" required>
                <option value="CLO1">CLO1</option>
                <option value="CLO2">CLO2</option>
                <option value="CLO3">CLO3</option>
                <option value="CLO4">CLO4</option>
            </select>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- PLO -->
        <div class="form-group col-md-4">
            <label for="plo_1" class="form-label">PLO<span>*</span></label>
            <select class="form-control" name="plo[1]" id="plo_1" required>
                <option value="PLO1">PLO1</option>
                <option value="PLO2">PLO2</option>
                <option value="PLO3">PLO3</option>
                <option value="PLO4">PLO4</option>
                <option value="PLO5">PLO5</option>
            </select>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>

        <!-- Total Marks -->
        <div class="form-group col-md-2">
            <label for="total_marks_1" class="form-label">Total Marks<span>*</span></label>
            <input type="text" class="form-control" name="total_marks[1]" id="total_marks_1" required>
            <div class="invalid-feedback">
                {{ __('required_field') }}
            </div>
        </div>


<!-- Add Question Button -->
<div class="form-group col-md-2 d-flex justify-content-center align-items-center">
    <button type="button" id="add-question" class="btn btn-primary">Add Question</button>
</div>


                        


                       
                        <!-- Form End -->
                      </div>
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
    let questionIndex = 1;

document.getElementById('add-question').addEventListener('click', function () {
    // Get the first question-row
    const questionContainer = document.getElementById('questions-container');
    const firstQuestion = document.querySelector('.question-row');
    const newQuestion = firstQuestion.cloneNode(true);

    // Increment the question index
    questionIndex++;

    // Update IDs and Names for cloned elements
    newQuestion.querySelectorAll('input, select').forEach((field) => {
        const fieldName = field.getAttribute('name');
        const fieldId = field.getAttribute('id');

        if (fieldName) {
            // Update name attribute to make it unique
            const newName = fieldName.replace(/\[\d+\]/, `[${questionIndex}]`);
            field.setAttribute('name', newName);
        }

        if (fieldId) {
            // Update ID to make it unique
            const newId = fieldId.replace(/_\d+/, `_${questionIndex}`);
            field.setAttribute('id', newId);
        }

        // Clear input values
        if (field.tagName === 'INPUT') {
            field.value = '';
        }
    });

    // Append new question-row
    questionContainer.appendChild(newQuestion);
});

</script>
<!-- End Content-->

@endsection