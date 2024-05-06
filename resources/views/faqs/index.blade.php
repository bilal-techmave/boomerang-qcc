@extends('layouts.main')
@section('app-title', 'FAQ - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">FAQ</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        @can('faq-add')
        <div class="col-lg-12">
            <form method="POST" action="#">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Question <span class="red">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Ans <span class="red">*</span></label>
                                    <textarea required="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom_footer_dt">
                        <div class="row">
                            <div class="col-lg-12 text-end">
                                <div class="action_btns">
                                    <a href="#" class="theme_btn btn btn-primary">+ Add FAQ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endcan
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="title_head">
                                <h4>Frequently Asked Questions --</h4>
                            </div>
                        </div>
                    </div>
                    <div class="accordion custom-accordionwitharrow" id="accordionExample">
                        <div class="card mb-1 shadow-none border">
                            <a href="#" class="text-dark" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h5 class="m-0 fs-16">
                                        What is Lorem Ipsum?
                                        <i class="uil uil-angle-down float-end accordion-arrow"></i>
                                    </h5>
                                </div>
                            </a>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="card-body text-muted">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                    put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably
                                    haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                            <div class="bottom_footer_dt faq_bottom_dt">
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <div class="action_btns">
                                            <a href="#" class="theme_btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#faq_edit"><i class="uil-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-1 shadow-none border">
                            <a href="#" class="text-dark collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="m-0 fs-16">
                                        Why do we use it?
                                        <i class="uil uil-angle-down float-end accordion-arrow"></i>
                                    </h5>
                                </div>
                            </a>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="card-body text-muted">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                    put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably
                                    haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                            <div class="bottom_footer_dt faq_bottom_dt">
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <div class="action_btns">
                                            <a href="#" class="theme_btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#faq_edit"><i class="uil-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0 shadow-none border">
                            <a href="#" class="text-dark collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <div class="card-header" id="headingThree">
                                    <h5 class="m-0 fs-16">
                                        Where does it come from?
                                        <i class="uil uil-angle-down float-end accordion-arrow"></i>
                                    </h5>
                                </div>
                            </a>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="card-body text-muted">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                    non cupidatat skateboard dolor brunch. Food truck quinoa
                                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                    put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                    excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably
                                    haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                            <div class="bottom_footer_dt faq_bottom_dt">
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <div class="action_btns">
                                            <a href="#" class="theme_btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#faq_edit"><i class="uil-edit"></i> Edit</a>
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
</div>
@endsection
