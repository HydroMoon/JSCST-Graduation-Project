@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 p-5 mx-auto">
                <div class="card p-2">
                    <form class="m-3" action="{{ route('storeF') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Name: </label>
                            {{ $students->student_name }}
                        </div>
                        <div class="form-group">
                            <label for="">University ID: </label>
                            {{ $students->university_id }}
                        </div>
                        <div class="form-group">
                            <label for="">Semester: </label>
                            <select name="semester_id" class="custom-select">
                                @foreach ($semester as $item)
                                    <option value="{{ $item->semester_id }}">{{ $item->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Fee: </label>
                            <input class="form-control" type="text" name="fee">
                        </div>
                        <input type="hidden" name="speciality_id" value="{{ $speciality_id }}">
                        <input type="hidden" name="university_id" value="{{ $students->university_id }}">
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
