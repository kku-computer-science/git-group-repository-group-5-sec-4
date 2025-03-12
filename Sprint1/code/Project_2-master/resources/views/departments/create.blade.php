<!-- @php
   if(Auth::user()->hasRole('admin')) {
      $layoutDirectory = 'dashboards.admins.layouts.admin-dash-layout';
   } else {
      $layoutDirectory = 'dashboards.users.layouts.user-dash-layout';
   }
@endphp -->

@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>{{ trans('message.error_input.Whoops') }}</strong> {{ trans('message.error_input.Error_problem') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{ trans('message.Create_department')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('departments.index') }}">{{ trans('message.Back_button')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'departments.store', 'method'=>'department')) !!}
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_TH') }} :</strong>
                        {!! Form::text('department_name_th', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (ไทย)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (TH)' : 
                                            (app()->getLocale() == 'cn' ? '系名称 (中文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_EN')}}	:</strong>
                        {!! Form::text('department_name_en', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (อังกฤษ)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (EN)' : 
                                            (app()->getLocale() == 'cn' ? '部门名称 (英文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_CN')}}	:</strong>
                        {!! Form::text('department_name_cn', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (จีน)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (CN)' : 
                                            (app()->getLocale() == 'cn' ? '部门名称 (中文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ trans('message.Submit_button')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection