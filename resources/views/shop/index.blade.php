<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('shops') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('shops') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('shops') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </x-slot>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('shops.create') }}" class="edit btn btn-success btn-sm">{{ __('add') }}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable-shops" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('registration_number') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('registration_number') }}</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                            <!-- /.modal -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-app-layout>

@include('components.modals.delete')
