@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary"
                   href="{{ route('Project.index')}}">
                    Back
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                {{ $Project->title }}
            </div>
            <div class="form-group">
                <strong>Project Description:</strong>
                @if ($Project->status === 'active')
                    {{ $Project->description }}
                @else
                    <del> {{ $Project->description }} </del>
                @endif
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                @if ($Project->status === 'active')
                    Active
                @elseif ($Project->status === 'completed')
                    Completed
                @else
                    Deleted
                @endif
            </div>
            <div class="form-group">
                <strong>First Name:</strong>
                    {{ $Project->fname }}
            </div>
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $Project->lname }}
            </div>
            <div class="form-group">
                <strong>Start Date:</strong>
                {{ $Project->stDate }}
            </div>
            <div class="form-group">
                <strong>End Date:</strong>
                {{ $Project->enDate }}
            </div>

        </div>
    </div>
@endsection
