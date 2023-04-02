<?php
namespace App\Http\Controllers\Item;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Item\ItemListRequest;
use App\Http\Requests\Item\ItemStatusRequest;
use App\Http\Requests\Item\StoreItemFormRequest;
use App\Http\Requests\Item\UpdateItemFormRequest;
use App\Http\Resources\Item\ItemResource;
use App\Http\Resources\Item\ItemsResource;
use App\Interfaces\ItemInterface;
use Illuminate\Http\Request;

class ItemController extends ApiController
{
     /**
     * ItemInterface variable
     *
     * @var ItemInterface
     */
    private ItemInterface $ItemRepository;
    /**
     * Item Counstruct function
     *
     * @param ItemInterface $ItemInterface
     */
    public function __construct(ItemInterface $ItemRepository)
    {
        $this->ItemRepository = $ItemRepository;
    }

    /**
     * Item function
     *
     * @param Request $request
     * @return void
     */
    public function index(ItemListRequest $request)
    {
        $items=$this->ItemRepository->getAllItems($request->validated());
        return $this->paginateCollection(ItemsResource::collection($items),'items');
    }

    /**
     * Single Item function
     *
     * @param Request $request
     * @return void
     */
    public function show(string $id)
    {
        $item=$this->ItemRepository->getItemById($id);
        return $this->dataResponse(['item'=> new ItemResource($item)]);
    }

    /**
     * Category Products Shop function
     *
     * @param Request $request
     * @return void
     */
    public function store(StoreItemFormRequest $request)
    {
        $item=$this->ItemRepository->createItem($request->validated());
        return $this->dataResponse(['item'=> new ItemResource($item)],'Created',201);
    }

    /**
     * Item Update function
     *
     * @param Request $request
     * @return object
     */
    public function update(UpdateItemFormRequest $request,int $id)
    {
         $item=$this->ItemRepository->updateItem($id,$request->validated());
         return $this->dataResponse(['item'=> new ItemResource($item)]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=$this->ItemRepository->deleteItem($id);
        return $this->successResponse('Deleted record successfully');
    }
    /**
     * Item Chagne Status function
     *
     * @param Request $request
     * @return void
     */
    public function itemChangeStatus(int $id,ItemStatusRequest $request)
    {
        $categoryProducts=$this->ItemRepository->itemStatus($id,$request->validated());
        return $this->successResponse('Change item status');
    }

}
