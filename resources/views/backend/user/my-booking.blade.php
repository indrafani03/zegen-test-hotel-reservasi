@extends('backend.temp.main')
@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">My Booking</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Menu</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">My Booking</li>
                        <!--end::Item-->
            
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800">
                                    <th>Hotel</th>
                                    <th>User</th>
                                    <th>Tgl</th>
                                    <th>Jumlah Orang</th>
                                    <th>Status</th>
                                    <th>CreateAt</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content" id="kt_block_ui_1_target">
                <form id="formhotel" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h3 class="modal-title">Form Booking</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                        <div class="mb-3 mt-4">
                        <label class="form-label">Tanggal Booking</label>
                        <input type="date" class="form-control tanggalflat" value=""  id="tgl_booking" name="tgl_booking">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Orang</label>
                        <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Cancel</label>
                        <select class="form-select" aria-label="Select example" id="status" name="status">
                            <option value="1">No</option>
                            <option value="3">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" id="modal_close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
var table;
var target = document.querySelector("#kt_block_ui_1_target");
var blockUI = new KTBlockUI(target);

$(document).ready(function() {
    table = $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        ajax: {
            url: "<?= url("/load-ajax-my-booking") ?>",
            data: function(d) {

            },
        },
        searching: true,
        dom: 'lBfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],

        columns: [{
                data: 'nama_hotel',
                name: 'nama_hotel'
            },
            {
                data: 'nama_user',
                name: 'nama_user'
            },
            {
                data: 'tgl_book',
                name: 'tgl_book'
            },
            {
                data: 'jumlah_orang',
                name: 'jumlah_orang'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row, meta) {
                    return moment.utc(data).local().format('DD/MM/YYYY HH:mm:ss');
                }
            },
            {
                data: 'aksi',
                name: 'aksi'
            }
        ]
    })
})
$('#formhotel').on('submit', (function(e) {
    e.preventDefault();
    const varurl = "<?= url("/my-booking-update") ?>";
        $.ajax({
            url: varurl,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                if (response.code == "200") {
                    $("#modal_close").click();
                    table.draw()
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                blockUI.release();
                console.log(response)
            },
            error: function(error) {
                console.log(error);
            }
        });
}));




$(document).on("click", "#edit", function() {
    const id = $(this).data("id");
    const tgl_booking = $(this).data("tgl_booking");
    const jumlah_orang = $(this).data("jumlah_orang");
    $("#id").val(id)
    $("#tgl_booking").val(tgl_booking)
    $("#jumlah_orang").val(jumlah_orang)

})


$(document).on("click", "#hapus", function() {
    const id = $(this).data("id");
    Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            const varurl = "<?= url("/report-hapus-booking-hotel") ?>";
            $.ajax({
                url: varurl,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.code == "200") {
                        table.draw()
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
})



</script>
@endsection