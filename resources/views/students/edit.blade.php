<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname" value="{{ $student->fname }}" required>
    </div>
    <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lname" value="{{ $student->lname }}" required>
    </div>
    <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" value="{{ $student->birthdate }}" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $student->address }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Student</button>
</form>
