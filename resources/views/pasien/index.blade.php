@extends('layout.apps')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group col-lg-6" style="float: left">
                    <h2 class="text-primary m-0 font-weight-bold">Data Pasien</h2>
                </div>
                <div class="form-group col-lg-6" style="float: right">
                    <form method="get" action="{{ url()->current() }}">
                        <div class="input-group">
                            <input type="text" class="form-control gp-search" name="keyword"
                                value="{{ request('keyword') }}" placeholder="Cari" autocomplete="off">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                    <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive card-table">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $row)
                                <tr>
                                    <td>{{ $datas->firstItem() + $key }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->tmp_lahir }}, {{ $row->tgl_lahir }}</td>
                                    <td>{{ $row->alamat_lengkap }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td>
                                        <a href="{{ Route('rekam.detail', $row->id) }}"
                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="{{ Route('pasien.edit', $row->id) }}"
                                            class="btn btn-info shadow btn-xs sharp mr-1">
                                            <i class="flaticon-381-edit"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp delete"
                                            r-link="{{ Route('pasien.delete', $row->id) }}"
                                            r-name="{{ $row->nama }}" r-id="{{ $row->id }}">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-info">
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Menampilkan {{ $datas->firstItem() }} sampai {{ $datas->lastItem() }} dari {{ $datas->total() }} entri
                        </div>
                        <div class="pagination-links">
                            @if ($datas->hasPages())
                                <nav>
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($datas->onFirstPage())
                                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $datas->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($datas->links()->elements as $element)
                                            {{-- "Three Dots" Separator --}}
                                            @if (is_string($element))
                                                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                                            @endif

                                            {{-- Array Of Links --}}
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $datas->currentPage())
                                                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($datas->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $datas->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$().ready(function() {
    $(".delete").click(function() {
        var id = $(this).attr('r-id');
        var name = $(this).attr('r-name');
        var link = $(this).attr('r-link');
        Swal.fire({
            title: 'Ingin Menghapus?',
            text: "Yakin ingin menghapus data  : " + name + " ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#20d0ce',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus !'
        }).then((result) => {
            if (result.value) {
                window.location = link;
            }
        });
    });
});
</script>
@endsection

@section('style')
<style>
.text-primary {
    color: #20d0ce !important;
}

.btn-primary {
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.btn-primary:hover {
    background-color: #1bb5b3;
    border-color: #1bb5b3;
}

.btn-info {
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.btn-info:hover {
    background-color: #1bb5b3;
    border-color: #1bb5b3;
}

.pagination-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding: 10px;
    background-color: #f8f9fa;
    border-radius: 5px;
}

.dataTables_info {
    font-size: 14px;
    color: #6c757d;
}

.pagination-links {
    display: flex;
    justify-content: flex-end;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
}

.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

.page-item:last-child .page-link {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #20d0ce;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.page-link:hover {
    z-index: 2;
    color: #167e7d;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.table thead th {
    color: #20d0ce;
}

.card {
    border-color: #20d0ce;
}

.card-body {
    border-top: 3px solid #20d0ce;
}

.form-control:focus {
    border-color: #20d0ce;
    box-shadow: 0 0 0 0.2rem rgba(32, 208, 206, 0.25);
}
</style>
@endsection
