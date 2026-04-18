<div>
    <form wire:submit.prevent="update" id="editForm">
        <div class="form-row">

            {{-- Day --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="day">
                    <i class="mdi mdi-calendar"></i> Day : <strong class="text-danger"> * @error('day')
                            ( {{ $message }} )
                        @enderror
                    </strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar"></span>
                    </div>
                    <select wire:model="day" class="custom-select my-1 mr-sm-2 @error('day') is-invalid @enderror"
                        id="day">
                        <option value="">Select Day...</option>
                        @foreach ($days as $dayOption)
                            <option value="{{ $dayOption }}">{{ $dayOption }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- From Time --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="from_time">
                    <i class="mdi mdi-clock-start"></i> From Time : <strong class="text-danger"> * @error('from_time')
                            ( {{ $message }} )
                        @enderror
                    </strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-clock-start" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="time" wire:model="from_time"
                        class="form-control @error('from_time') is-invalid @enderror" id="from_time">
                </div>
            </div>

            {{-- To Time --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="to_time">
                    <i class="mdi mdi-clock-end"></i> To Time : <strong class="text-danger"> * @error('to_time')
                            ( {{ $message }} )
                        @enderror
                    </strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-clock-end" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="time" wire:model="to_time"
                        class="form-control @error('to_time') is-invalid @enderror" id="to_time">
                </div>
            </div>

            {{-- Slot Duration --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="slot_duration">
                    <i class="mdi mdi-timer"></i> Slot Duration (minutes) : <strong class="text-danger"> *
                        @error('slot_duration')
                            ( {{ $message }} )
                        @enderror
                    </strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-timer" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="number" wire:model="slot_duration"
                        class="form-control @error('slot_duration') is-invalid @enderror" id="slot_duration"
                        placeholder="30" min="5">
                </div>
            </div>

            {{-- Status --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="status">
                    <i class="mdi mdi-account-switch"></i> Status : <strong class="text-danger"> * @error('status')
                            ( {{ $message }} )
                        @enderror
                    </strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account-check"></span>
                    </div>
                    <select wire:model="status" class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror"
                        id="status">
                        <option value="">Select Status...</option>
                        <option value="1">Active</option>
                        <option value="2">Not Active</option>
                    </select>
                </div>
            </div>

            {{-- Is Active Checkbox --}}
            <div class="col-md-12 mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" wire:model="is_active" class="custom-control-input" id="is_active">
                    <label class="custom-control-label text-dark font-weight-medium" for="is_active">
                        <i class="mdi mdi-check-circle"></i> Is Active
                    </label>
                </div>
            </div>

        </div>

        {{-- Submit Button --}}
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">
                    <i class="mdi mdi-content-save"></i> Update
                </button>
                <a href="{{ route('super_admin.work-days-index') }}" class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </form>
</div>
