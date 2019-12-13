@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row p-5">
            <div class="col-sm-4">
                <div class="card danger-color small-box">
                    <div class="inner white-text">
                        <h3>5</h3>
                        <p>Student Info</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <a class="small-box-footer btn white-text" href="#">Select</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card warning-color small-box">
                    <div class="inner white-text">
                        <h3>5</h3>
                        <p>Teacher Info</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <a class="small-box-footer btn white-text" href="#">Select</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card success-color small-box">
                    <div class="inner white-text">
                        <h3>5</h3>
                        <p>Subjects Info</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <a class="small-box-footer btn white-text" href="#">Select</a>
                </div>
            </div>
        </div>
    </div>
@endsection
