@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle)?$pageTitle:'Admin Settings')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Settings</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Settings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box">
        <h5 class="h4 text-blue mb-20">Customtab Tab</h5>
        <div class="tab">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo & Favicon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#social_networks" role="tab" aria-selected="false">Social Networks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#payment_methods" role="tab" aria-selected="false">Payment Methods</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="general_settings" role="tabpanel">
                    <div class="pd-20">
                        -------General Setting----
                    </div>
                </div>
                <div class="tab-pane fade" id="logo_favicon" role="tabpanel">
                    <div class="pd-20">
                        -----Logo & Favicon--
                    </div>
                </div>
                <div class="tab-pane fade" id="social_networks" role="tabpanel">
                    <div class="pd-20">
                        -----Social Networks-----
                    </div>
                </div>
                <div class="tab-pane fade" id="payment_methods" role="tabpanel">
                    <div class="pd-20">
                        -----Payment Methods-----
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  