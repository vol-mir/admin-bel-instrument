<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') . ' ' . mb_strtolower(__('brand')) . ': ' . $brand->id }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('edit') . ' ' . mb_strtolower(__('image')) . ': ' . $brand->id }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">{{ __('shops') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('edit') . ' ' . mb_strtolower(__('brand')) }}</li>
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
                        <form method="post" action="{{ route('brands.update', ['brand' => $brand]) }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        @csrf
                                        @method('patch')

                                        @include('brand.partials.base-form')
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <x-primary-button name="save" class="js-crop-image" value="save">{{ __('save') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</x-app-layout>

@include('components.modals.delete', ['object' => 'brand'])
