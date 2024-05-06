<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{asset('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet">
     <!-- third party css -->
     <link href="{{asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
     <!-- wizard start-->
    <link rel="stylesheet" href="{{asset('libs/smartwizard/css/smart_wizard.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/smartwizard/css/smart_wizard_theme_arrows.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/smartwizard/css/smart_wizard_theme_circles.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/smartwizard/css/smart_wizard_theme_dots.min.css')}}" type="text/css" />
      <!-- wizard end-->
    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
     <!-- fancybox gallery -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css')}}">
    <link href="{{asset('css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
     <!-- Plugins css -->
     <link href="{{asset('libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/sweet-alert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <!-- dropify css -->
    <link href=" https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">

    <!-- icons -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <form id="filterFormData" style="margin: 20px;">
                <input name="name">
                <select id="status-filter">
                    <option value="">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </form>
            <table id="basic-datatable" class="table table-bordered nowrap w-100">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Store initial select options
            var initialOptions = $('#document_type').html();

            // Function to remove selected option from select
            function removeOption(value) {
                $('#document_type option[value="' + value + '"]').remove();
            }

            // Function to add option back to select
            function addOption(option) {
                $('#document_type').append(option);
            }

            // Event listener for adding new row
            $('#add_row').click(function () {
                var selectedValue = $('#document_type').val();
                if (selectedValue !== '0') {
                    $('#myTable tbody').append('<tr><td>' + selectedValue + '</td><td><button class="delete_row">Delete</button></td></tr>');
                    removeOption(selectedValue);
                }
            });

            // Event listener for deleting a row
            $(document).on('click', '.delete_row', function () {
                var deletedValue = $(this).closest('tr').find('td:first').text();
                $(this).closest('tr').remove();
                addOption('<option value="' + deletedValue + '">' + deletedValue + '</option>');
            });
        });
    </script>
</head>
<body>

<select data-plugin="customselect" id="document_type" class="form-select">
    <option value="0">Please select one or start typing</option>
    <option value="Employment Package">Employment Package</option>
    <option value="Letter of Offer of Employment">Letter of Offer of Employment</option>
    <option value="Field Operative Interview Questions Character">Field Operative Interview Questions Character</option>
    <!-- Add more options as needed -->
</select>

<button id="add_row">Add Row</button>

<table id="myTable">
    <thead>
    <tr>
        <th>Document Type</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <!-- Existing rows (if any) will be populated here -->
    </tbody>
</table>





    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>

    </script>


<script>




</script>
</body>
</html>

