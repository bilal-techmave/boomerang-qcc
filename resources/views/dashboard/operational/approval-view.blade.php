@extends('layouts.main')
@section('app-title', 'Approval Board - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Approval Board View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Operational Dashboard</li>
                            <li class="breadcrumb-item active">Approval Board View</li>
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
                                        $from_time = strtotime($approvalboard->shift_start);
                                        $to_time   = strtotime($approvalboard->shift_end);
                                        $min =  round(abs($to_time - $from_time) / 60,2);

                                        $minrate = isset($approvalboard->clientsiteshift->hourly_rate) && $approvalboard->clientsiteshift->hourly_rate ? $approvalboard->clientsiteshift->hourly_rate/60 : 0;
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
                                                        <h6>{{$approvalboard->site->reference ??''}}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Date Start</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{$approvalboard->shift_start}}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Distance from site on start</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{$approvalboard->start_distance ??''}}<b>m</b></h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Allocated Hours</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{$approvalboard->clientsiteshift->total_hours ?? '0'}}</h6>
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
                                                        <h6> {{$approvalboard->shift_end}}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Distance from site on finish:</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{$approvalboard->end_distance ??''}}<b>m</b></h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Cleaner Name </h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{$approvalboard->cleaner->name ??''}}</h6>
                                                    </div>
                                                </li>

                                            </ul>
                                            <div class="detail_box">
                                                <h6>Final shift comment </h6>
                                                <p></p>
                                            </div>
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
                                                            <div class="detail_ans">
                                                                <h6>{{$question_ans->answer ??''}}</h6>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endisset

                                            </ul>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="bottom_footer_dt">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="action_btns">

                                    <a href="{{route('operational.approval.board')}}" class="theme_btn btn-primary btn"><i
                                            class="uil-list-ul"></i> List</a>
                                    <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#approve_modal">Approve</a>
                                    <a href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#reject_modal">Reject</a>
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

    <div class="modal fade" id="approve_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Hours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="ApprovedApprovalBoard" method="post"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Comment </label>
                                    <textarea required="" id="approval_desc" name="description" class="form-control"></textarea>
                                    <input type="hidden" name="status" value="Approved" id="approval_status">
                                    <input type="hidden" name="id" value="{{$approvalboard->id}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss=""
                            id="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
