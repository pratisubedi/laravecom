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
                        <form wire:submit.prevent='updatetAdminPersonalDetails()'>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=" ">Name</label>
                                        <input type="text" class="form-control" wire:model='name' placeholder="Enter full name">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=" ">Email</label>
                                        <input type="text" class="form-control" wire:model='email' placeholder="Enter email">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=" ">Username</label>
                                        <input type="text" class="form-control" wire:model='username' placeholder="Enter username">
                                        @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
                <!-- Timeline Tab End -->
                <!-- Tasks Tab start -->
                <div class="tab-pane fade {{$tab =='update_password' ? 'active show':''}}" id="update_password" role="tabpanel">
                    <div class="pd-20profile-task-wrap ">
                       <form wire:submit.prevent='updatePassword()'>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Current Passwoord</label>
                                        <input class="form-control" type="password" placeholder="Enter Current Password" wire:model.defer='current_password'>
                                        @error('current_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">New Passwoord</label>
                                        <input class="form-control" type="password" placeholder="Enter new Password" wire:model.defer='new_password'>
                                        @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Confirm New Passwoord</label>
                                        <input class="form-control" type="password" placeholder="Retype new Password" wire:model.defer='confirm_password'>
                                        @error('confirm_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
