<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('add') . ' ' . mb_strtolower(__('phone')) }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('add') . ' ' . mb_strtolower(__('phone')) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('shops.edit', ['shop' => $contact]) }}">{{ __('shop') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('add') . ' ' . mb_strtolower(__('phone')) }}</li>
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
                        <form method="post" action="{{ route('phones.store', ['type' => $type, 'id' => $contact->id]) }}">
                            <div class="card-body">
                                @csrf
                                @method('post')

                                @include('phone.partials.phone-form')

                            </div>
                            <div class="card-footer">
                                <x-primary-button name="save" value="save">{{ __('save') }}</x-primary-button>
                                <x-primary-button name="save" value="save-next">{{ __('save_next') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</x-app-layout>
