<div class="row">
    <div class="col-10 col-sm-10">
        <div class="tab-content" id="tabs-setting">
            <div class="tab-pane fade" id="tabs-setting-general-tab" role="tabpanel" aria-labelledby="tabs-setting-general">
                <div class="form-group">
                    <x-input-label for="name" :value="__('name')"/>
                    <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                                  :value="isset($setting) ? $setting->name : old('name')" required autofocus
                                  autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-setting-social-tab" role="tabpanel" aria-labelledby="tabs-setting-social">
                <div class="form-group">
                    <x-input-label for="telegram" :value="__('telegram')"/>
                    <x-text-input id="telegram" name="telegram" type="text"
                                  placeholder="{{ __('telegram') }}"
                                  :value="isset($setting) ? $setting->telegram : old('telegram')"
                                  autocomplete="telegram"/>
                    <x-input-error class="mt-2" :messages="$errors->get('telegram')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="viber" :value="__('viber')"/>
                    <x-text-input id="viber" name="viber" type="text"
                                  placeholder="{{ __('viber') }}"
                                  :value="isset($setting) ? $setting->viber : old('viber')"
                                  autocomplete="viber"/>
                    <x-input-error class="mt-2" :messages="$errors->get('viber')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="vk" :value="__('vk')"/>
                    <x-text-input id="vk" name="vk" type="text"
                                  placeholder="{{ __('vk') }}"
                                  :value="isset($setting) ? $setting->vk : old('vk')"
                                  autocomplete="vk"/>
                    <x-input-error class="mt-2" :messages="$errors->get('vk')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="instagram" :value="__('instagram')"/>
                    <x-text-input id="instagram" name="instagram" type="text"
                                  placeholder="{{ __('instagram') }}"
                                  :value="isset($setting) ? $setting->instagram : old('instagram')"
                                  autocomplete="instagram"/>
                    <x-input-error class="mt-2" :messages="$errors->get('instagram')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="facebook" :value="__('facebook')"/>
                    <x-text-input id="facebook" name="facebook" type="text"
                                  placeholder="{{ __('facebook') }}"
                                  :value="isset($setting) ? $setting->facebook : old('facebook')"
                                  autocomplete="facebook"/>
                    <x-input-error class="mt-2" :messages="$errors->get('facebook')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="ok" :value="__('ok')"/>
                    <x-text-input id="ok" name="ok" type="text"
                                  placeholder="{{ __('ok') }}"
                                  :value="isset($setting) ? $setting->ok : old('ok')"
                                  autocomplete="ok"/>
                    <x-input-error class="mt-2" :messages="$errors->get('ok')"/>
                </div>

                <div class="form-group">
                    <x-input-label for="youtube" :value="__('youtube')"/>
                    <x-text-input id="youtube" name="youtube" type="text"
                                  placeholder="{{ __('youtube') }}"
                                  :value="isset($setting) ? $setting->youtube : old('youtube')"
                                  autocomplete="youtube"/>
                    <x-input-error class="mt-2" :messages="$errors->get('youtube')"/>
                </div>
            </div>
            <div class="tab-pane fade" id="tabs-setting-seo-tab" role="tabpanel" aria-labelledby="tabs-setting-seo">
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
            </div>
        </div>
    </div>
    <div class="col-2 col-sm-2">
        <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="setting-tabs-right-tab" role="tablist"
             aria-orientation="vertical">
            <a class="nav-link js-nav-tabs" id="tabs-setting-general" data-tabs="tabs-setting" data-toggle="pill"
               href="#tabs-setting-general-tab" role="tab" aria-controls="tabs-setting-general-tab"
               aria-selected="true">{{ __('basic') }}</a>
            <a class="nav-link js-nav-tabs" id="tabs-setting-social" data-tabs="tabs-setting" data-toggle="pill"
               href="#tabs-setting-social-tab" role="tab" aria-controls="tabs-setting-social-tab"
               aria-selected="false">{{ __('social') }}</a>
            <a class="nav-link js-nav-tabs" id="tabs-setting-seo" data-tabs="tabs-setting" data-toggle="pill"
               href="#tabs-setting-seo-tab" role="tab" aria-controls="tabs-setting-seo-tab"
               aria-selected="false">{{ __('seo_data') }}</a>
        </div>
    </div>
</div>
