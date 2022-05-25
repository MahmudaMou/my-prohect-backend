<?php
namespace App\Service;


use App\Repositories\ItemRepository;
use DataTables;
use App\Item;
use App\Traits\ApiResponseTrait;
use App\Traits\FileUpload;
class ItemService
{
    use ApiResponseTrait, FileUpload;
    protected $ItemRepository;

    // Constructor to bind model to repo
    public function __construct(ItemRepository $ItemRepository)
    {
        $this->ItemRepository = $ItemRepository;
    }

    public function all(){
        return  $this->ItemRepository->all();
    }
    public function allAssociate(array $relation=[]){
        return  $this->ItemRepository->all($relation);
    }
    public function getAllData(){
        $data = $this->ItemRepository->all();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                return '<a href="'.route('administrative.item.edit',$row->id).'" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                </a>
                <a href="#" onclick="deleteData('.$row->id.');">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg>
                </a>
                ';
            })
            ->editColumn('image', function ($data) {
                $content =  $data['image'];
                $html = '<div class="photo">
                    <a href="' . $content . '" data-fancybox="images" data-caption="Content File">
                        <img  style="width: 80px; height:80px;" src="' . $content . '" alt="" />
                    </a>
                    </div>';
                return $html;
            })
            
            ->rawColumns(['image','action'])
            ->blacklist(['created_at', 'updated_at','action'])
            ->addIndexColumn()
            ->toJson();
    }
    
    public function findbyId($id){
        return $this->ItemRepository->show($id);
    }
    public function store($request)
    {
        try {
            //Store Product
            $this->item = Item::create($this->processRequestedData($request));
            return redirect()->back()->with('success', 'Created!');

        } catch (\Exception $e) {
            \Log::info('Product Store Failed:' . $e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update($request, $id)
    {
        try {
            $this->item = Item::findOrFail($id);
            $this->item->update($this->processRequestedData($request));
            return redirect()->back()->with('success', 'updated');
        } catch (\Exception $e) {
            \Log::info('Product Update Failed:' . $e);
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
    public function delete($id)
    {
        //delete relative data
        $data = Item::findOrFail($id);
        $data->delete();

        if ($data) {
            return $this->successWithOutPayload('success');
        } else {
            return $this->unSuccess('failed');
        }
    }
    protected function processRequestedData($request){
        $requestedData = $request->except('_token');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/Items/', $filename);
            $requestedData['image'] = 'uploads/Items/' . $filename;
        }
        return $requestedData;
    }


   
   
}
