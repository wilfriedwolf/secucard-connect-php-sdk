<?php

namespace SecucardConnect\Product\Services;

use SecucardConnect\BaseClientTest;
use SecucardConnect\Client\QueryParams;

/**
 * @covers secucard\models\Services\Identresults
 */
class IdentresultsTest extends BaseClientTest
{
    /**
     * @test
     */
    public function testGetList()
    {
        $list = $this->client->services->identresults->getList();

        $this->assertFalse(empty($list));
    }

    /**
     * @test
     */
    public function testGetItem()
    {
        $list = $this->client->services->identresults->getList(new QueryParams(1));

        $this->assertTrue($list->count == 1, 'Cannot get any item, because list is empty');
        $sample_item_id = $list->items[0]->id;
        $this->assertFalse(empty($sample_item_id));

        if ($sample_item_id) {
            $item = $this->client->services->identresults->get($sample_item_id);

            $this->assertFalse(empty($item));
        }
    }
}