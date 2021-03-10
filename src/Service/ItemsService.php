<?php

namespace App\Service;


use App\Repository\ItemsRepository;

class ItemsService
{
    private $itemsRepository;

    public function __construct(ItemsRepository $itemsRepository)
    {
        $this->itemsRepository = $itemsRepository;
    }
    public function makeItem(Request $request)
    {
        
    }
}

