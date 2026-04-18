<div>
    <form wire:submit.prevent="update" id="editForm">
        <div class="form-row">

            {{-- First Name --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="first_name">
                    <i class="mdi mdi-account"></i> First Name :
                    <strong class="text-danger"> * @error('first_name') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account"></span>
                    </div>
                    <input type="text" wire:model.live="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name">
                </div>
            </div>

            {{-- Last Name --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="last_name">
                    <i class="mdi mdi-account"></i> Last Name :
                    @error('last_name') <strong class="text-danger">( {{ $message }} )</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account"></span>
                    </div>
                    <input type="text" wire:model.live="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name">
                </div>
            </div>

            {{-- Email --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="email">
                    <i class="mdi mdi-email"></i> Email :
                    <strong class="text-danger"> * @error('email') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-email"></span>
                    </div>
                    <input type="email" wire:model.live="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address">
                </div>
            </div>

            {{-- Phone --}}
            <div class="col-md-3 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="country_key">
                    <i class="mdi mdi-phone"></i> Country Key :
                    @error('country_key') <strong class="text-danger">( {{ $message }} )</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-flag"></span>
                    </div>
                    <input type="text" wire:model.live="country_key" class="form-control @error('country_key') is-invalid @enderror" id="country_key" placeholder="+962">
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="phone">
                    <i class="mdi mdi-phone"></i> Phone :
                    @error('phone') <strong class="text-danger">( {{ $message }} )</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-phone"></span>
                    </div>
                    <input type="text" wire:model.live="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone Number">
                </div>
            </div>

            {{-- Appointment Type --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="appointment_type_id">
                    <i class="mdi mdi-calendar-clock"></i> Appointment Type :
                    <strong class="text-danger"> * @error('appointment_type_id') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar-clock"></span>
                    </div>
                    <select wire:model.live="appointment_type_id" class="custom-select my-1 mr-sm-2 @error('appointment_type_id') is-invalid @enderror" id="appointment_type_id">
                        <option value="">Select Type...</option>
                        @foreach($appointmentTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Appointment Date --}}
            <div class="col-md-4 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="appointment_date">
                    <i class="mdi mdi-calendar"></i> Appointment Date :
                    <strong class="text-danger"> * @error('appointment_date') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-calendar"></span>
                    </div>
                    <input
                        type="date"
                        wire:model.live="appointment_date"
                        class="form-control @error('appointment_date') is-invalid @enderror"
                        id="appointment_date"
                    >
                </div>
            </div>

            {{-- Time Slots --}}
            @if($appointment_date)
                <div class="col-md-8 mb-3">
                    <label class="text-dark font-weight-medium mb-3">
                        <i class="mdi mdi-clock-outline"></i> Available Time Slots
                    </label>

                    @if($noSlotsMessage)
                        <div class="alert alert-warning mb-0">
                            {{ $noSlotsMessage }}
                        </div>
                    @elseif(!empty($availableSlots))
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text mdi mdi-clock-start"></span>
                            </div>

                            <select wire:model.live="start_time" class="custom-select @error('start_time') is-invalid @enderror">
                                <option value="">Select Time Slot...</option>
                                @foreach($availableSlots as $slot)
                                    <option value="{{ $slot['start'] }}" @selected($slot['start'] === $start_time)>
                                        {{ $slot['label'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('start_time')
                            <small class="text-danger d-block mb-2">{{ $message }}</small>
                        @enderror

                        @if($start_time && $end_time)
                            <div class="alert alert-info mb-0">
                                Selected Time:
                                <strong>{{ \Carbon\Carbon::parse($start_time)->format('h:i A') }}</strong>
                                -
                                <strong>{{ \Carbon\Carbon::parse($end_time)->format('h:i A') }}</strong>
                            </div>
                        @endif
                    @endif
                </div>
            @endif

            {{-- Status --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="status">
                    <i class="mdi mdi-account-switch"></i> Status :
                    <strong class="text-danger"> * @error('status') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account-check"></span>
                    </div>
                    <select wire:model.live="status" class="custom-select my-1 mr-sm-2 @error('status') is-invalid @enderror" id="status">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="attended">Attended</option>
                        <option value="not_attended">Not Attended</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>

            {{-- Notes --}}
            <div class="col-12 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="notes">
                    <i class="mdi mdi-note-text"></i> Notes :
                    @error('notes') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-note-text"></span>
                    </div>
                    <textarea style="width: 90% !important" wire:model.live="notes" class="form-control @error('notes') is-invalid @enderror" rows="4" placeholder="Additional notes"></textarea>
                </div>
            </div>

        </div>

        <button class="btn btn-success" type="submit">
            <i class="mdi mdi-content-save"></i> Update
        </button>
    </form>
</div>
