<div class="form-group">
    <x-input-label for="name" :value="__('name')"/>
    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                  :value="isset($shop) ? $shop->name : old('name')" required autofocus autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
</div>

<div class="form-group">
    <x-input-label for="registration_number" :value="__('registration_number')"/>
    <x-text-input id="registration_number" name="registration_number" type="text" placeholder="{{ __('registration_number') }}"
                  :value="isset($shop) ? $shop->registration_number : old('registration_number')" required autocomplete="registration_number"/>
    <x-input-error class="mt-2" :messages="$errors->get('registration_number')"/>
</div>
