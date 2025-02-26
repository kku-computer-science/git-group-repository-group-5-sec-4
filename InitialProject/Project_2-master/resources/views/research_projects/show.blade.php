@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.Research_project_detail') }}</h4>
            <p class="card-description">{{ trans('message.Research_project_description') }}</p>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_name') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_start') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_start }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_end') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->project_end }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Fund_name') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_budget') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->budget }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_note') }}</b></p>
                <p class="card-text col-sm-9">{{ $researchProject->note }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_status.Title') }}</b></p>
                @if($researchProject->status == 1)
                <p class="card-text col-sm-9">{{ trans('message.Research_project_status.Request') }}</p>
                @elseif($researchProject->status == 2)
                <p class="card-text col-sm-9">{{ trans('message.Research_project_status.Progress') }}</p>
                @else
                <p class="card-text col-sm-9">{{ trans('message.Research_project_status.Close') }}</p>
                @endif
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_responsible') }}</b></p>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 1)
                <p class="card-text col-sm-9">
                    {{ $user->{'position_' . app()->getLocale()} ?? $user->position_en }} 
                    {{ $user->{'fname_' . app()->getLocale()} ?? $user->fname_en }} 
                    {{ $user->{'lname_' . app()->getLocale()} ?? $user->lname_en }}
                </p>

                @endif
                @endforeach
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ trans('message.Research_project_member') }}</b></p>
                @foreach($researchProject->user as $user)
                @if ( $user->pivot->role == 2)
                <p class="card-text col-sm-9">{{$user->position_th}}{{ $user->fname_th}} {{ $user->fname_th}}
				@if (!$loop->last),@endif
                @endif
                
                @endforeach

                @foreach($researchProject->outsider as $user)
                @if ( $user->pivot->role == 2)
                ,{{$user->title_name}}{{ $user->fname}} {{ $user->fname}}</p>
				@if (!$loop->last),@endif
                @endif
                
                @endforeach
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary" href="{{ route('researchProjects.index') }}">{{ trans('message.Back_button') }}</a>
            </div>

        </div>
    </div>
</div>
@endsection