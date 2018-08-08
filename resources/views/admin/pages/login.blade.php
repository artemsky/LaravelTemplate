@extends('admin.master')
@php(config([
    'codebase.inc_side_overlay' => false,
    'codebase.inc_sidebar' => false,
    'codebase.inc_header' => false,
    'codebase.inc_footer' => false,
]))
@section('content')
    @include('admin.components.auth.boxed')
    {{--@include('admin.components.auth.simple')--}}
{{--    @include('admin.components.auth.full')--}}
@endsection
@push('scripts')
    <script defer src="{{mix('/assets/pages/login.js', 'admin')}}"></script>
@endpush
