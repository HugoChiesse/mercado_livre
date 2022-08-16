<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Mercadolivre;
use App\Models\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $product, $mercado_livre, $route, $redirect, $title, $path;

    public function __construct(Product $product, Mercadolivre $mercadolivre)
    {
        $this->product = $product;
        $this->mercado_livre = $mercadolivre;
        $this->route = 'admin.pages.products';
        $this->title = 'Lista de Produtos';
        $this->redirect = 'products.index';
        $this->path = 'img/products/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $registers = $this->product->orderBy('title')->get();
        return view("$this->route.index", compact('title', 'registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $subtitle = 'Cadastro de Produto';
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
        $data = $request->all();
        if ($request->hasAny('pictures') && $request->pictures->isValid()) {
            $data['pictures'] = $this->path . $request->pictures->getClientOriginalName();
            $request->pictures->move($this->path, $request->pictures->getClientOriginalName());
        }
        $this->product->create($data);
        return redirect()->route($this->redirect)->with('success', 'Cadastro efetuado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = $this->title;
        $subtitle = 'Visualizar de Produto';
        $register = $this->product->find($id);
        return view("$this->route.show", compact('title', 'subtitle', 'register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $subtitle = 'Editar de Produto';
        $register = $this->product->find($id);
        return view("$this->route.edit", compact('title', 'subtitle', 'register'));
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
        $register = $this->product->find($id);
        if (!$register) {
            return redirect()->back()->with('danger', 'O ID informado não consta em nossa base de dados!');
        }
        $data = $request->all();
        if ($request->hasAny('pictures') && $request->pictures->isValid()) {
            if ($register->pictures) {
                unlink($register->pictures);
            }
            $data['pictures'] = $this->path . $request->pictures->getClientOriginalName();
            $request->pictures->move($this->path, $request->pictures->getClientOriginalName());
        }
        $register->update($data);
        return redirect()->route($this->redirect)->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->product->find($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Registro deletado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Não foi possível deletar o registro da base de dados. Por favor, tente mais tarde!');
        }
    }

    public function sync_data_product($product_id)
    {
        $msg = $this->mercado_livre->sync_product($product_id);
        return redirect()->back()->with('success', $msg);
    }
}
