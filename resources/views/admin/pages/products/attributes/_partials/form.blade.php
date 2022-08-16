<form action="{{ route('attributes.store', $product_id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="attribute_id">
                ID Atributo
            </label>
            <input class="form-control" id="attribute_id" name="attribute_id" type="text"
                value="{{ $register->attribute_id ?? old('attribute_id') }}" autofocus />

                <input type="hidden" name="product_id" value="{{ $product_id }}">
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="name">
                Nome
            </label>
            <input class="form-control" id="name" name="name" type="text"
                value="{{ $register->name ?? old('name') }}" />
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="value_id">
                ID Valor
            </label>
            <input class="form-control" id="value_id" name="value_id" type="text"
                value="{{ $register->value_id ?? old('value_id') }}" />
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="value_name">
                Valor Nome
            </label>
            <input class="form-control" id="value_name" name="value_name" type="text"
                value="{{ $register->value_name ?? old('value_name') }}" />
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="value_struct">
                Valor Estrutura
            </label>
            <input class="form-control" id="value_struct" name="value_struct" type="text"
                value="{{ $register->value_struct ?? old('value_struct') }}" />
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="attribute_group_id">
                ID Grupo Atributo
            </label>
            <input class="form-control" id="attribute_group_id" name="attribute_group_id" type="text"
                value="{{ $register->attribute_group_id ?? old('attribute_group_id') }}" />
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3">
            <label class="control-label" for="attribute_group_id">
                Nome Grupo Atributo
            </label>
            <input class="form-control" id="attribute_group_name" name="attribute_group_name" type="text"
                value="{{ $register->attribute_group_name ?? old('attribute_group_name') }}" />
        </div>
    </div>

    <br>
    <button class="btn btn-info " id="btn-enviar" type="submit">Enviar</button>
</form>