@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Menu</strong></div>

                    <ul class="list-group">
                        <a href="/" class="list-group-item">Dashboard</a>
                        <a href="/event" class="list-group-item active">Event</a>
                        <a href="/event-categories" class="list-group-item">Event Category</a>
                        <a href="/event-suggestions" class="list-group-item">Event Suggestion</a>
                        <a href="/campuses" class="list-group-item">Campus</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Event</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            <a href="event/create" class="btn btn-primary">Create Event</a>
                        </p>

                            <h4>Events</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Event Date</th>
                                    <th>Photo</th>
                                    <th colspan="2" width="20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{$event->event_id}}</td>
                                        <td>{{$event->name}}</td>
                                        <td>{{$event->event_date}}</td>
                                        <td><img src="/img/events/{{$event->photo}}" class="img-thumbnail" width="50px" height="auto"></td>
                                        <td>
                                            <a href="{{url("event/$event->event_id/edit")}}"
                                               class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{action('EventController@destroy', $event->event_id)}}"
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
