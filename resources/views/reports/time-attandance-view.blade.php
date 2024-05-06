@extends('layouts.main')
@section('app-title', 'Time Attendance View- Quality Commercial Cleaning')
@section('main-content')
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
.action_btns_for {
  position: absolute;
  bottom: 10px;
  top: auto !important;
  right: 36px;
  z-index: 99;
}
.image_box_main .magnific-img .fa.fa-search-plus {
  position: absolute;
  position: absolute;
    bottom: 2px;
    right: 8px;
    color: #fff;
    z-index: 999;
    background: #028fc4;
    padding: 5px;
}
a.image-popup-vertical-fit {
  cursor: pointer;
  z-index: 99;
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.action_btns_for a {
  color: #fff;
  background: #028fc4;
  padding: 5px;
}
.contain .item {
  margin-right: 0px;
  position: relative;
  margin-right: 15px;
}
.magnific-img img{
    height: 250px !important;
}
.magnific-img img {
	height: 200px !important;
	width: 200px;
	object-fit: cover;
}
</style>
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Time Attendance View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Operational Dashboard</li>
                        <li class="breadcrumb-item active">Time Attendance View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="main_bx_dt__">
                        <div class="top_dt_sec p-0">
                            <div class="row">
                                @php
                                    $from_time = strtotime($attendance->shift_start);
                                    $to_time   = strtotime($attendance->shift_end);
                                    $min =  round(abs($to_time - $from_time) / 60,2);

                                    $minrate = ($attendance->clientsiteshift->hourly_rate??0)/60;
                                    $total_pay = $min*$minrate;
                                @endphp
                                <div class="col-lg-12 mb-2 ">
                                    <div class="title_head">
                                        <h4>{{$attendance->site->client->business_name ??''}}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 border-right-dashed">
                                    <div class="detail_box pe-4 ">
                                        <ul>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Site Reference</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->site->reference ??''}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Date Start</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->shift_start}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Distance from site on start</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->start_distance ??''}}<b>m</b></h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Allocated Hours</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->clientsiteshift->total_hours ?? '0'}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Total Payable</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{round($total_pay,2)??'0'}}</h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="detail_title">
                                                    <h6>Date Finish </h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6> {{$attendance->shift_end}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Distance from site on finish:</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->end_distance ??''}}<b>m</b></h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="detail_title">
                                                    <h6>Cleaner Name </h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>{{$attendance->cleaner->name ??''}}</h6>
                                                </div>
                                            </li>

                                        </ul>
                                        {{-- <div class="detail_box">
                                            <h6>Final shift comment </h6>
                                            <p></p>
                                        </div> --}}
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="detail_box ps-4">
                                        <ul>

                                            <li>
                                                <div class="detail_title">
                                                    <h6>Worked Hours</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>
                                                        @php
                                                        $hours = floor($min / 60);
                                                        $minutes = ($min % 60);
                                                    @endphp
                                                    {{$hours.".".$minutes}}
                                                    </h6>
                                                </div>
                                            </li>
                                            @isset($question)
                                                @foreach ($question as $question_ans)
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>{{$question_ans->question ??''}}</h6>
                                                        </div>
                                                        <div class="detail_ans" style="text-align: right;">
                                                            @if ($question_ans->answer == 'yes')
                                                                <h6>{{Str::ucfirst($question_ans->answer??'')}}</h6>
                                                            @else
                                                            <h6>{{$question_ans->answer ??''}}<p>{{Str::ucfirst(substr($question_ans->other_answer,0,20) ??'')}}</p></h6>

                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endisset

                                            {{-- <li>
                                                <div class="detail_title">
                                                    <h6>All windows cleaned </h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>Yes</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Was all surfaces dusted ?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6> Yes</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Was the kitchen cleaned </h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>Yes</h6>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="detail_title">
                                                    <h6>Date Rejected</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>Yes</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Distance Rejected</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>No</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Hours Rejected</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>No</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Was all waste removed ?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>Yes</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>All toilets cleaned ? </h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <h6>Yes</h6>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>

                                </div>


                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Before Photos</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contain" style="display: flex;">
                                @if(isset($beforeImages) && $beforeImages->count() > 5)
                                <div id="owl-carousel" class="before_after_slider owl-carousel owl-theme">
                                        @foreach ($beforeImages as $before)
                                            <div class="item mx-1" id="img_div__{{$before->id}}" >
                                                <div class="image_box_main">
                                                    <div class="images_box">
                                                        <div class="magnific-img">
                                                            <a class="image-popup-vertical-fit"
                                                                href="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                title="Before">
                                                                <img src="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                    alt="9.jpg" />
                                                                <i class="fa fa-search-plus"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="action_btns_for">
                                                        <a href="javascript:void(0)"
                                                            class="download_btn"><i
                                                                class="uil-down-arrow "></i></a>
                                                        <a href="javascript:void(0)"
                                                            onclick="deleteRecordTbl('{{ $before->id }}','client_site_shift_cleaner_images','img_div__{{$before->id}}')"
                                                            class="trash_btn"><i
                                                                class="uil-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                @else
                                @isset($beforeImages)


                                @foreach ($beforeImages as $before)
                                        <div class="item mx-1" style="width: auto;" id="img_div__{{$before->id}}" >
                                            <div class="image_box_main">
                                                <div class="images_box">
                                                    <div class="magnific-img">
                                                        <a class="image-popup-vertical-fit"
                                                            href="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                            title="Before">
                                                            <img src="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                alt="9.jpg" />
                                                            <i class="fa fa-search-plus"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="action_btns_for">
                                                    <a href="javascript:void(0)"
                                                        class="download_btn"><i
                                                            class="uil-down-arrow "></i></a>
                                                    <a href="javascript:void(0)"
                                                        onclick="deleteRecordTbl('{{ $before->id }}','client_site_shift_cleaner_images','img_div__{{$before->id}}')"
                                                        class="trash_btn"><i
                                                            class="uil-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endisset
                                @endif
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="title_head">
                                <h4>After Photos</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contain" style="display: flex;">
                                @if (isset($afterImages) && $afterImages->count() > 5)
                                <div id="owl-carousel"  class="before_after_slider owl-carousel owl-theme">
                                    @isset($afterImages)
                                        @foreach ($afterImages as $after)
                                            <div class="item mx-1" style="width: auto;" id="img_div__{{$after->id}}">
                                                <div class="image_box_main">
                                                    <div class="images_box">
                                                        <div class="magnific-img">
                                                            <a class="image-popup-vertical-fit"
                                                                href="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                title="After">
                                                                <img src="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                    alt="" />
                                                                <i class="fa fa-search-plus"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="action_btns_for">
                                                        <a href="javascript:void(0)"
                                                            class="download_btn"><i
                                                                class="uil-down-arrow "></i></a>
                                                        <a href="javascript:void(0)"
                                                            onclick="deleteRecordTbl('{{ $after->id }}','client_site_shift_cleaner_images','img_div__{{$before->id}}')"
                                                            class="trash_btn"><i
                                                                class="uil-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                @else
                                @isset($afterImages)
                                        @foreach ($afterImages as $after)
                                            <div class="item mx-1" style="width:20%;" id="img_div__{{$after->id}}">
                                                <div class="image_box_main">
                                                    <div class="images_box">
                                                        <div class="magnific-img">
                                                            <a class="image-popup-vertical-fit"
                                                                href="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                title="After">
                                                                <img src="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                    alt="" />
                                                                <i class="fa fa-search-plus"
                                                                    aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="action_btns_for">
                                                        <a href="javascript:void(0)"
                                                            class="download_btn"><i
                                                                class="uil-down-arrow "></i></a>
                                                        <a href="javascript:void(0)"
                                                            onclick="deleteRecordTbl('{{ $after->id }}','client_site_shift_cleaner_images','img_div__{{$after->id}}')"
                                                            class="trash_btn"><i
                                                                class="uil-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
                <div class="bottom_footer_dt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="action_btns">
                                <a href="{{route('report.time.attendance')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <!-- end row -->

</div>
<!-- container -->
@endsection
@push('push_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $('.before_after_slider').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav: false,
        items: 5,
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
     $(function(){
        $('.js-example-basic-single3').select2({
            dropdownParent: $('#changeStatus')
        });

    })
    $(document).ready(function() {
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery: {
                enabled: true
            },

            zoom: {
                enabled: true,

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function(openerElement) {

                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            }

        });

    });
</script>

<script>

@endpush