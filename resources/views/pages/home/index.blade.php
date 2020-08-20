@extends('layouts.app')
@section('content')
    <ul>
        <li>
            <a href="{{ route('login') }}">Вход</a>
            <span class="separator">/</span>
            <a href="{{ route('register') }}">Регистрация</a>
        </li>
    </ul>
    Hello content @php(__FILE__)
@endsection
@section('scripts_footer')
    <script src="{{asset('assets/site/js/index.js')}}"></script>
@endsection
