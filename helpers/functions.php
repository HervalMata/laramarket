<?php

function filterItemsByStoreId(array $items, $storeId)
{
    return array_filter($items, function ($line) use ($storeId) {
        return $line['storeId'] == $storeId;
    });
}
