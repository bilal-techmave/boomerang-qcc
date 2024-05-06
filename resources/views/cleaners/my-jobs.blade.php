@extends('layouts.main')
@section('app-title', 'My Jobs - Quality Commercial Cleaning')
@section('main-content')
<style>
        .table-btn-custom {
            padding: 5px 8px;
            margin-bottom: 3px;
        }

        .form-control::placeholder {
            color: #424242;
            opacity: 1;
        }

        .modal-header {
            border-bottom: 1px solid #ebeef5;
            background: #1699d9;
        }

        .modal-header h5 {
            color: #fff;
            font-size: 18px;
        }

        .scopeofworkContent {
            height: 300px;
            overflow: auto;
            border: 1px solid #b7b7b7;
            padding: 20px;
            border-radius: 5px;
        }

        .modal-dialog {
            max-width: 600px;
            margin: 1.75rem auto;
        }

        .btn-close {
            background: none;
            font-size: 25px;
            color: #fff;
            opacity: 1;
        }

        .btn-close:hover {
            color: #fff;
        }

        .gray-label {
            color: #777 !important;
            position: relative !important;
            display: flex !important;
        }

        .gray-label::before {
            background-color: #fff;
            border-radius: 50%;
            border: 2px solid #6c757d;
            content: "";
            display: inline-block;
            height: 18px;
            left: 0;
            margin-left: -18px;
            position: relative !important;
            transition: border .5s ease-in-out;
            outline: 0 !important;
        }

        .gray-label::after {
            position: relative !important;
        }

        .questionanswer_Row {
            padding: 15px;
        }
    </style>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Work Order</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">home</li>
                            <li class="breadcrumb-item active">Work Order
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>Work Order</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Portfolio</th>
                                    <th>Site</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Sub Type</th>
                                    <th>Schedule Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($work_orders)
                                    @foreach ($work_orders as $worder)
                                    <tr role="row" class="odd">
                                        <td>{{$worder->client->business_name??'-'}}</td>
                                        <td>{{$worder->portfolio->full_name??'-'}}</td>
                                        <td>{{$worder->site->reference??'-'}}</td>
                                        <td>{{$worder->status??'-'}}</td>
                                        <td>{{$worder->jobtype->name??'-'}}</td>
                                        <td>{{$worder->subjobtype->name??'-'}}</td>
                                        <td>{{$worder->schedule_date??'-'}}</td>
                                        <td>
                                            @if(count($worder->work_order_submit_time) > 0 && $worder->work_order_submit_time[0]->status == 'submitted')
                                                <a data-bs-toggle="modal" data-content="{{$worder->scope_of_work}}" data-bs-target="#scopeworkmodal"
                                                    class="open-ModalScopeOfWork btn-info btn table-btn-custom   " href="##"
                                                    ata-toggle="tooltip" data-placement="top" title="Scope of Work"><i
                                                        class="fas fa-eye"></i></a>
                                            @else
                                                @if(count($worder->work_order_submit_time) > 0)
                                                    <a data-bs-toggle="modal" data-bs-target="#uploadbeforephoto"
                                                    class="open-ModalBeforePhotos btn-success btn table-btn-custom   "
                                                    href="#modalBeforePhotos" @if(count($worder->work_order_submit_time) > 0) data-submit_id="{{$worder['work_order_submit_time'][0]->id}}" @endif  data-placement="top" title="Upload Before Photos"><i
                                                        class="fas fa-upload"></i></a>

                                                    <a data-bs-toggle="modal" data-bs-target="#uploadafterphoto"
                                                    class="open-ModalAfterPhotos btn-warning btn table-btn-custom   "
                                                    href="#modalAfterPhotos" @if(count($worder->work_order_submit_time) > 0) data-submit_id="{{$worder['work_order_submit_time'][0]->id}}" @endif data-placement="top" title="Upload After Photos"><i
                                                        class="fas fa-upload"></i></a>

                                                        @foreach($worder['work_order_submit_time'] as $submit_time)
                                                            @php
                                                                $beforeImageExists = false;
                                                                $afterImageExists = false;
                                                            @endphp

                                                            @foreach($submit_time['before_image'] as $before_image)
                                                                @if($before_image['image_tbl'] == 'work-order')
                                                                    @php $beforeImageExists = true; @endphp
                                                                @endif
                                                            @endforeach

                                                            @foreach($submit_time['after_image'] as $after_image)
                                                                @if($after_image['image_tbl'] == 'work-order')
                                                                    @php $afterImageExists = true; @endphp
                                                                @endif
                                                            @endforeach

                                                            @if($beforeImageExists && $afterImageExists)
                                                                <a data-bs-toggle="modal" data-bs-target="#finishJob"
                                                                    class="open-ModalFinishJob btn-danger btn table-btn-custom"
                                                                    href="#modalFinishJob" data-site_code="{{$worder['site']->internal_code}}" 
                                                                    @if($submit_time) 
                                                                        data-submit_id="{{$submit_time->id}}" 
                                                                    @endif  
                                                                    data-placement="top" title="Finish Job">
                                                                    <i class="fas fa-stopwatch"></i>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    <a data-bs-toggle="modal" data-bs-target="#modalstartshift" 
                                                    class="open-ModalStartJob btn-success btn table-btn-custom"
                                                    href="#"  data-site_code="{{$worder['site']->internal_code}}" data-work_order_id="{{$worder->id}}" data-placement="top" title="Start Job"><i
                                                    class="fas fa-stopwatch"></i></a>

                                                    <a data-bs-toggle="modal" data-bs-target="#scopeworkmodal"
                                                    class="open-ModalScopeOfWork btn-info btn table-btn-custom   " href="##"
                                                    ata-toggle="tooltip" data-placement="top" title="Scope of Work"><i
                                                        class="fas fa-eye"></i></a>
                                                @else
                                                    <a data-bs-toggle="modal" data-bs-target="#modalstartshift" 
                                                    class="open-ModalStartJob btn-success btn table-btn-custom"
                                                    href="#"  data-site_code="{{$worder['site']->internal_code}}" data-work_order_id="{{$worder->id}}" data-placement="top" title="Start Job"><i
                                                    class="fas fa-stopwatch"></i></a>

                                                    <a data-bs-toggle="modal" data-bs-target="#scopeworkmodal"
                                                    class="open-ModalScopeOfWork btn-info btn table-btn-custom   " href="##"
                                                    ata-toggle="tooltip" data-placement="top" title="Scope of Work"><i
                                                        class="fas fa-eye"></i></a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
<!-- Modal -->
<div class="modal fade" id="modalstartshift" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="myForm" action="{{ route('cleaner.startWorkShift') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="site_code" name="site_code">
                <input type="hidden" id="work_order_id" name="work_order_id">
                <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label">Upload Attachment<span class="red">*</span></label>
                                <input type="file" class="dropify" name="selfie_taken" required data-height="200" />
                            </div>
                            <div class="col-lg-6 mt-2" hidden>
                                <label class="form-label">Latitude<span class="red">*</span></label>
                                <input type="text" class="form-control latitude" name="latitude" placeholder="Latitude" required>
                            </div>
                            <div class="col-lg-6 mt-2" hidden>
                                <label class="form-label">Longitude<span class="red">*</span></label>
                                <input type="text" class="form-control longitude" name="longitude" placeholder="Longitude" required>
                            </div>
                            <div class="col-lg-12 mt-2" hidden>
                                <label class="form-label">Date Time<span class="red">*</span></label>
                                <input type="datetime-local" class="form-control" name="shift_start" value="{{ date('Y-m-d\TH:i') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal start shift end  -->


    <!-- upload before photo Modal -->
    <div class="modal fade" id="uploadbeforephoto" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Before Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><iconify-icon
                            icon="charm:cross"></iconify-icon></button>
                </div>
                <form action="{{ route('cleaner.workBeforeImage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="submit_id" name="submit_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label">Upload Attachment</label>
                                <input type="file" class="dropify" name="before_image[]" multiple required data-height="200" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_contact_btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  upload before photo  end  -->

    <!-- upload after photo Modal -->
    <div class="modal fade" id="uploadafterphoto" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload After Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><iconify-icon
                            icon="charm:cross"></iconify-icon></button>
                </div>
                <form action="{{ route('cleaner.workAfterImage') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="submit_id" name="submit_id">    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label">Upload Attachment</label>
                                <input type="file" class="dropify" name="after_image[]" multiple data-height="200">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_contact_btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  upload after photo  end  -->


    <!-- finish job  photo Modal -->
    <div class="modal fade" id="finishJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finish Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><iconify-icon
                            icon="charm:cross"></iconify-icon></button>
                </div>
                <form action="{{ route('cleaner.endWorkShift') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" class="submit_id" name="work_order_id">    
                    <input type="hidden" id="end_site_code" name="site_code">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-label">Upload Attachment<span class="red">*</span></label>
                                <input type="file" class="dropify" name="finish_salfie_taken" required data-height="200" />
                            </div>
                            <div class="col-lg-6 mt-2" hidden>
                                <label class="form-label">Latitude<span class="red">*</span></label>
                                <input type="text" class="form-control latitude" name="latitude" placeholder="Latitude">
                            </div>
                            <div class="col-lg-6 mt-2" hidden>
                                <label class="form-label">Longitude<span class="red">*</span></label>
                                <input type="text" class="form-control longitude" name="longitude" placeholder="Longitude">
                            </div>
                            <div class="col-lg-12 mt-2" hidden>
                                <label class="form-label">Date Time<span class="red">*</span></label>
                                <input type="datetime-local" class="form-control" name="shift_end" value="{{ date('Y-m-d\TH:i') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  upload after photo  end  -->

    <!-- scope of work modal start -->

    <div class="modal fade" id="scopeworkmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scope of Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><iconify-icon
                            icon="charm:cross"></iconify-icon></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-12 col-sm-12">
                            <div class="scopeofworkContent">
                                <p id="model_data_content">WED & FRID
                                    DAILY
                                    Front entry: Sweep/Vacuum and mop Entry doors: Spot clean internal and externally Walls:
                                    Spot clean throughout building Desks and work areas: Damp wipe unobstructed areas, of
                                    desk tops, sides and fronts Carpet areas: Vacuum all areas All Other floors: Vacuum and
                                    mop
                                    Rubbish:
                                    Empty bins, replace liners and wipe out bins as required, dispose of rubbish to waste
                                    bin Common area furniture: Damp wipe and vacuum as required
                                    Toilet amenities:
                                    Clean and sanitise fully. Replenish toilet requisites supplied by Council
                                    Lunch room:
                                    Damp wipe all furniture, clean benches, sink, exterior of refrigerator and dishwasher,
                                    interior and exterior of microwave. Vacuum and mop floors. Dusting: Fully dust all
                                    accessible areas Exterior: Hose and spot clean pathways and handrails if required
                                    MONTHLY
                                    Skirting boards: Damp wipe on a rotational basis throughout month
                                    THREE (3) MONTH PERIOD
                                    Partitioning Glass:
                                    Fully Clean all glass on a rotational basis throughout
                                    Marmoleum/polished Floor areas:
                                    Full buff of all areas on a rotational basis throughout
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".open-ModalScopeOfWork").click(function(){
            $("#model_data_content").text('');
            let contentData= $(this).attr('data-content');
            $("#model_data_content").text(contentData);
        })
    </script>

<!-- Dropify CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Dropify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>

<script>
    $(document).ready(function() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.log("Geolocation is not available in this browser.");
        }
        function successCallback(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log("Latitude: " + latitude + ", Longitude: " + longitude);
            $('.latitude').val(latitude);
            $('.longitude').val(longitude);
        }
        function errorCallback(error) {
            $("#result").text("Error getting location: " + error.message);
            console.log("Error getting location: " + error.message);
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.open-ModalStartJob').click(function() {
            var site_code = $(this).data('site_code');
            $('#site_code').val(site_code);
        });
        $('.open-ModalStartJob').click(function() {
            var work_order_id = $(this).data('work_order_id');
            $('#work_order_id').val(work_order_id);
        });
        $('.open-ModalFinishJob').click(function() {
            var site_code = $(this).data('site_code');
            $('#end_site_code').val(site_code);
        });
        $('.open-ModalBeforePhotos').click(function() {
            var submit_id = $(this).data('submit_id');
            $('.submit_id').val(submit_id);
        });
        $('.open-ModalAfterPhotos').click(function() {
            var submit_id = $(this).data('submit_id');
            $('.submit_id').val(submit_id);
        });
        $('.open-ModalFinishJob').click(function() {
            var submit_id = $(this).data('submit_id');
            $('.submit_id').val(submit_id);
        });
    });
</script>
@endpush