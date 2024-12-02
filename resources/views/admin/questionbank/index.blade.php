@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <!-- [ Data table ] start -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Exam Title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.quiz.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Exam Title</label>
                                <input type="text" placeholder="Exam Title" class="form-control" name="title"
                                    id="" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 py-4">
                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                    Qustion Paper</button>
            </div>
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table id="basic-table" class="display table nowrap table-striped table-hover"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('field_title') }}</th>
                                    <th>{{ __('field_subject') }}</th>
                                    <th>Program</th>
                                    <th>Session</th>
                                    <th>Semester</th>
                                    <th>Section</th>
                                    <th>{{ __('field_action') }}</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($quizzes as $row => $quiz)
                                <tr>
                                    <td>{{ $row + 1 }}</td>
                                    <td>{{ $quiz->title }}</td>
                                    <td>{{ $quiz->subject ? $quiz->subject->title : '-' }}</td>
                                    <td>{{ $quiz->program ? $quiz->program->title : '-' }}</td>
                                    <td>{{ $quiz->session ? $quiz->session->title : '-' }}</td>
                                    <td>{{ $quiz->semester ? $quiz->semester->title : '-' }}</td>
                                    <td>{{ $quiz->section ? $quiz->section->title : '-' }}</td>


                                    <td>
                                        <a href="{{ route('admin.questionbank.create', ['id' => $quiz->id]) }}"
                                            class="btn btn-icon btn-success btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>


                                        <a href="/admin/questionbank/print/{{ $quiz->id }}" class="btn btn-icon btn-primary btn-sm">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        <a data-quiz-id="{{ $quiz->id }}"
                                            class="btn btn-icon btn-primary btn-sm generate-pdf">
                                            <i class="fas fa-print"></i>
                                        </a>

                                        <button type="button" class="btn btn-icon btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $quiz->id }}"
                                            data-quiz-id="{{ $quiz->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>


                                        <!-- Include Delete modal -->
                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal-{{ $quiz->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this quiz:
                                                <strong>{{ $quiz->title }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <!-- Delete Form -->
                                                <form action="{{ route('admin.questionbank.delete', $quiz->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Data table ] end -->
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('.generate-pdf').on('click', function(e) {
        e.preventDefault();

        const quizId = $(this).data('quiz-id'); // Get the quiz ID from the button's data attribute

        $.ajax({
            url: `/admin/quiz/${quizId}/pdf`,
            method: 'GET',
            xhrFields: {
                responseType: 'blob', // Tell the browser to handle binary data
            },
            success: function(response) {
                const url = window.URL.createObjectURL(new Blob([response]));
                const link = document.createElement('a');
                link.href = url;
                link.download = `Quiz_${quizId}.pdf`; // Suggested filename
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function(xhr) {
                console.error('PDF generation failed:', xhr.responseText);
                // alert('Something went wrong! Unable to generate the PDF.');
            }
        });
    });
</script>
@endsection