<div class="form-group">
    <x-input-label for="name" :value="__('name')"/>
    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                  :value="isset($setting) ? $setting->name : old('name')" required autofocus
                  autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
</div>
