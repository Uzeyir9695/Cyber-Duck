@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @include('delete')
        <a href="{{ route('categories.create') }}" class="btn btn-primary my-4">Create a new one</a>
        <h2 class="mb-4">Technical Task</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    @include('datatable-scripts')
    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush

