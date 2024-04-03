@extends('frontend.temp.main')
@section('content')
<!--begin::Team Section-->
<div class="py-10 py-lg-20">
    <!--begin::Container-->
    <div class="container" id="viewFrame">
        <!--begin::Heading-->
        <div class="text-center mb-12">
            <!--begin::Title-->
            <h3 class="fs-2hx text-gray-900 mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">Destinasi trending</h3>
            <!--end::Title-->
            <!--begin::Sub-title-->
            <div class="fs-5 text-muted fw-bold">Pilihan terpopuler untuk traveler dari Indonesia</div>
            <!--end::Sub-title=-->
        </div>
        <!--end::Heading-->
        <!--begin::Slider-->
        <div class="tns tns-default" style="direction: ltr">
            <!--begin::Wrapper-->
            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
                <!--begin::Item-->
                <div class="text-center">
                    <!--begin::Photo-->
                    <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/img/wilayah/jakarta.jpeg')"></div>
                    <!--end::Photo-->
                    <!--begin::Person-->
                    <div class="mb-0">
                        <!--begin::Name-->
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Jakarta</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="text-muted fs-6 fw-semibold mt-1">Indonesia</div>
                        <!--begin::Position-->
                    </div>
                    <!--end::Person-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center">
                    <!--begin::Photo-->
                    <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/img/wilayah/bandung.jpeg')"></div>
                    <!--end::Photo-->
                    <!--begin::Person-->
                    <div class="mb-0">
                        <!--begin::Name-->
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Bandung</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="text-muted fs-6 fw-semibold mt-1">Indonesia</div>
                        <!--begin::Position-->
                    </div>
                    <!--end::Person-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center">
                    <!--begin::Photo-->
                    <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/img/wilayah/ubud.jpeg')"></div>
                    <!--end::Photo-->
                    <!--begin::Person-->
                    <div class="mb-0">
                        <!--begin::Name-->
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Ubud</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="text-muted fs-6 fw-semibold mt-1">Indonesia</div>
                        <!--begin::Position-->
                    </div>
                    <!--end::Person-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center">
                    <!--begin::Photo-->
                    <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/img/wilayah/yogyakarta.jpeg')"></div>
                    <!--end::Photo-->
                    <!--begin::Person-->
                    <div class="mb-0">
                        <!--begin::Name-->
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Yogyakarta</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="text-muted fs-6 fw-semibold mt-1">Indonesia</div>
                        <!--begin::Position-->
                    </div>
                    <!--end::Person-->
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="text-center">
                    <!--begin::Photo-->
                    <div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/img/wilayah/singapura.jpeg')"></div>
                    <!--end::Photo-->
                    <!--begin::Person-->
                    <div class="mb-0">
                        <!--begin::Name-->
                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Singapura</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="text-muted fs-6 fw-semibold mt-1">Singapura</div>
                        <!--begin::Position-->
                    </div>
                    <!--end::Person-->
                </div>
                
            </div>
            <!--end::Wrapper-->
            <!--begin::Button-->
            <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                <i class="ki-duotone ki-left fs-2x"></i>
            </button>
            <!--end::Button-->
            <!--begin::Button-->
            <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                <i class="ki-duotone ki-right fs-2x"></i>
            </button>
            <!--end::Button-->
        </div>
        <!--end::Slider-->
    </div>
    <!--end::Container-->
</div>
<!--end::Team Section-->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content" id="kt_block_ui_1_target">
            <div class="modal-header">
                <h3 class="modal-title">Booking</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <img src="..." class="img-thumbnail" id="imageHotel" alt="...">
                <div class="mb-3 mt-4">
                    <label class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control tanggalflat" value="<?= date("Y-m-d") ?>"  id="tgl_booking" name="tgl_booking">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Orang</label>
                    <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" id="modal_close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="booknow">Book now</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("footer")
<script>
    let id_selected;
    var target = document.querySelector("#kt_block_ui_1_target");
    var blockUI = new KTBlockUI(target);

    $(".tanggalflat").flatpickr();
    $(document).on("click", "#Cari", function(e) {
        $("#viewFrame").load("/show-result-search?name=" + $("#nama").val() + "&tgl=" + $("#tanggal").val() + "&orang=" + $("#orang").val() )
    })

    $(document).on("click", "#book", function() {
        id_selected = $(this).data("id")
        $("#imageHotel").attr("src", $(this).data("img"));
    })

    $(document).on("click", "#booknow", function(){
        blockUI.block();
        const varurl = "<?= url("/book-now") ?>";
        $.ajax({
            url: varurl,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id_selected,
                tgl_booking : $("#tgl_booking").val(),
                jumlah_orang : $("#jumlah_orang").val()
            },
            success: function(response) {
                if (response.code == "200") {
                    window.location.href = window.location.protocol + "//" + window.location.host + "/my-booking";
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
</script>
@endsection
		