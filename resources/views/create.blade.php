@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                   href="{{ route('Project.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Problems!!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Project.store') }}" method="POST">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Project title...">
                </div>
                <div class="form-group">
                    <strong>Project Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Project description...">
                </div>
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fname" class="form-control" placeholder="First Name...">
                </div>
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lname" class="form-control" placeholder="Last Name...">
                </div>
                <div class="form-group">
                    <strong>Start Date:</strong>
                <input type="date" name="stDate" class="form-control">
                </div>
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="enDate" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection
