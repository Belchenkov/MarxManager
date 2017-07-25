@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #216a94; color: #fff;">Dashboard</div>

                <div class="panel-body">
                    @include('inc/message')
                    <button type="button"
                            class="btn btn-primary btn-lg"
                            data-toggle="modal"
                            data-target="#addModal"
                    >
                    Add BookMark
                    </button>
                    <hr>

                    @if(!empty($bookmarks))
                        <h3>My BookMarks</h3>
                        <ul class="list-group">
                            @foreach($bookmarks as $bookmark)
                                <li class="list-group-item clearfix">
                                    <a href="{{ $bookmark->url }}" style="position: absolute; top: 30%" target="_blank">
                                        {{ $bookmark->name }}


                                    <span class="label label-default">{{ $bookmark->description }}</span> </a>
                                        <span class="pull-right btn-group">
                                            <button type="button" name="button" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove"></span>
                                                Delete
                                            </button>
                                        </span>
                                </li>
                            @endforeach
                        </ul>

                    @endif


                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Bookmark</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookmarks.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="book-name">Bookmark Name</label>
                        <input type="text" name="name" class="form-control" id="book-name">
                    </div>
                    <div class="form-group">
                        <label for="book-url">Bookmark Url</label>
                        <input type="text" name="url" class="form-control" id="book-url">
                    </div>
                    <div class="form-group">
                        <label for="web-desc">Website Description</label>
                        <textarea name="description" class="form-control" id="web-desc"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
