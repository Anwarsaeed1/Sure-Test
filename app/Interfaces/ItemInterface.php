<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ItemInterface{

   /**
     * All Items function
     *
     * @return void
     */
    public function getAllItems(array $request):LengthAwarePaginator;
    /**
     * Single item function
     *
     * @param [type] $bundelID
     * @return void
     */
    public function getItemById(string $itemId):object;
    /**
     * Delete Item function
     *
     * @param [type] $ItemId
     * @return void
     */
    public function deleteItem(int $ItemId);
    /**
     * Create Item Shop function
     *
     * @param array $Item
     * @return void
     */
    public function createItem(array $item):object;
    /**
     * Updated Item  function
     *
     * @param [type] $ItemId
     * @param array $newDetails
     * @return void
     */
    public function updateItem(int $ItemId,array $newItem):object;
    
    /**
     * Item Change Status function
     *
     * @param [type] $item
     * @return void
     */
    public function itemStatus(int $ItemId, array $item):object;

}
