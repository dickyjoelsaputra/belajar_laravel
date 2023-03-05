    <h3>Student List</h3>
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->class->name }}</td>
                    <td>{{ $student->slug }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
