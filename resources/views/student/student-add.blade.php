@extends('layouts.main')

@section('title', 'Add Student')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-5 col-8 m-auto">
        <form action="student" method="post" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <input placeholder="input name" type="text" class="form-control" name="name" id="name">
            </div>
            <div class="my-3">
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select Gender</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="my-3">
                <input placeholder="input nim" type="text" class="form-control" name="nim" id="nim">
            </div>
            <div class="my-3">
                <select class="form-control" name="class_id" id="class">
                    <option value="">Select Class</option>
                    @foreach ($classroom as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <div class="input-group">
                    <input type="file" class="custom-file-input" id="photo" name="photo"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
            </div>

            <select class="select2-multiple form-control" multiple="multiple" name="extracurricular_id[]"
                id="select2Multiple">
                @foreach ($extracurriculars as $extracurricular)
                    {{-- <option selected="selected">orange</option> --}}
                    <option value="{{ $extracurricular->id }}">{{ $extracurricular->name }}</option>
                @endforeach
            </select>

            <div class="my-3">
                <button class="btn btn-success" type="submit">Save</button>
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
