@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <newregistration :admission_id="{{$admission->id}}" :student_id="{{$admission->student_id}}"></newregistration>
        </div>
    </div>
@stop