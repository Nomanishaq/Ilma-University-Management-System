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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Quiz Title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.quiz.store') }}">
                        @csrf 
                            <div class="form-group">
                                <label for="">Quiz Title</label>
                                <input type="text" placeholder="Quiz Title" class="form-control" name="title" id="" required>
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
                    <button class="btn btn-info" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add Qustion Paper</button>
            </div>
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table id="basic-table" class="display table nowrap table-striped table-hover" style="width:100%">
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                     <td>
                                            <a href="{{ route('admin.questionbank.create', ['id' => $quiz->id]) }}" class="btn btn-icon btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            
                                            <a href="" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <a href="" class="btn btn-icon btn-primary btn-sm">
                                                <i class="fas fa-print"></i>
                                            </a>

                                            <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            <!-- Include Delete modal -->
                                        </td>
                                </tr>
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

@endsection