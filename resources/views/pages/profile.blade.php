@extends('layouts.main')
@section('app-title', 'Company View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">My Account</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('images/new-images/userimg-qcc.png') }}" class="img-fluid rounded-circle"
                                    alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{$user_data->name ??''}} {{$user_data->surname ??''}}</h4>
                                    <p>{{ucfirst($user_data->role ??'')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body pt-0 px-0 pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body p-0">
                                    <ul class="nav nav-tabs nav-tabs-bottom profile_tab">
                                        <li class="nav-item"><a class="nav-link active" href="#bottom-tab1"
                                                data-bs-toggle="tab"><i data-feather="user"></i> Personal Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab"><i
                                                    data-feather="bell"></i> Notification</a></li>
                                    </ul>
                                    <div class="tab-content pt-0 m-3">
                                        <div class="tab-pane show active" id="bottom-tab1">
                                            <div class="change_password">
                                                <form action="{{route('user.profile')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Name</label>
                                                                <input type="text" name="name" value="{{old('name') ?? $user_data->name }}" class="form-control" >
                                                                @error('name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Surname</label>
                                                                <input type="text" name="surname" value="{{old('surname') ?? $user_data->surname}}" class="form-control" >
                                                                @error('surname')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Date of Birth</label>
                                                                <input type="text" name="dateofbirth" value="{{old('dateofbirth') ?? $user_data->dateofbirth}}" class="form-control basic-datepicker" >
                                                                @error('dateofbirth')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Phone Number</label>
                                                                <input type="text" name="phone_number" value="{{old('phone_number') ?? $user_data->phone_number}}" class="form-control" >
                                                                @error('phone_number')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Second Number</label>
                                                                <input type="text" name="second_number" value="{{old('second_number') ?? $user_data ->second_number}}" class="form-control" >
                                                                @error('second_number')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Current Password</label>
                                                                <input type="password" name="oldpassword" id="password-field" class="form-control">
                                                                <span toggle="#password-field"
                                                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                                    @error('oldpassword')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>New Password</label>
                                                                <input type="password" name="password" id="password-field" class="form-control">
                                                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                                @error('password')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 my-2 col-sm-4">
                                                            <div class="form-group local-forms">
                                                                <label>Confirm Password</label>
                                                                <input type="password" name="password_confirmation" id="password-field" class="form-control">
                                                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                                @error('password_confirmation')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="student-submit text-end">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="bottom-tab2">
                                            <div class="change_password">
                                                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                                                    <thead>
                                                        <tr>

                                                            <th>Notification</th>
                                                            <th>Yes / No</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td class="text-">Create Ticket</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15q" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15q"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-">Reply Ticket</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15w" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15w"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-">Close Ticket</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15x" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15x"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-">Solve Ticket</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15y" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15y"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-">Reopen Ticket</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15a" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15a"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-">Upload Attachments</td>
                                                            <td>
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox15c" type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox15c"></label>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane" id="bottom-tab3">
                                            <div class="assignment-st-view">
                                            <div class="table-responsive">
                                                <table class="table border-0 star-student table-hover table-center mb-0  table-striped">
                                                <thead class="student-thread">
                                                <tr>

                                                <th>ID</th>
                                                <th>Assignment Title</th>
                                                <th>Assigned On</th>
                                                <th>Submission On</th>
                                                <th>File</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                <td>PRE2209</td>
                                                <td class="max-lines">Communication and Cultural Diversity</td>
                                                <td>2 Feb 2023</td>
                                                <td>8 Feb 2023</td>
                                                <td><a href="#" class="assignment_file"><i class="fa-solid fa-file"></i>Assignment File</a></td>

                                                </tr>

                                                <tr>
                                                <td>PRE2210</td>
                                                <td class="max-lines">Understanding Healthcare Settings</td>
                                                <td>12 Feb 2023</td>
                                                <td>15 Feb 2023</td>
                                                <td><a href="#" class="assignment_file"><i class="fa-solid fa-file"></i>Assignment File</a></td>

                                                </tr>

                                                <tr>
                                                <td>PRE2211</td>
                                                <td class="max-lines">The Nursing Assistant and the Care Team</td>
                                                <td>2 Feb 2023</td>
                                                <td>8 Feb 2023</td>
                                                <td><a href="#" class="assignment_file"><i class="fa-solid fa-file"></i>Assignment File</a></td>

                                                </tr>





                                                </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
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
