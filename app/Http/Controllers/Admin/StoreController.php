<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use UploadTrait;
    /**
     * StoreController constructor.
     */
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

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
     * @param StoreRequest $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
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
     * @param StoreRequest $request
     * @param $store
     * @return Response
     */
    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = Store::find($store);
        if ($request->hasFile('logo')) {
            if (Storage::disk('public')->exists($store->logo)) {
                Storage::disk('public')->delete($store->logo);
            }
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
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
