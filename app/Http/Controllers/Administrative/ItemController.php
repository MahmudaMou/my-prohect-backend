<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;
use App\Service\ItemService;
use App\Item;
class ItemController extends Controller
{
    protected $ItemService;

    public function __construct(ItemService $ItemService)
    {
        $this->ItemService = $ItemService;
    }

    public function index()
    {

        return view('administrative.item.index');
    }


    public function data()
    {
        return $this->ItemService->getAllData();
    }


    public function create()
    {
        
        return view('administrative.item.create');
    }

    public function store(ItemStoreRequest $request)
    {
        return $this->ItemService->store($request);
    }

    public function edit($id)
    {
        $item = $this->ItemService->findbyId($id);
        return view('administrative.item.edit', compact('item'));
    }


    public function update($id, ItemStoreRequest $request)
    {
        return $this->ItemService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->ItemService->delete($id);
    }
}
