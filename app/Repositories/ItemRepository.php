<?php
namespace App\Repositories;


use App\Item;

class ItemRepository
    // space that we can use the repository implements RepositoryInterface
{
    // space that we can use the repository from
    protected $model;

    public function __construct(Item $Item)
    {
        // set the model
        $this->model = $Item;
    }
    public function all(){
        return $this->model->get();
    }

    public function allAssociate(array $relation){
        return $this->model->with($relation)->get();
    }

    public function create(array $data){
        return $this->model->create($data);
    }

    public function update(array $data, $id){
        return $this->model->find($id)->update($data);
    }
    public function show($id){
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

   
    public function allAssociateFilterPagignate(array $relation,$page = 1,$filter = [],$condition = "hard"){
        $perPage = 10;
        $start = 0;
        $skip = $page == 1 ? 0 : $page*$perPage;
        $query = $this->model;
        if(!empty($relation)){
            $query->with($relation);
        }
        if(!empty($filter)){
            foreach ($filter as $column => $value){
                if(!empty($value)){
                    if($condition == "hard"){
                        $query->where($column, '=', $value);
                    }else{
                      $query->where($column, 'like', '%' .$value . '%');
                    }
                }
            }
        }
        return $query->skip($skip)->take($perPage)->get();
    }


   
}
