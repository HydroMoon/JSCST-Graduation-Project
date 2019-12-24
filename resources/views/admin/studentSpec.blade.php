@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto m-5">
            <div class="card">
                <div class="text-center p-3">
                    <h6>الكلية الأردنية السودانية للعلوم والتكنولوجية</h6>
                    <h5></h5>
                    <span>##-------------------------------##</span>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">University ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Cert Type</th>
                                    <th scope="col">Cert Source</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item['university_id'] }}</td>
                                        <td>{{ $item['student_name'] }}</td>
                                        <td>{{ $item['phone_num'] }}</td>
                                        <td>{{ $item['gender'] }}</td>
                                        <td>{{ $item['nationality'] }}</td>
                                        <td>{{ $item['certificate_type'] }}</td>
                                        <td>{{ $item['certificate_source'] }}</td>
                                        <td><a href="#" class="btn btn-outline-warning">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
