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
                        <a href="/event-categories" class="list-group-item">Event Category</a>
                        <a href="/event-suggestions" class="list-group-item">Event Suggestion</a>
                        <a href="/campuses" class="list-group-item active">Campus</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Campus {{$campus->name}}</div>

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
                        <form enctype="multipart/form-data" method="post"
                              action="{{action('CampusController@update', $campus->campus_id)}}">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Campus Name"
                                       value="{{$campus->name}}">
                            </div>
                            <div class="form-group">
                                <label for="web">Website</label>
                                <input type="text" class="form-control" id="web" name="web"
                                       placeholder="www.example.com" value="{{$campus->web}}">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" id="logo" name="logo">
                                <p class="help-block">upload campus logo here</p>
                            </div>
                            <div class="form-group">
                                <label for="street_address">Street Address</label>
                                <input type="text" class="form-control" id="street_address" name="street_address"
                                       placeholder="Street Address" value="{{$campus->location->street_address}}">
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="number" class="form-control" id="postal_code" name="postal_code"
                                       value="{{$campus->location->postal_code}}">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city"
                                       placeholder="city" value="{{$campus->location->city}}">
                            </div>
                            <div class="form-group">
                                <label for="state_province">State Province</label>
                                <input type="text" class="form-control" id="state_province" name="state_province"
                                       placeholder="State Province" value="{{$campus->location->state_province}}">
                            </div>
                            <div class="form-group">
                                <label for="state_province">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{$campus->location->latitude}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="state_province">Latitude</label>
                                <input type="text" class="form-control" id="longtitude" name="longtitude" value="{{$campus->location->longtitude}}" readonly>
                            </div>
                            <div id="map"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script>
        function initMap() {
            var lat = parseFloat(document.getElementById('latitude').value);
            var lng = parseFloat(document.getElementById('longtitude').value);
            if (!isNaN(lat) && !isNaN(lng)) {
                var pos = {lat: lat, lng: lng};
            } else {
                var pos = {lat: -7.258502, lng: 112.751810};
            }

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: pos,
            });

            var marker = new google.maps.Marker({
                draggable: true,
                position: pos,
                map: map,
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longtitude').value = event.latLng.lng();
            });

            google.maps.event.addListener(map, 'click', function (event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longtitude').value = event.latLng.lng();
                marker.setPosition(event.latLng);
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtqb2S0R5L-jBWGyuwhhgF51fMu2q1mlk&callback=initMap">
    </script>
@endsection
