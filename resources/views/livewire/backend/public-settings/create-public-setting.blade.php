<div>
    <form wire:submit.prevent="save" id="createForm">
        <div class="form-row">

            {{-- Key --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="key">
                    <i class="mdi mdi-key"></i> Setting Key : <strong class="text-danger"> * @error('key') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-key" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="key" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="e.g. clinic_name">
                </div>
            </div>

            {{-- Type --}}
            <div class="col-md-6 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="type">
                    <i class="mdi mdi-format-list-bulleted-type"></i> Type : <strong class="text-danger"> * @error('type') ( {{ $message }} ) @enderror</strong>
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-format-list-bulleted-type"></span>
                    </div>
                    <select wire:model="type" class="custom-select my-1 mr-sm-2 @error('type') is-invalid @enderror" id="type">
                        <option value="string">String</option>
                        <option value="boolean">Boolean</option>
                        <option value="integer">Integer</option>
                        <option value="json">JSON</option>
                    </select>
                </div>
            </div>

            {{-- Value --}}
            <div class="col-12 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="value">
                    <i class="mdi mdi-format-text"></i> Value : @error('value') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-format-text" id="inputGroupPrepend2"></span>
                    </div>
                    <textarea style="width: 90% !important" wire:model="value" class="form-control @error('value') is-invalid @enderror" rows="3" placeholder="Setting value"></textarea>
                </div>
            </div>

            {{-- Description --}}
            <div class="col-12 mb-3">
                <label class="text-dark font-weight-medium mb-3" for="description">
                    <i class="mdi mdi-book-open"></i> Description : @error('description') <strong class="text-danger">{{ $message }}</strong> @enderror
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text mdi mdi-book-open" id="inputGroupPrepend2"></span>
                    </div>
                    <input type="text" wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Brief description of this setting">
                </div>
            </div>

        </div>
        {{-- Button --}}
        <button class="btn btn-primary" type="submit"><i class="mdi mdi-playlist-plus"></i> Add</button>
    </form>
</div>
