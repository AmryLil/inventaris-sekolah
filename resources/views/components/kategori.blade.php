<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">{{ $title }}</h5>
                    </div>

                    @if (session('role') === 'admin')
                        <a href="{{ $createRoute }}" class="btn btn-primary">Tambah Kategori</a>
                    @endif
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                @foreach ($columns as $column)
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ $column['label'] }}
                                    </th>
                                @endforeach

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    @foreach ($columns as $column)
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $item->{$column['field']} }}
                                            </p>
                                        </td>
                                    @endforeach

                                    <td class="text-center">
                                        @if (session('role') === 'admin')
                                            <a href="{{ route($editRoute, $item->id_kategori_222291) }}"
                                                class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit {{ $title }}">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"
                                                    onclick="confirm('Are you sure?') && document.getElementById('delete-form-{{ $item->id_kategori_222291 }}').submit()"></i>
                                                <form id="delete-form-{{ $item->id_kategori_222291 }}"
                                                    action="{{ route($deleteRoute, $item->id_kategori_222291) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </span>
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