<div class="form-group">
    <x-input-label for="name" :value="__('name')"/>
    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                  :value="isset($product) ? $product->name : old('name')" autofocus
                  autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
</div>

<div class="form-group">
    <x-input-label for="sku" :value="__('sku')"/>
    <x-text-input id="sku" name="sku" type="text" placeholder="{{ __('sku') }}"
                  :value="isset($product) ? $product->sku : old('sku')" autofocus
                  autocomplete="sku"/>
    <x-input-error class="mt-2" :messages="$errors->get('sku')"/>
</div>

<div class="form-group">
    <x-input-label for="description" :value="__('description')"/>
    <x-textarea-input id="description" name="description"
                      placeholder="{{ __('description') }}"
                      :value="isset($product) ? $product->description : old('description')"
                      autocomplete="description"/>
    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
</div>

@if (isset($product->image))
    <div class="form-group">
        <img src="{{ asset('/storage/images/products/' . $product->image) }}" class="img-size-220">
    </div>
@endif

<div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="js-input-product-image" accept="image/*">
        <label class="custom-file-label" for="image">{{ __('image') }}</label>
    </div>
</div>

<div class="form-group cropper-container cropper-height js-cropper-product-height">
    <div class="row cropper-height">
        <div class="col-md-8 cropper-height" id="js-cropper-product-container">
        </div>
        <div class="col-md-4 cropper-height">
            <div class="cropper-preview"></div>
            <x-textarea-input class="d-none" id="js-product-image" name="image"/>
            <x-input-error class="mt-2" :messages="$errors->get('image')"/>
        </div>
    </div>
</div>
