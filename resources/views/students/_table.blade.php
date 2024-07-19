<table class="table table-striped" id="students-table">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr id="student-{{ $student->id }}">
                <td>{{ $student->fname }}</td>
                <td>{{ $student->lname }}</td>
                <td>
                    <button class="btn btn-secondary btn-sm" hx-get="/students/{{ $student->id }}/edit" hx-target="#modal-body" hx-trigger="click" data-bs-toggle="modal" data-bs-target="#studentModal">Edit</button>
                    {{-- <button class="btn btn-danger btn-sm"
                            hx-delete="/students/{{ $student->id }}"
                            hx-confirm="Are you sure you want to delete this student?"
                            hx-target="#students-table"
                            hx-swap="outerHTML">
                        Delete
                    </button> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
