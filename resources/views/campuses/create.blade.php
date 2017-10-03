@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Menu</strong></div>

                    <ul class="list-group">
                        <a href="/" class="list-group-item">Dashboard</a>
                        <a href="/event" class="list-group-item">Event</a>
                        <a href="/event-categories" class="list-group-item active">Event Category</a>
                        <a href="/event-suggestions" class="list-group-item">Event Suggestion</a>
                        <a href="/campuses" class="list-group-item">Campus</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Campus</div>

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

                    <!-- Form -->
                        <form enctype="multipart/form-data" method="post" action="{{url('campuses')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Campus Name">
                            </div>
                            <div class="form-group">
                                <label for="web">Website</label>
                                <input type="text" class="form-control" id="web" name="web"
                                       placeholder="www.example.com">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo">
                                <p class="help-block">upload campus logo here</p>
                            </div>
                            <div class="form-group">
                                <label for="street_address">Street Address</label>
                                <input type="text" class="form-control" id="street_address" name="street_address"
                                       placeholder="Street Address">
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
