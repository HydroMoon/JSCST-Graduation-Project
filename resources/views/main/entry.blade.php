@extends('layouts.app')

@section('main')
<div class="container">
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
                                    <th scope="col">Internet Technology</th>
                                    <th scope="col">Arabic Studies</th>
                                    <th scope="col">Multimedia</th>
                                    <th scope="col">Islamic Studies</th>
                                    <th scope="col">Statistics</th>
                                    <th scope="col">Power Control</th>
                                    <th scope="col">Management Basics</th>
                                    <th scope="col">Degree</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $list = ["Ikrah","Pennington","Nafisa","Reed","Shyam","Jacobs","Beverly","Xiong","Minnie","Beech","Terrence","Sosa","Albi","Wilcox","Khadijah","Watt","Teagan","Sullivan","Ernie","Hood","Artur","Christensen","Ayisha","Singleton","Ciaron","Lyon","Millie-Rose","Tran","Manisha","Wolf","Shaan","Fleming","Summer-Rose","Cassidy","Charis","Fisher","Tyreke","Flynn","Prisha","Cole","Menaal","West","Elleanor","Gilbert","Martyn","Dickinson","Isla-Rose","Horton","Keyan","Regan","Humphrey","Dickson","Hettie","Potter","Dina","Parkes","Myra","Eaton","Onur","Vance","Aronas","Brook","Haya","Redman","Imaad","Pitts","Lance","Charlton","Lulu","Blundell"];
                                @endphp
                                @for ($i = 0; $i < 35; $i++)
                                    <tr>
                                        <th scope="row">{{ $i+1 }}</th>
                                        <td>{{ $list[$i] }}</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>A+</td>
                                        <td>3.42</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
