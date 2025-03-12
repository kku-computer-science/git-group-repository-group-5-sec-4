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
            <div class="card-header">{{ trans('message.Edit_department')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('departments.index') }}">{{ trans('message.Back_button')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($department, ['route' => ['departments.update', $department->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_TH')}}:</strong>
                        {!! Form::text('department_name_th', null, array('placeholder' => 'Department Name TH','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_EN')}}:</strong>
                        {!! Form::text('department_name_en', null, array('placeholder' => 'Department Name EN','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{ trans('message.Deapartment_Name_CN')}}:</strong>
                        {!! Form::text('department_name_cn', null, array('placeholder' => 'Department Name CN','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('message.Submit_button')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection