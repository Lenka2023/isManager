@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="alert alert-success" role="alert">
                            <p>You are logged in! as MANAGER</p>
                     </div>
                     <table class="table table-hover table-botdered">
                    <thead>
                        <tr>
                             <th width="3">Check</th>
                             <th width="3">Id</th>
                             <th width="3">Title</th>
                             <th width="3">Text</th>
                             <th width="3"> Name</th>
                            <th width="3">Email</th>
                            <th width="3">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$value)
                        <tr>
                            <td></td>
                           <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->time}}</td>
                        </tr>
                         @endforeach
                         @foreach($posts as $key=>$value)
                        <tr>
                            <td><input type="checkbox" id="vehicle1" name="vehicle1" value=""></td>
                            <td>{{$value->id}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$value->text}}</td>
                             <td>{{$value->created_at}}</td>
                             
                         </tr>
                        @endforeach
                    </tbody>
                </table>
<img src="{{asset("storage/pictures/2.txt")}}">
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
