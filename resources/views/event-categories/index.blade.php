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
                        <a href="/event-categories" class="list-group-item active">Event Category</a>
                        <a href="/event-suggestions" class="list-group-item">Event Suggestion</a>
                        <a href="/campuses" class="list-group-item">Campus</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Event Main Categories</div>

                    <div class="panel-body">
                        @if (session('status-main-category'))
                            <div class="alert alert-success">
                                {{ session('status-main-category') }}
                            </div>
                        @endif

                        <p>
                            <a href="event-main-categories/create" class="btn btn-primary">Create Main Category</a>
                        </p>

                        <h4>Main Categories</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($main_categories as $main_category)
                                <tr>
                                    <td>{{$main_category->main_category_id}}</td>
                                    <td>{{$main_category->name}}</td>
                                    <td>
                                        <a href="{{url("event-main-categories/$main_category->main_category_id/edit")}}"
                                           class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{action('EventMainCategoryController@destroy', $main_category->main_category_id)}}"
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

                        {{$main_categories->links()}}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Event Categories</div>

                    <div class="panel-body">
                        @if (session('status-category'))
                            <div class="alert alert-success">
                                {{ session('status-category') }}
                            </div>
                        @endif

                        <p>
                            <a href="event-categories/create" class="btn btn-primary">Create Category</a>
                        </p>

                        <h4>Categories</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Main Category</th>
                                <th colspan="2" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->category_id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->mainCategory->name}}</td>
                                    <td>
                                        <a href="{{url("event-categories/$category->category_id/edit")}}"
                                           class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{action('EventCategoryController@destroy', $category->category_id)}}"
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
