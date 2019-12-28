@extends('layouts.app')

@section('main')
<div class="container Site-content">
    <div class="row p-5">
        <div class="col-sm-8 mx-auto">
            <div class="card warning-color p-5">
                <strong class="text-center">Choose student batch</strong>
                <form action="{{ route('entry') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Speciality</label>
                        <select class="custom-select" name="speciality_id">
                            @foreach ($speciality as $item)
                                <option value="{{ $item->speciality_id }}">{{ $item->speciality_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="custom-select" name="semester_id">
                            @foreach ($semester as $item)
                                <option value="{{ $item->semester_id }}">{{ $item->semester_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Year</label>
                        <select class="custom-select" name="year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
