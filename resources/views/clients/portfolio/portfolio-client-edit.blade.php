@extends('layouts.main')
@section('app-title', 'Portfolio Edit - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Portfolio Edit</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Portfolio Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card show_portfolio_tab">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if (!$errors->has('tab_name')) active @elseif($errors->first('tab_name') == 'basic_info') active @endif">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#tickets" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'contacts') active @endif">
                                    <span><i class="uil-user-square"></i></span>
                                    <span>Contacts</span>
                                </a>
                            </li>

                            @can('site-view')
                                <li class="nav-item">
                                    <a href="#messages" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'sites') active @endif">
                                        <span><i class="uil-building"></i></span>
                                        <span>Sites</span>
                                    </a>
                                </li>
                            @endcan

                            @can('portfolio-add-comments')
                                <li class="nav-item">
                                    <a href="#comments" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'comments') active @endif">
                                        <span><i class="uil-comment-alt"></i></span>
                                        <span>Comments</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                    @php
                        $newalluser = $alluser->keyBy('id');
                        $newallsites = $allsites->keyBy('id');
                    @endphp
                    <div class="card-body">
                        <form method="POST" id="myForm"
                            action="{{ route('client.portfolio.update', ['portfolio' => $clientPortfolio->id]) }}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="tab-content  text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="home">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Client </label>
                                                        <select required data-plugin="customselect" name="client_id"
                                                            class="form-select" readonly>
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($clients)
                                                                @foreach ($clients as $client)
                                                                    <option
                                                                        {{ $clientPortfolio->client_id == $client->id ? 'selected' : '' }}
                                                                        value="{{ $client->id }}">
                                                                        {{ $client->business_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Portfolio Full
                                                            Name <span class="red">*</span></label>
                                                        <input required type="text" oninput="checkUniqueData(this,'full_name','{{ $clientPortfolio->full_name }}')" minlength="3" class="form-control" name="full_name"
                                                            id="exampleInputEmail1"
                                                            value="{{ $clientPortfolio->full_name }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Portfolio Short
                                                            Name <span class="red">*</span></label>
                                                        <input type="text" minlength="3" class="form-control" id="exampleInputEmail1"
                                                            name="short_name" required oninput="checkUniqueData(this,'short_name','{{$clientPortfolio->short_name}}')" aria-describedby="emailHelp"
                                                            value="{{ $clientPortfolio->short_name }}" placeholder="">
                                                    </div>
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Portfolio Manager
                                                            <span class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="manager_id"
                                                            class="form-select" readonly>
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($managers)
                                                                @foreach ($managers as $manager)
                                                                    <option
                                                                        {{ $clientPortfolio->manager_id == $manager->id ? 'selected' : '' }}
                                                                        value="{{ $manager->id }}">{{ $manager->name }}
                                                                        {{ $manager->surname ?? '' }}
                                                                        ({{ $manager->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">State</label>
                                                        <select data-plugin="customselect" name="geo_state_id"
                                                            class="form-select" readonly>
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($states)
                                                                @foreach ($states as $state)
                                                                    <option
                                                                        {{ $clientPortfolio->geo_state_id == $state->id ? 'selected' : '' }}
                                                                        value="{{ $state->id }}">
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>

                                <div class="tab-pane @if ($errors->first('tab_name') == 'contacts') show active @endif" id="tickets">
                                    <div class="sites_main">
                                        <div class="row" id="contactDivValidation">
                                            <div class="col-lg-6">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Contact </label>
                                                    <select id="contact" data-plugin="customselect"
                                                        class="form-select required_fields">
                                                        <option value="0">Please select one or start typing</option>
                                                        @if ($alluser)
                                                            @foreach ($alluser as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                                    {{ $user->surname }} ({{ $user->email }})
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Contact Type</label>
                                                    <select id="contactType" data-plugin="customselect"
                                                        class="form-select required_fields">
                                                        <option value="0">Please select one or start typing</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Accounts">Accounts</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                        <option value="Site Manager">Site Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="add_address text-end">
                                                    <button type="button" onclick="addContact('contactDivValidation')"
                                                        class="theme_btn btn add_btn ">+ Add Contact</button>
                                                    <a href="#" class="theme_btn btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#create_contact_modal">+
                                                        Create contact</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12  mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Contact Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add_contact_tr">
                                                        @if ($baseContact)
                                                            @foreach ($baseContact as $bcontact)
                                                                <tr id="contact{{ $bcontact->id }}{{ time() }}">
                                                                    <td>
                                                                        {{ $newalluser[$bcontact->user_id]->name }}
                                                                    </td>
                                                                    <td>{{ $newalluser[$bcontact->user_id]->phone_number ?? '-' }}
                                                                    </td>
                                                                    <td>{{ $newalluser[$bcontact->user_id]->email }}</td>
                                                                    <td>{{ Str::ucfirst($bcontact->user_type) }}</td>
                                                                    <td> <button type="button"
                                                                            onclick="deleteRecordTbl('{{ $bcontact->id }}','BaseContact','contact{{ $bcontact->id }}{{ time() }}')"
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                class="uil-trash"></i></button></td>
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
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'sites') show active @endif"
                                        id="messages">
                                        <div class="sites_main">
                                            <div class="row">
                                                {{-- <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Add Site</label>
                                                        <select data-plugin="customselect" id="siteAddData"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing</option>
                                                            @if ($allsites)
                                                                @foreach ($allsites as $site)
                                                                    <option value="{{ $site->id }}">
                                                                        {{ $site->reference }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-lg-2 align-self-center">
                                                    <button type="button" onclick="addSite()"
                                                        class="theme_btn btn add_btn portfolio_add_btn">+ Add Site</button>
                                                </div> --}}
                                                <div class="col-lg-12 mt-2">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Reference / Building</th>
                                                                <th>Active</th>
                                                                <th>Regular Site</th>
                                                                {{-- <th>Action</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_site_tr">
                                                            @if ($protfolioSite)
                                                                @foreach ($protfolioSite as $profosite)
                                                                    <tr id="site{{ $profosite->id }}{{ time() }}">
                                                                        <td>{{ $newallsites[$profosite->client_site_id]->reference }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($newallsites[$profosite->client_site_id]->status == '1')
                                                                                <i class="uil-check-circle status-entity"
                                                                                    style="color:green"></i>
                                                                            @else
                                                                                <i class="uil-times-circle status-entity"
                                                                                    style="color:rgb(233, 57, 57)"></i>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($newallsites[$profosite->client_site_id]->is_regular_site == '1')
                                                                                <i class="uil-check-circle status-entity"
                                                                                    style="color:green"></i>
                                                                            @else
                                                                                <i class="uil-times-circle status-entity"
                                                                                    style="color:rgb(233, 57, 57)"></i>
                                                                            @endif
                                                                        </td>
                                                                        {{-- <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $profosite->id }}','ClientPortfolioSite','site{{ $profosite->id }}{{ time() }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                    class="uil-trash"></i></button>
                                                                        </td> --}}
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

                                @can('portfolio-add-comments')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'comments') show active @endif"
                                        id="comments">
                                        <div class="sites_main">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="#" class="theme_btn btn add_btn" data-bs-toggle="modal"
                                                        data-bs-target="#client_comment_modal">+ Add new comment</a>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100" id="table_data">
                                                        <thead>
                                                            <tr>
                                                                <th>Date Comment</th>
                                                                <th>Person</th>
                                                                <th>Comment Type</th>
                                                                <th>Comment</th>
                                                                <th>Files</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_client_commenttr">

                                                            @if ($protfolioComment)
                                                                @foreach ($protfolioComment as $comment)
                                                                    <tr id="comment{{ $comment->id }}{{ time() }}">
                                                                        <td>{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}</td>
                                                                        <td>{{ $comment->user->name??'-' }} {{ $comment->user->surname??'-' }}</td>
                                                                        <td>{{ ucwords(str_replace('_', ' ', $comment->comment_type)) }}</td>
                                                                        <td>{{ substr($comment->comment, 0, 40) }} </td>
                                                                        <td>
                                                                            @if ($comment->file)
                                                                            <a href="{{ url(env('STORE_PATH') . $comment->file) }}"
                                                                                target="_blank">View File</a>
                                                                            @else
                                                                                -
                                                                            @endif
                                                                           </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $comment->id }}','Comment','comment{{ $comment->id }}{{ time() }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
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

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')" href="portfolios-#"
                                                    class="theme_btn btn save_btn" ><i class="bi bi-save"></i>
                                                    Save</button>
                                                @can('portfolio-view')
                                                    <a href="{{ route('client.portfolio.index') }}"
                                                        class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                @endcan
                                                @if ($clientPortfolio->status == '1')
                                                    @can('portfolio-activate')
                                                        <button type="button"
                                                            onclick="statusChange('0','{{ $clientPortfolio->id }}','client_portfolios')"
                                                            class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i>
                                                            Deactivate</button>
                                                    @endcan
                                                @else
                                                    @can('portfolio-deactivate')
                                                        <button type="button"
                                                            onclick="statusChange('1','{{ $clientPortfolio->id }}','client_portfolios')"
                                                            class="theme_btn btn btn-success"><i class="uil-shield-check"></i>
                                                            Activate</button>
                                                    @endcan
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container -->

    @can('portfolio-add-comments')
        <!-- comment add popup -->
        <div class="modal fade" id="client_comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="saveComment" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="data_id" value="{{ $clientPortfolio->id }}" id="comment_data_id">
                        <input type="hidden" name="type" value="portfolio">
                        <div class="modal-body">
                            <div class="row" id="newCommentDivValidation">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Comment Type <span class="red">*</span></label>
                                        <select  class="form-select js-example-basic-single2 required_fields" id="comment_type"
                                            name="comment_type">
                                            <option value="0">Please select one or start typing</option>
                                            <option value="meeting">Meeting</option>
                                            <option value="site_closed">Site Closed</option>
                                            <option value="price_negotiation">Price Negotiation</option>
                                            <option value="general_communication">General Communication</option>
                                            <option value="contracts">Contracts</option>
                                            <option value="email">Email</option>
                                            <option value="phone_call">Phone Call</option>
                                            <option value="scope_change">Change of Scope</option>
                                            <option value="compliment">Compliment</option>
                                            <option value="clients_courtesy_call">Clients Courtesy Call</option>
                                            <option value="inspection">Inspection</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comment <span class="red">*</span></label>
                                        <textarea  class="form-control required_fields" id="comment_textarea" name="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload File</label>
                                        <input name="file" type="file" class="dropify" id="upload_comment_file"
                                            data-height="100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveComment_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan


    <!-- Modal -->
    <div class="modal fade" id="create_contact_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form id="" method="POST"> </form> --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Person as Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="createContactDivValidation">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personName">Name <span class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personName"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personNameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personSurname">Surname <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personSurname"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personSurnameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personEmail">Email <span class="red">*</span></label>
                                <input type="email" class="form-control required_fields" id="personEmail"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personEmailError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personPhoneNumber">Phone Number <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control required_fields phoneValid" id="personPhoneNumber"
                                    aria-describedby="emailHelp" placeholder="" minlength="8" maxlength="15">
                                <span class="text-danger" hidden id="personPhoneNumberError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label" for="personContactType">Contact Type</label>
                                <select class="form-select js-example-basic-single required_fields"
                                    id="personContactType">
                                    <option value="0">Please select one or start typing</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Accounts">Accounts</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Site Manager">Site Manager</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="create_contant" class="btn btn-primary">Save</button>
                </div>
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

        function deleteRecord(that, ele, url, label) {
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                "id": ele,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result > 0) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: label + ' Deleted',
                                        timer: 3000
                                    });
                                    var table = $('#table_data')[0];
                                    var rowCount = table.rows.length;
                                    if (that) {
                                        //delete specific row
                                        $(that).parent().parent().remove();
                                    }
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {
                                console.log("error");
                                console.log(data);
                            }
                        });
                    } else {
                        swal("Cancelled", label + " safe :)", "error");
                    }
                });
        }

        function deleteTabletr(tabletr, filenumber = 'none', permission = false) {
            if (permission) {
                swal({
                        title: "Are you sure?",
                        text: "Do you want to Delete!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Delete it!",
                        cancelButtonText: "No, Cancel It",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $(`#${tabletr}`).remove();
                            if (filenumber != 'none') {
                                $(`#documentFilesDocsDiv${filenumber}`).remove();
                            }
                            swal({
                                type: 'success',
                                title: 'Deleted!',
                                text: 'Deleted',
                                timer: 3000
                            });
                        } else {
                            swal("Cancelled", "Data safe :)", "error");
                        }
                    });
            } else {
                $(`#${tabletr}`).remove();
                if (filenumber != 'none') {
                    $(`#documentFilesDocsDiv${filenumber}`).remove();
                }
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Deleted',
                    timer: 3000
                });
            }
        }
    </script>
    @if (auth()->user()->role == 'admin' ||
            auth()->user()->canAny(['portfolio-activate,portfolio-deactivate']))
        <script>
            function statusChange(that, id, tdata) {
                let status = that;
                $.ajax({
                    url: "{{ route('common.statusUpdate') }}",
                    type: 'POST',
                    data: {
                        status: status,
                        id: id,
                        tdata: tdata
                    },
                    success: function(result) {
                        $('#modal-alert-data_ajax').modal('show');
                        if (result) {
                            $("#modal-alert-dataLabel_ajax").text('Status Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Status Has Been Changed Successfully!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                            location.reload();
                        } else {
                            $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                        }
                    }
                });
            }
        </script>
    @endif
    @can('portfolio-add-comments')
        <script>
            const file_path = '{{ env('STORE_FILE_URL') }}';
            $("#saveComment_btn").click(function(e) {
                e.preventDefault();
                if (validateFormByDiv("newCommentDivValidation")) {
                    $("#saveComment_btn").attr('disabled', true);
                    var formData = new FormData($("#saveComment")[0]);
                    $.ajax({
                        url: "{{ route('client.addComment') }}",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#saveComment_btn").attr('disabled', false);
                            let commentData = data.data;
                            let microtime = Date.now();
                            if (data) {
                                let tabletrComment = `<tr id="comment${microtime}">
                                                <td><input type="hidden" name="comment_id[]" value="${commentData.id}">${commentData.created_date}</td>
                                                <td>${data.user}</td>
                                                <td>${commentData.comment_type}</td>
                                                <td>${commentData.comment} </td>
                                                <td>`;
                                if (commentData.file) {
                                    tabletrComment +=
                                        `<a href="${file_path+commentData.file}" target="_blank">View File</a>`;
                                } else {
                                    tabletrComment += `-`;
                                }
                                tabletrComment += `</td>
                                                <td>
                                                    <button class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn" type="button" onclick="deleteRecord(this,${commentData.id},'{{ route('client.delete-comment') }}','Comment')">
                                                        <i class="uil-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>`;
                                $("#add_client_commenttr").append(tabletrComment);
                                resetComment();
                            } else {
                                $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                            }
                            $('#client_comment_modal').modal('hide');
                        }
                    });
                }
            });

            function resetComment() {
                $("#comment_type").val('0').trigger('change');
                $("#comment_textarea").val('');
                $("#upload_comment_file").parent().find(".dropify-clear").trigger('click');
            }
        </script>
    @endcan
    <script>
        var newalluser = @json($newalluser);
        var newallsites = @json($newallsites);

        function addContact(divId) {
            if (validateFormByDiv(divId)) {
                let contact = $("#contact").val();
                let contactText = $("#contact option:selected").text();
                let contactType = $("#contactType").val();
                let contactTypeText = $("#contactType option:selected").text();
                let microtime = Date.now();
                let rowHtml =`
                <tr id="contact${microtime}">
                    <td>
                        <input type="hidden" name="contact_id[]" value="${contact}">
                        <input type="hidden" name="contact_type[]" value="${contactType}">
                        ${newalluser[contact].name}
                    </td>
                    <td>${newalluser[contact].phone_number || '-'}</td>
                    <td >${newalluser[contact].email}</td>
                    <td>${contactTypeText}</td>
                    <td> <button type="button" onclick="deleteTabletr('contact${microtime}','none',true)" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                </tr>`;
                if(checkTrDuplicate('add_contact_tr',rowHtml)){
                    $("#add_contact_tr").append(rowHtml);
                    $('#add_contact_tr').show();
                    resetContact();
                }
            }
        }

        function resetContact() {
            $("#create_contact_modal").modal('hide');
            $("#contact").val('0').trigger('change');
            $("#contactType").val('0').trigger('change');

            $("#personName").val('');
            $("#personSurname").val('');
            $("#personEmail").val('');
            $("#personPhoneNumber").val('');
            $("#personContactType").val('0').trigger('change');
        }

        function addSite() {
            let siteval = $("#siteAddData").val();
            let microtime = Date.now();
            $("#add_site_tr").append(`
                <tr id="site${microtime}">
                    <td><input type="hidden" name="site_id[]" value="${siteval}">${newallsites[siteval].reference}</td>
                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                    <td>
                        <button type="button" onclick="deleteTabletr('site${microtime}','none',true)" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
                    </td>
                </tr>`);
        }

        $("#create_contant").click(function() {
            if (validateFormByDiv('createContactDivValidation')) {
                let personName = $("#personName").val();
                let personSurname = $("#personSurname").val();
                let personEmail = $("#personEmail").val();
                let personPhoneNumber = $("#personPhoneNumber").val();
                let personContactType = $("#personContactType").val();

                if (personName == "") {
                    $("#personNameError").attr('hidden', false);
                } else if (personSurname == "") {
                    $("#personSurnameError").attr('hidden', false);
                } else if (personEmail == "") {
                    $("#personEmailError").attr('hidden', false);
                } else if (personPhoneNumber == "") {
                    $("#personPhoneNumberError").attr('hidden', false);
                } else if (personContactType == "") {
                    $("#personContactTypeError").attr('hidden', false);
                } else {
                    $.ajax({
                        url: "{{ route('common.add-person') }}",
                        type: 'POST',
                        data: {
                            'personName': personName,
                            'personSurname': personSurname,
                            'personEmail': personEmail,
                            'personPhoneNumber': personPhoneNumber
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.status) {
                                let commentData = data.data;
                                let microtime = Date.now();
                                var rowHtml = `<tr id="contact${microtime}">
                                    <td>${personName||''} ${personSurname||''}
                                        <input type="hidden" name="contact_id[]" value="${data.data}" />
                                        <input type="hidden" name="contact_type[]" value="${personContactType}" />
                                    </td>
                                    <td>${personPhoneNumber||''}</td>
                                    <td>${personEmail||''}</td>
                                    <td>${personContactType||''}</td>
                                    <td> <button type="button" onclick="deleteTabletr('contact${microtime}','none',true)" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                                </tr>`;
                                $("#add_contact_tr").append(rowHtml);
                                resetContact();
                            } else {
                                swal('Failded !', data.msg, 'warning');
                                // $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                                // $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                                // $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                                // $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                            }
                            $('#client_comment_modal').modal('hide');
                        }
                    });
                }
            }
        });


        function deleteRecordTbl(docId, table_name, divname) {
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('common.delete-record') }}",
                            data: {
                                "data_id": docId,
                                "table_name": table_name
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: 'Deleted',
                                        timer: 3000
                                    });
                                    deleteTabletr(divname);
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal("Cancelled", "Data safe :)", "error");
                    }
                });
        }


    </script>
     @include('common.footer_validation',['validate_url_path'=>'client.portfolio.unique'])
@endpush
