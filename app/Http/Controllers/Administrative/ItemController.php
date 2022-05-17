<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $informations = Page::all();
        return view('administrative.downloadable_file.create', compact('informations'));
    }

    public function store(ItemStoreRequest $request)
    {
        try {
            $Item = new  Item();
            $Item->id = request('id');
            $Item->title = request('title');
            $Item->page_id = request('page_id');
            $Item->section = request('section');

            if ($request->hasfile('file_url')) {
                $file = $request->file('file_url');
                $extension = $file->getClientOriginalExtension(); //getting file extension
                $filename = time() . '.' . $extension;
                $file->move('uploads/Item/', $filename);
                $Item->file_url = 'uploads/Item/' . $filename;
            }
            $Item->save();
            return redirect()->route('administrative.downloadable_file')->with('success', 'Item Created Successfully');

        } catch (exception $e) {
            return redirect()->back()->withInput()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function edit($id)
    {
        $downloadable_file = $this->ItemService->findbyId($id);
        $informations = Page::all();
        return view('administrative.downloadable_file.edit', compact('downloadable_file', 'informations'));
    }


    public function update($id, ItemStoreRequest $request)
    {
        try {
            $Item = Item::find($id);
            $Item->title = request('title');
            $Item->page_id = request('page_id');
            $Item->section = request('section');

            if ($request->hasfile('file_url')) {
                $file = $request->file('file_url');
                $extension = $file->getClientOriginalExtension(); //getting file extension
                $filename = time() . '.' . $extension;
                $file->move('uploads/Item/', $filename);
                $Item->file_url = 'uploads/Item/' . $filename;
            }
            $Item->update();
            return redirect()->route('administrative.downloadable_file')->with('success', 'Page Updated Successfully');
        } catch (exception $e) {
            return redirect()->back()->with('error', 'Something Wrong,Please Try Again');
        }
    }

    public function destroy($id)
    {
        return $this->ItemService->delete($id);
    }
}
