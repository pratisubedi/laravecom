<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="profile-tab height-100-p">
        <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a wire:click.prevent='selectTab("personal_details")' class="nav-link {{$tab =='personal_details' ? 'active':''}}" data-toggle="tab" href="personal_details" role="tab">Personal Details</a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent='selectTab("update_password")' class="nav-link {{$tab =='update_password' ? 'active':''}}" data-toggle="tab" href="update_password " role="tab">Update Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Timeline Tab start -->
                <div class="tab-pane fade {{$tab =='personal_details' ? 'active show':''}}" id="personal_details" role="tabpanel">
                    <div class="pd-20">
                        -------Personal Details here--------
                    </div>
                </div>
                <!-- Timeline Tab End -->
                <!-- Tasks Tab start -->
                <div class="tab-pane fade {{$tab =='update_password' ? 'active show':''}}" id="update_password" role="tabpanel">
                    <div class="pd-20 profile-task-wrap">
                        ----Update password here-----
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
