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
        @livewire('admin-setting')
    </div>
@endsection  
@push('scripts')
    {{-- <script>
        // $('input[type="file"][name="site_logo"][id="site_logo"]').ijabo({
        //     preview:'#site_logo_image_preview',
        //     imageShape:'rectangular',
        //     allowedExtensions:['png','jpg'],
        //     onErrorShape:function(message,element){
        //         alert('message');
        //     },
        //     onInvalidType:function(message,element){
        //         alert('message')
        //     },
        //     onSuccess:function(message,element){}
        // });
        
            
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const siteLogoInput = document.getElementById("site_logo");
            const siteLogoImagePreview = document.getElementById("site_logo_image_preview");
    
            siteLogoInput.addEventListener("change", function (e) {
                const selectedFile = e.target.files[0];
    
                if (selectedFile) {
                    const objectURL = URL.createObjectURL(selectedFile);
                    siteLogoImagePreview.src = objectURL;
                }
            });
        });
    
        document.addEventListener("DOMContentLoaded", function () {
            const siteLogoInput = document.getElementById("site_favicon");
            const siteLogoImagePreview = document.getElementById("site_favicon_image_preview");
    
            siteLogoInput.addEventListener("change", function (e) {
                const selectedFile = e.target.files[0];
    
                if (selectedFile) {
                    const objectURL = URL.createObjectURL(selectedFile);
                    siteLogoImagePreview.src = objectURL;
                }
            });
        });
    </script>
@endpush