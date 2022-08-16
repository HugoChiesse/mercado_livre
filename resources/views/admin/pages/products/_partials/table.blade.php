<div class="card">
    <div class="card-header">
        <a href="{{ route('products.create') }}" class="btn btn-info btn-sm">Novo</a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-sm table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registers as $register)
                        <tr>
                            <th scope="row">{{ $register->id }}</th>
                            <td>{{ $register->title }}</td>
                            <td>{{ $register->subtitle }}</td>
                            <td>R$ {{ number_format($register->price, 2, ',', '.') }}</td>
                            <td>{{ $register->available_quantity }}</td>
                            <td>

                                <a href="{{ route('products.edit', $register->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <a href="{{ route('attributes.index', $register->id) }}"
                                    class="btn btn-secondary btn-sm"><i class="fa-solid fa-plus"></i></a>
                                <a href="{{ route('products.sync_data_product', $register->id) }}"
                                    class="btn btn-success btn-sm"><i class="fa-solid fa-rotate"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
