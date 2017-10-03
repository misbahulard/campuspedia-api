@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Menu</strong></div>

                    <ul class="list-group">
                        <a href="/" class="list-group-item">Dashboard</a>
                        <a href="/events" class="list-group-item">Event</a>
                        <a href="/event-categories" class="list-group-item">Event Category</a>
                        <a href="/event-suggestions" class="list-group-item">Event Suggestion</a>
                        <a href="/campuses" class="list-group-item active">Campus</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Campus</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            <a href="campuses/create" class="btn btn-primary">Create campus</a>
                        </p>

                        <h4>Campuses</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Web</th>
                                <th>Logo</th>
                                <th colspan="2" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campuses as $campus)
                                <tr>
                                    <td>{{$campus->campus_id}}</td>
                                    <td>{{$campus->name}}</td>
                                    <td>{{$campus->web}}</td>
                                    <td><img src="/img/campuses/{{$campus->logo}}" class="img-thumbnail" width="50px" height="auto"></td>
                                    <td>
                                        <a href="{{url("campuses/$campus->campus_id/edit")}}"
                                           class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{action('CampusController@destroy', $campus->campus_id)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
