@extends('layouts.app')

@section('main')

<div class="container Site-content">
    <div class="row p-5">
        <div class="col-sm-4">
            <div class="card danger-color small-box">
                <div class="inner white-text">
                    <h3>1</h3>
                    <p>Student Info</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <button class="small-box-footer btn white-text" data-toggle="modal" data-target="#studentInfo">Select</button>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card warning-color small-box">
                <div class="inner white-text">
                    <h3>2</h3>
                    <p>Degree Info</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                </div>
                <button class="small-box-footer btn white-text" data-toggle="modal" data-target="#exampleModalCenter">Select</button>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card success-color small-box">
                <div class="inner white-text">
                    <h3>3</h3>
                    <p>Subjects Info</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <a class="small-box-footer btn white-text" href="{{ route('subject') }}">Select</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose student batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <form action="{{ route('entry') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Speciality</label>
                        <select class="custom-select" name="speciality_id">
                            @foreach ($speciality as $item)
                                <option value="{{ $item->speciality_id }}">{{ $item->speciality_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="custom-select" name="semester_id">
                            @foreach ($semester as $item)
                                <option value="{{ $item->semester_id }}">{{ $item->semester_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Year</label>
                        <select class="custom-select" name="year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="studentInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose student batch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <form action="{{ route('viewSt') }}" method="post">
                    {{ csrf_field() }}
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
                        <select class="custom-select" name="year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
