<div class="mt-5">
    <table id="{{ $id }}" class="table table-hover table-bordered">
        <thead style="background-color: rgba(158,12,237,1); color: white;">
            <tr>
                <th width="2%;">No</th>
                {{ $columns }}
                <th class="text-center none not-export-col" style="width: 15%;">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    @push('css')
        <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    @endpush

    @push('js')
        <!-- Data tables -->
        <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        {{-- 
        <script src="{{ asset('bower_components/datatable/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatable/responsive.bootstrap4.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('ps/datatables.js') }}"></script> --}}
    @endpush
</div>
