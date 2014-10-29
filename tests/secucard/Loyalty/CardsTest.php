<?php

namespace secucard\tests\Loyalty;

use secucard\models\Loyalty\Cards;
use secucard\tests\Api\ClientTest;

/**
 * @covers secucard\models\Loyalty\Cards
 */
class CardsTest extends ClientTest
{

    public function testGetList()
    {
        $list = $this->client->loyalty->cards->getList(array());

        $this->assertFalse(empty($list), 'Card list empty');

        $temp_account = null;
        $count_without = 0;
        // test lazy loading for account
        foreach ($list as $card) {
            if (!empty($card->account)) {
                $this->assertFalse(empty($card->account->id));
                //var_dump($card->account->display_name);
                $tmp = $card->account->display_name;
                $temp_account = $card->account;
                $this->assertFalse(empty($card->account->display_name));
            } else {
                $count_without++;
            }
        }

        if ($count_without != count($list)) {
            $this->assertFalse(empty($temp_account), 'All returned cards have empty account '. print_r($list, true));
            $temp_account->bic = '123456';
            $save_resp = $temp_account->save();
            $delete_resp = $temp_account->delete();
        }

    }

    public function testGetItem()
    {
        $card = $this->client->loyalty->cards->get('crd_67329');

        $this->assertFalse(empty($card));
    }

}