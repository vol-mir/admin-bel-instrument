<div class="row">
    <div class="col-10 col-sm-10">
        <div class="tab-content" id="tabs-shop">
            <div class="tab-pane fade" id="tabs-shop-general-tab" role="tabpanel" aria-labelledby="tabs-shop-general">
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
            </div>
            <div class="tab-pane fade" id="tabs-shop-social-tab" role="tabpanel" aria-labelledby="tabs-shop-social">
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
            </div>
            <div class="tab-pane fade" id="tabs-shop-seo-tab" role="tabpanel" aria-labelledby="tabs-shop-seo">
                <div class="form-group">
                    <x-input-label for="description" :value="__('description')"/>
                    <x-textarea-input id="description" name="description"
                                      placeholder="{{ __('description') }}"
                                      :value="isset($shop) ? $shop->description : old('description')"
                                      autocomplete="description"/>
                    <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="keys" :value="__('keys')"/>
                    <x-textarea-input id="keys" name="keys"
                                      placeholder="{{ __('keys') }}"
                                      :value="isset($shop) ? $shop->keys : old('keys')"
                                      autocomplete="keys"/>
                    <x-input-error class="mt-2" :messages="$errors->get('keys')"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 col-sm-2">
        <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="shop-tabs-right-tab" role="tablist"
             aria-orientation="vertical">
            <a class="nav-link js-nav-tabs" id="tabs-shop-general" data-tabs="tabs-shop" data-toggle="pill"
               href="#tabs-shop-general-tab" role="tab" aria-controls="tabs-shop-general-tab"
               aria-selected="true">{{ __('basic') }}</a>
            <a class="nav-link js-nav-tabs" id="tabs-shop-social" data-tabs="tabs-shop" data-toggle="pill"
               href="#tabs-shop-social-tab" role="tab" aria-controls="tabs-shop-social-tab"
               aria-selected="false">{{ __('social') }}</a>
            <a class="nav-link js-nav-tabs" id="tabs-shop-seo" data-tabs="tabs-shop" data-toggle="pill"
               href="#tabs-shop-seo-tab" role="tab" aria-controls="tabs-shop-seo-tab"
               aria-selected="false">{{ __('seo_data') }}</a>
        </div>
    </div>
</div>
