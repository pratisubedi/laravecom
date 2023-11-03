<div>
    <div class="tab">
        <ul class="nav nav-tabs customtab" role="tablist">
            <li class="nav-item">
                <a wire:click.prevent='selectTab("general_settings")' class="nav-link active {{$tab=='general_settings' ? 'active':''}}" data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General Settings</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("logo_favicon")' class="nav-link {{$tab=='logo_favicon' ? 'active':''}}" data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo & Favicon</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("social_networks")' class="nav-link {{$tab=='social_networks' ? 'active':''}}" data-toggle="tab" href="#social_networks" role="tab" aria-selected="false">Social Networks</a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent='selectTab("payment_methods")' class="nav-link {{$tab=='payment_methods'  ? 'active':''}}" data-toggle="tab" href="#payment_methods" role="tab" aria-selected="false">Payment Methods</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade {{$tab=='general_settings' ? 'active show' :''}}" id="general_settings" role="tabpanel">
                <div class="pd-20">
                    <form wire:submit.prevent='updateGeneralSettings()'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site Name</b></label>
                                    <input type="text" name="sitename" id="" class="form-control" placeholder="Enter Site"
                                    wire:model.defer='site_name'>
                                    @error('site_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Site Email</b></label>
                                    <input type="text" name="siteemail" id="" class="form-control" placeholder="Enter Site email"
                                    wire:model.defer='site_email'>
                                    @error('site_email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Site Phone</b></label>
                                    <input type="text" name="sitephone" id="" class="form-control" placeholder="Enter Site"
                                    wire:model.defer='site_phone'>
                                    @error('site_phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Site meta keywords</b><small> Separated by comma (a,b,c)</small></label>
                                    <input type="text" name="siteemail" id="" class="form-control" placeholder="Enter Site meta keywords"
                                    wire:model.defer='site_meta_keywords'>
                                    @error('site_meta_keywords')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Site meta Description</label>
                            <textarea  cols="4" rows="4" placeholder="Site meta desc......" class="form-control" wire:model.defer='site_meta_description'></textarea>
                            @error('site_meta_description')
                                        <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade {{$tab=='logo_favicon' ? 'active show' :''}}" id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Site Logo</h5>
                            <div class="mb-2 mt-1" style="max-width: 200px">
                              <img wire:ignore src="" class="img-thubnail" data-ijabo-default-img="/images/site/{{$site_logo}}" id="site_logo_image_preview">
                            </div>
                        <form action="{{route('admin.change-logo')}}" method="POST" enctype="multipart/form-data"
                            id="change_site_logo_form">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-2" id="selectedBanner">
                            
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="file" name="site_logo" id="site_logo" class="form-control">
                                <span class="text-danger error-text site_logo_error"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Logo</button>
                        </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Site Favicon</h5>
                            <div class="mb-2 mt-1" style="max-width: 100px">
                                <img src="" alt="" class="img-thumbnail" id="site_favicon_image_preview" data-ijabo-default-img="/images/site/{{$site_favicon}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{$tab=='social_networks' ? 'active show' :''}}" id="social_networks" role="tabpanel">
                <div class="pd-20">
                    -----Social Networks-----
                </div>
            </div>
            <div class="tab-pane fade {{$tab=='payment_methods' ? 'active show' :''}}" id="payment_methods" role="tabpanel">
                <div class="pd-20">
                    -----Payment Methods-----
                </div>
            </div>
        </div>
    </div>
</div>
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

    $('#change_site_logo_form').on('submit',function(e){
        e.preventDefault();
        alert('....submimt....');
    });

</script>
