<div class="row">
    <div class="col-12 col-sm-12">
        <div class="form-group">
            <x-input-label for="phone" :value="__('phone')"/>
            <x-text-input id="phone" name="phone" type="text"
                          placeholder="{{ __('phone') }}"
                          :value="isset($phone) ? $phone->phone : old('phone')"
                          required
                          autocomplete="phone"/>
            <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
        </div>

        <div class="form-group">
            <x-input-label for="name" :value="__('name')"/>
            <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                          :value="isset($phone) ? $phone->name : old('name')" autofocus
                          autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div class="form-group">
            <x-input-label for="operator" :value="__('operator')"/>
            <x-text-input id="operator" name="operator" type="text" placeholder="{{ __('operator') }}"
                          :value="isset($phone) ? $phone->operator : old('operator')" autofocus
                          autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('operator')"/>
        </div>

    </div>
</div>
