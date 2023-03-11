<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('profile') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('profile') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('profile') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</x-app-layout>
