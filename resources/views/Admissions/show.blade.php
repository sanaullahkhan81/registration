@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
    <AdmissionsShow :admission_id="{{$admission_id}}"></AdmissionsShow>
        </div>
    </div>
@stop