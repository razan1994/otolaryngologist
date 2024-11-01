@extends('admin.layouts.app')

<!-- DataTable -->
<link href="{{ asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<!-- DataTable-->

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Appointments</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('super_admin.dashboard') }}">
                            <span class="mdi mdi-home"></span> dashboard
                        </a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Full Name</th>
                                <th>Treatment</th>
                                <th>Phone no</th>
                                <th>Date</th>
                                <th>Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($requests as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                <td>

                                    <a href="{{ route('super_admin.contact_us-showrequest', $item->id) }}"
                                        class="mb-1 btn btn-sm btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('super_admin.contact_us-destroyrequest', $item->id) }}"
                                            class="confirm mb-1 btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin_javascript')
 <!--Datatable-->
<script src="{{ asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!--Datatable-->
@stop
