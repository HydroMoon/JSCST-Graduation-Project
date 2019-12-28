@extends('layouts.app')

@section('main')
<div class="container Site-content">
    <div class="row">
        <div class="col-sm-12 mx-auto m-5">
            <div class="card">
                <div class="text-center p-3">
                    <h6>الكلية الأردنية السودانية للعلوم والتكنولوجية</h6>
                    <h5>بكالوريوس هندسة البرمجيات - المستوى الرابع 2019/2020</h5>
                    <span>الفصل الدراسي الثامن</span>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    @foreach ($subject as $item)
                                        <th scope="col">{{ $item->subjs[0]->subject_name }} <br> ({{ $item->subjs[0]->subject_hours }} hours)</th>
                                    @endforeach
                                    <th scope="col">Degree</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->student_name }}</td>
                                    @foreach ($subject as $keyy => $item)
                                        <td>{{ ($degInfo[$key]->{str_replace(' ', '', $item->subjs[0]->subject_name)}) ?? 0 }}</td>
                                        @php
                                            $count =+ ($key + 1);
                                            $total =+ $degInfo[$key]->{str_replace(' ', '', $item->subjs[0]->subject_name)};
                                        @endphp
                                    @endforeach
                                    <td>{{ $count }}</td>
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
