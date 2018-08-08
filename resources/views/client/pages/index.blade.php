@extends('client.master')
@section('content')
    <div class="container text-center mt-5">
        <h1>Welcome to {{config('app.name')}}</h1>
        <a href="{{route('admin.index')}}" class="btn btn-outline-dark">Go to Dashboard</a>
    </div>
@endsection
@push('scripts')
    <script defer src="{{mix('/assets/pages/index.js', 'client')}}"></script>
@endpush
