<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') . ' ' . mb_strtolower(__('shop')) }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('edit') . ' ' . mb_strtolower(__('shop')) }}</h1>
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
                    <form method="post" action="{{ route('shops.update', ['shop' => $shop]) }}">
                        <div class="card-body">
                            @csrf
                            @method('put')

                            @include('shop.partials.shop-form', ['shop' => $shop])

                        </div>
                        <div class="card-footer">
                            <x-primary-button>{{ __('save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</x-app-layout>
