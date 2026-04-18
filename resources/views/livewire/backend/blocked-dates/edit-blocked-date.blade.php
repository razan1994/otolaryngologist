<div>
    <form wire:submit.prevent="update">
        <div class="row">

            <!-- Date -->
            <div class="col-md-6 mb-3">
                <label for="date" class="form-label fw-semibold">
                    Date <span class="text-danger">*</span>
                </label>
                <input wire:model="date" type="date" id="date"
                       class="form-control @error('date') is-invalid @enderror">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Block Type -->
        <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label fw-semibold">Block Type</label>
                <div class="card">
                    <div class="card-body">
                        <div class="form-check form-check-inline">
                            <input wire:model.live="is_full_day"
                                   class="form-check-input"
                                   type="radio"
                                   name="is_full_day"
                                   id="full_day"
                                   value="1">
                            <label class="form-check-label" for="full_day">
                                <i class="mdi mdi-calendar-remove text-danger me-1"></i>
                                <strong>Full Day Block</strong>
                                <small class="text-muted d-block">Entire day will be unavailable</small>
                            </label>
                        </div>
                        <div class="form-check form-check-inline ms-4">
                            <input wire:model.live="is_full_day"
                                   class="form-check-input"
                                   type="radio"
                                   name="is_full_day"
                                   id="partial_day"
                                   value="0">
                            <label class="form-check-label" for="partial_day">
                                <i class="mdi mdi-clock-alert text-warning me-1"></i>
                                <strong>Partial Block</strong>
                                <small class="text-muted d-block">Block specific time range</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Time Range (for Partial Block) -->
        @if(!$is_full_day)
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="from_time" class="form-label fw-semibold">
                        From Time <span class="text-danger">*</span>
                    </label>
                    <input wire:model="from_time" type="time" id="from_time"
                           class="form-control @error('from_time') is-invalid @enderror">
                    @error('from_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="to_time" class="form-label fw-semibold">
                        To Time <span class="text-danger">*</span>
                    </label>
                    <input wire:model="to_time" type="time" id="to_time"
                           class="form-control @error('to_time') is-invalid @enderror">
                    @error('to_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endif

        <!-- Reason -->
        <div class="row">
            <div class="col-12 mb-3">
                <label for="reason" class="form-label fw-semibold">Reason (Optional)</label>
                <input wire:model="reason" type="text" id="reason"
                       class="form-control @error('reason') is-invalid @enderror"
                       placeholder="e.g., Public Holiday, Doctor Conference, etc.">
                @error('reason')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('super_admin.blocked-dates-index') }}" class="btn btn-secondary">
                <i class="mdi mdi-arrow-left me-1"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save me-1"></i> Update Blocked Date
            </button>
        </div>
    </form>
</div>
