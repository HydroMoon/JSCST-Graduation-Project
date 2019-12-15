@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card m-5">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h5>Result Enquiry</h5>
                    </div>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="">Student ID:</label>
                            <input type="text" name="university_id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Semester:</label>
                            <select class="custom-select" name="semester_id">
                                <option selected value="">First</option>
                                <option value="">Second</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Year:</label>
                            <select class="custom-select" name="year">
                                <option selected value="">2015</option>
                                <option value="">2016</option>
                                <option value="">2017</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Major:</label>
                            <select class="custom-select" name="speciality_id">
                                @foreach ($speciality as $item)
                                    <option value="{{ $item['speciality_id'] }}">{{ $item['speciality_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
