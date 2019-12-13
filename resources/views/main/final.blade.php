@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto m-5">
            <div class="card p-3">
                <div class="m-1">
                    <h5 class="card-title"><strong class="text-muted">Qasim Mohamed Nouh</strong></h5>
                    <br>
                    <div class="d-flex flex-column pl-4 text-muted">
                        <h6 class=""><strong class="font-weight-bold">ID:</strong> 15325874651</h6>
                        <h6 class=""><strong class="font-weight-bold">Major:</strong> Software Engineering</h6>
                        <h6 class=""><strong class="font-weight-bold">Year:</strong> 2015</h6>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Degree</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Internet Technology</td>
                                    <td>A+</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Arabic Studies</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Multimedia</td>
                                    <td>B+</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Programming Concept</td>
                                    <td>B</td>
                                </tr>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                    <td class="font-weight-bold">GPA</td>
                                    <td class="font-weight-bold">3.43</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
