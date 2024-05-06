@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
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
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="1">The Trustee for The Aequitas No2 Trust &amp; The trustee for The
                                        Aequitas No1 Trust</option>
                                    <option value="2">SANTA VENERA PTY. LTD. &amp; THE CALTABIANO FAMILY TRUST</option>
                                    <option value="3">Department of Justice and Attorney-General </option>
                                    <option value="4">Department of Transport and Main Roads</option>
                                    <option value="5">NetRent</option>
                                    <option value="6">The Public Trustee</option>
                                    <option value="7">FERRAGAMO AUSTRALIA PTY LIMITED</option>
                                    <option value="8">The Trustee for Glen Road Tenant Trust</option>
                                    <option value="9">Anytime Cairns Pty Lld</option>
                                    <option value="10">HELP ENTERPRISES LIMITED</option>
                                    <option value="11">VIVID</option>
                                    <option value="12">BIC</option>
                                    <option value="13">GJK</option>
                                    <option value="14">ASC</option>
                                    <option value="15">EPS</option>
                                    <option value="16">ARA</option>


                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="281">The Trustee for The Aequitas</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Site</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="1208">AEC - Boondall</option>
                                    <option value="1341">AEC - Rockhampton</option>
                                    <option value="1368">AEC - Regents Park</option>
                                    <option value="1370">AEC - Woodridge</option>
                                    <option value="1334">AEC - Childers</option>
                                    <option value="1200">AEC - Mackay</option>
                                    <option value="920">AEC - Beverley</option>
                                    <option value="1362">AEC - Kawana</option>
                                    <option value="2">AEC - Bundaberg</option>
                                    <option value="740">AEC - Maryborough</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">Cleaner</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="8">Marco Araujo</option>
                                    <option value="14">Luan Ramos</option>
                                    <option value="21">Eduardo Abreu</option>
                                    <option value="25">Lorena Lopes</option>
                                    <option value="34">Juan Mejia</option>
                                    <option value="37">Ricki Palmer</option>
                                    <option value="46">Ron Hall</option>
                                    <option value="52">Steve Jackson</option>
                                    <option value="191">Italo Sabatini</option>
                                    <option value="193">Itamar Braga</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">City</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="N_A">Please select one or start typing</option>
                                    <option value="ABERCROMBIE_CAVES">Abercrombie Caves</option>
                                    <option value="ABERDEEN">Aberdeen</option>
                                    <option value="ADAMINABY">Adaminaby</option>
                                    <option value="ADELAIDE">Adelaide</option>
                                    <option value="ADELAIDE_HILLS">Adelaide Hills</option>
                                    <option value="ADELAIDE_RIVER">Adelaide River</option>
                                    <option value="ADELONG">Adelong</option>
                                    <option value="AGNES_WATER">Agnes Water</option>
                                    <option value="AIREYS_INLET">Aireys Inlet</option>
                                    <option value="AIRLIE_BEACH">Airlie Beach</option>
                                    <option value="ALBANY">Albany</option>
                                    <option value="ALBION_PARK">Albion Park</option>
                                    <option value="ALBURY">Albury</option>
                                    <option value="ALDGATE">Aldgate</option>
                                    <option value="ALDINGA">Aldinga</option>
                                    <option value="ALEXANDRA">Alexandra</option>
                                    <option value="ALICE_SPRINGS">Alice Springs</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">State</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="N_A">Please select one or start typing</option>
                                    <option value="NSW">New South Wales</option>
                                    <option value="ACT">Australian Capital Territory</option>
                                    <option value="SA">South Australia</option>
                                    <option value="NT">Northern Territory</option>
                                    <option value="QLD">Queensland</option>
                                    <option value="VIC">Victoria</option>
                                    <option value="WA">Western Australia</option>
                                    <option value="TAS">Tasmania</option>
                                </select>
                            </div>
                        </div>



                    </div>

                </div>
                <div class="bottom_footer_dt">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="theme_btn btn save_btn"><i class="uil-search-alt"> Search</i></a>
                            <a href="#" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset
                                Filter</i></a>
                            <!-- <a href="#" class="theme_btn btn ">+ Add New Site</i></a> -->
                            <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                Excel File</i></a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card">

                <div class="card-header">
                    <div class="top_section_title">
                        <h5>All Missed Clean</h5>
                        <div class="actions_">
                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approve_modal">Approve</a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#reject_modal">Reject</a>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <div class="table_box">
                                <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" id="selectall" class="regular-checkbox"/><label for="selectall">
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
                                            <th>Hourly Rate From</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr role="row" class="odd">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Camila Cunha</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">10/07/2023 14:46:31</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 10/07/2023 14:46:51</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                0.00


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                178<b>m</b>

                                            </td>
                                            <td>

                                                178<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>

                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Carlos Ribeiro</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">15/04/2023 07:05:48</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 15/04/2023 15:03:12</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                7.95


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                204<b>m</b>

                                            </td>
                                            <td>

                                                204<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>




                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Carlos Ribeiro</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">15/04/2023 07:05:48</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 15/04/2023 15:03:12</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                7.95


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                204<b>m</b>

                                            </td>
                                            <td>

                                                204<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>




                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Carlos Ribeiro</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">16/04/2023 07:05:06</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 16/04/2023 15:01:11</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                7.93


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                191<b>m</b>

                                            </td>
                                            <td>

                                                191<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>



                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Carlos Ribeiro</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">22/04/2023 06:58:47</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 22/04/2023 15:00:36</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                8.02


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                190<b>m</b>

                                            </td>
                                            <td>

                                                190<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>



                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td width="20"><input type="checkbox" name="name"
                                                    class="regular-checkbox name" value="1" id="checkbox-1-1" /><label
                                                    for="checkbox-1-1"></label></td>
                                            <td >Carlos Ribeiro</td>
                                            <td>Homemaker Centre Fortitude Valley</td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;">23/04/2023 07:04:51</lable>
                                                </strong>

                                            </td>
                                            <td>

                                                <strong>
                                                    <lable style="color: red;"> 23/04/2023 15:01:01</lable>
                                                </strong>



                                            </td>
                                            <td>

                                                7.93


                                            </td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                            <td>

                                                198<b>m</b>

                                            </td>
                                            <td>

                                                198<b>m</b>


                                            </td>

                                            <td>Cleaner In Site</td>
                                            <td>Under Analysis</td>

                                            <td>



                                                <a href="approval-view#"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil-eye"></i>
                                                    </span></a>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection