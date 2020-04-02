@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Особиста сторінка</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} {{ Auth::user()->id }}
                        </div>
                    @endif
                    {{-- dd(Auth::user()) --}}
                    <div class="container">
                        <div class="row justify-content-left">
                            <div class="col-md-11">
                              	<table width="100%">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Имя</th>
                                      <th>E-mail</th>
                                      <th>Статтей</th>
                                    </tr>
                                  </thead>
                                  <tr>
                                    <td width="40">{{ Auth::user()->id }}</td>
                                    <td><a href="{{ route('user.edit', Auth::user()->id) }}">{{ Auth::user()->name }}</a></td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td> <a href="{{ route('news.admin.posts.show', Auth::user()->id) }}">{{ $countNews }}</a> </td>
                                  </tr>
                                </table>

                            </div>
                        </div>
                        <div class="row justify-content-left">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-7">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
