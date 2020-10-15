<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Store[]|Collection
     */
    public function index()
    {
        $stores = Store::paginate(10);
        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::find($data["user"]);
        $user->store()->create($data);
        flash('Loja criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $store
     * @return Response
     */
    public function edit($store)
    {
        $store = Store::find($store);
        return view('admin.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $store
     * @return Response
     */
    public function update(Request $request, $store)
    {
        $data = $request->all();
        $store = Store::find($store);
        $store->update($data);
        flash('Loja atualizada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $store
     * @return Response
     */
    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();
        flash('Loja removida com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
