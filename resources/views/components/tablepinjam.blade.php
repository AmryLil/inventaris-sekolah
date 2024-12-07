<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">{{ $title }}</h5>
                    </div>

                    @if (session('role') === 'admin')
                        <!-- Tombol Tambah Barang hanya untuk admin -->
                    @endif
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No</th>
                                @foreach ($columns as $column)
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ $column['label'] }}
                                    </th>
                                @endforeach

                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center text-sm">
                                        {{ $index + 1 }} {{-- Increment ID berdasarkan index --}}
                                    </td>
                                    @foreach ($columns as $column)
                                        <td class="text-center">
                                            @if ($column['type'] === 'image')
                                                <img src="{{ $item->{$column['field']} }}"
                                                    class="avatar avatar-sm me-3">
                                            @else
                                                @if (strpos($column['field'], '.') !== false)
                                                    {{-- Handle nested fields for category --}}
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ data_get($item, $column['field']) ?? 'Tanpa Kategori' }}
                                                    </p>
                                                @else
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $item->{$column['field']} }}</p>
                                                @endif
                                            @endif
                                        </td>
                                    @endforeach

                                    <td class="text-center">
                                        @if (session('role') === 'admin')
                                            <a href="{{ route($editRoute, $item->id_peminjaman_222291) }}"
                                                class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit {{ $title }}">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>

                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"
                                                    onclick="confirm('Are you sure?') && document.getElementById('delete-form-{{ $item->id_peminjaman_222291 }}').submit()"></i>
                                                <form id="delete-form-{{ $item->id_peminjaman_222291 }}"
                                                    action="{{ route($deleteRoute, $item->id_peminjaman_222291) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </span>
                                        @elseif (session('role') === 'user')
                                            <a href="{{ route($loanRoute, ['id' => $item->id_barang_222291]) }}"
                                                class="btn bg-gradient-primary btn-sm mb-0" type="button">&nbsp;
                                                Sewa</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
