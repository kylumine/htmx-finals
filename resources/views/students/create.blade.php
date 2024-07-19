<form id="student-form" action="{{ route('students.store') }}" method="POST" hx-post="{{ route('students.store') }}" hx-target="#students-table" hx-swap="innerHTML">
    @csrf
    <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname" required>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lname" required>
    </div>
    <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" required>
    </div>
    <div class="mb-3">
        <label for="section" class="form-label">Section</label>
        <input type="text" class="form-control" name="section" required>
    </div>
    <div class="mb-3">
        <label for="remarks" class="form-label">Remarks</label>
        <input type="text" class="form-control" name="remarks">
    </div>
    <button type="submit" class="btn btn-primary">Add Student</button>
</form>
