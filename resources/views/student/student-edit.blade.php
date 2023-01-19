@extends('layouts.main')

@section('title', 'Edit Student')

@section('content')

    <div class="mt-5 col-8 m-auto">
        <form action="/student/{{ $student->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="my-3">
                <input placeholder="input name" type="text" class="form-control" name="name" id="name"
                    value="{{ $student->name }}" required>
            </div>
            <div class="my-3">
                <select class="form-control" name="class_id" id="class">
                    <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                    @if ($student->gender == 'L')
                        <option value="P">P</option>
                    @else
                        <option value="L">L</option>
                    @endif
                </select>
            </div>
            <div class="my-3">
                <input placeholder="input nim" value="{{ $student->nim }}" type="text" class="form-control"
                    name="nim" id="nim" required>
            </div>
            <div class="my-3">
                <select class="form-control" name="class_id" id="class">
                    <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                    @foreach ($classroom as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($student->image != null)
                <img class="img-thumbnail" src="{{ asset('storage/photos/' . $student->image) }}" alt=""
                    width="200px">
            @endif

            <div class="my-3">
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="{{ $student->image }}">
                </div>
            </div>

            {{-- @foreach ($student->extracurriculars as $sextracurriculars) --}}
            <select class="select2-multiple form-control" multiple="multiple" name="extracurricular_id[]"
                id="select2Multiple">
                {{-- @foreach ($student->extracurriculars as $sextracurriculars)
                    <option selected="selected" value="{{ $sextracurriculars->id }}">{{ $sextracurriculars->name }}
                    </option>
                @endforeach --}}

                @foreach ($extracurricular as $extracurricular)
                    {{-- <option selected="selected">orange</option> --}}

                    <option
                        @foreach ($student->extracurriculars as $key) {
                        @selected($key->id == $extracurricular->id)
                        } @endforeach
                        value="{{ $extracurricular->id }}">{{ $extracurricular->name }}
                    </option>
                @endforeach

            </select>
            {{-- @endforeach --}}


            {{-- {{ $student->extracurriculars }} --}}
            <div class="my-3">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true,
                newTag: false
            });

        });
        // $('select').select2({
        //     createTag: function(params) {
        //         var term = $.trim(params.term);

        //         if (term === '') {
        //             return null;
        //         }

        //         return {
        //             id: term,
        //             text: term,
        //             newTag: false // add additional parameters
        //         }
        //     }
        // });
    </script>
@endpush
