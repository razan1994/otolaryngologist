<div>
    <form wire:submit.prevent="save" id="createForm">
        <div class="form-row">

            {{-- Name --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="name">
                    <i class="mdi mdi-account"></i> Name : <strong class="text-danger"> * @error('name') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Name">
                </div>
            </div>

            {{-- Username --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="username">
                    <i class="mdi mdi-account-circle"></i> Username : @error('username') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account-circle" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
                </div>
            </div>

            {{-- Email --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="email">
                    <i class="mdi mdi-email"></i> Email : @error('email') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-email" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address">
                </div>
            </div>

            {{-- Phone --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="phone">
                    <i class="mdi mdi-phone"></i> Phone : @error('phone') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-phone" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone Number">
                </div>
            </div>

            {{-- Password --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="password">
                    <i class="mdi mdi-lock"></i> Password : <strong class="text-danger"> * @error('password') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-lock" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                </div>
            </div>

            {{-- Password Confirmation --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="password_confirmation">
                    <i class="mdi mdi-lock-check"></i> Confirm Password : <strong class="text-danger"> *</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-lock-check" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="password" wire:model="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                </div>
            </div>

            {{-- Country Key --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="country_key">
                    <i class="mdi mdi-flag"></i> Country Key : @error('country_key') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-flag" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="country_key" class="form-control @error('country_key') is-invalid @enderror" id="country_key" placeholder="e.g., US, UK, SA">
                </div>
            </div>

            {{-- User Status --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="user_status">
                    <i class="mdi mdi-account-switch"></i> User Status : <strong class="text-danger"> * @error('user_status') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account-check"></span>
                    </div>
                    <select wire:model="user_status" class="custom-select my-1 mr-sm-2 @error('user_status') is-invalid @enderror" id="user_status">
                        <option value="">Select Status...</option>
                        <option value="1">Active</option>
                        <option value="2">Pending</option>
                        <option value="3">Inactive</option>
                    </select>
                </div>
            </div>

        </div>
        {{-- Button --}}
        <button class="btn btn-primary" type="submit"><i class="mdi mdi-playlist-plus"></i> Add Customer</button>
    </form>
</div>
