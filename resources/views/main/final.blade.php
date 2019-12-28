@extends('layouts.app')

@section('main')
<div class="container Site-content">
    <div class="row">
        <div class="col-sm-8 mx-auto m-5">
            <div class="card p-3">
                <div class="m-1">
                    <h5 class="card-title"><strong class="text-muted">Qasim Mohamed Nouh</strong></h5>
                    <br>
                    <div class="d-flex flex-column pl-4 text-muted">
                        <h6 class=""><strong class="font-weight-bold">ID:</strong> {{ $student->student_name }}</h6>
                        <h6 class=""><strong class="font-weight-bold">Major:</strong> {{ $spec->speciality_name }}</h6>
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
                                @foreach ($subject as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->subjs[0]->subject_name }}</td>
                                    <td id="sub{{ $key }}">{{ $degInfo->{str_replace(' ', '', $item->subjs[0]->subject_name)} }}</td>
                                </tr>
                                @endforeach
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
<script>

</script>
@endsection
