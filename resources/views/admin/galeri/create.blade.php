@extends('admin/template')
@section('icerik')

{!! Form::open(array('method'=>'POST','action'=>'GaleriController@store','class'=>'dropzone','file'=>'true','multiple'=>'true')) !!}


{!! Form::close() !!}
    
    @endsection




@section('css')
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection

@section('js')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
@endsection