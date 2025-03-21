@extends('layouts.layout')
@section('content')

@php use App\Helpers\TranslateHelper; @endphp

<div class="container refund">
    <p>{{ __('message.project_service') }}</p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">{{ __('message.no') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('message.year') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('message.project_name') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('message.details') }}</th>
                    <th class="col-md-2" style="font-weight: bold;">{{ __('message.project_responsible') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('message.status') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)+543}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{$re->project_name}}
                    </td>
                    <td>
                        <div style="padding-bottom: 10px">
                            @if ($re->project_start != null)
                                <span style="font-weight: bold;">
                                    {{ __('message.project_duration') }}
                                </span>
                                <span style="padding-left: 10px;">
                                    @php
                                        $locale = app()->getLocale() == 'cn' ? 'zh_CN' : app()->getLocale(); // ตรวจสอบภาษาจีน
                                        $start_date = \Carbon\Carbon::parse($re->project_start)->locale($locale)->translatedFormat('j F Y');
                                        $end_date = \Carbon\Carbon::parse($re->project_end)->locale($locale)->translatedFormat('j F Y');
                                    @endphp
                                    {{ $start_date }} {{ __('message.to') }} {{ $end_date }}
                                </span>
                            @else
                                <span style="font-weight: bold;">
                                    {{ __('message.project_duration') }}
                                </span>
                                <span></span>
                            @endif
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.research_fund_type') }}</span>
                            <span style="padding-left: 10px;">
                                @if (!is_null($re->fund)) 
                                    {{ $re->fund->{'fund_type_' . app()->getLocale()} ?? $re->fund->fund_type }}
                                @endif
                            </span>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.funding_agency') }}</span>
                            <span style="padding-left: 10px;">
                                @if (!is_null($re->fund)) 
                                    {{ $re->fund->{'support_resource_' . app()->getLocale()} ?? $re->fund->support_resource }}
                                @endif
                            </span>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.responsible_department') }}</span>
                            <span style="padding-left: 10px;">
                                {{ $re->{'responsible_department_' . app()->getLocale()} ?? $re->responsible_department }}
                            </span>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.budget_allocated') }}</span>
                            <span style="padding-left: 10px;"> 
                                {{ number_format($re->budget) }} {{ __('message.baht') }}
                            </span>
                        </div>

                    </td>

                    <td style="vertical-align: top;text-align: left;">
                    <div style="padding-bottom: 10px;">
                        <span>
                            @foreach($re->user as $user)
                                @if(app()->getLocale() == 'th')
                                    {{ $user->position_th }} {{ $user->fname_th }} {{ $user->lname_th }}
                                @elseif(app()->getLocale() == 'cn')
                                    {{ $user->position_cn }} {{ $user->fname_cn }} {{ $user->lname_cn }}
                                @else
                                    {{ $user->position_en }} {{ $user->fname_en }} {{ $user->lname_en }} <!-- กรณี fallback -->
                                @endif
                                <br>
                            @endforeach
                        </span>
                    </div>

                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">{{ __('message.submitted') }}</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">{{ __('message.in_progress') }}</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">{{ __('message.closed') }}</label></h6>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function() {

        var table1 = $('#example1').DataTable({
            responsive: true,
            language: {
                search: "{{ __('message.search') }}" ,
                lengthMenu: "{{ __('message.show_entries', ['entries' => '_MENU_']) }}",
                info: "{{ __('message.showing_entries', ['start' => '_START_', 'end' => '_END_', 'total' => '_TOTAL_']) }}",
                paginate: {
                    first: "{{ __('message.first') }}",
                    last: "{{ __('message.last') }}",
                    next: "{{ __('message.next') }}",
                    previous: "{{ __('message.previous') }}"
                }
            }
        });
    });
</script>

@stop
