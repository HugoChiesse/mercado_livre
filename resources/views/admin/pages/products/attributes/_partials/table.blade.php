<div class="table-responsive">
    <table class="table table-sm table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Cód. Atributo</th>
                <th scope="col">Atributo</th>
                <th scope="col">Valor ID</th>
                <th scope="col">Valor Estrutura</th>
                <th scope="col">ID Grupo Atributo</th>
                <th scope="col">Nome Grupo Atributo</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registers as $register)
                <tr>
                    <th scope="row">{{ $register->attribute_id }}</th>
                    <td>{{ $register->name }}</td>
                    <td>{{ $register->value_id }}</td>
                    <td>{{ $register->value_struct }}</td>
                    <td>{{ $register->attribute_group_id }}</td>
                    <td>{{ $register->attribute_group_name }}</td>
                    <td>
                        {{-- <a href="{{ route('products.sync_data_product', $register->id) }}"
                            class="btn btn-success btn-sm"><i class="fa-solid fa-rotate"></i></a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
