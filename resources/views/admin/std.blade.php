@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row p-5">
        <div class="col-sm-8 mx-auto">
            <div class="card warning-color p-5">
                <strong class="text-center">Choose student batch</strong>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="">Speciality</label>
                        <select class="custom-select" name="speciality_id">
                            @foreach ($speciality as $item)
                                <option value="{{ $item->speciality_id }}">{{ $item->speciality_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Year</label>
                        <select class="custom-select" name="" id="">
                            <option value="">2015</option>
                            <option value="">2016</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
