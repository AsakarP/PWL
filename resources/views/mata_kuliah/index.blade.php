@extends('template.app')
@section('vendor-css')
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('./assets/dashboard/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('breadcrumb')
    mata kuliah/by-kurikulum/{{ $tahunAkademik }}
@endsection
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- DataTable with Buttons -->
            <div class="card" id="card-block">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table" id="table-data">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- Add Modal -->
        <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">Add New Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="add-form" action="{{ route('mata-kuliah-store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="add-kode" class="form-label">Kode</label>
                                <input type="text" class="form-control" id="add-kode" name="add_kode" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="add-nama" name="add_nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-sks" class="form-label">SKS</label>
                                <input type="number" class="form-control" id="add-sks" name="add_sks" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-jadwal" class="form-label">Jadwal</label>
                                <input type="text" class="form-control" id="add-jadwal" name="add_jadwal" required>
                            </div>
                            <div class="mb-3">
                                <label for="add-guid-kurikulum" class="form-label">Kurikulum</label>
                                <input type="text" class="form-control" value="{{ $tahunAkademik }}" required readonly>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="add-guid-kurikulum" name="add_guid_kurikulum"
                                    value="{{ $guid }}" required readonly hidden>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add-btn">Add Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDeleteLabel">Delete Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this data?</p>
                        <p>This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="delete-form" method="get">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUpdateLabel">Update Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="update-form" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="update-kode" class="form-label">Kode</label>
                                <input type="text" class="form-control" id="update-kode" name="update_kode" required>
                            </div>
                            <div class="mb-3">
                                <label for="update-nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="update-nama" name="update_nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="update-sks" class="form-label">SKS</label>
                                <input type="number" class="form-control" id="update-sks" name="update_sks" required>
                            </div>
                            <div class="mb-3">
                                <label for="update-jadwal" class="form-label">Jadwal</label>
                                <input type="text" class="form-control" id="update-jadwal" name="update_jadwal"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add-btn">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('vendor-javascript')
    <script src="{{ asset('./assets/dashboard/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-buttons/buttons.print.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- Row Group JS -->
    <script src="{{ asset('./assets/dashboard/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('./assets/dashboard/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}"></script>
@endsection
@section('custom-javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            let data = ({!! json_encode($dataTable) !!});
            $('#table-data').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": false,
                "data": data['original']['data'],
                "columns": [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'kode',
                        className: 'text-center'
                    },
                    {
                        data: 'nama',
                        className: 'text-center'
                    },
                    {
                        data: 'sks',
                        className: 'text-center'
                    },
                    {
                        data: 'jadwal',
                        className: 'text-center'
                    },
                    {
                        data: null,
                        title: "Actions",
                        render: function(data, type, row) {
                            return '<a role="button" class="edit-btn" style="text-decoration: none; margin-right: 10px;" data-kode="' +
                                data['kode'] +
                                '"><i class="fa-solid fa-pen" style="font-size: 15px; color: green;"></i></a>' +
                                '<a role="button" class="delete-btn" style="text-decoration: none;" data-kode="' +
                                data['kode'] +
                                '"><i class="fa-solid fa-trash" style="font-size: 15px; color: red;"></i></a>';
                        },
                        className: 'text-center',
                        "orderable": false,
                        "searchable": false

                    },
                ],
                "language": {
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "lengthMenu": "Show _MENU_ entries",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "first": "<i class='fa-solid fa-angle-double-left'></i>",
                        "last": "<i class='fa-solid fa-angle-double-right'></i>",
                        "next": "<i class='fa-solid fa-angle-right'></i>",
                        "previous": "<i class='fa-solid fa-angle-left'></i>"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
                dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [7, 10, 25, 50],
                buttons: [{
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add Mata Kuliah</span>',
                    className: "create-new btn btn-primary",
                    action: function(e, dt, node, config) {
                        $('#modalAdd').modal('show');
                    }
                }],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(e) {
                                return "Details of " + e.data().full_name
                            }
                        }),
                        type: "column",
                        renderer: function(e, t, a) {
                            a = $.map(a, function(e, t) {
                                return "" !== e.title ? '<tr data-dt-row="' + e.rowIndex +
                                    '" data-dt-column="' + e.columnIndex + '"><td>' + e.title +
                                    ":</td> <td>" + e.data + "</td></tr>" : ""
                            }).join("");
                            return !!a && $('<table class="table"/><tbody />').append(a)
                        }
                    }
                },
            }), $("div.head-label").html('<h5 class="card-title mb-0">Data Mata Kuliah</h5>');

        });

        $(document).on("click", ".edit-btn", function() {
            var row = $(this).closest("tr");
            var kode = row.find("td:eq(1)").text().trim();
            var nama = row.find("td:eq(2)").text().trim();
            var sks = row.find("td:eq(3)").text().trim();
            var jadwal = row.find("td:eq(4)").text().trim();
            $('#update-kode').val(kode);
            $('#update-nama').val(nama);
            $('#update-sks').val(sks);
            $('#update-jadwal').val(jadwal);
            $('#modalUpdate').modal('show');
            $('#update-form').attr('action', "/mata-kuliah/" + kode);
        });

        $(document).on("click", ".delete-btn", function() {
            var kode = $(this).data('kode');
            $('#modalDelete').modal('show');
            $('#delete-form').attr('action', "/mata-kuliah/" + kode);
        });
    </script>
@endsection
