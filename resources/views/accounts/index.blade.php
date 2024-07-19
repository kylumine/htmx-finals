@extends('layouts.app')

@section('content')
    <div class="containers mt-5" id='main'>
        <h1>Accounts</h1>
        {{-- <div class="mb-3">
            <button class="btn btn-primary" hx-get="/accounts/create" hx-target="#modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#accountModal">Add Student</button>
        </div> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Last Name</th>
                    <th scope="col">Section</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->student->lname }}</td>
                        <td>{{ $account->section }}</td>
                        <td>
                            {{-- <button class="btn btn-secondary btn-sm" hx-get="/accounts/{{ $account->id }}/edit" hx-target="#modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#accountModal">Edit</button> --}}
                            <button class="btn btn-info btn-sm" hx-get="{{ route('billing.show', $account) }}" hx-target="#billingModalBody" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#billingModal">View Billing</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="billing-info"></div>
    </div>

    <!-- Account Modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Student Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <!-- Form content will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Billing Modal -->
    <div class="modal fade" id="billingModal" tabindex="-1" aria-labelledby="billingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="billingModalLabel">Billing Statement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="billingModalBody">
                    <!-- Billing content will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
@endsection
