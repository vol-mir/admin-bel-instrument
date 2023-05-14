<div class="form-group">
    <x-input-label for="telegram" :value="__('telegram')"/>
    <x-text-input id="telegram" name="telegram" type="text"
                  placeholder="{{ __('telegram') }}"
                  :value="isset($shop) ? $shop->telegram : old('telegram')"
                  autocomplete="telegram"/>
    <x-input-error class="mt-2" :messages="$errors->get('telegram')"/>
</div>

<div class="form-group">
    <x-input-label for="viber" :value="__('viber')"/>
    <x-text-input id="viber" name="viber" type="text"
                  placeholder="{{ __('viber') }}"
                  :value="isset($shop) ? $shop->viber : old('viber')"
                  autocomplete="viber"/>
    <x-input-error class="mt-2" :messages="$errors->get('viber')"/>
</div>

<div class="form-group">
    <x-input-label for="vk" :value="__('vk')"/>
    <x-text-input id="vk" name="vk" type="text"
                  placeholder="{{ __('vk') }}"
                  :value="isset($shop) ? $shop->vk : old('vk')"
                  autocomplete="vk"/>
    <x-input-error class="mt-2" :messages="$errors->get('vk')"/>
</div>

<div class="form-group">
    <x-input-label for="instagram" :value="__('instagram')"/>
    <x-text-input id="instagram" name="instagram" type="text"
                  placeholder="{{ __('instagram') }}"
                  :value="isset($shop) ? $shop->instagram : old('instagram')"
                  autocomplete="instagram"/>
    <x-input-error class="mt-2" :messages="$errors->get('instagram')"/>
</div>

<div class="form-group">
    <x-input-label for="facebook" :value="__('facebook')"/>
    <x-text-input id="facebook" name="facebook" type="text"
                  placeholder="{{ __('facebook') }}"
                  :value="isset($shop) ? $shop->facebook : old('facebook')"
                  autocomplete="facebook"/>
    <x-input-error class="mt-2" :messages="$errors->get('facebook')"/>
</div>

<div class="form-group">
    <x-input-label for="ok" :value="__('ok')"/>
    <x-text-input id="ok" name="ok" type="text"
                  placeholder="{{ __('ok') }}"
                  :value="isset($shop) ? $shop->ok : old('ok')"
                  autocomplete="ok"/>
    <x-input-error class="mt-2" :messages="$errors->get('ok')"/>
</div>

<div class="form-group">
    <x-input-label for="youtube" :value="__('youtube')"/>
    <x-text-input id="youtube" name="youtube" type="text"
                  placeholder="{{ __('youtube') }}"
                  :value="isset($shop) ? $shop->youtube : old('youtube')"
                  autocomplete="youtube"/>
    <x-input-error class="mt-2" :messages="$errors->get('youtube')"/>
</div>





