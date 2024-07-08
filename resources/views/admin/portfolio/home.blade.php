@extends('templates.admin')

@section('title', 'Manage Portfolio')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h2 class="mb-0">Manage Portfolio</h2>
                        <a href="/add-portfolio" class="btn btn-primary">+ Tambah Data</a>
                    </div>
                    <div class="container mb-4">
                        <table id="example" class="table table-bordered table-striped datatables-blogsx">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Gambar</th>
                                    <th>Lokasi</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Proyek</th>
                                    <th>Client</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $portfolio->nama }}</td>
                                        <td><img src="{{ asset('storage/portfolio/gambar/' . $portfolio->gambar) }}"
                                                alt="" style="width: 100px;"></td>
                                        <td>{{ $portfolio->lokasi }}</td>
                                        <td>{{ $portfolio->kategori }}</td>
                                        <td>{{ $portfolio->tanggalProyek }}</td>
                                        <td>{{ $portfolio->client }}</td>
                                        <td>{!! Str::limit(strip_tags($portfolio->deskripsi), 150) !!}</td>
                                        <td>
                                            <div class="d-inline-block text-nowrap">
                                                <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                                    class="btn btn-sm btn-icon edit-portfolio">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-icon delete-port-button"
                                                    data-id="{{ $portfolio->id }}"><i class="bx bx-trash"></i></button>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{--
        <!-- Pagination Links -->
        <div class="pagination-links mt-4">
            {{ $portfolios->links() }}
        </div> --}}

        </div>
        <div class="content-backdrop fade"></div>
    </div>
@endsection

@section('script')
    {{-- <style>
    .table {
        table-layout: fixed;
        width: 100%;
    }

    th,
    td {
        word-wrap: break-word;
        white-space: normal;
        overflow-wrap: break-word;
    }
</style> --}}
@endsection
