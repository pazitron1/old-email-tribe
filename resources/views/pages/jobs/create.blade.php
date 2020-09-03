@extends('layouts.app')
@section('css')
    <style>
        trix-toolbar .trix-button-group--file-tools {
          display: none!important;
        }
    </style>
@endsection

@section('content')
    <create-job intent-id="{{$intentId}}" intent-secret="{{$intentSecret}}"></create-job>
@endsection
