@extends('layouts.layout')
@section('content')
<div class="container card-2">
    <p class="title"> {{ trans('message.Researchers') }} </p>
    @foreach($request as $res)
    <span>
        @if(app()->getLocale() == 'th')
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> {{$res->program_name_th}}
        @elseif(app()->getLocale() == 'en')
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> {{$res->program_name_en}}
        @elseif(app()->getLocale() == 'cn')
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> {{$res->program_name_cn}}
        @endif
    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="{{ route('searchresearchers',['id'=>$res->id])}}">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="{{ trans('message.research_interests') }}">
                    </div>
                </div>
                <!-- <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected> Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary">{{ trans('message.search') }}</button>
                </div>
            </form>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-0">
        @foreach($users as $r)
        <a href=" {{ route('detail',Crypt::encrypt($r->id))}}">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img class="card-image" src="{{ $r->picture}}" alt="">
                    </div>
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; @if(app()->getLocale() == 'en') max-height: 220px; @else max-height: 210px;@endif">
                        <div class="card-body">
                            @php
                                $locale = app()->getLocale();

                                // ดึงค่าทั้งภาษาไทยและอังกฤษเสมอ
                                $fname_th = $r->fname_th ?? '';
                                $lname_th = $r->lname_th ?? '';
                                $position_th = $r->position_th ?? '';
                                $doctoral_degree_th = $r->doctoral_degree_th ?? '';

                                $fname_en = $r->fname_en ?? '';
                                $lname_en = $r->lname_en ?? '';
                                $position_en = $r->position_en ?? '';
                                $doctoral_degree_en = $r->doctoral_degree_en ?? '';

                                // ถ้า locale เป็นภาษาจีน ให้ใช้เฉพาะภาษาจีน
                                if ($locale == 'cn') {
                                    $fname = $r->fname_cn ?? '';
                                    $lname = $r->lname_cn ?? '';
                                    $position = $r->position_cn ?? '';
                                    $doctoral_degree = $r->doctoral_degree_cn ?? '';
                                } else {
                                    // ถ้า locale เป็น th หรือ en ให้แสดงไทยก่อน ลงบรรทัดใหม่ แล้วตามด้วยอังกฤษ
                                    $fullname_th = trim("$position_th $fname_th $lname_th");
                                    $fullname_en = trim("$position_en $fname_en $lname_en") . ($doctoral_degree_en ? ', ' . $doctoral_degree_en : '');
                                }
                            @endphp

                            @if($locale == 'cn')
                                <!-- กรณีภาษาจีน -->
                                <h5 class="card-title">
                                    {{ $position }} {{ $doctoral_degree }} {{ $fname }} {{ $lname }}
                                </h5>
                            @else
                                <!-- กรณีภาษาไทย และอังกฤษ -->
                                <h5 class="card-title">
                                    {{ $fullname_th }}
                                </h5>
                                <h5 class="card-title">
                                    {{ $fullname_en }}
                                </h5>
                            @endif



                                

                                @if(app()->getLocale() == 'en')
                                <p class="card-text-1">{{ trans('message.expertise') }}</p>
                                <div class="card-expertise">
                                    @foreach($r->expertise->sortBy('expert_name') as $exper)
                                    <p class="card-text"> {{$exper->expert_name_en}}</p>
                                    @endforeach
                                </div>
                                @elseif(app()->getLocale() == 'th')
                                <p class="card-text-1">{{ trans('message.expertise') }}</p>
                                <div class="card-expertise">
                                    @foreach($r->expertise->sortBy('expert_name') as $exper)
                                    <p class="card-text"> {{$exper->expert_name_th}}</p>
                                    @endforeach
                                </div>
                                @elseif(app()->getLocale() == 'cn')
                                <p class="card-text-1">{{ trans('message.expertise') }}</p>
                                <div class="card-expertise">
                                    @foreach($r->expertise->sortBy('expert_name') as $exper)
                                    <p class="card-text"> {{$exper->expert_name_cn}}</p>
                                    @endforeach
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @endforeach
    </div>
</div>

@stop