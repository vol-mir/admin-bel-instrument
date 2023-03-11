<div class="card card-default">
    <form method="post" action="{{ route('profile.update') }}">
        <div class="card-header">
            <h3 class="card-title">{{ __("update_profile_and_email") }}</h3>
        </div>
        <div class="card-body">
            @csrf
            @method('patch')

            <div class="form-group">
                <x-input-label for="name" :value="__('name')"/>
                <x-text-input id="name" name="name" type="text" placeholder="{{ __('name') }}"
                              :value="old('name', $user->name)" required autofocus autocomplete="name"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('email')"/>
                <x-text-input id="email" name="email" type="email" placeholder="{{ __('email') }}"
                              :value="old('email', $user->email)" required autocomplete="username"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success alert-dismissible" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
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
