@extends('admin.master')
@php(config([
    'codebase.inc_side_overlay' => false,
    'codebase.inc_sidebar' => false,
    'codebase.inc_header' => false,
    'codebase.inc_footer' => false,
]))
@section('content')
    <!-- Page Content -->
    <div class="hero bg-white">
        <div class="hero-inner">
            <div class="content content-full">
                <div class="py-30 text-center">
                    <div class="display-3 text-info">
                        <i class="fa fa-lock"></i> 401
                    </div>
                    <h1 class="h2 font-w700 mt-30 mb-10">Упс.. Вы попали на страницу с ошибкой..</h1>
                    <h2 class="h3 font-w400 text-muted mb-50">Извините, но у вас нет доступа к этой странице..</h2>
                    <a class="btn btn-hero btn-rounded btn-alt-secondary" href="{{URL::previous()}}">
                        <i class="fa fa-arrow-left mr-10"></i> Вернутся назад
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
