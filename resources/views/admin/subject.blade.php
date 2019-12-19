@extends('layouts.app')

@section('main')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success mt-4" role="alert">
                <strong>Success: </strong>{{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-8 p-5 mx-auto">
                <div class="card p-4">
                    <h3 class="text-center">Add Subject Information</h3>
                    <form action="{{ route('storeSu') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Subject Name:</label>
                            <input name="subject_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Subject Hours:</label>
                            <input name="subject_hours" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Speciality:</label>
                            <select name="speciality_id" class="custom-select">
                                @foreach ($speciality as $item)
                                    <option value="{{ $item['speciality_id'] }}">{{ $item['speciality_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Semester:</label>
                            <select name="semester_id" class="custom-select">
                                @foreach ($semester as $item)
                                    <option value="{{ $item['semester_id'] }}">{{ $item['semester_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
