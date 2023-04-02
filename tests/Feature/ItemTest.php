<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * Retrive Item function
     *
     * @return void
     */
    public function testRetrieveItemSuccessfully()
    {
        $item = Item::factory()->create();

        $this->json('GET', 'api/system/item/' . $item->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> 200,
                "message"=> "success",
                "data"=>[
                "result"=>[
                "item" => [
                    "id"=>$item->id,
                    "name" => $item->name,
                    "description" => $item->description,
                    "price" => $item->price,
                    "is_active" => $item->is_active,
                ],
            ],
            ],
            ]);
    }


    /**
     * Update Item function
     *
     * @return void
     */
    public function testUpdateItem()
    {

        $item = Item::factory()->create();


        $itemData=[
            'name' => fake()->sentence(2),
            'is_active' => rand(1,0),
            'price' => fake()->numberBetween(10,800),
            'description' => fake()->text(5),
        ];
        $itemData['id']=$item->id;

        $this->json('PUT', 'api/system/item/' . $item->id,$itemData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> 200,
                "message"=> "success",
                "data"=>[
                "result"=>[
                "item" => $itemData
            ],
            ],
            ]);
    }

    
    /**
     * Create Item function
     *
     * @return void
     */
    public function testCreateItem()
    {

        $item = [
            'name' => fake()->sentence(6),
            'is_active' => rand(1,0),
            'price' => fake()->numberBetween(10,800),
            'description' => fake()->text(200),
        ];

        $this->json('POST', 'api/system/item', $item, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }


    /**
     * Deleate Item function
     *
     * @return void
     */
    public function testDeleteItem()
    {
        $item = Item::factory()->create();
        $this->json('DELETE', 'api/system/item/' . $item->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

     /**
     * List Item Item function
     *
     * @return void
     */
    public function testListItem()
    {
        $currentPaginationLimit = env('PAGINATION_LIMIT', 10);

        $additionalData = 1;
        // the data size to be created ("limit + x")
        $dataSize = $currentPaginationLimit + $additionalData;
        
        $queryParameters = 'page=2';

        // send the HTTP request
        $response =$this->json('GET', 'api/system/item/' . '?' . $queryParameters, [], ['Accept' => 'application/json']);

        // check response status is correct
        $this->assertEquals($response->getStatusCode(), '200');

        // convert JSON response string to Array
        $responseArray = json_decode($response->getContent());

        $this->assertEquals($response->getStatusCode(), $response->getStatusCode());
    }


}
