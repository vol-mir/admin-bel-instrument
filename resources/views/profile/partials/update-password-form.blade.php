<div class="card card-default">
    <form method="post" action="{{ route('password.update') }}">
        <div class="card-header">
            <h3 class="card-title">{{ __("update_password") }}</h3>
        </div>
        <div class="card-body">
            @csrf
            @method('put')

            <div class="form-group">
                <x-input-label for="current_password" :value="__('current_password')"/>
                <x-text-input id="current_password" name="current_password" type="password"
                              placeholder="{{ __('current_password') }}"
                              autocomplete="current-password"/>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('new_password')"/>
                <x-text-input id="password" name="password" type="password"
                              placeholder="{{ __('new_password') }}"
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('confirm_password')"/>
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                              placeholder="{{ __('confirm_password') }}"
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
            </div>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success alert-dismissible" x-data="{ show: true }" x-show="show" x-transition
                     x-init="setTimeout(() => show = false, 2000)">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Save!</h5>
                    {{ __('saved_successfully') }}
                </div>
            @endif
        </div>
        <div class="card-footer">
            <x-primary-button>{{ __('save') }}</x-primary-button>
        </div>
    </form>
</div>
