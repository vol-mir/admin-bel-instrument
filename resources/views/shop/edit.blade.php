<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') . ' ' . mb_strtolower(__('shop')) . ': ' . $shop->name }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('edit') . ' ' . mb_strtolower(__('shop')) . ': ' . $shop->name }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('shops.index') }}">{{ __('shops') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('edit') . ' ' . mb_strtolower(__('shop')) }}</li>
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
                                <div class="tab-content" id="tabs-shop">
                                    <div class="tab-pane fade" id="tabs-shop-general-tab" role="tabpanel" aria-labelledby="tabs-shop-general">
                                        <form method="post" id="shop-base-form" name="shop-base-form" action="{{ route('shops.update', ['shop' => $shop]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('shop.partials.shop-base-form', ['shop' => $shop])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-shop-social-tab" role="tabpanel" aria-labelledby="tabs-shop-social">
                                        <form method="post" id="shop-social-form" name="shop-social-form" action="{{ route('shops.update', ['shop' => $shop]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('shop.partials.shop-social-form', ['shop' => $shop])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-shop-seo-tab" role="tabpanel" aria-labelledby="tabs-shop-seo">
                                        <form method="post" action="{{ route('shops.update', ['shop' => $shop]) }}">
                                            <div class="card card-default shadow-none">
                                                <div class="card-body">
                                                    @csrf
                                                    @method('patch')

                                                    @include('shop.partials.shop-seo-form', ['shop' => $shop])

                                                    <x-primary-button>{{ __('save') }}</x-primary-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-shop-phones-tab" role="tabpanel" aria-labelledby="tabs-shop-phones">
                                        <div class="card card-default shadow-none">
                                            <div class="card-header">
                                                <a href="{{ route('phones.create', ['type' => 'shops', 'id' => $shop->id]) }}"
                                                   class="edit btn btn-success btn-sm">{{ __('add') }}</a>
                                            </div>
                                            <div class="card-body">
                                                <table id="datatable-shop-phones" data-shop-id="{{ $shop->id }}" class="table table-bordered table-striped table-sm">
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
                                    <div class="tab-pane fade" id="tabs-shop-images-tab" role="tabpanel" aria-labelledby="tabs-shop-images">
                                        <div class="card card-default shadow-none">
                                            <div class="card-header">
                                                <a href="{{ route('shops.images.create', ['shop' => $shop->id]) }}"
                                                   class="edit btn btn-success btn-sm">{{ __('add') }}</a>
                                            </div>
                                            <div class="card-body">
                                                <table id="datatable-shop-images" data-shop-id="{{ $shop->id }}" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>{{ __('description') }}</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th>{{ __('description') }}</th>
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
                                     id="shop-tabs-right-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link js-nav-tabs border-top-0" id="tabs-shop-general" data-tabs="tabs-shop"
                                       data-toggle="pill"
                                       href="#tabs-shop-general-tab" role="tab"
                                       aria-controls="tabs-shop-general-tab"
                                       aria-selected="true">{{ __('basic') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-shop-social" data-tabs="tabs-shop"
                                       data-toggle="pill"
                                       href="#tabs-shop-social-tab" role="tab"
                                       aria-controls="tabs-shop-social-tab"
                                       aria-selected="false">{{ __('social') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-shop-seo" data-tabs="tabs-shop"
                                       data-toggle="pill"
                                       href="#tabs-shop-seo-tab" role="tab" aria-controls="tabs-shop-seo-tab"
                                       aria-selected="false">{{ __('seo_data') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-shop-phones" data-tabs="tabs-shop"
                                       data-toggle="pill"
                                       href="#tabs-shop-phones-tab" role="tab" aria-controls="tabs-shop-phones-tab"
                                       aria-selected="false">{{ __('phones') }}</a>
                                    <a class="nav-link js-nav-tabs" id="tabs-shop-images" data-tabs="tabs-shop"
                                       data-toggle="pill"
                                       href="#tabs-shop-images-tab" role="tab" aria-controls="tabs-shop-images-tab"
                                       aria-selected="false">{{ __('images') }}</a>
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
@include('components.modals.delete', ['object' => 'shop-image'])
