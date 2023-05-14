<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') . ' ' . ucfirst(__('setting')) }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ ucfirst(__('settings')) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ ucfirst(__('settings')) }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div clas="card-body">
                        <div class="row">
                            <div class="col-10 col-sm-10 pr-0">
                                <div class="tab-content" id="tabs-setting">
                                    <div class="tab-pane fade" id="tabs-setting-general-tab" role="tabpanel" aria-labelledby="tabs-setting-general">
                                        <form method="post" id="setting-base-form" name="setting-base-form" action="{{ route('settings.update', ['setting' => $setting]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('settings.partials.setting-base-form', ['setting' => $setting])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-setting-social-tab" role="tabpanel" aria-labelledby="tabs-setting-social">
                                        <form method="post" id="setting-social-form" name="setting-social-form" action="{{ route('settings.update', ['setting' => $setting]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('settings.partials.setting-social-form', ['setting' => $setting])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-setting-seo-tab" role="tabpanel" aria-labelledby="tabs-setting-seo">
                                        <form method="post" action="{{ route('settings.update', ['setting' => $setting]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('settings.partials.setting-seo-form', ['setting' => $setting])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-setting-phones-tab" role="tabpanel" aria-labelledby="tabs-setting-phones">
                                        <div class="card card-default shadow-none">
                                            <div class="card-header">
                                                <a href="{{ route('phones.create', ['type' => 'settings', 'id' => $setting->id]) }}"
                                                   class="edit btn btn-success btn-sm">{{ __('add') }}</a>
                                            </div>
                                            <div class="card-body">
                                                <table id="datatable-setting-phones" data-setting-id="{{ $setting->id }}" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>{{ __('phone') }}</th>
                                                        <th>{{ __('name') }}</th>
                                                        <th>{{ __('operator') }}</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th>{{ __('phone') }}</th>
                                                        <th>{{ __('name') }}</th>
                                                        <th>{{ __('operator') }}</th>
                                                        <th></th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- /.table -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 pl-0">
                                <div class="nav flex-column nav-tabs nav-tabs-right h-100"
                                     id="setting-tabs-right-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link js-nav-tabs border-top-0" id="tabs-setting-general" data-tabs="tabs-setting"
                                       data-toggle="pill"
                                       href="#tabs-setting-general-tab" role="tab"
                                       aria-controls="tabs-setting-general-tab"
                                       aria-selected="true">{{ __('basic') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-setting-social" data-tabs="tabs-setting"
                                       data-toggle="pill"
                                       href="#tabs-setting-social-tab" role="tab"
                                       aria-controls="tabs-setting-social-tab"
                                       aria-selected="false">{{ __('social') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-setting-seo" data-tabs="tabs-setting"
                                       data-toggle="pill"
                                       href="#tabs-setting-seo-tab" role="tab" aria-controls="tabs-setting-seo-tab"
                                       aria-selected="false">{{ __('seo_data') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-setting-phones" data-tabs="tabs-setting"
                                       data-toggle="pill"
                                       href="#tabs-setting-phones-tab" role="tab" aria-controls="tabs-setting-phones-tab"
                                       aria-selected="false">{{ __('phones') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</x-app-layout>

@include('components.modals.delete', ['object' => 'phone'])
