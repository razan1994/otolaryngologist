<div>
    <form wire:submit.prevent="save" id="createForm">
        <div class="form-row">

            {{-- Name AR --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="name_ar">
                    <i class="mdi mdi-account"></i> Name AR : <strong class="text-danger"> * @error('name_ar') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-format-text" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="name_ar" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="Name AR">
                </div>
            </div>

            {{-- Name EN --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="name_en">
                    <i class="mdi mdi-account"></i> Name EN : <strong class="text-danger"> * @error('name_en') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-format-text" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="Name EN">
                </div>
            </div>


            {{-- Status --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="status">
                    <i class="mdi mdi-account-switch"></i> Status : <strong class="text-danger"> * @error('status') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-account-check"></span>
                    </div>
                    <select wire:model="status" class="selectpicker" id="status">
                        <option value="">Select Status...</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>

            {{-- Description AR --}}
            <div class="col-12 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="description_ar">
                    <i class="mdi mdi-book-open"></i> Description AR : @error('description_ar') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-book-open" id="inputGroupPrepend2"></span>
                    </div>
                    <textarea style="width: 90% !important" wire:model="description_ar" class="form-control @error('description_ar') is-invalid @enderror" rows="4" placeholder="Description in Arabic"></textarea>
                </div>
            </div>

            {{-- Description EN --}}
            <div class="col-12 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="description_en">
                    <i class="mdi mdi-book-open"></i> Description EN : @error('description_en') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-book-open" id="inputGroupPrepend2"></span>
                    </div>
                    <textarea style="width: 90% !important" wire:model="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="4" placeholder="Description in English"></textarea>
                </div>
            </div>

        </div>
        {{-- Button --}}
        <button class="btn btn-primary" type="submit"><i class="mdi mdi-playlist-plus"></i> Add</button>
    </form>
</div>
