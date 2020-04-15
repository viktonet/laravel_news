@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All users</div>
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
                                      <th>id</th>
                                      <th>Name</th>
                                      <th>Surname</th>
                                      <th>E-mail</th>
                                      <th>Phone</th>
                                      <th>Date of birth</th>
                                      <th>News</th>
                                      <th> </th>
                                    </tr>
                                  </thead>
                                  @foreach ($users as $user)
                                  <tr>
                                    <td width="40">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->tel }}</td>
                                    <td>{{ $user->date_of_birthday }}</td>
                                    <td> <a href="{{ route('news.admin.posts.show', $user->id) }}">{{ $user->count_news->count() }}</a> </td>
                                    <td>@if(Auth::user()->role_id==1 OR $user->role_id != 1 AND Auth::user()->role_id!=1)
                                      <table>
                                        <tr>
                                          <td><a class="btn btn-link left" href="{{ route('user.all.edit', $user->id) }}">edit</a></td>
                                          <td><form method="post" action="{{ route('user.all.destroy', $user->id) }}" >
                                            @method('DELETE')
                                            @csrf                                       <button style="display:inline; float: left" type="submit" class="btn btn-link left">DEL</button>
                                          </form></td>
                                        </tr>
                                      </table>

                                    @endif</td>
                                  </tr>
                                  @endforeach
                                </table>
<a href="{{ route('user.all.create') }}" class="btn btn-primary">Crete user</a>
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
