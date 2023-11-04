@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Item</h2>
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
            <strong>Problems!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Project.update', $Project->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project title:</strong>
                    <input type="text" name="title" value="{{ $Project->title }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <strong>Project descripton:</strong>
                    <input type="text" name="description" value="{{ $Project->description }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fname" value="{{ $Project->fname }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lname" value="{{ $Project->lname }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="stDate" value="{{ $Project->stDate }}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="enDate" value="{{ $Project->enDate }}" class="form-control">
                </div>


            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project status:</strong>
                    <select name="status" class="form-select">
                        @php
                            $statuses = ['active', 'completed', 'deleted'];
                        @endphp
                        @foreach ($statuses as $status)
                            @if($status === $Project->status)
                                <option selected value="{{ $status }}">{{ $status }} </option>
                            @else
                                <option value="{{ $status }}">{{ $status }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection
