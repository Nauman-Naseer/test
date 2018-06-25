@extends('layouts.app')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Password</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="update_password">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group required">
                            <label class="col-md-4 control-label">Previous Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="previous_password" value="{{ old('previous_password') }}">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-md-4 control-label">New Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}">
                            </div>
                        </div>

                        <div class="form-group required">
                            <label class="col-md-4 control-label">Retype Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="retype_password" value="{{ old('retype_password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
