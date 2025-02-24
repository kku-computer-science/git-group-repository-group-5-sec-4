@extends('layouts.layout')
@section('content')

<div class="container card-2">
    <h1>{{ $data['title'] }}</h1>
    <p>{{ $data['description'] }}</p>

    <div class="row row-cols-1 row-cols-md-2 g-0">
        @foreach($users as $r)
            <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-sm-4">
                            <img class="card-image" src="{{ $r->picture }}" alt="">
                        </div>
                        <div class="col-sm-8 overflow-hidden" style="max-height: 220px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $r->{'fname_' . app()->getLocale()} }} {{ $r->{'lname_' . app()->getLocale()} }}
                                </h5>
                                <h5 class="card-title-2">{{ $r->{'academic_ranks_' . app()->getLocale()} }}</h5>
                                <p class="card-text-1">{{ TranslateHelper::translate('Expertise', app()->getLocale()) }}</p>
                                <div class="card-expertise">
                                    @foreach($r->expertise as $exper)
                                        <p class="card-text">
                                            {{ $exper->{'expert_name_' . app()->getLocale()} }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

@stop
