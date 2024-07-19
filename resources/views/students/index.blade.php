@extends('layouts.app')

@section('content')
    <div class="containers mt-5" id='main'>
        <h1>Students</h1>
        <div class="mb-3">
            <button class="btn btn-primary" hx-get="/students/create" hx-target="#modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#studentModal">Add Student</button>
        </div>

        @include('students._table')

        <div id="billing-info"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Student Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <!-- Form content will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
@endsection
