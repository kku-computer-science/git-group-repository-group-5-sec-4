@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('content')
<!-- <div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div>
            <h2>ความเชี่ยวชาญ</h2>
        </div>
        <br />
    </div>
</div> -->
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-expertise" data-toggle="modal">Add
                Expertise</a>
        </div>
    </div>
</div> -->
<!-- <br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p id="msg">{{ $message }}</p>
</div>
@endif -->
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">{{ trans('message.Manage_Expertise_navbar_title')}} </h4>
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ trans('message.Expertise_no')}} </th>
                        @if(Auth::user()->hasRole('admin'))
                        <th>{{ trans('message.Expertise_teacher_name')}}</th>
                        @endif
                        <th>{{ trans('message.Expertise_name')}}</th>

                        <th>{{ trans('message.Expertise_action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experts as $i => $expert)
                    <tr id="expert_id_{{ $expert->id }}">
                        <td>{{ $i+1 }}</td>
                        @if(Auth::user()->hasRole('admin'))
                        <td>
                            {{ $expert->user->{'fname_' . app()->getLocale()} ?? $expert->user->fname_en }} 
                            {{ $expert->user->{'lname_' . app()->getLocale()} ?? $expert->user->lname_en }}
                        </td>
                        @endif

                        <!-- แสดงชื่อความเชี่ยวชาญตามภาษา -->
                        <td>
                            <p>{{ $expert->{'expert_name_' . app()->getLocale()} ?? $expert->expert_name_en }}</p>
                        </td>


                        <td>
                            <form action="{{ route('experts.destroy',$expert->id) }}" method="POST">
                                <!-- <a class="btn btn-info" id="show-expertise" data-toggle="modal" data-id="{{ $expert->id }}">Show</a> -->
                                <li class="list-inline-item">
                                    <!-- <a class="btn btn-success btn-sm rounded-0" href="javascript:void(0)" id="edit-expertise" type="button" data-toggle="modal" data-placement="top" data-id="{{ $expert->id }}" title="Edit"><i class="fa fa-edit"></i></a> -->
                                    <a class="btn btn-outline-success btn-sm" id="edit-expertise" type="button" data-toggle="modal" data-id="{{ $expert->id }}" data-placement="top" title="Edit" href="javascript:void(0)"><i class="mdi mdi-pencil"></i></a>

                                </li>

                                <!-- <a href="javascript:void(0)" class="btn btn-success" id="edit-expertise" data-toggle="modal" data-id="{{ $expert->id }}">Edit </a> -->
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <li class="list-inline-item">
                                    <button class="btn btn-outline-danger btn-sm show_confirm" id="delete-expertise" type="submit" data-id="{{ $expert->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>

                                </li>
                                <!-- <a id="delete-expertise" data-id="{{ $expert->id }}" class="btn btn-danger delete-user">Delete</a> -->

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add and Edit expertise modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="expertiseCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="expForm" action="{{ route('experts.store') }}" method="POST">
                    <input type="hidden" name="exp_id" id="exp_id">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        @php
                            $locale = app()->getLocale();
                            $labels = [
                                'en' => ['Name in Thai', 'Name in English', 'Name in Chinese'],
                                'th' => ['ชื่อภาษาไทย', 'ชื่อภาษาอังกฤษ', 'ชื่อภาษาจีน'],
                                'cn' => ['泰文名', '英文名', '中文名称']
                            ];
                        @endphp

                        <div class="form-group">
                            <strong>{{ $labels[$locale][0] }} :</strong>
                            <input type="text" name="expert_name_th" id="expert_name_th" class="form-control" placeholder="{{ $labels[$locale][0] }}" onchange="validate()">

                            <strong>{{ $labels[$locale][1] }} :</strong>
                            <input type="text" name="expert_name_en" id="expert_name_en" class="form-control" placeholder="{{ $labels[$locale][1] }}" onchange="validate()">

                            <strong>{{ $labels[$locale][2] }} :</strong>
                            <input type="text" name="expert_name_cn" id="expert_name_cn" class="form-control" placeholder="{{ $labels[$locale][2] }}" onchange="validate()">
                        </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary " disabled>{{ trans('message.Submit_button')}}</button>
                            <a href="{{ route('experts.index') }}" class="btn btn-danger">{{ trans('message.Cancle_button')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js" defer></script>
<script>
    $(document).ready(function() {
        var table1 = $('#example1').DataTable({

            order: [
                [1, 'asc']
            ],
            rowGroup: {
                dataSrc: 1
            },
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /* When click New expertise button */
        $('#new-expertise').click(function() {
            $('#btn-save').val("create-expertise");
            $('#expertise').trigger("reset");
            $('#expertiseCrudModal').html("{{ trans('message.Add_new_expertise') }}");
            $('#crud-modal').modal('show');
        });

        /* Edit expertise */
        $('body').on('click', '#edit-expertise', function() {
            var expert_id = $(this).data('id');
            $.get('experts/' + expert_id + '/edit', function(data) {
                $('#expertiseCrudModal').html("{{ trans('message.Edit_expertise') }}");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#exp_id').val(data.id);
                $('#expert_name').val(data.expert_name);
                $('#expert_name_th').val(data.expert_name_th);
                $('#expert_name_cn').val(data.expert_name_cn);

            })
        });


        /* Delete expertise */
        $('body').on('click', '#delete-expertise', function(e) {
            var expert_id = $(this).data("id");
            
            var token = $("meta[name='csrf-token']").attr("content");
            e.preventDefault();
            //confirm("Are You sure want to delete !");
            swal({
                title: `{{ trans('message.Fund_warning_delete.warning_title') }}`,
                text: "{{ trans('message.Fund_warning_delete.warning_text') }}",
                type: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("{{ trans('message.Delete_successfully') }}", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        $.ajax({
                            type: "DELETE",
                            url: "experts/" + expert_id,
                            data: {
                                "id": expert_id,
                                "_token": token,
                            },
                            success: function(data) {
                                $('#msg').html('{{ trans('message.Program_entry_deleted') }}');
                                $("#expert_id_" + expert_id).remove();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    });

                }

                });
        });
    });
</script>

<script>
    error = false

    function validate() {
        if (document.expForm.expert_name.value != '')
            document.expForm.btnsave.disabled = false
        else
            document.expForm.btnsave.disabled = true
    }
</script>
@stop