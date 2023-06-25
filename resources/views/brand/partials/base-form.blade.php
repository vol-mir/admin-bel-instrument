<div class="form-group">
    <x-input-label for="title" :value="__('title')"/>
    <x-text-input id="title" name="title" type="text" placeholder="{{ __('title') }}"
                  :value="isset($brand) ? $brand->title : old('title')" autofocus
                  autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('title')"/>
</div>

<div class="form-group">
    <x-input-label for="description" :value="__('description')"/>
    <x-textarea-input id="description" name="description"
                      placeholder="{{ __('description') }}"
                      :value="isset($brand) ? $brand->description : old('description')"
                      autocomplete="description"/>
    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
</div>

<div class="form-group">
    <x-input-label for="url" :value="__('url')"/>
    <x-text-input id="url" name="url" type="text"
                  placeholder="{{ __('url') }}"
                  :value="isset($brand) ? $brand->url : old('url')"
                  autocomplete="url"/>
    <x-input-error class="mt-2" :messages="$errors->get('url')"/>
</div>

@if (isset($brand->name))
    <div class="form-group">
        <img src="{{ asset('/storage/images/brands/' . $brand->name) }}" class="img-size-220">
    </div>
@endif

<div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="js-input-brand-image" accept="image/*">
        <label class="custom-file-label" for="name">{{ __('image') }}</label>
    </div>
</div>

<div class="form-group cropper-container cropper-height js-cropper-brand-height">
    <div class="row cropper-height">
        <div class="col-md-8 cropper-height" id="js-cropper-brand-container">
        </div>
        <div class="col-md-4 cropper-height">
            <div class="cropper-preview"></div>
            <x-textarea-input class="d-none" id="js-brand-image" name="image"/>
            <x-input-error class="mt-2" :messages="$errors->get('image')"/>
        </div>
    </div>
</div>
