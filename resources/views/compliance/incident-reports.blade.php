@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Incident Reports</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Compliance</li>
                        <li class="breadcrumb-item active">Incident Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
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
                                    <option value="17">Globe Williams</option>
                                    <option value="18">Nexus</option>
                                    <option value="19">Ikon</option>
                                    <option value="20">QUAD Services</option>
                                    <option value="21">One Planet Facility Services Pty Ltd</option>
                                    <option value="22">The Trustee for ENCUM TRUST</option>
                                    <option value="24">Total Tools Cainrs</option>
                                    <option value="25">SKG</option>
                                    <option value="26">Cleansafe</option>
                                    <option value="28">ANCHOR BUILDING SERVICES QUEENSLAND PTY LTD</option>
                                    <option value="29">The Trustee for Altis Fortitude Valley Unit Trust</option>
                                    <option value="30">ARIA COMMUNICATIONS PTY LTD</option>
                                    <option value="31">The Trustee for Merivale Street Tenant Trust</option>
                                    <option value="32">The Trustee for Regent Street Property Trust</option>
                                    <option value="33">The Trustee for Waymouth Street Tenant Trust</option>
                                    <option value="34">Department of Justice and Attorney-General</option>
                                    <option value="37">W.G MALONE &amp; PICKWICK GROUP PTY LTD &amp; PICKWICK SECURITY
                                        SERVICES PTY LTD</option>
                                    <option value="38">South Burnett Regional Council</option>
                                    <option value="39">OMF The Valley</option>
                                    <option value="41">Department of Housing and Public Works</option>
                                    <option value="42">ASSETLINK SERVICES PTY LIMITED</option>
                                    <option value="46">GREAT NORTHERN TOOLS PTY LTD</option>
                                    <option value="47">IPG ADMIN PTY LTD</option>
                                    <option value="48">The Trustee for Main St Residential Trust</option>
                                    <option value="49">CBRE</option>
                                    <option value="50">Witbrook Projects</option>
                                    <option value="51">Glad Group Integrated Property Services Pty Ltd</option>
                                    <option value="52">CIP Constructions (QLD) Pty Ltd</option>
                                    <option value="53">Energetic Cleaning Services Pty Ltd</option>
                                    <option value="54">Disrupt Digital Pty Ltd</option>
                                    <option value="55">PBS BUILDING (QLD) Pty Ltd</option>
                                    <option value="56">Kimini Constructions</option>
                                    <option value="57">MJ&amp;D Anthony Property Management</option>
                                    <option value="58">Queensland Cricket Association</option>
                                    <option value="59">John West Logistics</option>
                                    <option value="60">QUAYCLEAN AUSTRALIA PTY LTD</option>
                                    <option value="61">P&amp;R Builders</option>
                                    <option value="62">Vincents Management Pty Ltd</option>
                                    <option value="63">Inscape Projects Group</option>
                                    <option value="64">Legal-E (D.I.Y) Pty Ltd</option>
                                    <option value="65">Arkadia </option>
                                    <option value="66">Unispace Global Pty Ltd</option>
                                    <option value="67">Simplaw Pty Ltd (Domayne &amp; Harvey Norman)</option>
                                    <option value="68">400 Gradi SA Pty Ltd</option>
                                    <option value="69">JLL (QLD) Pty Ltd</option>
                                    <option value="70">Middle Park Holdings Pty atf Middle Park Trust</option>
                                    <option value="71">Glad </option>
                                    <option value="72">Glad Retail Cleaning</option>
                                    <option value="73">Gringo Media</option>
                                    <option value="74">Quality Commercial Cleaning PTY LTD</option>
                                    <option value="75">About Town Real Estate Pty. Ltd</option>
                                    <option value="76">Cleanworks</option>
                                    <option value="79">UNITA (QLD) Pty Ltd</option>
                                    <option value="80">John Holland Pty Ltd</option>
                                    <option value="81">The Trustee for Peel Street Property Trust</option>
                                    <option value="82">The Trustee for La Trobe Street Property Trust</option>
                                    <option value="83">Scape Regent Street Operator Pty Ltd </option>
                                    <option value="84">Scape Swanston </option>
                                    <option value="85">UBS Grocon Real Estate Nominees Pty Limited as trustee for the
                                        Parklands Ownership Trust</option>
                                    <option value="86">Industrial Control and Electrical Pty Ltd</option>
                                    <option value="87">Brick n Pave</option>
                                    <option value="88">ISS Group</option>
                                    <option value="89">Boulder Wall Construction</option>
                                    <option value="90">AUMR Property Management</option>
                                    <option value="91">Cumbia Bar &amp; Restaurant</option>
                                    <option value="92">Australian Catering Services (Ainslie Bullion)</option>
                                    <option value="93">Knight Frank Facilities Response Centre</option>
                                    <option value="94">Mettle Projects Pty Ltd</option>
                                    <option value="95">Judith</option>
                                    <option value="96">BM Prestige</option>
                                    <option value="98">The Trustee for The Fresh Fish Trust</option>
                                    <option value="99">Elena Cadir</option>
                                    <option value="100">Hutchinson Builders</option>
                                    <option value="102">TenderSearch</option>
                                    <option value="103">Hansen Yuncken Pty Ltd</option>
                                    <option value="104">Neckam (Unilodge)</option>
                                    <option value="105">Workdash</option>
                                    <option value="106">Consulate-General of Brazil</option>
                                    <option value="107">Nature's Edge</option>
                                    <option value="108">Best Strata</option>
                                    <option value="109">Owens Management Services’</option>
                                    <option value="110">Whitsunday Regional Council</option>
                                    <option value="111">J and HX Family Trust</option>
                                    <option value="112">Denise Saba</option>
                                    <option value="113">Toowoomba Regional Council</option>
                                    <option value="114">ONE CULTURE FOOTBALL LTD</option>
                                    <option value="115">Mustafa</option>
                                    <option value="116">SmartClinics</option>
                                    <option value="117">Scape Waymouth Operator Pty Ltd</option>
                                    <option value="118">Scape Merivale Operator Pty Ltd</option>
                                    <option value="119">Scape Bell Lane Operator Pty Ltd</option>
                                    <option value="120">Scape Peel Operator Pty Ltd</option>
                                    <option value="121">Global Food and Wine Foodservice</option>
                                    <option value="122">ISS Facility Services</option>
                                    <option value="123">Mamre Association Inc.</option>
                                    <option value="124">Bloom Hearing Specialists</option>
                                    <option value="125">Wara Sushi</option>
                                    <option value="126">Dimeo Management Services Pty Limited</option>
                                    <option value="127">Scape Vulture Operator Pty Ltd</option>
                                    <option value="128">Scape Coronation Operator Pty Ltd</option>
                                    <option value="129">Gasworks Residency</option>
                                    <option value="133">CBRE </option>
                                    <option value="138">Scape Glen Road Operator Pty Ltd</option>
                                    <option value="140">GJK Indigenous Solutions</option>
                                    <option value="141">Felipe Bonati</option>
                                    <option value="145">Somerset Regional Council</option>
                                    <option value="146">MIRL Pty Ltd</option>
                                    <option value="147">Pritty Damn Good</option>
                                    <option value="150">Mission Australia</option>
                                    <option value="153">INJEX CLINICS PTY LTD</option>
                                    <option value="154">Pure Property Management&nbsp;</option>
                                    <option value="155">Buildcorp Group Pty Limited </option>
                                    <option value="156">BRIC - HOUSING</option>
                                    <option value="158">LNP</option>
                                    <option value="159">The Scout Association of Australia Queensland Branch</option>
                                    <option value="160">Chesworld Pty Ltd</option>
                                    <option value="161">VDG PTY. LTD</option>
                                    <option value="162">Profitability Virtual Assistance </option>
                                    <option value="164">Empire Jerky</option>
                                    <option value="165">The Salvation Army</option>
                                    <option value="166">ST VINCENT DE PAUL SOCIETY QUEENSLAND</option>
                                    <option value="167">Urbanest South Bank Leasing Trust</option>
                                    <option value="169">QUALITY HOME CLEANING SOLUTIONS</option>
                                    <option value="170">Queensland Cricketers Club Limited</option>
                                    <option value="171">Peracon Pty Ltd (Lectel) </option>
                                    <option value="172">Sleepy's</option>
                                    <option value="174">Gasoline Espresso Pty Ltd</option>
                                    <option value="176">The Rug Establishment</option>
                                    <option value="178">Floormaster</option>
                                    <option value="179">Mt Isa Police Station</option>
                                    <option value="180">Vivify Media Pty Ltd</option>
                                    <option value="181">Yong Real Estate</option>
                                    <option value="182">Iridium Project</option>
                                    <option value="183">Toowoomba Police Station Complex</option>
                                    <option value="184">Infinity Community Solutions Ltd.</option>
                                    <option value="185">Yow, Brad</option>
                                    <option value="186">Salt Meats Cheese Gasworks</option>
                                    <option value="187">Degani</option>
                                    <option value="188">CONQUER EST 2015 PTY LTD</option>
                                    <option value="189">Rapid Retail Services</option>
                                    <option value="190">Broadlex Services</option>
                                    <option value="191">Utopia Management</option>
                                    <option value="193">Quattro Property Services</option>
                                    <option value="194">Grip'd Brisbane</option>
                                    <option value="195">Assemble Communities</option>
                                    <option value="196">Department of Education</option>
                                    <option value="197">Little Locals Auchenflower</option>
                                    <option value="198">ECB</option>
                                    <option value="199">Western Downs Regional Council</option>
                                    <option value="200">Lennox Facade Solutions</option>
                                    <option value="201">State of QLD industrial Relations</option>
                                    <option value="202">Eureka</option>
                                    <option value="203">Lancini Property Group</option>
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
                                <option value="2926">AEC - Toowoomba Neil and Laurel Street</option>
                                <option value="920">AEC - Beverley</option>
                                <option value="1368">AEC - Regents Park</option>
                                <option value="1340">AEC - Yeppon</option>
                                <option value="1204">AEC - Archerfield</option>
                                <option value="2927">AEC Toowoomba Orford Court</option>
                                <option value="1243">AEC - Hindmarsh</option>
                                <option value="2">AEC - Bundaberg</option>
                                <option value="1330">AEC - Dundowran</option>
                                <option value="1255">AEC - Aitkenvale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Status</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Date of Incident</label>
                                <input type="text" class="form-control" id="basic-datepicker4"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Incident ID</label>
                                <input type="text" class="form-control" id="basic-datepicker4"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Creator</label>
                                <select data-plugin="customselect" class="form-select">
                                <option value="null">Select the Creator</option>
                                <option value="8">Marco Araujo</option>
                                <option value="14">Luan Ramos</option>
                                <option value="25">Eduardo Abreu</option>
                                <option value="31">Juan Mejia</option>
                                <option value="36">Lorena Lopes</option>
                                <option value="53">Ricki Palmer</option>
                                <option value="88">Ron Hall</option>
                                <option value="133">Steve Jackson</option>
                                <option value="360">Italo Sabatini</option>
                                <option value="362">Itamar Braga</option>
                                <option value="420">Fraser Muir</option>
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
                            <!-- <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                Excel File</i></a> -->
                        </div>
                                    </div>
                                </div>
            </div>

            <div class="card">

<div class="card-header">
    <div class="top_section_title">
        <h5>All Incident Reports</h5>
        <a href="incident-reports-add#" class="btn btn-primary">+ Add Incident Report</a>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="table_box">
                <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                    <thead>
                        <tr>
                            <th>Incident ID</th>
                            <th>Date of Incident</th>
                            <th>Status</th>
                            <th>Client</th>
                            <th>Portfolio</th>
                            <th>Site</th>
                            <th>Address Of Incident</th>
                            <th>Injury Incident</th>
                            <th>Environmental Incident</th>
                            <th>Other Incident</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr role="row" class="odd">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                            <td>
                                <a href="incident-reports-view#"><span
                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                            class="uil-eye"></i></span></a>
                               
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
    <!-- end row -->

</div>
<!-- container -->


@endsection