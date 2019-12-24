@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto m-5">
            <div class="card">
                <div class="text-center p-3">
                    <h6>الكلية الأردنية السودانية للعلوم والتكنولوجية</h6>
                    <h5>{{ $spec->speciality_name }}</h5>
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
                                    @foreach ($semsub as $item)
                                        <th scope="col">{{ $item->subjs[0]->subject_name }} <br> ({{ $item->subjs[0]->subject_hours }} hours)</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('storeDeg') }}" method="POST">
                                @foreach ($student as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $item->student_name }}</td>
                                        <input type="hidden" name="deg[{{ $key }}][university_id]" value="{{ $item->university_id }}">
                                        @foreach ($semsub as $item)
                                            <td><input class="form-control" type="text" size="4" name="deg[{{ $key }}][{{ str_replace(' ', '', $item->subjs[0]->subject_name) }}]" value="{{ $stddeg[$key]->{str_replace(' ', '', $item->subjs[0]->subject_name)} }}"></td>
                                        @endforeach

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="1">
                            <div class="form-group">
                                <button class="btn btn-secondary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
