<?php

namespace qh4module\address\models;


use qttx\helper\ArrayHelper;

/**
 * tbl_address表新增一条数据
 * Class Create
 * @package qh4module\address\models
 */
class Create extends AddressModel
{
    /**
     * @var int 接收参数,必须：用户id
     */
    public $user_id;

    /**
     * @var int 接收参数,必须：城市id
     */
    public $city_id;

    /**
     * @var string 接收参数,必须：收货人姓名
     */
    public $name;

    /**
     * @var string 接收参数,必须：电话
     */
    public $phone;

    /**
     * @var string 接收参数,必须：详细地址
     */
    public $detail;

    /**
     * @var int 接收参数,必须：是否默认1.默认 0.非默认
     */
    public $is_default = 0;

    /**
     * @var string 内部参数,非必须：省市区
     */
    public $pca_tag;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['user_id', 'city_id', 'name', 'phone', 'is_default', 'detail'], 'required']
        ], parent::rules());
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $table_name = $this->external->TableName();

        $this->pca_tag = $this->get_pca_tag();

        \QTTX::$app->db->insert($table_name)
            ->cols([
                'user_id' => $this->user_id,
                'city_id' => $this->city_id,
                'name' => $this->name,
                'phone' => $this->phone,
                'detail' => $this->detail,
                'pca_tag' => $this->pca_tag,
                'is_default' => $this->is_default,
            ])
            ->query();
        return true;
    }
}