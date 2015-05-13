<?php

namespace secucard\tests\Smart;

use secucard\tests\Api\ClientTest;

/**
 * @covers secucard\models\Smart\Transactions
 */
class TransactionsTest extends ClientTest
{
    /**
     * @test
     */
    public function testGetList()
    {
        $list = $this->client->smart->transactions->getList();

        $this->assertFalse(empty($list));
    }

    /**
     * @test
     */
    public function testGetItem()
    {
        $list = $this->client->smart->transactions->getList(array());

        $this->assertFalse(empty($list) || $list->count() < 1, 'Cannot get any item, because list is empty');
        $sample_item_id = $list[0]->id;
        $this->assertFalse(empty($sample_item_id));

        if ($sample_item_id) {
            $item = $this->client->smart->transactions->get($sample_item_id);

            $this->assertFalse(empty($item));
        }
    }
}