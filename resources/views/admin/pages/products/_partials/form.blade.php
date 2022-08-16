<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <label class="control-label" for="title">
            Título do Anúncio
        </label>
        <input class="form-control" id="title" name="title" type="text"
            value="{{ $register->title ?? old('title') }}" />
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <label class="control-label" for="subtitle">
            Subtítulo do anúncio
        </label>
        <input class="form-control" id="subtitle" name="subtitle" type="text"
            value="{{ $register->subtitle ?? old('subtitle') }}" />
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <label class="control-label" for="listing_type_id">
            Tipo de Anúncio
        </label>
        <select class="select form-control" id="listing_type_id" name="listing_type_id">
            <option value="bronze"
                {{ isset($register->listing_type_id) && $register->listing_type_id == 'broze' ? 'selected' : '' }}>
                bronze
            </option>
            <option value="gold"
                {{ isset($register->listing_type_id) && $register->listing_type_id == 'gold' ? 'selected' : '' }}>
                gold
            </option>
            <option value="gold_special"
                {{ isset($register->listing_type_id) && $register->listing_type_id == 'gold_special' ? 'selected' : '' }}>
                gold_special
            </option>
            <option value="gold_pro"
                {{ isset($register->listing_type_id) && $register->listing_type_id == 'gold_pro' ? 'selected' : '' }}>
                gold_pro
            </option>

        </select>
        <small id="ltypeHelp" class="form-text text-muted">
            Consulte todos em: https://api.mercadolibre.com/sites/MLB/listing_types
        </small>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <label class="control-label" for="category_id">
            ID da categoria
        </label>
        <input class="form-control" id="category_id" name="category_id" placeholder="ex: MLB422600" type="text"
            value="{{ $register->category_id ?? old('category_id') }}" />
        <small id="catHelp" class="form-text text-muted">
            Escolha a sua categoria em https://api.mercadolibre.com/sites/MLB/categories
        </small>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <label class="control-label" for="pictures">
            URL da imagem
        </label>
        <input class="form-control" id="pictures" name="pictures" placeholder="http://domain.com/my-image.jpg"
            type="file" value="{{ $register->pictures ?? old('pictures') }}" />
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <label class="control-label" for="text2">
            Quantidade em estoque
        </label>
        <input class="form-control" id="available_quantity" name="available_quantity" type="number"
            value="{{ $register->available_quantity ?? old('available_quantity') }}" />
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <label class="control-label" for="price">
            Preço do Produto
        </label>
        <input class="form-control" id="price" name="price" placeholder="100.50" type="number" step="0.01"
            min="0" value="{{ $register->price ?? old('price') }}" />
    </div>
</div>
