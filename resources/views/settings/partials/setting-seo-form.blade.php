<div class="form-group">
    <x-input-label for="description" :value="__('description')"/>
    <x-textarea-input id="description" name="description"
                      placeholder="{{ __('description') }}"
                      :value="isset($setting) ? $setting->description : old('description')"
                      autocomplete="description"/>
    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
</div>

<div class="form-group">
    <x-input-label for="keys" :value="__('keys')"/>
    <x-textarea-input id="keys" name="keys"
                      placeholder="{{ __('keys') }}"
                      :value="isset($setting) ? $setting->keys : old('keys')"
                      autocomplete="keys"/>
    <x-input-error class="mt-2" :messages="$errors->get('keys')"/>
</div>
