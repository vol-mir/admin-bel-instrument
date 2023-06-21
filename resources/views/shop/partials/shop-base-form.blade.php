<div class="form-group">
    <x-input-label for="name" :value="__('name')"/>
    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                  :value="isset($shop) ? $shop->name : old('name')" required autofocus
                  autocomplete="name"/>
    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
</div>

<div class="form-group">
    <x-input-label for="registration_number" :value="__('registration_number')"/>
    <x-text-input id="registration_number" name="registration_number" type="text"
                  placeholder="{{ __('registration_number') }}"
                  :value="isset($shop) ? $shop->registration_number : old('registration_number')"
                  required
                  autocomplete="registration_number"/>
    <x-input-error class="mt-2" :messages="$errors->get('registration_number')"/>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-3">
            <x-input-label for="physical_address[zip_code]" :value="__('zip_code')"/>
            <x-text-input id="physical_address[zip_code]" name="physical_address[zip_code]" type="text"
                          placeholder="{{ __('zip_code') }}"
                          :value="$physical_address->zip_code ?? old('physical_address[zip_code]')"
                          autocomplete="physical_address[zip_code]"/>
            <x-input-error class="mt-2" :messages="$errors->get('physical_address[zip_code]')"/>
        </div>

        <div class="col-3">
            <x-input-label for="physical_address[city]" :value="__('city')"/>
            <x-text-input id="physical_address[city]" name="physical_address[city]" type="text"
                          placeholder="{{ __('city') }}"
                          :value="$physical_address->city ?? old('physical_address[city]')"
                          autocomplete="physical_address[city]"/>
            <x-input-error class="mt-2" :messages="$errors->get('physical_address[city]')"/>
        </div>

        <div class="col-4">
            <x-input-label for="physical_address[street]" :value="__('street')"/>
            <x-text-input id="physical_address[street]" name="physical_address[street]" type="text"
                          placeholder="{{ __('street') }}"
                          :value="$physical_address->street ?? old('physical_address[street]')"
                          autocomplete="physical_address[street]"/>
            <x-input-error class="mt-2" :messages="$errors->get('physical_address[street]')"/>
        </div>

        <div class="col-2">
            <x-input-label for="physical_address[house_number]" :value="__('house_number')"/>
            <x-text-input id="physical_address[house_number]" name="physical_address[house_number]"
                          type="text"
                          placeholder="{{ __('house_number') }}"
                          :value="$physical_address->house_number ?? old('physical_address[house_number]')"
                          autocomplete="physical_address[house_number]"/>
            <x-input-error class="mt-2" :messages="$errors->get('house_number')"/>
        </div>
    </div>
</div>

<div class="form-group">
    <x-input-label for="google_map" :value="__('google_map')"/>
    <x-text-input id="google_map" name="google_map" type="text"
                  placeholder="{{ __('google_map') }}"
                  :value="isset($shop) ? $shop->google_map : old('google_map')"
                  autocomplete="google_map"/>
    <x-input-error class="mt-2" :messages="$errors->get('google_map')"/>
</div>
