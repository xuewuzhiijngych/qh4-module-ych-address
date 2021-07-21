<?php

namespace qh4module\address\models;

use qttx\web\ServiceModel;

/**
 * 收货地址
 * Class AddressModel
 * @package qh4module\address\models
 */
class AddressModel extends ServiceModel
{
    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'is_default', 'del_time'], 'integer'],
            [['pca_tag', 'name', 'detail'], 'string', ['max' => 255]],
            [['phone'], 'string', ['max' => 50]]
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLangs()
    {
        return [
            'id' => 'id',
            'user_id' => '用户id',
            'city_id' => '城市id',
            'pca_tag' => '省市区',
            'name' => '收货人姓名',
            'phone' => '电话',
            'detail' => '详细地址',
            'is_default' => '是否默认1.默认 0.非默认',
            'del_time' => '软删除'
        ];
    }

    /**
     * 获取省市区文字
     * @return string|void
     */
    public function get_pca_tag()
    {
        $city_table_name = $this->external->CityTableName();
        $db = \QTTX::$app->db;
        $city = $db->select(['province', 'city', 'district'])->from($city_table_name)->whereArray(['id' => $this->city_id])->row();

        if (!$city) {
            return $this->addError('city_id', '指定城市不存在！');
        }

        return implode("-", array_values($city));
    }

}