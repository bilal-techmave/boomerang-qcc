@extends('layouts.main')
@section('app-title','Prospect Client Edit - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Prospect Client Edit</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Prospect Client Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span><i class="bi bi-journals"></i></span>
                                <span>Address</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-building"></i></span>
                                <span>Portfolio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#other-details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-clipboard-notes"></i></span>
                                <span>Other Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-comment-alt"></i></span>
                                <span>Comments</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <span><i class="bi bi-hash"></i></span>
                                <span>Social Media</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card show_portfolio_tab">

                <div class="card-body">

                    <div class="tab-content  text-muted">
                        <div class="tab-pane show active" id="home">

                        <div class="main_bx_dt__">
                                <div class="top_dt_sec">


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Business Name <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->business_name }}"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Trading Name <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"   placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">ABN</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->abn }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">ACN</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->acn }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Phone Number <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->phone_number }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Second Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->phone_number }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Mobile Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->phone_number }}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Fax Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $prospect->fax_number }}" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">Type of the client <span class="red">*</span></label>
                                                <select data-plugin="customselect" class="form-select">
                                                    <option value="0">Commercial</option>
                                                    <option value="1">Residential</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Website</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>


                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">Company <span class="red">*</span></label>
                                                <select data-plugin="customselect" class="form-select">
                                                    <option value="0">Please select one or start typing</option>
                                                    <option value="1">Quality Commercial Cleaning Pty Ltd.</option>
                                                    <option value="1">Quality Home Cleaning Solutions Pty Ltd.</option>
                                                    <option value="1">24/7 RR Pty Ltd</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="mb-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox6a" type="checkbox">
                                                    <label class="form-label" for="checkbox6a">
                                                      Check if it is a Prospect Client
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="mb-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox6b" type="checkbox">
                                                    <label class="form-label" for="checkbox6b">
                                                      Check if it is a Direct Client
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div class="mb-3">
                                                <label class="form-label">Note</label>
                                                <textarea required class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="title_head">
                                                <h4>Contact Information</h4>
                                            </div>
                                        </div>

                                      <form id="contactInformation" method="post">
                                        <div class="col-lg-6">
                                          <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Contact </label>
                                        <select data-plugin="customselect" name="contactId" class="form-select">
                                            <option value="N_A">Please select one  contact typing</option>
                                            @forelse ($user as $alluser)
                                            <option value="{{ $alluser->id }}">{{ $alluser->name }} ({{ $alluser->email }})</option>
                                            @empty
                                            @endforelse


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Contact Type</label>
                                         <select data-plugin="customselect" name="contactType" class="form-select">
                                            <option value="N_A">Please select one or contact typing</option>
                                              @forelse ($roles as $allRoles)
                                                <option value="{{ $allRoles->id }}">{{ $allRoles->name }}</option>
                                                @empty
                                             @endforelse
                                        </select>
                                    </div>
                                </div>
                                        <div class="col-lg-12">
                                            <div class="add_address text-end">
                                                <button type="submit" class="theme_btn btn add_btn" id="add_comment_btn">Update Contact</button>
                                            </div>
                                        </div>
                                      </form>

                                        <div class="col-lg-12  mt-3">
                                            <table  class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Email</th>
                                                            <th>Contact Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>


                                                  <tbody id="AppendCntactInformation">
                                                    <tr>
                                                        <td>Owen Wills</td>
                                                        <td>0417 074 635</td>
                                                        <td>owen.wills@tr.qld.gov.au</td>
                                                        <td>Manager</td>
                                                        <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>
                                                    </tr>

                                                </tbody>
                                                </table>
                                          </div>
                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="client-prospect.php" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->
                        </div>
                        <div class="tab-pane " id="profile">
                        <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Unit </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Address Number <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"  placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Street Address <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Suburb <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>


                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">City </label>
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
                                                    <option value="ALLORA">Allora</option>
                                                    <option value="ALPHA">Alpha</option>
                                                    <option value="ALSTONVILLE">Alstonville</option>
                                                    <option value="ANAKIE">Anakie</option>
                                                    <option value="ANDAMOOKA">Andamooka</option>
                                                    <option value="ANGLESEA">Anglesea</option>
                                                    <option value="ANSONS_BAY">Ansons Bay</option>
                                                    <option value="ANTWERP">Antwerp</option>
                                                    <option value="APOLLO_BAY">Apollo Bay</option>
                                                    <option value="APPIN">Appin</option>
                                                    <option value="ARALUEN">Araluen</option>
                                                    <option value="ARAMAC">Aramac</option>
                                                    <option value="ARARAT">Ararat</option>
                                                    <option value="ARDLETHAN">Ardlethan</option>
                                                    <option value="ARDROSSAN">Ardrossan</option>
                                                    <option value="ARIAH_PARK">Ariah Park</option>
                                                    <option value="ARLTUNGA">Arltunga</option>
                                                    <option value="ARMADALE">Armadale</option>
                                                    <option value="ARMIDALE">Armidale</option>
                                                    <option value="ARNO_BAY">Arno Bay</option>
                                                    <option value="ARTHUR_RIVER">Arthur River</option>
                                                    <option value="ASHFORD">Ashford</option>
                                                    <option value="ATHERTON">Atherton</option>
                                                    <option value="AUGUSTA">Augusta</option>
                                                    <option value="AUSTINMER">Austinmer</option>
                                                    <option value="AUSTRALIND">Australind</option>
                                                    <option value="AVENEL">Avenel</option>
                                                    <option value="AVOCA_BEACH">Avoca Beach</option>
                                                    <option value="AVOCA_TAS">Avoca TAS</option>
                                                    <option value="AVOCA_VIC">Avoca</option>
                                                    <option value="AYR">Ayr</option>
                                                    <option value="BABINDA">Babinda</option>
                                                    <option value="BADGINGARRA">Badgingarra</option>
                                                    <option value="BAIRNSDALE">Bairnsdale</option>
                                                    <option value="BALINGUP">Balingup</option>
                                                    <option value="BALLADONIA">Balladonia</option>
                                                    <option value="BALLINA">Ballina</option>
                                                    <option value="BALMORAL">Balmoral</option>
                                                    <option value="BALRANALD">Balranald</option>
                                                    <option value="BANGALOW">Bangalow</option>
                                                    <option value="BARELLAN">Barellan</option>
                                                    <option value="BARGARA">Bargara</option>
                                                    <option value="BARGO">Bargo</option>
                                                    <option value="BARHAM">Barham</option>
                                                    <option value="BARMAH">Barmah</option>
                                                    <option value="BARMEDMAN">Barmedman</option>
                                                    <option value="BARMERA">Barmera</option>
                                                    <option value="BAROOGA">Barooga</option>
                                                    <option value="BARRABA">Barraba</option>
                                                    <option value="BARRINGTON_TOPS">Barrington Tops</option>
                                                    <option value="BARRINGUN">Barringun</option>
                                                    <option value="BARROW_CREEK">Barrow Creek</option>
                                                    <option value="BATCHELOR">Batchelor</option>
                                                    <option value="BATEMANS_BAY">Batemans Bay</option>
                                                    <option value="BATHURST">Bathurst</option>
                                                    <option value="BATLOW">Batlow</option>
                                                    <option value="BEACONSFIELD">Beaconsfield</option>
                                                    <option value="BEAGLE_BAY">Beagle Bay</option>
                                                    <option value="BEAUDESERT">Beaudesert</option>
                                                    <option value="BEAUFORT">Beaufort</option>
                                                    <option value="BEECH_FOREST">Beech Forest</option>
                                                    <option value="BEENLEIGH">Beenleigh</option>
                                                    <option value="BEGA">Bega</option>
                                                    <option value="BELL">Bell</option>
                                                    <option value="BELLINGEN">Bellingen</option>
                                                    <option value="BELLS_BEACH">Bells Beach</option>
                                                    <option value="BELMONT">Belmont</option>
                                                    <option value="BEMBOKA">Bemboka</option>
                                                    <option value="BENALLA">Benalla</option>
                                                    <option value="BENCUBBIN">Bencubbin</option>
                                                    <option value="BENDEMEER">Bendemeer</option>
                                                    <option value="BENDIGO">Bendigo</option>
                                                    <option value="BERMAGUI">Bermagui</option>
                                                    <option value="BERRI">Berri</option>
                                                    <option value="BERRIDALE">Berridale</option>
                                                    <option value="BERRIGAN">Berrigan</option>
                                                    <option value="BERRIMA">Berrima</option>
                                                    <option value="BERRY">Berry</option>
                                                    <option value="BEULAH">Beulah</option>
                                                    <option value="BEVERIDGE">Beveridge</option>
                                                    <option value="BEVERLEY">Beverley</option>
                                                    <option value="BICHENO">Bicheno</option>
                                                    <option value="BIGGENDEN">Biggenden</option>
                                                    <option value="BILOELA">Biloela</option>
                                                    <option value="BILPIN">Bilpin</option>
                                                    <option value="BINALONG">Binalong</option>
                                                    <option value="BINDA">Binda</option>
                                                    <option value="BINDOON">Bindoon</option>
                                                    <option value="BINGARA">Bingara</option>
                                                    <option value="BIRCHIP">Birchip</option>
                                                    <option value="BIRDSVILLE">Birdsville</option>
                                                    <option value="BIRDWOOD">Birdwood</option>
                                                    <option value="BLACKHEATH">Blackheath</option>
                                                    <option value="BLACKWATER">Blackwater</option>
                                                    <option value="BLACKWOOD">Blackwood</option>
                                                    <option value="BLAYNEY">Blayney</option>
                                                    <option value="BOAT_HARBOUR">Boat Harbour</option>
                                                    <option value="BODALLA">Bodalla</option>
                                                    <option value="BODDINGTON">Boddington</option>
                                                    <option value="BOGGABRI">Boggabri</option>
                                                    <option value="BOMBALA">Bombala</option>
                                                    <option value="BONALBO">Bonalbo</option>
                                                    <option value="BOODJAMULLA_NP">Boodjamulla N.P.</option>
                                                    <option value="BOOLEROO_CENTRE">Booleroo Centre</option>
                                                    <option value="BOOLIGAL">Booligal</option>
                                                    <option value="BOONAH">Boonah</option>
                                                    <option value="BOOROORBAN">Booroorban</option>
                                                    <option value="BOOROWA">Boorowa</option>
                                                    <option value="BORDEN">Borden</option>
                                                    <option value="BORDER_VILLAGE">Border Village</option>
                                                    <option value="BORROLOOLA">Borroloola</option>
                                                    <option value="BOTHWELL">Bothwell</option>
                                                    <option value="BOULIA">Boulia</option>
                                                    <option value="BOURKE">Bourke</option>
                                                    <option value="BOWEN">Bowen</option>
                                                    <option value="BOWRAL">Bowral</option>
                                                    <option value="BOWRAVILLE">Bowraville</option>
                                                    <option value="BOYDTOWN">Boydtown</option>
                                                    <option value="BOYNE_ISLAND">Boyne Island</option>
                                                    <option value="BOYUP_BROOK">Boyup Brook</option>
                                                    <option value="BRAIDWOOD">Braidwood</option>
                                                    <option value="BRANXHOLM">Branxholm</option>
                                                    <option value="BRANXTON">Branxton</option>
                                                    <option value="BREADALBANE">Breadalbane</option>
                                                    <option value="BREMER_BAY">Bremer Bay</option>
                                                    <option value="BREWARRINA">Brewarrina</option>
                                                    <option value="BRIBIE_ISLAND">Bribie Island</option>
                                                    <option value="BRIDGEWATER_SA">Bridgewater SA</option>
                                                    <option value="BRIDGEWATER_TAS">Bridgewater TAS</option>
                                                    <option value="BRIDPORT">Bridport</option>
                                                    <option value="BRIGHT">Bright</option>
                                                    <option value="BRIGHTON">Brighton</option>
                                                    <option value="BRIM">Brim</option>
                                                    <option value="BRINDABELLA">Brindabella</option>
                                                    <option value="BRISBANE">Brisbane</option>
                                                    <option value="BRISBANE_FOREST_PARK">Brisbane Forest Park</option>
                                                    <option value="BROAD_ARROW">Broad Arrow</option>
                                                    <option value="BROADFORD">Broadford</option>
                                                    <option value="BROADWATER">Broadwater</option>
                                                    <option value="BROKEN_HILL">Broken Hill</option>
                                                    <option value="BRONTE_PARK">Bronte Park</option>
                                                    <option value="BROOKLYN">Brooklyn</option>
                                                    <option value="BROOKTON">Brookton</option>
                                                    <option value="BROOME">Broome</option>
                                                    <option value="BROOWEENA">Brooweena</option>
                                                    <option value="BROULEE">Broulee</option>
                                                    <option value="BRUCE">Bruce</option>
                                                    <option value="BRUNSWICK_HEADS">Brunswick Heads</option>
                                                    <option value="BRUNY_ISLAND">Bruny Island</option>
                                                    <option value="BRUTHEN">Bruthen</option>
                                                    <option value="BUCHAN">Buchan</option>
                                                    <option value="BUCKLAND">Buckland</option>
                                                    <option value="BUDERIM">Buderim</option>
                                                    <option value="BULAHDELAH">Bulahdelah</option>
                                                    <option value="BULLI">Bulli</option>
                                                    <option value="BUNDABERG">Bundaberg</option>
                                                    <option value="BUNDANOON">Bundanoon</option>
                                                    <option value="BUNDARRA">Bundarra</option>
                                                    <option value="BUNDEENA">Bundeena</option>
                                                    <option value="BUNGENDORE">Bungendore</option>
                                                    <option value="BUNGLE_BUNGLES">Bungle Bungles</option>
                                                    <option value="BUNGONIA">Bungonia</option>
                                                    <option value="BURLEIGH_HEADS">Burleigh Heads</option>
                                                    <option value="BURNIE">Burnie</option>
                                                    <option value="BURNING_MOUNTAIN">Burning Mountain</option>
                                                    <option value="BURRA">Burra</option>
                                                    <option value="BURRAWANG">Burrawang</option>
                                                    <option value="BURRINJUCK">Burrinjuck</option>
                                                    <option value="BUSHY_PARK">Bushy Park</option>
                                                    <option value="BYNG">Byng</option>
                                                    <option value="BYROCK">Byrock</option>
                                                    <option value="BYRON_BAY">Byron Bay</option>
                                                    <option value="BORDERTOWN">Bordertown</option>
                                                    <option value="CABOOLTURE">Caboolture</option>
                                                    <option value="CABRAMURRA">Cabramurra</option>
                                                    <option value="CAIGUNA">Caiguna</option>
                                                    <option value="CAIRNS">Cairns</option>
                                                    <option value="CALLIOPE">Calliope</option>
                                                    <option value="CALOUNDRA">Caloundra</option>
                                                    <option value="CAMDEN">Camden</option>
                                                    <option value="CAMOOWEAL">Camooweal</option>
                                                    <option value="CAMPBELL_TOWN">Campbell Town</option>
                                                    <option value="CAMPBELLTOWN">Campbelltown</option>
                                                    <option value="CANDELO">Candelo</option>
                                                    <option value="CANN_RIVER">Cann River</option>
                                                    <option value="CANOWINDRA">Canowindra</option>
                                                    <option value="CAPE_JERVIS">Cape Jervis</option>
                                                    <option value="CAPE_LEVEQUE">Cape Leveque</option>
                                                    <option value="CAPE_OTWAY">Cape Otway</option>
                                                    <option value="CAPE_TRIBULATION">Cape Tribulation</option>
                                                    <option value="CAPELLA">Capella</option>
                                                    <option value="CAPERTEE">Capertee</option>
                                                    <option value="CAPTAINS_FLAT">Captains Flat</option>
                                                    <option value="CARCOAR">Carcoar</option>
                                                    <option value="CARDWELL">Cardwell</option>
                                                    <option value="CARISBROOK">Carisbrook</option>
                                                    <option value="CARNAMAH">Carnamah</option>
                                                    <option value="CARNARVON_NP">Carnarvon N.P.</option>
                                                    <option value="CARNARVON">Carnarvon</option>
                                                    <option value="CARRATHOOL">Carrathool</option>
                                                    <option value="CHARLEVILLE">Charleville</option>
                                                    <option value="CASINO">Casino</option>
                                                    <option value="CASSILIS">Cassilis</option>
                                                    <option value="CATHERINE_HILL_BAY">Catherine Hill Bay</option>
                                                    <option value="CATTAI">Cattai</option>
                                                    <option value="CECIL_PLAINS">Cecil Plains</option>
                                                    <option value="CEDUNA">Ceduna</option>
                                                    <option value="CENTRAL_TILBA">Central Tilba</option>
                                                    <option value="CENTRAL_COAST">Central Coast</option>
                                                    <option value="CERVANTES">Cervantes</option>
                                                    <option value="CESSNOCK">Cessnock</option>
                                                    <option value="CHARLTON">Charlton</option>
                                                    <option value="CHARTERS_TOWERS">Charters Towers</option>
                                                    <option value="CHILDERS">Childers</option>
                                                    <option value="CHILTERN">Chiltern</option>
                                                    <option value="CHINCHILLA">Chinchilla</option>
                                                    <option value="CHURCHILL">Churchill</option>
                                                    <option value="CLARENCE_TOWN">Clarence Town</option>
                                                    <option value="CLERMONT">Clermont</option>
                                                    <option value="CLEVE">Cleve</option>
                                                    <option value="CLEVELAND">Cleveland</option>
                                                    <option value="CLIFTON_INCL_NOBBY">Clifton (incl. Nobby)</option>
                                                    <option value="CLONCURRY">Cloncurry</option>
                                                    <option value="COALCLIFF">Coalcliff</option>
                                                    <option value="COBAR">Cobar</option>
                                                    <option value="COBARGO">Cobargo</option>
                                                    <option value="COBRAM">Cobram</option>
                                                    <option value="COCKLEBIDDY">Cocklebiddy</option>
                                                    <option value="COFFIN_BAY">Coffin Bay</option>
                                                    <option value="COFFS_HARBOUR">Coffs Harbour</option>
                                                    <option value="COLEAMBALLY">Coleambally</option>
                                                    <option value="COLEBROOK">Colebrook</option>
                                                    <option value="COLEDALE">Coledale</option>
                                                    <option value="COLES_BAY">Coles Bay</option>
                                                    <option value="COLLECTOR">Collector</option>
                                                    <option value="COLLIE">Collie</option>
                                                    <option value="COLLINSVILLE">Collinsville</option>
                                                    <option value="COMBOYNE">Comboyne</option>
                                                    <option value="CONDAMINE">Condamine</option>
                                                    <option value="CONDOBOLIN">Condobolin</option>
                                                    <option value="COOKTOWN">Cooktown</option>
                                                    <option value="COOLAH">Coolah</option>
                                                    <option value="COOLAMON">Coolamon</option>
                                                    <option value="COOLANGATTA">Coolangatta</option>
                                                    <option value="COOLGARDIE">Coolgardie</option>
                                                    <option value="COOMA">Cooma</option>
                                                    <option value="COONABARABRAN">Coonabarabran</option>
                                                    <option value="COONAMBLE">Coonamble</option>
                                                    <option value="COORANBONG">Cooranbong</option>
                                                    <option value="COOROY">Cooroy</option>
                                                    <option value="COOTAMUNDRA">Cootamundra</option>
                                                    <option value="COPLEY">Copley</option>
                                                    <option value="CORAKI">Coraki</option>
                                                    <option value="COOLUM_BEACH">Coolum Beach</option>
                                                    <option value="CORAL_BAY">Coral Bay</option>
                                                    <option value="CORINNA">Corinna</option>
                                                    <option value="COROWA">Corowa</option>
                                                    <option value="CORRIGIN">Corrigin</option>
                                                    <option value="CORRYONG">Corryong</option>
                                                    <option value="COSSACK">Cossack</option>
                                                    <option value="COWELL">Cowell</option>
                                                    <option value="COWRA">Cowra</option>
                                                    <option value="CRADLE_MOUNTAIN">Cradle Mountain</option>
                                                    <option value="CRANBROOK">Cranbrook</option>
                                                    <option value="CRESCENT_HEAD">Crescent Head</option>
                                                    <option value="CRESSY">Cressy</option>
                                                    <option value="CROOKWELL">Crookwell</option>
                                                    <option value="CROWS_NEST">Crows Nest</option>
                                                    <option value="CROYDON">Croydon</option>
                                                    <option value="CUBALLING">Cuballing</option>
                                                    <option value="CUDAL">Cudal</option>
                                                    <option value="CUE">Cue</option>
                                                    <option value="CULBURRA_BEACH">Culburra Beach</option>
                                                    <option value="CULCAIRN">Culcairn</option>
                                                    <option value="CULLEN_BULLEN">Cullen Bullen</option>
                                                    <option value="CUMMINS">Cummins</option>
                                                    <option value="CUNDERDIN">Cunderdin</option>
                                                    <option value="CUNNAMULLA">Cunnamulla</option>
                                                    <option value="CYGNET">Cygnet</option>
                                                    <option value="DAINTREE">Daintree</option>
                                                    <option value="DALBY">Dalby</option>
                                                    <option value="DALGETY">Dalgety</option>
                                                    <option value="DALWALLINU">Dalwallinu</option>
                                                    <option value="DALY_RIVER">Daly River</option>
                                                    <option value="DALY_WATERS">Daly Waters</option>
                                                    <option value="DAMPIER">Dampier</option>
                                                    <option value="DARKAN">Darkan</option>
                                                    <option value="DARLINGTON_POINT">Darlington Point</option>
                                                    <option value="DARLING_DOWNS">Darling Downs</option>
                                                    <option value="DARLINGTON">Darlington</option>
                                                    <option value="DARWIN">Darwin</option>
                                                    <option value="DAYDREAM_ISLAND">Daydream Island</option>
                                                    <option value="DAYLESFORD">Daylesford</option>
                                                    <option value="DAYBORO">Dayboro</option>
                                                    <option value="DEDDINGTON">Deddington</option>
                                                    <option value="DELORAINE">Deloraine</option>
                                                    <option value="DENILIQUIN">Deniliquin</option>
                                                    <option value="DENMAN">Denman</option>
                                                    <option value="DENMARK">Denmark</option>
                                                    <option value="DERBY_TAS">Derby TAS</option>
                                                    <option value="DERBY_WA">?-DERBY_WA</option>
                                                    <option value="DERWENT_BRIDGE">Derwent Bridge</option>
                                                    <option value="DEVONPORT">Devonport</option>
                                                    <option value="DIMBOOLA">Dimboola</option>
                                                    <option value="DIRK_HARTOG_ISLAND">Dirk Hartog Island</option>
                                                    <option value="DONALD">Donald</option>
                                                    <option value="DORRIGO">Dorrigo</option>
                                                    <option value="DOVER">Dover</option>
                                                    <option value="DOWERIN">Dowerin</option>
                                                    <option value="DUARINGA">Duaringa</option>
                                                    <option value="DUBBO">Dubbo</option>
                                                    <option value="DUMBLEYUNG">Dumbleyung</option>
                                                    <option value="DUNALLEY">Dunalley</option>
                                                    <option value="DUNEDOO">Dunedoo</option>
                                                    <option value="DUNGOG">Dungog</option>
                                                    <option value="DUNK_ISLAND">Dunk Island</option>
                                                    <option value="DUNKELD">Dunkeld</option>
                                                    <option value="DUNOLLY">Dunolly</option>
                                                    <option value="DUNSBOROUGH">Dunsborough</option>
                                                    <option value="DURRAS">Durras</option>
                                                    <option value="DWELLINGUP">Dwellingup</option>
                                                    <option value="DYSART">Dysart</option>
                                                    <option value="EAGLEHAWK_NECK">Eaglehawk Neck</option>
                                                    <option value="EBENEZER">Ebenezer</option>
                                                    <option value="ECHUCA">Echuca</option>
                                                    <option value="EDEN">Eden</option>
                                                    <option value="EDENHOPE">Edenhope</option>
                                                    <option value="EDITHBURGH">Edithburgh</option>
                                                    <option value="EIDSVOLD">Eidsvold</option>
                                                    <option value="ELDORADO">Eldorado</option>
                                                    <option value="ELLISTON">Elliston</option>
                                                    <option value="EMERALD">Emerald</option>
                                                    <option value="EMMAVILLE">Emmaville</option>
                                                    <option value="EMU_PARK">Emu Park</option>
                                                    <option value="EMU_PLAINS">Emu Plains</option>
                                                    <option value="ENEABBA">Eneabba</option>
                                                    <option value="ENNGONIA">Enngonia</option>
                                                    <option value="ERLDUNDA">Erldunda</option>
                                                    <option value="ESK">Esk</option>
                                                    <option value="EUCLA">Eucla</option>
                                                    <option value="EUGOWRA">Eugowra</option>
                                                    <option value="EUSTON">Euston</option>
                                                    <option value="EVANDALE">Evandale</option>
                                                    <option value="EVANS_HEAD">Evans Head</option>
                                                    <option value="EXMOUTH">Exmouth</option>
                                                    <option value="FALMOUTH">Falmouth</option>
                                                    <option value="FARAWAY_BAY">Faraway Bay</option>
                                                    <option value="FAULCONBRIDGE">Faulconbridge</option>
                                                    <option value="FINGAL_HEAD">Fingal Head</option>
                                                    <option value="FINGAL">Fingal</option>
                                                    <option value="FINLEY">Finley</option>
                                                    <option value="FITZROY_CROSSING">Fitzroy Crossing</option>
                                                    <option value="FITZROY_FALLS">Fitzroy Falls</option>
                                                    <option value="FLINDERS_ISLAND">Flinders Island</option>
                                                    <option value="FORBES">Forbes</option>
                                                    <option value="FORSTER_TUNCURRY">Forster-Tuncurry</option>
                                                    <option value="FOSTER">Foster</option>
                                                    <option value="FOWLERS_BAY">Fowlers Bay</option>
                                                    <option value="FRANKLIN">Franklin</option>
                                                    <option value="FRASER_ISLAND">Fraser Island</option>
                                                    <option value="GANMAIN">Ganmain</option>
                                                    <option value="GATTON">Gatton</option>
                                                    <option value="GAYNDAH">Gayndah</option>
                                                    <option value="GEEVESTON">Geeveston</option>
                                                    <option value="GENOA">Genoa</option>
                                                    <option value="GEORGE_TOWN">George Town</option>
                                                    <option value="GEORGETOWN">Georgetown</option>
                                                    <option value="GERRINGONG">Gerringong</option>
                                                    <option value="GERROA">Gerroa</option>
                                                    <option value="GILGANDRA">Gilgandra</option>
                                                    <option value="GIN_GIN">Gin Gin</option>
                                                    <option value="GIRILAMBONE">Girilambone</option>
                                                    <option value="GLADSTONE_QLD">Gladstone QLD</option>
                                                    <option value="GLADSTONE_SA">Gladstone SA</option>
                                                    <option value="GLADSTONE_TAS">Gladstone TAS</option>
                                                    <option value="GLASS_HOUSE_MOUNTAINS">Glass House Mountains</option>
                                                    <option value="GLEN_HELEN">Glen Helen</option>
                                                    <option value="GLEN_INNES">Glen Innes</option>
                                                    <option value="GLENBROOK">Glenbrook</option>
                                                    <option value="GLENROWAN">Glenrowan</option>
                                                    <option value="GLOUCESTER">Gloucester</option>
                                                    <option value="GNOWANGERUP">Gnowangerup</option>
                                                    <option value="GOOLOOGONG">Gooloogong</option>
                                                    <option value="GOOLWA">Goolwa</option>
                                                    <option value="GOONDIWINDI">Goondiwindi</option>
                                                    <option value="GORDONVALE">Gordonvale</option>
                                                    <option value="GOROKE">Goroke</option>
                                                    <option value="GOSFORD">Gosford</option>
                                                    <option value="GOULBURN">Goulburn</option>
                                                    <option value="GOULDS_COUNTRY">Goulds Country</option>
                                                    <option value="GRAFTON">Grafton</option>
                                                    <option value="GRANDCHESTER">Grandchester</option>
                                                    <option value="GREAT_WESTERN">Great Western</option>
                                                    <option value="GREENMOUNT">Greenmount</option>
                                                    <option value="GREGORY">Gregory</option>
                                                    <option value="GRENFELL">Grenfell</option>
                                                    <option value="GRESFORD">Gresford</option>
                                                    <option value="GRETA">Greta</option>
                                                    <option value="GRIFFITH">Griffith</option>
                                                    <option value="GUILDFORD">Guildford</option>
                                                    <option value="GULARGAMBONE">Gulargambone</option>
                                                    <option value="GULGONG">Gulgong</option>
                                                    <option value="GUNDAGAI">Gundagai</option>
                                                    <option value="GUNDY">Gundy</option>
                                                    <option value="GUNNEDAH">Gunnedah</option>
                                                    <option value="GUNNING">Gunning</option>
                                                    <option value="GUYRA">Guyra</option>
                                                    <option value="GWALIA">Gwalia</option>
                                                    <option value="GYMPIE">Gympie</option>
                                                    <option value="GOLD_COAST">Gold Coast</option>
                                                    <option value="HADSPEN">Hadspen</option>
                                                    <option value="HAHNDORF">Hahndorf</option>
                                                    <option value="HALLS_CREEK">Halls Creek</option>
                                                    <option value="HALLS_GAP">Halls Gap</option>
                                                    <option value="HAMILTON">Hamilton</option>
                                                    <option value="HARCOURT">Harcourt</option>
                                                    <option value="HARDEN">Harden</option>
                                                    <option value="HARRIETVILLE">Harrietville</option>
                                                    <option value="HARRINGTON">Harrington</option>
                                                    <option value="HARROW">Harrow</option>
                                                    <option value="HARTLEY">Hartley</option>
                                                    <option value="HASTINGS">Hastings</option>
                                                    <option value="HAT_HEAD">Hat Head</option>
                                                    <option value="HAWKS_NEST">Hawks Nest</option>
                                                    <option value="HAY">Hay</option>
                                                    <option value="HAZELBROOK">Hazelbrook</option>
                                                    <option value="HENTY">Henty</option>
                                                    <option value="HEPBURN_SPRINGS">Hepburn Springs</option>
                                                    <option value="HERBERTON">Herberton</option>
                                                    <option value="HERMANNSBURG">Hermannsburg</option>
                                                    <option value="HERVEY_BAY">Hervey Bay</option>
                                                    <option value="HEYFIELD">Heyfield</option>
                                                    <option value="HILL_END">Hill End</option>
                                                    <option value="HILLGROVE">Hillgrove</option>
                                                    <option value="HILLSTON">Hillston</option>
                                                    <option value="HINTON">Hinton</option>
                                                    <option value="HOBART">Hobart</option>
                                                    <option value="HOLBROOK">Holbrook</option>
                                                    <option value="HOPETOUN_VIC">Hopetoun VIC</option>
                                                    <option value="HOPETOUN_WA">Hopetoun WA</option>
                                                    <option value="HORIZONTAL_FALLS">Horizontal Falls</option>
                                                    <option value="HORSHAM">Horsham</option>
                                                    <option value="HOUTMAN_ABROLHOS">Houtman Abrolhos</option>
                                                    <option value="HOWARD">Howard</option>
                                                    <option value="HOWLONG">Howlong</option>
                                                    <option value="HUGHENDEN">Hughenden</option>
                                                    <option value="HUMPTY_DOO">Humpty Doo</option>
                                                    <option value="HUNGERFORD">Hungerford</option>
                                                    <option value="HUSKISSON">Huskisson</option>
                                                    <option value="ILFRACOMBE">Ilfracombe</option>
                                                    <option value="ILUKA">Iluka</option>
                                                    <option value="INGHAM">Ingham</option>
                                                    <option value="INNAMINCKA">Innamincka</option>
                                                    <option value="INNISFAIL">Innisfail</option>
                                                    <option value="INVERELL">Inverell</option>
                                                    <option value="INVERLOCH">Inverloch</option>
                                                    <option value="INJUNE">Injune</option>
                                                    <option value="IPSWICH">Ipswich</option>
                                                    <option value="IRON_KNOB">Iron Knob</option>
                                                    <option value="INGLEWOOD">Inglewood</option>
                                                    <option value="IRVINEBANK">Irvinebank</option>
                                                    <option value="ISISFORD">Isisford</option>
                                                    <option value="JAMBEROO">Jamberoo</option>
                                                    <option value="JAMESTOWN">Jamestown</option>
                                                    <option value="JAMIESON">Jamieson</option>
                                                    <option value="JANDOWAE">Jandowae</option>
                                                    <option value="JENOLAN_CAVES">Jenolan Caves</option>
                                                    <option value="JEPARIT">Jeparit</option>
                                                    <option value="JERILDERIE">Jerilderie</option>
                                                    <option value="JERRAMUNGUP">Jerramungup</option>
                                                    <option value="JERRYS_PLAINS">Jerrys Plains</option>
                                                    <option value="JERVIS_BAY">Jervis Bay</option>
                                                    <option value="JINDABYNE">Jindabyne</option>
                                                    <option value="JINDERA">Jindera</option>
                                                    <option value="JOADJA">Joadja</option>
                                                    <option value="JONDARYAN">Jondaryan</option>
                                                    <option value="JUGIONG">Jugiong</option>
                                                    <option value="JULIA_CREEK">Julia Creek</option>
                                                    <option value="JUNEE">Junee</option>
                                                    <option value="JURIEN_BAY">Jurien Bay</option>
                                                    <option value="KADINA">Kadina</option>
                                                    <option value="KAKADU_NATIONAL_PARK">Kakadu National Park</option>
                                                    <option value="KALAMUNDA">Kalamunda</option>
                                                    <option value="KALGOORLIE">Kalgoorlie</option>
                                                    <option value="KAMBALDA">Kambalda</option>
                                                    <option value="KAMERUKA">Kameruka</option>
                                                    <option value="KANDOS">Kandos</option>
                                                    <option value="KANGAROO_VALLEY">Kangaroo Valley</option>
                                                    <option value="KANIVA">Kaniva</option>
                                                    <option value="KANOWNA">Kanowna</option>
                                                    <option value="KARRATHA">Karratha</option>
                                                    <option value="KARUAH">Karuah</option>
                                                    <option value="KARUMBA">Karumba</option>
                                                    <option value="KATHERINE">Katherine</option>
                                                    <option value="KATOOMBA">Katoomba</option>
                                                    <option value="KELLERBERRIN">Kellerberrin</option>
                                                    <option value="KEMPSEY">Kempsey</option>
                                                    <option value="KEMPTON">Kempton</option>
                                                    <option value="KENDALL">Kendall</option>
                                                    <option value="KENILWORTH">Kenilworth</option>
                                                    <option value="KERANG">Kerang</option>
                                                    <option value="KETTERING">Kettering</option>
                                                    <option value="KHANCOBAN">Khancoban</option>
                                                    <option value="KIAMA">Kiama</option>
                                                    <option value="KIANDRA">Kiandra</option>
                                                    <option value="KILCOY">Kilcoy</option>
                                                    <option value="KILKIVAN">Kilkivan</option>
                                                    <option value="KILLARNEY">Killarney</option>
                                                    <option value="KILMORE">Kilmore</option>
                                                    <option value="KINCUMBER">Kincumber</option>
                                                    <option value="KING_ISLAND">King Island</option>
                                                    <option value="KINGAROY">Kingaroy</option>
                                                    <option value="KINGS_CANYON">Kings Canyon</option>
                                                    <option value="KINGSCLIFF">Kingscliff</option>
                                                    <option value="KINGSTON_ON_MURRAY">Kingston on Murray</option>
                                                    <option value="KINGSTON">Kingston</option>
                                                    <option value="KOJONUP">Kojonup</option>
                                                    <option value="KOONDROOK">Koondrook</option>
                                                    <option value="KOONYA">Koonya</option>
                                                    <option value="KOORAWATHA">Koorawatha</option>
                                                    <option value="KOORDA">Koorda</option>
                                                    <option value="KOROIT">Koroit</option>
                                                    <option value="KORUMBURRA">Korumburra</option>
                                                    <option value="KULIN">Kulin</option>
                                                    <option value="KUNUNURRA">Kununurra</option>
                                                    <option value="KURANDA">Kuranda</option>
                                                    <option value="KURNELL">Kurnell</option>
                                                    <option value="KURRAJONG">Kurrajong</option>
                                                    <option value="KURRI_KURRI">Kurri Kurri</option>
                                                    <option value="KWINANA_BEACH">Kwinana Beach</option>
                                                    <option value="KYABRAM">Kyabram</option>
                                                    <option value="KYNETON">Kyneton</option>
                                                    <option value="KYOGLE">Kyogle</option>
                                                    <option value="KEITH">Keith</option>
                                                    <option value="LAIDLEY">Laidley</option>
                                                    <option value="LAKE_ARGYLE">Lake Argyle</option>
                                                    <option value="LAKE_CARGELLIGO">Lake Cargelligo</option>
                                                    <option value="LAKE_GRACE">Lake Grace</option>
                                                    <option value="LAKE_MACQUARIE">Lake Macquarie</option>
                                                    <option value="LAKE_MUNGO">Lake Mungo</option>
                                                    <option value="LAKE_ST_CLAIR">Lake St. Clair</option>
                                                    <option value="LAKE_TYERS">Lake Tyers</option>
                                                    <option value="LAKES_ENTRANCE">Lakes Entrance</option>
                                                    <option value="LANCEFIELD">Lancefield</option>
                                                    <option value="LANCELIN">Lancelin</option>
                                                    <option value="LANDSBOROUGH">Landsborough</option>
                                                    <option value="LARRIMAH">Larrimah</option>
                                                    <option value="LASCELLES">Lascelles</option>
                                                    <option value="LATROBE">Latrobe</option>
                                                    <option value="LAUNCESTON">Launceston</option>
                                                    <option value="LAURA">Laura</option>
                                                    <option value="LAURIETON">Laurieton</option>
                                                    <option value="LAVERS_HILL">Lavers Hill</option>
                                                    <option value="LAVERTON">Laverton</option>
                                                    <option value="LAWN_HILL_NP_QLD">Lawn Hill N.P. QLD</option>
                                                    <option value="LAWSON">Lawson</option>
                                                    <option value="LEEMAN">Leeman</option>
                                                    <option value="LEETON">Leeton</option>
                                                    <option value="LEIGH_CREEK">Leigh Creek</option>
                                                    <option value="LENNOX_HEAD">Lennox Head</option>
                                                    <option value="LEONGATHA">Leongatha</option>
                                                    <option value="LEONORA">Leonora</option>
                                                    <option value="LEURA">Leura</option>
                                                    <option value="LICOLA">Licola</option>
                                                    <option value="LIGHTNING_RIDGE">Lightning Ridge</option>
                                                    <option value="LILYDALE">Lilydale</option>
                                                    <option value="LISMORE">Lismore</option>
                                                    <option value="LITHGOW">Lithgow</option>
                                                    <option value="LIZARD_ISLAND">Lizard Island</option>
                                                    <option value="LOCKHART">Lockhart</option>
                                                    <option value="LONGFORD">Longford</option>
                                                    <option value="LORD_HOWE_ISLAND">Lord Howe Island</option>
                                                    <option value="LORNE">Lorne</option>
                                                    <option value="LOUTH">Louth</option>
                                                    <option value="LOXTON">Loxton</option>
                                                    <option value="LOGAN_CITY">Logan City</option>
                                                    <option value="LONGREACH">Longreach</option>
                                                    <option value="LOWWOD">Lowood</option>
                                                    <option value="LANSBOROUGH">Lansborough</option>
                                                    <option value="LUCKNOW">Lucknow</option>
                                                    <option value="LOBETHAL">Lobethal</option>
                                                    <option value="MACKAY">Mackay</option>
                                                    <option value="MACKSVILLE">Macksville</option>
                                                    <option value="MACLEAN">Maclean</option>
                                                    <option value="MADURA">Madura</option>
                                                    <option value="MAFFRA">Maffra</option>
                                                    <option value="MAITLAND_NSW">Maitland NSW</option>
                                                    <option value="MAITLAND_SA">Maitland SA</option>
                                                    <option value="MAJORS_CREEK">Majors Creek</option>
                                                    <option value="MALANDA">Malanda</option>
                                                    <option value="MALENY">Maleny</option>
                                                    <option value="MALLACOOTA">Mallacoota</option>
                                                    <option value="MANILDRA">Manildra</option>
                                                    <option value="MANILLA">Manilla</option>
                                                    <option value="MANSFIELD">Mansfield</option>
                                                    <option value="MARBLE_BAR">Marble Bar</option>
                                                    <option value="MAREEBA">Mareeba</option>
                                                    <option value="MARIA_ISLAND">Maria Island</option>
                                                    <option value="MARION_BAY">Marion Bay</option>
                                                    <option value="MARLBOROUGH">Marlborough</option>
                                                    <option value="MARLO">Marlo</option>
                                                    <option value="MAROOCHYDORE">Maroochydore</option>
                                                    <option value="MARRAWAH">Marrawah</option>
                                                    <option value="MARULAN">Marulan</option>
                                                    <option value="MARYBOROUGH">Maryborough</option>
                                                    <option value="MARYSVILLE">Marysville</option>
                                                    <option value="MATARANKA">Mataranka</option>
                                                    <option value="MATHOURA">Mathoura</option>
                                                    <option value="MCKINLAY">McKinlay</option>
                                                    <option value="MEDLOW_BATH">Medlow Bath</option>
                                                    <option value="MEEKATHARRA">Meekatharra</option>
                                                    <option value="MEGALONG_VALLEY">Megalong Valley</option>
                                                    <option value="MELBOURNE">Melbourne</option>
                                                    <option value="MELROSE">Melrose</option>
                                                    <option value="MENDOORAN">Mendooran</option>
                                                    <option value="MENINDEE">Menindee</option>
                                                    <option value="MENZIES">Menzies</option>
                                                    <option value="MERIMBULA">Merimbula</option>
                                                    <option value="MERREDIN">Merredin</option>
                                                    <option value="MERRIWA">Merriwa</option>
                                                    <option value="MERRIWAGGA">Merriwagga</option>
                                                    <option value="METUNG">Metung</option>
                                                    <option value="MILDURA">Mildura</option>
                                                    <option value="MILES">Miles</option>
                                                    <option value="MILLAA_MILLAA">Millaa Millaa</option>
                                                    <option value="MILLMERRAN">Millmerran</option>
                                                    <option value="MILLTHORPE">Millthorpe</option>
                                                    <option value="MILPARINKA">Milparinka</option>
                                                    <option value="MILTON">Milton</option>
                                                    <option value="MINGENEW">Mingenew</option>
                                                    <option value="MINLATON">Minlaton</option>
                                                    <option value="MINYIP">Minyip</option>
                                                    <option value="MIRANI">Mirani</option>
                                                    <option value="MISSION_BEACH">Mission Beach</option>
                                                    <option value="MITTA_MITTA">Mitta Mitta</option>
                                                    <option value="MITTAGONG">Mittagong</option>
                                                    <option value="MITCHELL">Mitchell</option>
                                                    <option value="MOAMA">Moama</option>
                                                    <option value="MOE">Moe</option>
                                                    <option value="MOGO">Mogo</option>
                                                    <option value="MOLE_CREEK">Mole Creek</option>
                                                    <option value="MOLIAGUL">Moliagul</option>
                                                    <option value="MOLLYMOOK">Mollymook</option>
                                                    <option value="MOLONG">Molong</option>
                                                    <option value="MONTO">Monto</option>
                                                    <option value="MOONTA">Moonta</option>
                                                    <option value="MOORA">Moora</option>
                                                    <option value="MOURA">Moura</option>
                                                    <option value="MORETON_ISLAND">Moreton Island</option>
                                                    <option value="MORANBAH">Moranbah</option>
                                                    <option value="MORGAN">Morgan</option>
                                                    <option value="MORISSET">Morisset</option>
                                                    <option value="MORPETH">Morpeth</option>
                                                    <option value="MORUYA">Moruya</option>
                                                    <option value="MOSS_VALE">Moss Vale</option>
                                                    <option value="MOSSMAN">Mossman</option>
                                                    <option value="MOULAMEIN">Moulamein</option>
                                                    <option value="MOUNT_AUGUSTUS">Mount Augustus</option>
                                                    <option value="MOUNT_BEAUTY">Mount Beauty</option>
                                                    <option value="MOUNT_BUFFALO">Mount Buffalo</option>
                                                    <option value="MOUNT_BULLER">Mount Buller</option>
                                                    <option value="MOUNT_GARNET">Mount Garnet</option>
                                                    <option value="MOUNT_ISA">Mount Isa</option>
                                                    <option value="MOUNT_KOSCIUSZKO">Mount Kosciuszko</option>
                                                    <option value="MOUNT_MAGNET">Mount Magnet</option>
                                                    <option value="MOUNT_MOLLOY">Mount Molloy</option>
                                                    <option value="MOUNT_MORGAN">Mount Morgan</option>
                                                    <option value="MOUNT_PERRY">Mount Perry</option>
                                                    <option value="MOUNT_SURPRISE">Mount Surprise</option>
                                                    <option value="MOUNT_VICTORIA">Mount Victoria</option>
                                                    <option value="MOUNT_WILSON">Mount Wilson</option>
                                                    <option value="MOURILYAN">Mourilyan</option>
                                                    <option value="MUDGEE">Mudgee</option>
                                                    <option value="MULLEWA">Mullewa</option>
                                                    <option value="MULLUMBIMBY">Mullumbimby</option>
                                                    <option value="MUNDARING">Mundaring</option>
                                                    <option value="MUNDRABILLA">Mundrabilla</option>
                                                    <option value="MUNDUBBERA">Mundubbera</option>
                                                    <option value="MUNGINDI">Mungindi</option>
                                                    <option value="MURCHISON">Murchison</option>
                                                    <option value="MURGON">Murgon</option>
                                                    <option value="MURRAY_BRIDGE">Murray Bridge</option>
                                                    <option value="MURRAYVILLE">Murrayville</option>
                                                    <option value="MURRINGO">Murringo</option>
                                                    <option value="MURRUMBATEMAN">Murrumbateman</option>
                                                    <option value="MURRUMBURRAH">Murrumburrah</option>
                                                    <option value="MURRURUNDI">Murrurundi</option>
                                                    <option value="MURTOA">Murtoa</option>
                                                    <option value="MURWILLUMBAH">Murwillumbah</option>
                                                    <option value="MUSWELLBROOK">Muswellbrook</option>
                                                    <option value="MUTTABURRA">Muttaburra</option>
                                                    <option value="MYALL_LAKES">Myall Lakes</option>
                                                    <option value="MYRTLEFORD">Myrtleford</option>
                                                    <option value="MT_GAMBIER">Mount Gambier</option>
                                                    <option value="MT_BARKER">Mount Barker</option>
                                                    <option value="MILICENT">Millicent</option>
                                                    <option value="NABIAC">Nabiac</option>
                                                    <option value="NAGAMBIE">Nagambie</option>
                                                    <option value="NAMBOUR">Nambour</option>
                                                    <option value="NAMBUCCA_HEADS">Nambucca Heads</option>
                                                    <option value="NANANGO">Nanango</option>
                                                    <option value="NANNUP">Nannup</option>
                                                    <option value="NAREMBEEN">Narembeen</option>
                                                    <option value="NAROOMA">Narooma</option>
                                                    <option value="NARANGBA">Narangba</option>
                                                    <option value="NARRABRI">Narrabri</option>
                                                    <option value="NARRANDERA">Narrandera</option>
                                                    <option value="NARROGIN">Narrogin</option>
                                                    <option value="NARROMINE">Narromine</option>
                                                    <option value="NATHALIA">Nathalia</option>
                                                    <option value="NATIMUK">Natimuk</option>
                                                    <option value="NATIONAL_PARK">National Park</option>
                                                    <option value="NELLIGEN">Nelligen</option>
                                                    <option value="NELSON_BAY">Nelson Bay</option>
                                                    <option value="NERANG">Nerang</option>
                                                    <option value="NEW_NORCIA">New Norcia</option>
                                                    <option value="NEW_NORFOLK">New Norfolk</option>
                                                    <option value="NEWCASTLE">Newcastle</option>
                                                    <option value="NEWMAN">Newman</option>
                                                    <option value="NEWNES">Newnes</option>
                                                    <option value="NHILL">Nhill</option>
                                                    <option value="NIMBIN">Nimbin</option>
                                                    <option value="NIMMITABEL">Nimmitabel</option>
                                                    <option value="NOOJEE">Noojee</option>
                                                    <option value="NOOSA_HEADS">Noosa Heads</option>
                                                    <option value="NORAH_HEAD">Norah Head</option>
                                                    <option value="NORMANTON">Normanton</option>
                                                    <option value="NORSEMAN">Norseman</option>
                                                    <option value="NORTHAMPTON">Northampton</option>
                                                    <option value="NOWRA">Nowra</option>
                                                    <option value="NULLAGINE">Nullagine</option>
                                                    <option value="NULLARBOR">Nullarbor</option>
                                                    <option value="NUMURKAH">Numurkah</option>
                                                    <option value="NUNDLE">Nundle</option>
                                                    <option value="NYNGAN">Nyngan</option>
                                                    <option value="NARACOORTE">Naracoorte</option>
                                                    <option value="OAKEY">Oakey</option>
                                                    <option value="OATLANDS">Oatlands</option>
                                                    <option value="OBERON">Oberon</option>
                                                    <option value="OMEO">Omeo</option>
                                                    <option value="ONGERUP">Ongerup</option>
                                                    <option value="ONSLOW">Onslow</option>
                                                    <option value="OPHIR">Ophir</option>
                                                    <option value="ORA_BANDA">Ora Banda</option>
                                                    <option value="ORANGE">Orange</option>
                                                    <option value="ORBOST">Orbost</option>
                                                    <option value="ORFORD">Orford</option>
                                                    <option value="OUYEN">Ouyen</option>
                                                    <option value="PACIFIC_PALMS">Pacific Palms</option>
                                                    <option value="PALM_BEACH">Palm Beach</option>
                                                    <option value="PALMER_RIVER">Palmer River</option>
                                                    <option value="PAMBULA">Pambula</option>
                                                    <option value="PANNAWONICA">Pannawonica</option>
                                                    <option value="PARABURDOO">Paraburdoo</option>
                                                    <option value="PARACHILNA">Parachilna</option>
                                                    <option value="PARINGA">Paringa</option>
                                                    <option value="PARKES">Parkes</option>
                                                    <option value="PATCHEWOLLOCK">Patchewollock</option>
                                                    <option value="PATERSON">Paterson</option>
                                                    <option value="PATONGA">Patonga</option>
                                                    <option value="PAYNESVILLE">Paynesville</option>
                                                    <option value="PEAK_HILL">Peak Hill</option>
                                                    <option value="PEARL_BEACH">Pearl Beach</option>
                                                    <option value="PENGUIN">Penguin</option>
                                                    <option value="PENONG">Penong</option>
                                                    <option value="PENRITH">Penrith</option>
                                                    <option value="PERENJORI">Perenjori</option>
                                                    <option value="PERISHER_VALLEY">Perisher Valley</option>
                                                    <option value="PERTH">Perth</option>
                                                    <option value="PETERBOROUGH">Peterborough</option>
                                                    <option value="PICTON">Picton</option>
                                                    <option value="PINE_CREEK">Pine Creek</option>
                                                    <option value="PINJARRA">Pinjarra</option>
                                                    <option value="PITT_TOWN">Pitt Town</option>
                                                    <option value="PITTSWORTH">Pittsworth</option>
                                                    <option value="POATINA">Poatina</option>
                                                    <option value="POKOLBIN">Pokolbin</option>
                                                    <option value="PONTVILLE">Pontville</option>
                                                    <option value="POONCARIE">Pooncarie</option>
                                                    <option value="PORT_ALBERT">Port Albert</option>
                                                    <option value="PORT_ARTHUR">Port Arthur</option>
                                                    <option value="PORT_AUGUSTA">Port Augusta</option>
                                                    <option value="PORT_CAMPBELL">Port Campbell</option>
                                                    <option value="PORT_DOUGLAS">Port Douglas</option>
                                                    <option value="PORT_HEDLAND">Port Hedland</option>
                                                    <option value="PORT_LINCOLN">Port Lincoln</option>
                                                    <option value="PORT_MACQUARIE">Port Macquarie</option>
                                                    <option value="PORT_NEILL">Port Neill</option>
                                                    <option value="PORT_STEPHENS">Port Stephens</option>
                                                    <option value="PORT_VICTORIA">Port Victoria</option>
                                                    <option value="PORT_VINCENT">Port Vincent</option>
                                                    <option value="PORT_WELSHPOOL">Port Welshpool</option>
                                                    <option value="PORT_PIRIE">Port Pirie</option>
                                                    <option value="PORTLAND">Portland</option>
                                                    <option value="POWELLTOWN">Powelltown</option>
                                                    <option value="PREVELLY">Prevelly</option>
                                                    <option value="PROSERPINE">Proserpine</option>
                                                    <option value="PROSTON">Proston</option>
                                                    <option value="PUCKAPUNYAL">Puckapunyal</option>
                                                    <option value="PYRAMID_HILL">Pyramid Hill</option>
                                                    <option value="QUAIRADING">Quairading</option>
                                                    <option value="QUEENSTOWN">Queenstown</option>
                                                    <option value="QUILPIE">Quilpie</option>
                                                    <option value="QUIRINDI">Quirindi</option>
                                                    <option value="RAILTON">Railton</option>
                                                    <option value="RAINBOW_BEACH">Rainbow Beach</option>
                                                    <option value="RAINBOW">Rainbow</option>
                                                    <option value="RAVENSHOE">Ravenshoe</option>
                                                    <option value="RAVENSTHORPE">Ravensthorpe</option>
                                                    <option value="RAVENSWOOD">Ravenswood</option>
                                                    <option value="RAYMOND_TERRACE">Raymond Terrace</option>
                                                    <option value="RED_CLIFFS">Red Cliffs</option>
                                                    <option value="REDCLIFFE">Redcliffe</option>
                                                    <option value="RENMARK">Renmark</option>
                                                    <option value="RENNER_SPRINGS">Renner Springs</option>
                                                    <option value="RICHMOND_NSW">Richmond NSW</option>
                                                    <option value="RICHMOND_QLD">Richmond</option>
                                                    <option value="RICHMOND_TAS">Richmond</option>
                                                    <option value="ROBERTSON">Robertson</option>
                                                    <option value="ROBINVALE">Robinvale</option>
                                                    <option value="ROCKHAMPTON">Rockhampton</option>
                                                    <option value="ROCKINGHAM">Rockingham</option>
                                                    <option value="ROCKLEY">Rockley</option>
                                                    <option value="ROEBOURNE">Roebourne</option>
                                                    <option value="ROKEBY">Rokeby</option>
                                                    <option value="ROMA">Roma</option>
                                                    <option value="ROMSEY">Romsey</option>
                                                    <option value="ROSEBERY_TAS">Rosebery TAS</option>
                                                    <option value="ROSEBERY_VIC">Rosebery VIC</option>
                                                    <option value="ROSEVEARS">Rosevears</option>
                                                    <option value="ROSEWOOD">Rosewood</option>
                                                    <option value="ROSS_RIVER">Ross River</option>
                                                    <option value="ROSS">Ross</option>
                                                    <option value="ROTTNEST_ISLAND">Rottnest Island</option>
                                                    <option value="ROYAL_NATIONAL_PARK">Royal National Park</option>
                                                    <option value="RUBYVALE">Rubyvale</option>
                                                    <option value="RUPANYUP">Rupanyup</option>
                                                    <option value="RUSHWORTH">Rushworth</option>
                                                    <option value="RUTHERGLEN">Rutherglen</option>
                                                    <option value="RYLSTONE">Rylstone</option>
                                                    <option value="SALE">Sale</option>
                                                    <option value="SALTWATER_RIVER">Saltwater River</option>
                                                    <option value="SAMFORD">Samford</option>
                                                    <option value="SARINA">Sarina</option>
                                                    <option value="SAVAGE_RIVER">Savage River</option>
                                                    <option value="SAWTELL">Sawtell</option>
                                                    <option value="SCONE">Scone</option>
                                                    <option value="SCOTTS_HEAD">Scotts Head</option>
                                                    <option value="SCOTTSDALE">Scottsdale</option>
                                                    <option value="SEA_LAKE">Sea Lake</option>
                                                    <option value="SEAL_ROCKS">Seal Rocks</option>
                                                    <option value="SEASPRAY">Seaspray</option>
                                                    <option value="SERVICETON">Serviceton</option>
                                                    <option value="SEVENTEEN_SEVENTY">Seventeen Seventy</option>
                                                    <option value="SEYMOUR">Seymour</option>
                                                    <option value="SHEEP_HILLS">Sheep Hills</option>
                                                    <option value="SHEFFIELD">Sheffield</option>
                                                    <option value="SHELLHARBOUR">Shellharbour</option>
                                                    <option value="SHEPPARTON">Shepparton</option>
                                                    <option value="SHOALHAVEN_HEADS">Shoalhaven Heads</option>
                                                    <option value="SHUTE_HARBOUR">Shute Harbour</option>
                                                    <option value="SIDMOUTH">Sidmouth</option>
                                                    <option value="SILO_ART_TRAIL">Silo Art Trail</option>
                                                    <option value="SILVERTON">Silverton</option>
                                                    <option value="SINGLETON">Singleton</option>
                                                    <option value="SMEATON">Smeaton</option>
                                                    <option value="SNOWTOWN">Snowtown</option>
                                                    <option value="SOFALA">Sofala</option>
                                                    <option value="SORELL">Sorell</option>
                                                    <option value="SOUTH_WEST_ROCKS">South West Rocks</option>
                                                    <option value="SOUTHERN_CROSS">Southern Cross</option>
                                                    <option value="SOUTHPORT_QLD">Southport QLD</option>
                                                    <option value="SOUTHPORT_TAS">Southport</option>
                                                    <option value="SPRINGWOOD">Springwood</option>
                                                    <option value="ST_ALBANS">St Albans</option>
                                                    <option value="ST_ARNAUD">St Arnaud</option>
                                                    <option value="ST_GEORGE">St. George</option>
                                                    <option value="ST_GEORGES_BASIN">St Georges Basin</option>
                                                    <option value="ST_HELENS">St Helens</option>
                                                    <option value="ST_MARYS">St Marys</option>
                                                    <option value="STANLEY">Stanley</option>
                                                    <option value="STANSBURY">Stansbury</option>
                                                    <option value="STANTHORPE">Stanthorpe</option>
                                                    <option value="STANWELL_PARK">Stanwell Park</option>
                                                    <option value="STEIGLITZ">Steiglitz</option>
                                                    <option value="STOCKTON">Stockton</option>
                                                    <option value="STRADBROKE_ISLAND">Stradbroke Island</option>
                                                    <option value="STRAHAN">Strahan</option>
                                                    <option value="STRATFORD">Stratford</option>
                                                    <option value="STRATHALBYN">Strathalbyn</option>
                                                    <option value="STRATHMERTON">Strathmerton</option>
                                                    <option value="STREAKY_BAY">Streaky Bay</option>
                                                    <option value="STROUD">Stroud</option>
                                                    <option value="STIRLING">Stirling</option>
                                                    <option value="STUART_TOWN">Stuart Town</option>
                                                    <option value="SURFERS_PARADISE">Surfers Paradise</option>
                                                    <option value="SUSSEX_INLET">Sussex Inlet</option>
                                                    <option value="SUTTON_FOREST">Sutton Forest</option>
                                                    <option value="SWAN_HILL">Swan Hill</option>
                                                    <option value="SWANSEA_NSW">Swansea NSW</option>
                                                    <option value="SWANSEA_SA">?-SWANSEA_SA</option>
                                                    <option value="SUNSHINE_COAST">Sunshine </option>
                                                    <option value="SYDNEY">Sydney</option>
                                                    <option value="TAILEM_BEND">Tailem Bend</option>
                                                    <option value="TALBINGO">Talbingo</option>
                                                    <option value="TALLANGATTA">Tallangatta</option>
                                                    <option value="TAMBORINE_MOUNTAIN">Tamborine Mountain</option>
                                                    <option value="TAMMIN">Tammin</option>
                                                    <option value="TAMWORTH">Tamworth</option>
                                                    <option value="TANAMI">Tanami</option>
                                                    <option value="TARALGA">Taralga</option>
                                                    <option value="TARANNA">Taranna</option>
                                                    <option value="TARCUTTA">Tarcutta</option>
                                                    <option value="TAREE">Taree</option>
                                                    <option value="TARNAGULLA">Tarnagulla</option>
                                                    <option value="TAROOM">Taroom</option>
                                                    <option value="TARRALEAH">Tarraleah</option>
                                                    <option value="TATHRA">Tathra</option>
                                                    <option value="TATURA">Tatura</option>
                                                    <option value="TAYLORS_ARM">Taylors Arm</option>
                                                    <option value="TEA_GARDENS">Tea Gardens</option>
                                                    <option value="TEMORA">Temora</option>
                                                    <option value="TENNANT_CREEK">Tennant Creek</option>
                                                    <option value="TERRIGAL">Terrigal</option>
                                                    <option value="THE_ENTRANCE">The Entrance</option>
                                                    <option value="THE_OAKS">The Oaks</option>
                                                    <option value="THE_ROCK">The Rock</option>
                                                    <option value="THEODORE">Theodore</option>
                                                    <option value="THIRLMERE">Thirlmere</option>
                                                    <option value="THIRROUL">Thirroul</option>
                                                    <option value="THREDBO_VILLAGE">Thredbo Village</option>
                                                    <option value="THREE_SPRINGS">Three Springs</option>
                                                    <option value="TI_TREE">Ti Tree</option>
                                                    <option value="THURSDAY_ISLAND">Thursday Island</option>
                                                    <option value="TIBOOBURRA">Tibooburra</option>
                                                    <option value="TIMBER_CREEK">Timber Creek</option>
                                                    <option value="TIMBOON">Timboon</option>
                                                    <option value="TIN_CAN_BAY">Tin Can Bay</option>
                                                    <option value="TINAROO">Tinaroo</option>
                                                    <option value="TINTALDRA">Tintaldra</option>
                                                    <option value="TOCUMWAL">Tocumwal</option>
                                                    <option value="TOM_PRICE">Tom Price</option>
                                                    <option value="TOODYAY">Toodyay</option>
                                                    <option value="TOORA">Toora</option>
                                                    <option value="TOOWOOMBA">Toowoomba</option>
                                                    <option value="TORONTO">Toronto</option>
                                                    <option value="TORQUAY">Torquay</option>
                                                    <option value="TOUKLEY">Toukley</option>
                                                    <option value="TOWNSVILLE">Townsville</option>
                                                    <option value="TRANGIE">Trangie</option>
                                                    <option value="TUENA">Tuena</option>
                                                    <option value="TULLY">Tully</option>
                                                    <option value="TUMBARUMBA">Tumbarumba</option>
                                                    <option value="TUMBY_BAY">Tumby Bay</option>
                                                    <option value="TUMUT">Tumut</option>
                                                    <option value="TUNBRIDGE">Tunbridge</option>
                                                    <option value="TUROSS_HEAD">Tuross Head</option>
                                                    <option value="TWEED_HEADS">Tweed Heads</option>
                                                    <option value="ULLADULLA">Ulladulla</option>
                                                    <option value="ULMARRA">Ulmarra</option>
                                                    <option value="ULURU_AYERS_ROCK__KATA_TJUTA_THE_OLGAS">Uluru (Ayers Rock) &amp; Kata Tjuta (The Olgas)</option>
                                                    <option value="ULVERSTONE">Ulverstone</option>
                                                    <option value="UNDARA_LAVA_TUBES">Undara Lava Tubes</option>
                                                    <option value="URALLA">Uralla</option>
                                                    <option value="URANA">Urana</option>
                                                    <option value="URBENVILLE">Urbenville</option>
                                                    <option value="URUNGA">Urunga</option>
                                                    <option value="VENUS_BAY">Venus Bay</option>
                                                    <option value="VICTORIA_RIVER">Victoria River</option>
                                                    <option value="VIOLET_TOWN">Violet Town</option>
                                                    <option value="WAGGA_WAGGA">Wagga Wagga</option>
                                                    <option value="WAGIN">Wagin</option>
                                                    <option value="WAHGUNYAH">Wahgunyah</option>
                                                    <option value="WAIKERIE">Waikerie</option>
                                                    <option value="WALCHA">Walcha</option>
                                                    <option value="WALHALLA">Walhalla</option>
                                                    <option value="WALLA_WALLA">Walla Walla</option>
                                                    <option value="WALLABADAH">Wallabadah</option>
                                                    <option value="WALLANGARRA">Wallangarra</option>
                                                    <option value="WALLAROO">Wallaroo</option>
                                                    <option value="WALLERAWANG">Wallerawang</option>
                                                    <option value="WANGARATTA">Wangaratta</option>
                                                    <option value="WANGI_WANGI">Wangi Wangi</option>
                                                    <option value="WARATAH">Waratah</option>
                                                    <option value="WARBURTON">Warburton</option>
                                                    <option value="WARIALDA">Warialda</option>
                                                    <option value="WARMUN">Warmun</option>
                                                    <option value="WAROOKA">Warooka</option>
                                                    <option value="WAROONA">Waroona</option>
                                                    <option value="WARRACKNABEAL">Warracknabeal</option>
                                                    <option value="WARREN">Warren</option>
                                                    <option value="WARWICK">Warwick</option>
                                                    <option value="WAUCHOPE_NSW">Wauchope NSW</option>
                                                    <option value="WAUCHOPE_NT">Wauchope NT</option>
                                                    <option value="WEE_JASPER">Wee Jasper</option>
                                                    <option value="WEE_WAA">Wee Waa</option>
                                                    <option value="WEIPA">Weipa</option>
                                                    <option value="WELDBOROUGH">Weldborough</option>
                                                    <option value="WELLINGTON">Wellington</option>
                                                    <option value="WENTWORTH_FALLS">Wentworth Falls</option>
                                                    <option value="WENTWORTH">Wentworth</option>
                                                    <option value="WERRIS_CREEK">Werris Creek</option>
                                                    <option value="WEST_WYALONG">West Wyalong</option>
                                                    <option value="WESTBURY">Westbury</option>
                                                    <option value="WESTONIA">Westonia</option>
                                                    <option value="WHIM_CREEK">Whim Creek</option>
                                                    <option value="WHITE_CLIFFS">White Cliffs</option>
                                                    <option value="WHITSUNDAYS">Whitsundays</option>
                                                    <option value="WHYALLA">Whyalla</option>
                                                    <option value="WICKHAM">Wickham</option>
                                                    <option value="WILBERFORCE">Wilberforce</option>
                                                    <option value="WILCANNIA">Wilcannia</option>
                                                    <option value="WILLIAMS">Williams</option>
                                                    <option value="WILMINGTON">Wilmington</option>
                                                    <option value="WILMOT">Wilmot</option>
                                                    <option value="WILUNA">Wiluna</option>
                                                    <option value="WINDERMERE">Windermere</option>
                                                    <option value="WINDEYER">Windeyer</option>
                                                    <option value="WINDSOR">Windsor</option>
                                                    <option value="WINGHAM">Wingham</option>
                                                    <option value="WINTON">Winton</option>
                                                    <option value="WISEMAN_FERRY">Wiseman Ferry</option>
                                                    <option value="WITTENOOM">Wittenoom</option>
                                                    <option value="WOLLOMBI">Wollombi</option>
                                                    <option value="WOLLONGONG">Wollongong</option>
                                                    <option value="WOMBARRA">Wombarra</option>
                                                    <option value="WOMBEYAN_CAVES">Wombeyan Caves</option>
                                                    <option value="WONDAI">Wondai</option>
                                                    <option value="WONGAN_HILLS">Wongan Hills</option>
                                                    <option value="WONTHAGGI">Wonthaggi</option>
                                                    <option value="WOODBRIDGE">Woodbridge</option>
                                                    <option value="WOODBURN">Woodburn</option>
                                                    <option value="WOODENBONG">Woodenbong</option>
                                                    <option value="WOODEND">Woodend</option>
                                                    <option value="WOODFORD">Woodford</option>
                                                    <option value="WOOLGOOLGA">Woolgoolga</option>
                                                    <option value="WOOLI_INCL_MINNIE_WATERS">Wooli (incl. Minnie Waters)</option>
                                                    <option value="WOY_WOY">Woy Woy</option>
                                                    <option value="WUDINNA">Wudinna</option>
                                                    <option value="WYCHEPROOF">Wycheproof</option>
                                                    <option value="WYNDHAM">Wyndham</option>
                                                    <option value="WYNYARD">Wynyard</option>
                                                    <option value="WYONG">Wyong</option>
                                                    <option value="YALGOO">Yalgoo</option>
                                                    <option value="YAMBA">Yamba</option>
                                                    <option value="YANCHEP">Yanchep</option>
                                                    <option value="YANDINA">Yandina</option>
                                                    <option value="YANKALILLA">Yankalilla</option>
                                                    <option value="YARRAM">Yarram</option>
                                                    <option value="YARRANGOBILLY_CAVES">Yarrangobilly Caves</option>
                                                    <option value="YARRAWONGA">Yarrawonga</option>
                                                    <option value="YASS">Yass</option>
                                                    <option value="YEOVAL">Yeoval</option>
                                                    <option value="YEPPOON">Yeppoon</option>
                                                    <option value="YERRANDERIE">Yerranderie</option>
                                                    <option value="YORK">York</option>
                                                    <option value="ZEEHAN">Zeehan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">State </label>
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
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">ZipCode <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="">Type of the Address:</label>
                                            <div class="row mt-3">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox6h" type="checkbox">
                                                            <label class="form-label" for="checkbox6h">
                                                            Is this your main address?
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                <div class="mb-3">
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox6d" type="checkbox">
                                                            <label class="form-label" for="checkbox6d">
                                                            Is this your mail address?
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-12">
                                          <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Imported Address <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" readonly placeholder="">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="add_address text-end">
                                                <a href="#" class="theme_btn btn add_btn " id="add_address_btn">Update Address</a>
                                                <!-- <a href="#" class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i> Reset</a> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <table  class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Address</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:46px">
                                                            <div class="form-check mb-1">
                                                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                                                <label class="form-check-label" for="customCheck4"></label>
                                                            </div>
                                                        </td>
                                                        <td>8642 Yule Street, Arvada CO 80007</td>
                                                        <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:46px">
                                                            <div class="form-check mb-1">
                                                                <input type="checkbox" class="form-check-input" id="customCheck5" >
                                                                <label class="form-check-label" for="customCheck5"></label>
                                                            </div>
                                                        </td>
                                                        <td>8642 Yule Street, Arvada CO 80007</td>
                                                        <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                          </div>
                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="client-prospect.php" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->

                        </div>

                        <div class="tab-pane" id="messages">
                           <div class="sites_main">
                            <div class="row">
                                <div class="col-lg-4">
                                  <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Add Portfolio</label>
                                        <select data-plugin="customselect" class="form-select">
                                            <option value="null">Please select one or start typing</option>
                                            <option value="1">AEC - QLD</option>
                                            <option value="2">ANZ - QLD</option>
                                            <option value="3">MAPS - QLD</option>
                                            <option value="5">I-MED</option>
                                            <option value="6">IBM</option>
                                            <option value="8">Suncorp - VIVID QLD</option>
                                            <option value="10">St George Bank - BIC</option>
                                            <option value="13">Suncorp - BIC</option>
                                            <option value="14">NAB</option>
                                            <option value="18">Toll</option>
                                            <option value="20">BUPA</option>
                                            <option value="21">Fairfax</option>
                                            <option value="25">Parcel Locker</option>
                                            <option value="26">Star Track</option>
                                            <option value="28">Vision</option>
                                            <option value="29">NHP Electrical Engineering Products</option>
                                            <option value="30">Kmart Store</option>
                                            <option value="32">Morleys Funerals</option>
                                            <option value="33">McElligotts Pty Ltd</option>
                                            <option value="34">Blacks Beach Tavern</option>
                                            <option value="35">Great Barrier Reef Marine Park</option>
                                            <option value="36">Franzmann Plumbing Maintenance P/L </option>
                                            <option value="37">Allan's Pool Shop</option>
                                            <option value="38">Followmont Transport</option>
                                            <option value="39">One Steel Recycling Mackay</option>
                                            <option value="41">Warrina Shopping Centre</option>
                                            <option value="43">TNT</option>
                                            <option value="46">AMAZON</option>
                                            <option value="49">Caravonica Waters Aged Care</option>
                                            <option value="51">RSL</option>
                                            <option value="52">Legal Aid Qld</option>
                                            <option value="53">Toll </option>
                                            <option value="57">Glencore Port Operations</option>
                                            <option value="60">Phillips</option>
                                            <option value="64">Mediline</option>
                                            <option value="66">Pikos</option>
                                            <option value="67">Total Tools Cainrs</option>
                                            <option value="68">HERTZ</option>
                                            <option value="71">Campbell Page</option>
                                            <option value="72">Sarina Russo</option>
                                            <option value="73">Pauls Lutheran Child Care</option>
                                            <option value="74">Hardware</option>
                                            <option value="77">Defense Housing Australia</option>
                                            <option value="78">Flight Centre</option>
                                            <option value="79">PFM - Red Cross Rockhampton</option>
                                            <option value="80">Scania Australia - Brisbane Branch</option>
                                            <option value="81">Garden City Library</option>
                                            <option value="82">Compass Group - QLD Schools</option>
                                            <option value="83">Southern Cross Facility Services</option>
                                            <option value="85">Student Flights</option>
                                            <option value="87">Energex</option>
                                            <option value="89">Tennyson Tennis Centre - Pat Rafter Arena</option>
                                            <option value="90">Court House Mt Isa</option>
                                            <option value="92">Woodridge State High School</option>
                                            <option value="93">Marie Stopes </option>
                                            <option value="94">Bellmere Primary School</option>
                                            <option value="95">Marsden Shopping Centre</option>
                                            <option value="96">Middle Park State School</option>
                                            <option value="97">King George Square Carpark</option>
                                            <option value="98">TDD (Gasworks)</option>
                                            <option value="99">AQIS Refurbishment QHFSS</option>
                                            <option value="101">RACQ </option>
                                            <option value="102">AM60 - Building</option>
                                            <option value="103">Cleansafe Direct Clients</option>
                                            <option value="104">Boral Asphalt</option>
                                            <option value="105">T2</option>
                                            <option value="106">PFM Red Cross</option>
                                            <option value="107">Reading Cinemas Newmarket</option>
                                            <option value="108">Indooroopilly State High School</option>
                                            <option value="111">Kenmore Library</option>
                                            <option value="113">Boral Concrete</option>
                                            <option value="115">IGA</option>
                                            <option value="116">The Boulevard Lennox Heads Shopping</option>
                                            <option value="117">Mackay Family Day Care</option>
                                            <option value="118">Mackay City Bowls Club Inc</option>
                                            <option value="120">Operations Depot (Samford)</option>
                                            <option value="123">242 Hawken – St Lucia</option>
                                            <option value="124">Star Casino</option>
                                            <option value="126">Matrix Traffic &amp; Transport Data</option>
                                            <option value="127">Job Find </option>
                                            <option value="128">TCC - Townsville</option>
                                            <option value="129">Ferny Grove State School</option>
                                            <option value="130">Waterford State School</option>
                                            <option value="131">Goodna State School</option>
                                            <option value="132">22 Ascent St</option>
                                            <option value="133">Annandale Community Centre</option>
                                            <option value="140">Retail Express</option>
                                            <option value="143">Nudge College</option>
                                            <option value="149">Vacant</option>
                                            <option value="150">School</option>
                                            <option value="151">QUT Kelvin Grove Campus</option>
                                            <option value="152">LDI CONSTRUCTION</option>
                                            <option value="153">Borel Australia</option>
                                            <option value="155">Allenstown Plaza</option>
                                            <option value="156">Push Architects</option>
                                            <option value="157">Atherton Shopping Village</option>
                                            <option value="158">CBA </option>
                                            <option value="163">Bendigo Bank</option>
                                            <option value="166">Cumbia Bar &amp; Restaurant</option>
                                            <option value="167">QBE Insurance</option>
                                            <option value="169">Pine Rivers Art Gallery</option>
                                            <option value="170">Bunya House</option>
                                            <option value="173">Wyllie Park</option>
                                            <option value="174">Courthouse Townsville</option>
                                            <option value="175">LUSH Fresh Handmade Cosmetics</option>
                                            <option value="176">Department of Justice and Attorney - Courthouse</option>
                                            <option value="177">Direct Factory Outlet</option>
                                            <option value="179">Anzac Memorial Club</option>
                                            <option value="180">Botanica Property Group</option>
                                            <option value="181">One Culture Football</option>
                                            <option value="182">Homemaker - Fortitude Valley</option>
                                            <option value="183">Whitsunday Airport</option>
                                            <option value="184">Toowoomba Regional Council</option>
                                            <option value="185">Public Trustee</option>
                                            <option value="186">Department Of Human Services GJK</option>
                                            <option value="187">Australian Federal Police</option>
                                            <option value="188">Queensland Medical Laboratories</option>
                                            <option value="189">Westpac - Dimeo</option>
                                            <option value="190">ST George - Dimeo</option>
                                            <option value="191">Nokia</option>
                                            <option value="195">SABA Store</option>
                                            <option value="196">Woolworths Eight miles Plain</option>
                                            <option value="198">Sunshine Coast Airport</option>
                                            <option value="199">Dell Queen St</option>
                                            <option value="202">GJK Indigenous Solutions</option>
                                            <option value="210">Brick n Pave</option>
                                            <option value="212">Industrial Control and Electrical Pty Ltd</option>
                                            <option value="213">ARIA TECHNOLOGIES</option>
                                            <option value="215">Disrupt Digital Pty Ltd</option>
                                            <option value="216">Hansen Yuncken Pty Ltd</option>
                                            <option value="217">Simplaw Pty Ltd (Harvey Norman)</option>
                                            <option value="218">IPG - The Infinity Group</option>
                                            <option value="219">Bloom Hearing Specialists</option>
                                            <option value="220">Hutchinson Builders</option>
                                            <option value="221">Neckam (Unilodge)</option>
                                            <option value="223">Quality Commercial</option>
                                            <option value="225">SmartClinics</option>
                                            <option value="228">Anytime Cairs PTY LTD</option>
                                            <option value="230">HELP ENTERPRISES LIMITED</option>
                                            <option value="233">Mission Australia</option>
                                            <option value="234">Telstra - QLD</option>
                                            <option value="238">DTMR -  BURPENGARY</option>
                                            <option value="239">DTMR - Redcliffe</option>
                                            <option value="240">DTMR - Caboolture</option>
                                            <option value="241">Pure Property Management&nbsp;</option>
                                            <option value="242">City Centre Plaza </option>
                                            <option value="245">Liberal National Party</option>
                                            <option value="249">Somerset Regional Council</option>
                                            <option value="250">Profit Ability Virtual Assistant</option>
                                            <option value="251">The Salvation Army</option>
                                            <option value="253">St Vincent de Paul</option>
                                            <option value="255">Quality Home - Bond Cleaning</option>
                                            <option value="256">Tradelink</option>
                                            <option value="258">Telstra Network - QLD</option>
                                            <option value="263">Peracon Pty Ltd</option>
                                            <option value="265">Spotlight Carpark</option>
                                            <option value="266">Repairhub</option>
                                            <option value="267">QML Tenancy</option>
                                            <option value="268">ATSI Health</option>
                                            <option value="271">NAB - ATM</option>
                                            <option value="272">The Rug Establishment</option>
                                            <option value="273">Best and Less</option>
                                            <option value="274">Floormaster</option>
                                            <option value="275">Aurecon Tenant</option>
                                            <option value="278">Dimeo - Spotlight</option>
                                            <option value="279">Dimeo - Anaconda</option>
                                            <option value="284">Vivid - Vivid (Client)</option>
                                            <option value="285">Secure Parking</option>
                                            <option value="297">Cleansafe</option>
                                            <option value="307">Glad Group Integrated Property Services Pty Ltd</option>
                                            <option value="308">CIP Constructions (QLD) Pty Ltd</option>
                                            <option value="309">Energetic Cleaning Services Pty Ltd</option>
                                            <option value="310">Kimini Constructions</option>
                                            <option value="316">Legal-E (D.I.Y) Pty Ltd</option>
                                            <option value="317">Unispace Global Pty Ltd</option>
                                            <option value="319">JLL (QLD) Pty Ltd</option>
                                            <option value="320">Middle Park Holdings Pty atf Middle Park Trust</option>
                                            <option value="321">Glad</option>
                                            <option value="323">3/336 Ipswich rd</option>
                                            <option value="324">Pod1um Group</option>
                                            <option value="326">Cleanworks</option>
                                            <option value="327">UNITA (QLD) Pty Ltd</option>
                                            <option value="328">John Holland Pty Ltd</option>
                                            <option value="329">The Trustee for Peel Street Property Trust</option>
                                            <option value="332">ISS Group</option>
                                            <option value="333">Boulder Wall Construction</option>
                                            <option value="334">AUMR Property Management</option>
                                            <option value="335">Knight Frank Facilities Response Centre</option>
                                            <option value="336">Mettle Projects Pty Ltd</option>
                                            <option value="340">Workdash</option>
                                            <option value="342">Nature's Edge</option>
                                            <option value="343">Best Strata</option>
                                            <option value="344">Owens Management Services’</option>
                                            <option value="345">Whitsunday Regional Council</option>
                                            <option value="346">J and HX Family Trust</option>
                                            <option value="347">Mustafa</option>
                                            <option value="351">Dior - Queens Plaza</option>
                                            <option value="352">Tiffany &amp; Co.</option>
                                            <option value="353">Bank SA - Naracoorte Mowing</option>
                                            <option value="354">TMR Nerang</option>
                                            <option value="355">Nerang Cemetery</option>
                                            <option value="356">Normanton Residence</option>
                                            <option value="357">Gasworks Residency</option>
                                            <option value="359">MIRL Pty Ltd</option>
                                            <option value="360">Buildcorp Group Pty Limited</option>
                                            <option value="361">Chesworld Pty Ltd</option>
                                            <option value="364">Sleepy's</option>
                                            <option value="365">Mt Isa Police Station</option>
                                            <option value="366">Yong Real Estate</option>
                                            <option value="367">Iridium Project</option>
                                            <option value="368">Toowoomba Police Station Complex</option>
                                            <option value="369">Allambe Gardens</option>
                                            <option value="370">Infinity Community Solutions Ltd.</option>
                                            <option value="371">Yow, Brad</option>
                                            <option value="372">Salt Meats Cheese Gasworks</option>
                                            <option value="373">Domayne warehouse</option>
                                            <option value="374">Degani</option>
                                            <option value="375">Medibank - VIVID</option>
                                            <option value="376">HCF</option>
                                            <option value="377">Bank of Australia</option>
                                            <option value="378">Suncorp - Dimeo</option>
                                            <option value="379">MAX Solutions</option>
                                            <option value="380">CONQUER</option>
                                            <option value="381">Warehouse</option>
                                            <option value="382">TkMax</option>
                                            <option value="383">Dimeo - Bupa</option>
                                            <option value="384">Officeworks</option>
                                            <option value="385">Great Southern Bank</option>
                                            <option value="386">MAPS - QLD</option>
                                            <option value="387">Aquatic Centre</option>
                                            <option value="388">Utopia Space</option>
                                            <option value="389">Knight Facilities Management</option>
                                            <option value="390">Dimeo - ANZ</option>
                                            <option value="391">Yourtown</option>
                                            <option value="392">Hearing Australia</option>
                                            <option value="393">GJK - Attune Hearing</option>
                                            <option value="394">GJK - Amplifon</option>
                                            <option value="395">Michael Hill Jeweller</option>
                                            <option value="396">GJK - The Benevolent Society</option>
                                            <option value="397">Brisbane Airport</option>
                                            <option value="398">Energex</option>
                                            <option value="399">DCFM</option>
                                            <option value="400">Pathology QML</option>
                                            <option value="401">Grip'd Brisbane</option>
                                            <option value="402">Australian Red Cross - GJK</option>
                                            <option value="403">TRC - Parks</option>
                                            <option value="404">Assemble Head Office</option>
                                            <option value="405">Vision</option>
                                            <option value="406">Qbuild</option>
                                            <option value="407">Schools</option>
                                            <option value="408">Hertz</option>
                                            <option value="409">Little Locals Auchenflower</option>
                                            <option value="410">Cancer Council</option>
                                            <option value="411">Elite Direct</option>
                                            <option value="412">Bendigo Bank</option>
                                            <option value="414">Jetts Gym</option>
                                            <option value="415">Sonic HealthPlus</option>
                                            <option value="416">Pacific Smiles</option>
                                            <option value="417">Schools</option>
                                            <option value="418">Lennox Facade Solutions</option>
                                            <option value="419">Summerland Financial Services</option>
                                            <option value="420">Nike Factory Store</option>
                                            <option value="421">Dimeo - Hearing Australia</option>
                                            <option value="422">UniQLO</option>
                                            <option value="423">NAB</option>
                                            <option value="424">Industrial Relations QLD</option>
                                            <option value="425">Invocare</option>
                                            <option value="426">Dental Clinic</option>
                                            <option value="427">Vivid - Lendlease</option>
                                            <option value="428">NRG</option>
                                            <option value="429">Airservices ARFF</option>
                                            <option value="430">Eureka</option>
                                            <option value="431">L3Harris Technologies</option>
                                            <option value="432">Colliers</option>
                                            <option value="433">UniSq</option>
                                            <option value="434">Lancinci Property Group</option>
                                            <option value="435">Homemaker Aspley</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <a href="#" class="theme_btn btn add_btn portfolio_add_btn">Update Portfolio</a>
                                </div>
                                <div class="col-lg-12">
                                    <table  class="table table-bordered  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Portfolio Full name</th>
                                                    <th>Portfolio Short name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td style="width:46px">
                                                            <div class="form-check mb-1">
                                                                <input type="checkbox" class="form-check-input" id="customCheck7">
                                                                <label class="form-check-label" for="customCheck7"></label>
                                                            </div>
                                                        </td>
                                                <td>ANZ - QLD</td>
                                                <td>ANZ - QLD</td>
                                                <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>
                                            </tr>

                                        </tbody>
                                        </table>
                                 </div>
                            </div>
                           </div>
                           <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="client-prospect.php" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane" id="other-details">

                       <div class="sites_main">
                        <div class="row">
                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Name <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Surname <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Email <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Phone Number <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Type <span class="red">*</span></label>
                                                <select data-plugin="customselect" class="form-select">
                                                <option value="MANAGER">Manager</option>
                                                <option value="ACCOUNTS">Accounts</option>
                                                <option value="SUPERVISOR">Supervisor</option>
                                                <option value="SITE_MANAGER">Site Manager</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <hr>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contacted By <span class="red">*</span></label>
                                                <select data-plugin="customselect" class="form-select">
                                                <option value="MEETING">Meeting</option>
                                                <option value="PHONE_CALL">Phone Call</option>
                                                <option value="EMAIL">Email</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Client Entry Point <span class="red">*</span></label>
                                                <select data-plugin="customselect" class="form-select">
                                                <option value="SEARCH_ENGINE">Search Engine</option>
                                                <option value="FACEBOOK">Facebook</option>
                                                <option value="LINKEDIN">Linkedin</option>
                                                <option value="INSTAGRAM">Instagram</option>
                                                <option value="POST_SOCIAL_MEDIA">Post Social Media</option>
                                                <option value="RADIO">Radio</option>
                                                <option value="TV">TV</option>
                                                <option value="PRINT">Print</option>
                                                <option value="WORD_OF_MOUTH">Word of Mouth</option>
                                                <option value="OTHER_ENTRY">Other* Please describe in the comments.</option>
                                                </select>
                                            </div>
                                        </div>
                        </div>
                         </div>

                         <div class="bottom_footer_dt">
                               <div class="row">
                                   <div class="col-lg-12">
                                       <div class="action_btns">
                                           <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                           <a href="client-prospect.php" class="theme_btn btn-primary btn"><i
                                                   class="uil-list-ul"></i> List</a>
                                           <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                   </div>
                        <div class="tab-pane" id="comments">

                            <div class="sites_main">
                            <div class="row">
                                <div class="col-lg-12">
                                  <a href="#" class="theme_btn btn add_btn" data-bs-toggle="modal" data-bs-target="#client_comment_modal">Update comment</a>
                                </div>
                                <!-- <div class="not-found">
                                <img src="assets/images/new-images/search.png" alt="">
                                <h6>Data Not Found !</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, vero?</p>
                            </div> -->
                            <div class="col-lg-12  mt-3">
                                    <table  class="table table-bordered  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date Comment</th>
                                                    <th>Person</th>
                                                    <th>Comment Type</th>
                                                    <th>Comment</th>
                                                    <th>Files</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td style="width:46px">
                                                <div class="form-check mb-1">
                                                    <input type="checkbox" class="form-check-input" id="customCheck8">
                                                    <label class="form-check-label" for="customCheck8"></label>
                                                </div>
                                                </td>
                                                <td>01/08/2023 18:58:31</td>
                                                <td>Avi Singh</td>
                                                <td>Meeting</td>
                                                <td>Lorem ipsum, dolor sit amet consectetur </td>
                                                <td>down-intrestrate.png </td>
                                                <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>
                                            </tr>

                                        </tbody>
                                        </table>
                                 </div>
                            </div>
                              </div>

                              <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="client-prospect.php" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane" id="tickets">
                        <div class="sites_main">
                            <div class="row">
                            <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Facebook</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Twitter</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Instagram</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Linkedin</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>

                            </div>

                           </div>
                           <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="client-prospect.php" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="client-prospect.php" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
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


<script>
    $('#contactInformation').on('submit',function(e) {
        e.preventDefault();
            var rowCount = $("#AppendCntactInformation tr").length;
            var countData=rowCount+1;
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ route('client.getContactData') }}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.success==200) {
                            swal({
                                    type:'success',
                                    title: 'Added!',
                                    text: 'Contact Information Added Successfully',
                                    timer: 1000
                                });
                                    var rowHtml2 = `<tr>
                                                    <td>${data.data.name}</td>
                                                    <td>${data.data.phone_number}</td>
                                                    <td>${data.data.email}</td>
                                                    <td>${data.data.ContactType.name}</td>

                                                    <td>
                                                            <div class="g-2">
                                                                <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span>
                                                            </div>
                                                        </td>
                                                </tr>`;

                            $("#AppendCntactInformation").append(rowHtml2);
                            $("#contactInformation")[0].reset();
                        }

            },
        });

    })
 </script>

@endsection
