<div>
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
        <div>
            <h4 class="mb-1 fw-bold text-dark">Weekly Schedule Management</h4>
            <p class="text-muted mb-0 small">Configure working hours for each day of the week</p>
        </div>
    </div>

    <form wire:submit.prevent="save">

            <!-- Days Schedule -->
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="20%" class="py-3 ps-4">Day</th>
                                    <th width="20%" class="py-3">From Time</th>
                                    <th width="20%" class="py-3">To Time</th>
                                    <th width="20%" class="py-3">Duration (min)</th>
                                    <th width="20%" class="py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                    <tr>
                                        <!-- Day Name with Checkbox -->
                                        <td class="align-middle ps-4">
                                            <div class="form-check">
                                                <input
                                                    wire:model="days.{{ $day }}.enabled"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="day_{{ $day }}">
                                                <label class="form-check-label fw-semibold" for="day_{{ $day }}">
                                                    {{ $day }}
                                                </label>
                                            </div>
                                        </td>

                                        <!-- From Time -->
                                        <td class="align-middle">
                                            @if($days[$day]['enabled'])
                                                <input
                                                    wire:model="days.{{ $day }}.from_time"
                                                    type="time"
                                                    class="form-control @error('days.'.$day.'.from_time') is-invalid @enderror">
                                                @error('days.'.$day.'.from_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <!-- To Time -->
                                        <td class="align-middle">
                                            @if($days[$day]['enabled'])
                                                <input
                                                    wire:model="days.{{ $day }}.to_time"
                                                    type="time"
                                                    class="form-control @error('days.'.$day.'.to_time') is-invalid @enderror">
                                                @error('days.'.$day.'.to_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <!-- Slot Duration -->
                                        <td class="align-middle">
                                            @if($days[$day]['enabled'])
                                                <input
                                                    wire:model="days.{{ $day }}.slot_duration"
                                                    type="number"
                                                    min="5"
                                                    step="5"
                                                    class="form-control @error('days.'.$day.'.slot_duration') is-invalid @enderror"
                                                    placeholder="30">
                                                @error('days.'.$day.'.slot_duration')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <!-- Status -->
                                        <td class="align-middle">
                                            @if($days[$day]['enabled'])
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('super_admin.work-days-index') }}" class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left me-1"></i> Back to List
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="mdi mdi-content-save me-1"></i> Save Schedule
                </button>
            </div>
        </div>
    </form>
</div>

