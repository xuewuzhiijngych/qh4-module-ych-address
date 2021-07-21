<?php

namespace qh4module\address;

use qh4module\address\external\ExtAddress;

use qttx\web\ResponseTrait;

class HpAddress
{
    use ResponseTrait;

    /**
     * 获取省市区文字
     * @param $city_id
     * @param ExtAddress|null $external
     * @return array|string
     */
    public static function getCityPcaTag($city_id, ExtAddress $external = null)
    {
        if (!$city_id) {
            return (new self)->RE('未传递 city_id 参数！');
        }

        if ($external === null) {
            $external = new ExtAddress();
        }

        $db = \QTTX::$app->db;
        $city = $db->select(['province', 'city', 'district'])->from($external->CityTableName())->whereArray(['id' => $city_id])->row();

        if (!$city) {
            return (new self)->RE('指定城市不存在！');
        }

        return implode("-", array_values($city));
    }
}
