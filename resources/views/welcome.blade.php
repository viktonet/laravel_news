@extends('layouts.header')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    News page
                </div>

                <div class="links">
                    <a href="{{ route('news.index') }}" >Статьи</a>
                    <a href="{{ route('news.admin.category.index') }}" >Категории</a>
                    <a href="{{ route('user.index') }}">Login</a>

                </div>
            </div>
        </div>
@extends('layouts.footer')
