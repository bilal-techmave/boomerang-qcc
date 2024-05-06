@extends('layouts.main')
@section('app-title', 'Approval Board - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Approval Board</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Operational Dashboard</li>
                            <li class="breadcrumb-item active">Approval Board</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="GET">
                    <div class="card">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Client</label>
                                        <select data-plugin="customselect" class="form-select" name="client_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($clients)
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                        {{ request('client_id') == $client->id ? 'selected' : '' }}>
                                                        {{ $client->business_name ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                        <select data-plugin="customselect" class="form-select" name="portfolio_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($portfolios)
                                                @foreach ($portfolios as $portfolio)
                                                    <option value="{{ $portfolio->id }}"
                                                        {{ request('portfolio_id') == $portfolio->id ? 'selected' : '' }}>
                                                        {{ $portfolio->full_name ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Site</label>
                                        <select data-plugin="customselect" class="form-select" name="site_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($sites)
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}"
                                                        {{ request('site_id') == $site->id ? 'selected' : '' }}>
                                                        {{  $site->reference }}
                                                    </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Cleaner</label>
                                        <select data-plugin="customselect" class="form-select" name="cleaner_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($cleaners)
                                                @foreach ($cleaners as $cleaner)
                                                    <option value="{{ $cleaner->id }}"
                                                        {{ request('cleaner_id') == $cleaner->id ? 'selected' : '' }}>
                                                        {{ $cleaner->name ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City </label>
                                        <select data-plugin="customselect" class="form-select" name="city_id">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State </label>
                                        <select data-plugin="customselect" class="form-select" name="state_id">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ request('state_id') == $state->id ? 'selected' : '' }}>
                                                    {{ $state->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="theme_btn btn save_btn" type="submit"><i class="uil-search-alt"> Search</i></button>
                                    <a href="{{route('operational.approval.board')}}" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i>
                                        Reset
                                        Filter</i></a>
                                    <!-- <a href="#" class="theme_btn btn ">+ Add New Site</i></a> -->
                                    {{-- <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i>
                                        Export
                                        Excel File</i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <form action="" id="ApprovalBoardVhangeStatus" method="post">
                    @csrf --}}
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Approval Board</h5>
                            <div class="actions_">
                                @can('approval-board-approve')
                                <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#approve_modal" onclick="getSubmitId()">Approve</a>
                                @endcan
                                @can('approval-board-deny')
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="getSubmitId()"
                                    data-bs-toggle="modal" data-bs-target="#reject_modal">Reject</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                {{-- <div class="table_box"> --}}
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-bordered table-striped   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="selectall"
                                                        class="regular-checkbox" /><label for="selectall">
                                                </th>
                                                <th>Cleaner</th>
                                                <th>Site Reference</th>
                                                <th>Date Start</th>
                                                <th>Date Finish</th>
                                                <th>Total Hours</th>
                                                <th>Allocated Hours</th>
                                                <th>Total Payable</th>
                                                <th>Distance From Site on Start</th>
                                                <th>Distance From Site on Finish</th>
                                                <th>Cleaner In Site or Not</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($submissions)
                                                @foreach ($submissions as $submission)
                                                    @php
                                                        $from_time = strtotime($submission?->shift_start) ?? '0';
                                                        $to_time = strtotime($submission?->shift_end) ?? '0';
                                                        $min = $submission?->shift_end ? round(abs($to_time - $from_time) / 60, 2) : 0;

                                                        $minrate = $submission?->clientsiteshift->hourly_rate ?? '0' / 60;
                                                        $total_pay = $min * $minrate;
                                                        $hours = floor($min / 60);
                                                        $minutes = $min % 60;
                                                        $totalHour = round($min/60,2);
                                                    @endphp
                                                    <tr role="row" class="odd">
                                                        <td width="20"><input type="checkbox"
                                                                name="approval_status[]" class="regular-checkbox name"
                                                                value="{{ $submission->id }}"
                                                                id="checkbox-1-1{{ $submission->id }}" /><label
                                                                for="checkbox-1-1{{ $submission->id }}"></label>
                                                        </td>
                                                        <td >{{ $submission?->cleaner->name ?? '' }}
                                                        </td>
                                                        <td>{{ $submission?->site->reference ?? '' }}</td>
                                                        <td>

                                                            <strong>
                                                                <lable style="color: red;">
                                                                    {{ $submission?->shift_start ?? '' }}</lable>
                                                            </strong>

                                                        </td>
                                                        <td>

                                                            <strong>
                                                                <lable style="color: red;">
                                                                    {{ $submission?->shift_end ?? '' }}</lable>
                                                            </strong>



                                                        </td>
                                                        <td>

                                                            {{$totalHour,2}}


                                                        </td>
                                                        <td>{{ $submission->submissions->clientsiteshift->total_hours ?? '0' }}
                                                        </td>
                                                        <td>{{ round($totalHour*($submission?->clientsiteshift?->hourly_rate??1), 2) ?? '0' }}</td>
                                                        @if ($submission?->site->distance_gps < $submission?->start_distance )
                                                            <td>

                                                                <strong>
                                                                    <lable style="color: red;">
                                                                        {{ $submission?->start_distance ?? '0' }}<b>m</b>
                                                                    </lable>
                                                                </strong>
                                                            </td>


                                                            <td>

                                                                <strong>
                                                                    <lable style="color: hsl(0, 100%, 50%);">
                                                                        {{ $submission?->end_distance ?? '0' }}<b>m</b></lable>
                                                                </strong>


                                                            </td>

                                                            <td>Cleaner Not In Site</td>
                                                        @else
                                                            <td>

                                                                <strong>
                                                                    <lable >
                                                                        {{ $submission?->start_distance ?? '0' }}<b>m</b>
                                                                    </lable>
                                                                </strong>
                                                            </td>


                                                            <td>

                                                                <strong>
                                                                    <lable>
                                                                        {{ $submission?->end_distance ?? '0' }}<b>m</b></lable>
                                                                </strong>


                                                            </td>

                                                            <td>Cleaner In Site</td>
                                                        @endif

                                                        <td>Under Analysis</td>

                                                        <td>

                                                            <a
                                                                href="{{ route('operational.approval.board.view', ['id' => $submission?->id]) }}"><span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-eye"></i>
                                                                </span></a>


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
                {{-- </form> --}}
            </div>


        </div>
    </div>

    <!-- Modal -->
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
                                    <input type="hidden" name="status" value="approved" id="approval_status">
                                    <span class="submission_id"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="" id="">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="reject_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject Hours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="RejectApprovalBoard" method="post"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Comment </label>
                                    <textarea required="" name="description" class="form-control"></textarea>
                                    <input type="hidden" name="status" value="rejected">
                                    <span class="submission_id"></span>
                                </div>
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
@endsection

@push('push_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function getSubmitId() {
            var checkedValues = $("input[name='approval_status[]']:checked").map(function() {
                return $(this).val();
            }).get();

            // console.log(checkedValues,checkedValues.join(','));
            // Append the checked values to a hidden input field or include them in your form data
            $(".submission_id").html('<input type="hidden"  name="id" value="' + checkedValues.join(',') + '">');
        }



        $('#ApprovedApprovalBoard').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('operational.approval.board.change.status') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result > 0) {
                        $("#approval_desc").val('');
                        swal({
                            type: 'success',
                            title: 'Approved!',
                            text: 'Approved',
                            timer: 3000
                        });
                        window.location.reload();
                    } else {
                        swal({
                            title: 'Error!',
                            text: 'Check approval id',
                            timer: 3000
                        })
                    }
                },
                error: function(data) {

                }
            });
        })

        $('#RejectApprovalBoard').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('operational.approval.board.change.status') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    if (result > 0) {
                        swal({
                            type: 'success',
                            title: 'Rejected!',
                            text: 'Rejected',
                            timer: 3000
                        });
                        window.location.reload();
                    } else {
                        swal({
                            title: 'Error!',
                            text: 'Check approval id',
                            timer: 3000
                        })
                    }
                },
                error: function(data) {

                }
            });
        })
    </script>
@endpush
