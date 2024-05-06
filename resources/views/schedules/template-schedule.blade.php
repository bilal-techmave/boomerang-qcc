@extends('layouts.main')
@section('main-content')
<link rel="stylesheet" href="../../assets-tmp/css/templates_lst.css">
<section class="schedule">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <div class="schedule_inspection card">
               <div class="card-header">
                  <h4 class="inspectionScheduleTitle">
                     <iconify-icon icon="solar:calendar-broken"></iconify-icon>
                     Schedule Inspection
                  </h4>
               </div>
               <form id="form" action="{{route('schedule.store')}}" method="post" enctype="multipart/form-data"> @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="mb-3 mt-3 mt-sm-0">
                              <label class="form-label">Template </label>
                              <select data-plugin="customselect" name="template_id" class="form-select" required>
                                 <option selected disabled>Please select one or start typing</option>
                                 @foreach($templates as $data)
                                    <option value="{{$data->id}}">{{$data->t_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="check_box mb-3 mt-3 mt-sm-0">
                              <label class="form-label" for="textlabel">Site</label>
                              <select data-plugin="customselect" name="site_id[]" class="form-select" multiple>
                                 @foreach($sites as $data)
                                    <option value="{{$data->id}}">{{$data->reference}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="check_box mb-3 mt-3 mt-sm-0">
                              <label class="form-label asset_label" for="textlabel">Asset <a href="#" data-bs-toggle="modal" data-bs-target="#CreateAsset">+ Create Asset</a></label>
                              <select data-plugin="customselect" name="asset_id[]" class="form-select" multiple>
                                 @foreach($assets as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="check_box mb-3 mt-3 mt-sm-0">
                              <label class="form-label" for="textlabel">Assigned to Team Player</label>
                              <select data-plugin="customselect" name="assign_to" id="custom-select" class="form-select" required>
                                 <option selected disabled>Please select one or start typing</option>
                                 @foreach($Assign_to as $data)
                                    <option value="{{$data->id}}">{{$data->name .' '. $data->surname}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="mb-3 mt-3 mt-sm-0">
                              <label class="form-label">How often</label>
                              <select data-plugin="customselect" name="how_often" class="form-select">
                                 <option value="One off">One off</option>
                                 <option value="Every day">Every day</option>
                                 <option value="Every weekday">Every weekday</option>
                                 <option value="Every week">Every week</option>
                                 <option value="Every month">Every month</option>
                                 <option value="Every year">Every year</option>
                                 <!-- <option value="1">Custom</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="check_box">
                              <input type="text" id="datetimePicker1" class="commonDate_Time_picker" name="date_from" placeholder="26 Dec 2023 4:05 PM">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="check_box">
                              <input type="text" id="datetimePicker2" class="commonDate_Time_picker" name="date_to" placeholder="26 Dec 2023 4:05 PM">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <p class="mt-2 mb-2">First schedule will start on 30 Apr 2024.</p>
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="submit_after_due_date" value="1" id="a17">
                              <label class="form-check-label" for="a17">
                                 Allow inspections to be submitted after the due date 
                                 <span data-bs-toggle="tooltip" data-bs-placement="top" title="Assignees can submit overdue inspections until the start of the next occurrence.">
                                    <iconify-icon icon="lucide:info"></iconify-icon>
                                 </span>
                              </label>
                           </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                           <div class="mb-3 mt-3 mt-sm-0">
                              <label class="form-label">Title</label>
                              <input name="title" class="form-control" name="title" placeholder="Title" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <div class="schedule_actions text-end">
                        <button type="button" id="submitButton" onclick="validateForm()" class="btn btn-primary">Create</button>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Draw Modal -->
<div class="modal fade" id="CreateAsset" tabindex="-1" aria-labelledby="drawModalLabel" aria-hidden="true">
      <form id="myForm"> @csrf
      <div class="modal-dialog modal-md modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="drawModalLabel">Create Asset</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="csrete">
                  <label for="#" class="mb-2">Asset Name</label>
                  <input type="text" class="form-control" name="name" id="textlabel" placeholder="Location">
               </div>
            </div>
            <div class="modal-footer">
               <button  class="btn btn-danger" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" >Save</button>
            </div>
         </div>
      </div>
   </form>
</div>
@include('templates.footer')
<script>
   document.addEventListener('DOMContentLoaded', function() {
     const customInputDp = document.querySelector('.custom_input_dp');
     const customDp = document.querySelector('.custom_dp');
     const doneButton = document.getElementById('done_ttc');
   
     // Toggle custom_dp when clicking on custom_input_dp
     customInputDp.addEventListener('click', function() {
       customDp.classList.toggle('show');
     });
   
     // Hide custom_dp when clicking on done_ttc
     doneButton.addEventListener('click', function() {
       customDp.classList.remove('show');
     });
   
     // Hide custom_dp when clicking outside of it
     window.addEventListener('click', function(event) {
       if (!event.target.matches('.custom_input_dp') && !event.target.matches('.custom_dp') && !event.target.matches('.custom_dp *')) {
         customDp.classList.remove('show');
       }
     });
   });
</script>
<!-- common datetime picker -->
<script>
    flatpickr(".commonDate_Time_picker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onReady: function(selectedDates, dateStr, instance) {
            // Add a "Done" button below the calendar
            const doneButton = document.createElement('button');
            doneButton.innerText = 'Done';
            doneButton.addEventListener('click', function() {
                instance.close();
            });

            // Append the "Done" button to the calendar
            instance.calendarContainer.appendChild(doneButton);
        }
    });
</script>
<!-- common datetime picker end-->
<script>
   /*
    * Included Jquery
    */
   const multiLevelMenu = document.querySelector(".multi-level-menu-wrapper");
   
   // multiLevelMenu.forEach((mlItem, index)=>{
   
   // })
   
   $(document).ready(function () {
     $(".multi-level-menu-wrapper").each(function (index, mlMenu) {
       var subMenuItems = $(mlMenu).find(".hasSubMenu");
       console.log("subMenuItems", subMenuItems)
   
       subMenuItems.each(function (i, subMenu) {
         $(subMenu).find(".trigger").on("click", function () {
           var target = $(subMenu).attr("data-target");
           $(target).addClass("active");
         });
       });
   
       $(".backTrigger").on("click", function () {
         var _backTrigger = this;
         $(_backTrigger).parent(".subMenu").removeClass("active");
       });
   
     });
   });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include SumoSelect CSS -->
<link rel="stylesheet" href="../../assets-tmp/css/sumoselect.min.css">

<!-- Include SumoSelect JS -->
<script src="../../assets-tmp/js/jquery.sumoselect.min.js"></script>

<script>
   $(document).ready(function(){
      $('.sumo-select').SumoSelect({
         okCancelInMulti: true // Enable control buttons
      });
   });
</script>

<script>
   $(document).ready(function(){
       $("#myForm").submit(function(event) {
         $('#CreateAsset').removeClass('show');
         $('.modal-backdrop').remove();
         $('body').removeClass('modal-open');
         $('body').css('overflow', 'auto');
         event.preventDefault();

           $.ajax({
               type: "POST",
               url: "{{route('schedule.storeAsset')}}",
               data: $(this).serialize(),
               success:function(response){
                   if(response.status ==  '200'){
                      swal({
                          type:'success',
                          title: 'Created!',
                          text: 'Asset Creeated Successfully.',
                          timer: 1000
                      });
                  }else{
                     swal({
                          type:'Errro',
                          title: 'Not Created!',
                          text: 'Something went wrong.',
                          timer: 1000
                      });
                  }
               }
           });
       });
   });
</script>

<script>

   // $(document).ready(function() {
   //     // Disable button initially
   //     $('#submitButton').prop('disabled', true);

   //     // Add event listener to required fields
   //     $('#form [required]').on('input', function() {
   //         let isValid = true;
   //         $('#form [required]').each(function() {
   //             if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() == 0))) {
   //                 isValid = false;
   //                 return false; // Break out of each loop if any required field is empty
   //             }
   //         });

   //         // Toggle button's disabled state based on form validity
   //         $('#submitButton').prop('disabled', !isValid);
   //     });
   // })

   function validateForm() {
      let isValid = true;
      $('#form [required]').each(function() {
          if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() == 0))) {
              console.log($(this));
              isValid = false;
              $(this).removeClass('is-valid').addClass('is-invalid');
              if ($(this).next('.invalid-feedback').length === 0) {
                  $(this).parent().append('<span style="font-size:0.90rem;" class="invalid-feedback">This field is required.</span>');
              }
              $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
              $(this).focus();
          } else {
              $(this).removeClass('is-invalid').addClass('is-valid');
              $(this).next('.invalid-feedback').remove();
          }
      });
      if (isValid) {
          $('#form').submit();
      }
   }
</script>





@endsection