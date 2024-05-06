@extends('layouts.main')
@section('app-title', 'Portfolio View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Portfolio View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Portfolio View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @php
            $newalluser = $alluser->keyBy('id');
            $newallsites = $allsites->keyBy('id');
        @endphp
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card_header_prospect">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-user-square"></i></span>
                                    <span>Contacts</span>
                                </a>
                            </li>
                            @can('site-view')
                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-building"></i></span>
                                    <span>Sites</span>
                                </a>
                            </li>
                            @endcan

                            @can('portfolio-view-comments')
                            <li class="nav-item">
                                <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-comment-alt"></i></span>
                                    <span>Comments</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                    </div>
                </div>
                <div class="card show_portfolio_tab">

                    <div class="card-body">

                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Client </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $clientPortfolio->client->business_name ?? '-' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio Full name </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $clientPortfolio->full_name }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio Short name</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $clientPortfolio->short_name ?? '-' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio Manager</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $clientPortfolio->manager->name ?? '-' }} {{ $clientPortfolio->manager->surname ?? '-' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>State</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $clientPortfolio->state->state_name ?? '-' }}</h6>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>



                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane" id="tickets">
                                <div class="sites_main">
                                    <div class="row">


                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        {{-- <th>Contact From</th> --}}
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Contact Type</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($baseContact)
                                                            @foreach ($baseContact as $bcontact)
                                                            <tr id="contact{{$bcontact->id}}{{time()}}">
                                                                <td>
                                                                    {{$newalluser[$bcontact->user_id]->name}}
                                                                </td>
                                                                <td>{{$newalluser[$bcontact->user_id]->phone_number ?? '-'}}</td>
                                                                <td>{{$newalluser[$bcontact->user_id]->email}}</td>
                                                                <td>{{ Str::ucfirst($bcontact->user_type)}}</td>
                                                            </tr>
                                                            @endforeach
                                                        @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            @can('site-view')
                            <div class="tab-pane" id="messages">
                                <div class="sites_main">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Reference / Building</th>
                                                        <th>Active</th>
                                                        <th>Regular Site</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($protfolioSite)
                                                            @foreach ($protfolioSite as $profosite)
                                                                <tr id="site{{$profosite->id}}{{time()}}">
                                                                    <td>{{$newallsites[$profosite->client_site_id]->reference}}</td>
                                                                    <td>@if($newallsites[$profosite->client_site_id]->status == "1")<i class="uil-check-circle status-entity" style="color:green"></i>@else <i class="uil-times-circle status-entity" style="color:rgb(233, 57, 57)"></i> @endif</td>
                                                                    <td>@if($newallsites[$profosite->client_site_id]->is_regular_site == "1")<i class="uil-check-circle status-entity" style="color:green"></i>@else <i class="uil-times-circle status-entity" style="color:rgb(233, 57, 57)"></i> @endif</td>

                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan

                            @can('portfolio-view-comments')
                            <div class="tab-pane" id="comments">

                                <div class="sites_main">
                                    <div class="row">


                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Date Comment</th>
                                                        <th>Person</th>
                                                        <th>Comment Type</th>
                                                        <th>Comment</th>
                                                        <th>Files</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($protfolioComment)
                                                    @foreach ($protfolioComment as $comment)
                                                        <tr id="comment{{$comment->id}}{{time()}}">
                                                            <td>{{date('d/m/Y H:i:s',strtotime($comment->created_at))}}</td>
                                                            <td>{{$comment->user->name??'-'}} {{$comment->user->surname??'-'}}</td>
                                                            <td>{{ucwords(str_replace('_', ' ', $comment->comment_type))}}</td>
                                                            <td>{{substr($comment->comment,0,40)}} </td>
                                                            <td>
                                                                @if ($comment->file)
                                                                <a href="{{ url(env('STORE_PATH') .$comment->file)}}" target="_blank">View File</a>
                                                                @else
                                                                -
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
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container -->


@endsection
