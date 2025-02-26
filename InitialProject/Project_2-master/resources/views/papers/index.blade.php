@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">{{ trans('message.Published_research_navbar_title') }}</h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('papers.create') }}"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.Add_published_research') }} </a>
                @if (Auth::user()->hasRole('teacher'))
                    <!-- <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('callscopus', Auth::user()->id) }}"><i class="mdi mdi-refresh btn-icon-prepend"></i> Call Paper</a> -->

                    <!-- เพิ่มการเรียก API ของทั้งหมดของทุกตัว -->
                    <a class="btn btn-primary btn-icon-text btn-sm mb-3"
                        href="{{ route('callallpapers', Crypt::encrypt(Auth::user()->id)) }}"><i
                            class="mdi mdi-refresh btn-icon-prepend icon-sm"></i>
                        {{ trans('message.Call_paper_allAPI') }}</a>

                    <a class="btn btn-primary btn-icon-text btn-sm mb-3"
                        href="{{ route('callscopus', Crypt::encrypt(Auth::user()->id)) }}">
                        <i class="mdi mdi-refresh btn-icon-prepend icon-sm"></i>
                        {{ trans('message.Call_paper_scopus') }}</a>

                    <!-- เพิ่มการเรียก API ของ Google Scholar -->
                    <a class="btn btn-primary btn-icon-text btn-sm mb-3"
                        href="{{ route('callgooglescholar', Crypt::encrypt(Auth::user()->id)) }}">
                        <i class="mdi mdi-refresh btn-icon-prepend icon-sm"></i>
                        {{ trans('message.Call_paper_googlescholar') }}</a>

                    <!-- เพิ่มการเรียก API ของ Web of Science หลังจากเรียก Google Scholar -->
                    <a class="btn btn-primary btn-icon-text btn-sm mb-3"
                        href="{{ route('callwos', Crypt::encrypt(Auth::user()->id)) }}">
                        <i class="mdi mdi-refresh btn-icon-prepend icon-sm"></i> {{ trans('message.Call_paper_wos') }}
                    </a>
                @endif
                <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.Published_research_no') }}</th>
                            <th>{{ trans('message.Published_research_title') }}</th>
                            <th>{{ trans('message.Published_research_type') }}</th>
                            <th>{{ trans('message.Published_research_year') }}</th>
                            <!-- <th>ผู้เขียน</th>   -->
                            <!-- <th>Source Title</th> -->
                            <th>{{ trans('message.Published_research_API_fetch_date') }}</th>
                            <th width="280px">{{ trans('message.Published_research_action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($papers->sortByDesc('paper_yearpub') as $i => $paper)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ Str::limit($paper->paper_name, 50) }}</td>
                                    <td>
                                        @if (App::getLocale() == 'th')
                                            @if ($paper->paper_type == 'Journal')
                                                {{ trans('message.Published_research_journal') }}
                                            @elseif($paper->paper_type == 'Conference Proceeding')
                                                {{ trans('message.Published_research_conference') }}
                                            @elseif($paper->paper_type == 'Book Series')
                                                {{ trans('message.Published_research_book_series') }}
                                            @elseif($paper->paper_type == 'Book')
                                                {{ trans('message.Published_research_book') }}
                                            @endif
                                        @elseif(App::getLocale() == 'en')
                                            @if ($paper->paper_type == 'Journal')
                                                {{ trans('message.Published_research_journal') }}
                                            @elseif($paper->paper_type == 'Conference Proceeding')
                                                {{ trans('message.Published_research_conference') }}
                                            @elseif($paper->paper_type == 'Book Series')
                                                {{ trans('message.Published_research_book_series') }}
                                            @elseif($paper->paper_type == 'Book')
                                                {{ trans('message.Published_research_book') }}
                                            @endif
                                        @elseif(App::getLocale() == 'cn')
                                            @if ($paper->paper_type == 'Journal')
                                                {{ trans('message.Published_research_journal') }}
                                            @elseif($paper->paper_type == 'Conference Proceeding')
                                                {{ trans('message.Published_research_conference') }}
                                            @elseif($paper->paper_type == 'Book Series')
                                                {{ trans('message.Published_research_book_series') }}
                                            @elseif($paper->paper_type == 'Book')
                                                {{ trans('message.Published_research_book') }}
                                            @endif
                                        @endif

                                    </td>
                                    <td>{{ $paper->paper_yearpub }}</td>
                                    <!-- <td>
    @foreach ($paper->teacher->take(1) as $teacher)
    {{ $teacher->fname_en }} {{ $teacher->lname_en }},
    @endforeach
                                        @foreach ($paper->author->take(1) as $teacher)
    {{ $teacher->author_fname }} {{ $teacher->author_lname }}
                                        @if (!$loop->last)
    ,
    @endif
    @endforeach
    </td> -->
                                    <!-- <td>{{ Str::limit($paper->paper_sourcetitle, 50) }}</td> -->

                                    <td>{{ $paper->created_at }}</td>

                                    <td>
                                        <form action="{{ route('papers.destroy', $paper->id) }}" method="POST">

                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="{{ route('papers.show', $paper->id) }}"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            @if (Auth::user()->can('update', $paper))
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="{{ route('papers.edit', Crypt::encrypt($paper->id)) }}"><i
                                                            class="mdi mdi-pencil"></i></a>
                                                </li>
                                            @endif
                                            <!-- @csrf
                                            @method('DELETE')
                                            <li class="list-inline-item">
                                             <button class="btn btn-outline-danger btn-sm show_confirm" type="submit"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                     class="mdi mdi-delete"></i></button>
                                            </li> -->
                                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    <tbody>
                </table>
                <br>

                <!-- </div> -->
                <br>

            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
    <script>
        $(document).ready(function() {
            var table1 = $('#example1').DataTable({
                responsive: true,
                language: {
                    "emptyTable": "{{ trans('message.No_data_avalible') }}",
                    "info": "{{ trans('message.info') }}",
                    "infoEmpty": "{{ trans('message.infoEmpty') }}",
                    "infoFiltered": "{{ trans('message.infoFiltered') }}",
                    "lengthMenu": "{{ trans('message.lengthMenu') }}",
                    "search": "{{ trans('message.search') }}",
                    "paginate": {
                        "next": "{{ trans('message.Next') }}",
                        "previous": "{{ trans('message.Previous') }}"
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `{{ trans('message.Fund_warning_delete.warning_title') }}`,
                    text: "{{ trans('message.Fund_warning_delete.warning_text') }}",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Delete Successfully", {
                            icon: "success",
                        }).then(function() {
                            location.reload();
                            form.submit();
                        });
                    }
                });
        });
    </script>
@stop
