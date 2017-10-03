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
                    <div class="panel-heading">Edit Event {{$event->name}}</div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form enctype="multipart/form-data" method="post"
                              action="{{action('EventController@update', $event->event_id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Event Name"
                                       value="{{$event->name}}">
                            </div>
                            <div class="form-group">
                                <label for="event_date">Date</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" value="{{$event->event_date}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                          placeholder="Descriptions">
                                    {{$event->description}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="campus_id">Campus</label>
                                <select class="form-control" id="campus_id" name="campus_id">
                                    @foreach($campuses as $campus)
                                        <option value="{{$campus->campus_id}}">{{$campus->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="street_address">Street Address</label>
                                <input type="text" class="form-control" id="street_address" name="street_address"
                                       placeholder="Street Address" value="{{$event->location->street_address}}">
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="number" class="form-control" id="postal_code" name="postal_code">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                       placeholder="city">
                            </div>
                            <div class="form-group">
                                <label for="state_province">State Province</label>
                                <input type="text" class="form-control" id="state_province" name="state_province"
                                       placeholder="State Province">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" id="photo" name="photo">
                                <p class="help-block">upload event photo / poster here</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
