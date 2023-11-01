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
                    -------General Setting----
                </div>
            </div>
            <div class="tab-pane fade {{$tab=='logo_favicon' ? 'active show' :''}}" id="logo_favicon" role="tabpanel">
                <div class="pd-20">
                    -----Logo & Favicon--
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
