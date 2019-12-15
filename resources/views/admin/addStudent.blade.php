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
                <div class="card">
                    <div class="col-sm-6 m-2 mx-auto">
                        <h3 class="text-center">Add Student Information</h3>
                        <form action="{{ route('storeSt') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">University ID:</label>
                                <input name="university_id" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Student Name:</label>
                                <input name="student_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phone:</label>
                                <input name="phone_num" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Gender:</label>
                                <select name="gender" class="custom-select">
                                    <option selected value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nationality:</label>
                                <input name="nationality" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cert Type:</label>
                                <input name="certificate_type" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cert Source:</label>
                                <input name="certificate_source" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
