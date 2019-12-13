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
                            <label for="">Name:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Student ID:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Year:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Major:</label>
                            <select class="custom-select" name="" id="">
                                <option selected value="">Software Engineering</option>
                                <option value="">Information Technology</option>
                                <option value="">Computer Engineering</option>
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
