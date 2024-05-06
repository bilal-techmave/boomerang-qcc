@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">IT Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">IT Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 mb-3" style="text-align: right;">

            <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itDashboard">
            Add Documents
        </button> --}}
        <button class="btn btn-primary" onclick="openModal()"> Add Documents</button>

        {{-- <a href="#" onclick="openModal()">Open Modal</a> --}}
        <!-- Modal -->
        {{-- <div class="modal fade" id="itDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">IT Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div> --}}

        </div>
        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card portfolio_card">
                <div class="card-header card_it">
                    <i class="uil-file-blank"></i>
                    <h5>Forms</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive fixTableHead">
                        <table class="table mb-0  table-striped">
                            <thead >
                                <tr>
                                    <th scope="col">Forms Name</th>
                                    <th scope="col">Action</th>
                                    {{-- <th scope="col">Delete</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $form)
                                <tr>
                                    <td><a href="{{url(env('STORE_PATH').$form->doc_file)}}" >{{$form->name}}</a></td>
                                    <td>
                                        <a href="{{url(env('STORE_PATH').$form->doc_file)}}" target="_blank" data-toggle="tooltip" data-placement="top" title="Download" class=""><i class="uil-download-alt "></i></a>
                                        <a href="#" class=" text-danger delete-btn"  data-id="{{ $form->id }}" data-toggle="tooltip" data-placement="top" title="Remove File"><i class="uil-trash-alt "></i></a>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body -->

            </div>
            <!-- end card-->
        </div>
        <!-- end col-->


        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card portfolio_card">
            <div class="card-header card_it">
                    <i class="bi-shield-exclamation"></i>
                    <h5>Training</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive fixTableHead">
                        <table class="table mb-0  table-striped">
                            <thead >
                                <tr>
                                    <th scope="col">Training Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tranings as $traning)
                                <tr>
                                    <td><a href="{{url(env('STORE_PATH').$traning->doc_file)}}" target="_blank"> {{$traning->name}} </a></td>
                                    <td>
                                        <a href="{{url(env('STORE_PATH').$traning->doc_file)}}" target="_blank" class=""  data-toggle="tooltip" data-placement="top" title="Download File"><i class="uil-download-alt "></i></a>
                                        <a href="#" class=" text-danger delete-btn"  data-id="{{ $traning->id }}"  data-toggle="tooltip" data-placement="top" title="Remove File"><i class="uil-trash-alt "></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                        </table>
                    </div>
                </div>
                <!-- end card-body -->

            </div>
            <!-- end card-->
        </div>
        <!-- end col-->

        <div class="col-xl-4">
            <!-- Portlet card -->
            <div class="card portfolio_card">
            <div class="card-header card_it">
                    <i class="bi-arrow-repeat"></i>
                    <h5>Refresh</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive fixTableHead">
                        <table class="table mb-0  table-striped">
                            <thead >
                                <tr>
                                    <th scope="col">Refresh</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($refreshs as $refresh)
                                <tr>
                                    <td><a href="{{url(env('STORE_PATH').$refresh->doc_file)}}" target="_blank"> {{$refresh->name}} </a></td>
                                    <td>
                                        <a href="{{url(env('STORE_PATH').$refresh->doc_file)}}" target="_blank"  data-toggle="tooltip" data-placement="top" title="Download File"> <i class="uil-download-alt "></i></a>
                                        <a href="#" class=" text-danger delete-btn"  data-id="{{ $refresh->id }}"  data-toggle="tooltip" data-placement="top" title="Remove File"><i class="uil-trash-alt "></i></a>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body -->

            </div>
            <!-- end card-->
        </div>
        <!-- end col-->


<!-- Modal -->



    </div>
    <!-- end row -->

</div>
<!-- container -->

<div class="modal fade" id="it_dash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                 <form method="POST" id="it_dashForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Name <span class="red">*</span></label>
                                <input type="text" required minlength="4" class="form-control" name="name" id="name" 
                                    aria-describedby="emailHelp" >
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Type <span class="red">*</span></label>
                                <select class="form-select" name="type" required>
                                    <option value="0">Select the Creator</option>
                                    <option value="Forms">Forms</option>
                                    <option value="Traning">Traning </option>
                                    <option value="Refresh">Refresh </option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Upload File</label>
                                <div class="form-group">
                                    <input name="doc_file" type="file" class="dropify" data-height="100" required />
                                </div>
                                @error('file')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'it_dashForm')" id="submitbtndata" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    function openModal()
    {
        $("#it_dash").modal('show');
    }
</script>


<script>
    $('#it_dashForm').submit(function (event) {


    event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('dashboard.itStore') }}',
            data: new FormData(this),
            contentType: false,
            processData: false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            success: function (data) {
                // Handle success response
                $("#submitbtndata").text('Submit');
                $("#submitbtndata").prop('disabled',false);
                window.location.reload();
                $('#it_dash').modal('hide'); // Close the modal

            },
            error: function (error) {
                $("#submitbtndata").text('Submit');
                $("#submitbtndata").prop('disabled',false);
                // Handle error response
                console.log(error);
            }
        });
    })
</script>


<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var Id = $(this).data('id');

            // Show a SweetAlert confirmation box
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, make an AJAX request to delete the data
                    $.ajax({
                    url: "{{ route('dashboard.itDelete', ['id' => ':id']) }}".replace(':id', Id),
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                            window.location.reload();
                            // You may want to update your UI here
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the data.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });

    var isValid = true;

        function validateForm(that, formId) {
            $(that).attr('disabled', true);
            setTimeout(() => {
                $(that).attr('disabled', false);
            }, 1000);
            $('.select2-selection').removeClass('invalid-select');
            $(".custom_error").remove();
            $(`#${formId} [required]`).each(function() {
                $(this).closest('.dropify-wrapper').removeClass('invalid-select');
                if ($(this).is(':file') && !$(this)[0].files.length) {
                    isValid = false;
                    $(this).closest('.dropify-wrapper').addClass('invalid-select');
                    $(this).closest('.dropify-wrapper').after(
                        '<span class="custom_error text-danger">This field is required.</span>');

                    $(this).focus();
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                } else if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() ==
                        0))) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    if ($(this).is('select')) {
                        $(this).next('.select2-container').find('.select2-selection').addClass('invalid-select');
                        $(this).next('span').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                    } else {
                        $(this).after('<span class="custom_error text-danger">This field is required.</span>');
                        $(this).next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                    }
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');

                    // $(this).css('invalid-select');
                    $(this).focus();
                } else {
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                    $(this).focus();
                    $(this).removeClass('is-invalid');
                }
            });
            

            // Additional validation for password and password confirmation matching
            let passwordInput = $(`#${formId} [name="password"]`);
            let confirmPasswordInput = $(`#${formId} [name="password_confirmation"]`);
            let passwordValue = passwordInput.val();
            let confirmPasswordValue = confirmPasswordInput.val();
            if (passwordValue !== confirmPasswordValue) {
                isValid = false;
                passwordInput.addClass('is-invalid');
                confirmPasswordInput.addClass('is-invalid');
                $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                passwordInput.focus();
                // Add error message span
                passwordInput.after('<span class="custom_error text-danger">Passwords do not match.</span>');
            }

            $(`#${formId} [minlength], #${formId} [maxlength]`).each(function() {
                let minLength = parseInt($(this).attr('minlength'));
                let maxLength = parseInt($(this).attr('maxlength'));
                let inputValue = $(this).val().trim(); // Trim whitespace from input value

                if (inputValue !== '') { // Check if input value is not blank
                    if (minLength && inputValue.length < minLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Minimum length is ${minLength} characters.</span>`
                        );
                    }

                    if (maxLength && inputValue.length > maxLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Maximum length is ${maxLength} characters.</span>`
                        );
                    }
                }
            });

            
            if (isValid) {
                $(`#${formId}`).submit();
            }else{
                isValid = true;
            }
        }

        
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
