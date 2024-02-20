@extends('Layouts.default')

@section('x-body')
    @include('Layouts.navbar')
    <div class="container mt-5">
        @if(session('alert'))
            @component('components.flash-message', ['type' => session('alert.type'), 'message' => session('alert.message')]) @endcomponent
        @endif

        @if(isset($breadcrump))
            @component('components.breadcrumb', ['items' => $breadcrump]) @endcomponent
        @endif
        @yield('content')
    </div>

@endsection
