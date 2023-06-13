<div class="form-group">
    <x-input-label for="description" :value="__('description')"/>
    <x-textarea-input id="description" name="description"
                      placeholder="{{ __('description') }}"
                      :value="isset($image) ? $image->description : old('description')"
                      autocomplete="description"/>
    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
</div>

@if (isset($image->name))
    <div class="form-group">
        <img src="{{ asset('/storage/images/shops/' . $image->shop->slug . '/' . $image->name) }}" class="img-size-220">
    </div>
@endif

<div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="js-input-shop-image" accept="image/*">
        <label class="custom-file-label" for="name">{{ __('image') }}</label>
    </div>
</div>

<div class="form-group cropper-container cropper-height">
    <div class="row cropper-height">
        <div class="col-md-8 cropper-height" id="js-cropper-shop-container">
        </div>
        <div class="col-md-4 cropper-height">
            <div class="cropper-preview"></div>
            <x-textarea-input class="d-none" id="js-image" name="image"/>
            <x-input-error class="mt-2" :messages="$errors->get('image')"/>
        </div>
    </div>
</div>
