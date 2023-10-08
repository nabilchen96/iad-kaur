@extends('backend.app')
@push('style')
    <style>
        #myTable_filter input {
            height: 29.67px !important;
        }

        #myTable_length select {
            height: 29.67px !important;
        }

        .btn {
            border-radius: 50px !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #9e9e9e21 !important;
        }

        th, td{
            white-space: nowrap !important;
        }
    </style>
@endpush
@section('content')
    <div class="row" style="margin-top: -200px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 col-xl-8 mb-xl-0">
                    <h3 class="font-weight-bold text-white">Data Pengajuan Judul</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal">
                        Tambah
                    </button>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-bordered" style="width: 100%;">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Peneliti</th>
                                    <th>Jenis Penelitian</th>
                                    <th>Sub Topik Penelitian</th>
                                    <th>Pelaksanaan Penelitian</th>
                                    <th width="5%"></th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        Sistem Informasi Penelitian dan Pengabdian Kepada Masyarakat
                                    </td>
                                    <td>
                                        Dosen 1
                                    </td>
                                    <td>
                                        Terapan
                                    </td>
                                    <td>
                                        Aviation of Learning Technology
                                    </td>
                                    <td>
                                        kelompok
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)">
                                            <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)">
                                            <i style="font-size: 1.5rem;" class="text-danger bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $("#myTable").DataTable({
            "ordering": false,
            scrollX: true,
            scrollCollapse: true,
        })
    </script>
@endpush
