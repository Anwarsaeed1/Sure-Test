<?php
namespace App\Repositories;
use App\Interfaces\ItemInterface;
use App\Models\Item;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ItemRepository implements ItemInterface
{
    public $model;
    /**
     * Construct Function function
     */
    public function __construct()
    {
        $this->model =  Item::class;
    }
    
    /**
     * Get All Shop Collection function
     *
     * @param [type] $projectId
     * @return LengthAwarePaginator
     */
    public function getAllItems($request): LengthAwarePaginator
    {

        $q = $this->model::query();

        if(isset($request['is_active'])){
                $q->where('is_active',$request['is_active']);
        }

        $items = $q->orderBy('id','DESC')->paginate(isset($request['limit']) ? $request['limit']:10);

        return $items;
    }

    /**
     * Undocumented function
     *
     * @param [type] $projectId
     * @return void
     */
    public function getItemById(string $itemId):object
    {
        return $this->model::findOrFail($itemId);
    }
    /**
     * Undocumented function
     *
     * @param [type] $projectId
     * @return void
     */
    public function deleteItem($itemId)
    {
        $item= $this->model::findOrFail($itemId);
        $item->delete();
        
    }
    /**
     * Create Item  function
     *
     * @param [type] $projectId
     * @return object
     */
    public function createItem(array $item):object
    {
        $item=$this->model::create($item);
        return $item;
    }
    /**
     * Product Update function
     *
     * @param [type] $projectId
     * @return object
     */
    public function updateItem(int $itemId, array $itemData): object
    {
        $item= $this->model::findOrFail($itemId);
        $item->update($itemData);
        return $item;
    }

    /**
     * Undocumented function
     *
     * @param [int] $itemId
     * @param array $item
     * @return object
     */
    public function itemStatus(int $itemId,array $itemData):object
    {
        $item= $this->model::findOrFail($itemId);
        $item->update($itemData);
        return $item;
    }


}
