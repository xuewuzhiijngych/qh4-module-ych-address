<?php

namespace qh4module\address\models;

use qttx\helper\ArrayHelper;

/**
 * tbl_address表删除一条数据
 * Class Delete
 * @package qh4module\address\models
 */
class Delete extends AddressModel
{
    /**
     * @var int 接收参数,必须：ID
     */
    public $id;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            ['id', 'required']
        ], parent::rules());
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $this->external->getDb()
            ->update($this->external->TableName())
            ->col('del_time', time())
            ->whereArray(['id' => $this->id])
            ->query();
        return true;
    }
}