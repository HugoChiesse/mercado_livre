<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Attribute;
use App\Models\Models\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    protected $product, $attribute, $route, $redirect;

    public function __construct(Product $product, Attribute $attribute)
    {
        $this->attribute = $attribute;
        $this->product = $product;
        $this->route = 'admin.pages.products.attributes';
        $this->title = 'Lista de Atributos';
        $this->redirect = 'attributes.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $title = $this->title;
        $product_id = $product_id;
        $registers = $this->attribute->where('product_id', $product_id)->orderBy('name')->get();
        return view("$this->route.index", compact('title', 'registers', 'product_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $subtitle = 'Cadastro de Atributos';
        return view("$this->route.create", compact('title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->attribute->create($request->all());
        return redirect()->back()->with('success', 'Registro salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = $this->attribute->find($id);
        return view("$this->route.edit", compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $register = $this->attribute->find($id);
        try {
            $register->update($request->all());
            return redirect()->route($this->redirect)->with('success', 'Registro atualizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route($this->redirect)->with('danger', 'Não foi possível atualizar a base de dados. Por favor, tente mais tarde!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register = $this->attribute->find($id);
        try {
            $register->delete();
            return redirect()->route($this->redirect)->with('success', 'Registro deletado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route($this->redirect)->with('danger', 'Não foi possível atualizar a base de dados. Por favor, tente mais tarde!');
        }
    }
}
