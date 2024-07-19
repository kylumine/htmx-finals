<form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
    @csrf
    @if(isset($student))
        @method('PUT')
    @endif
    <div>
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="{{ $student->fname ?? '' }}">
    </div>
    <div>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="{{ $student->lname ?? '' }}">
    </div>
    <div>
        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" value="{{ $student->birthdate ?? '' }}">
    </div>
    <div>
        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $student->address ?? '' }}">
    </div>
    <button type="submit">Save</button>
</form>
