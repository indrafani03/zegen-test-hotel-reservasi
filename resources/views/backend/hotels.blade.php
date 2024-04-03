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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Hotels</h1>
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
                        <li class="breadcrumb-item text-muted">Hotels</li>
                        <!--end::Item-->
            
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" id="add" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Add data</a>
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Kota</th>
                                    <th>Alamat</th>
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
                    <h3 class="modal-title">Form Hotel</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Kota</label>
                        <select class="form-select" aria-label="Select example" id="lokasi" name="lokasi">
                            <option value="1-Jakarta">Jakarta</option>
                            <option value="2-Bandung">Bandung</option>
                            <option value="3-Bali">Bali</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <img src="" class="img-thumbnail" alt="" id="viewImage" style="display:none;">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" placeholder="" id="alamat" name="alamat" style="height: 100px"></textarea>
                            
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
            url: "<?= url("/load-ajax-hotels") ?>",
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
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'gambar',
                name: 'gambar'
            },
            {
                data: 'nama_lokasi',
                name: 'nama_lokasi'
            },
            {
                data: 'alamat',
                name: 'alamat'
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
    const varurl = "<?= url("/simpan-hotel") ?>";
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


$(document).on("click", "#save", function(){
    blockUI.block();
    const varurl = "<?= url("/simpan-user") ?>";
    $.ajax({
        url: varurl,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $("#id").val(),
            name : $("#name").val(),
            email : $("#email").val(),
            password : $("#password").val(),
            type : $("#type").val()

        },
        success: function(response) {
            if (response.code == "200") {
                $("#modal_close").click();
                table.draw()
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
            blockUI.release();
        },
        error: function(error) {
            console.log(error);
        }
    });
})

$(document).on("click", "#edit", function() {

    

    const id = $(this).data("id");
    const nama = $(this).data("nama");
    const id_lokasi = $(this).data("id_lokasi");
    const nama_lokasi = $(this).data("nama_lokasi");
    const image = $(this).data("image");
    const alamat = $(this).data("alamat");

    $("#id").val(id)
    $("#name").val(nama)
    $("#id_lokasi").val(id_lokasi+"-"+nama_lokasi)
    $("#viewImage").show();
    $("#viewImage").attr("src", image);
    $("#alamat").val(alamat)
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
            const varurl = "<?= url("/hapus-hotel") ?>";
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

$(document).on("click", "#add", function() {
    $("#id").val("")
    $("#name").val("")
    $("#id_lokasi").val("")
    $("#viewImage").hide("");
    $("#viewImage").attr("src", "");
    $("#alamat").val("")
})

</script>
@endsection