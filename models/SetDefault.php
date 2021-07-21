<?php

namespace qh4module\address\models;


use qttx\helper\ArrayHelper;

/**
 * tbl_address设置默认
 * Class SetDefault
 * @package qh4module\address\models
 */
class SetDefault extends AddressModel
{
    /**
     * @var int 接收参数,必须：id
     */
    public $id;

    /**
     * @var int 接收参数,必须：用户id
     */
    public $user_id;

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
        $db = $this->external->getDb();
        $table_name = $this->external->TableName();

        $db->update($table_name)
            ->cols([
                'is_default' => 1,
            ])
            ->whereArray(['id' => $this->id])
            ->query();
        $user_id = $db->select('user_id')->from($table_name)->row()['user_id'];

        $db->update($table_name)
            ->cols([
                'is_default' => 0,
            ])
            ->where("id != :id")
            ->bindValue('id', $this->id)
            ->whereArray(['user_id' => $user_id])
            ->query();

        return true;
    }
}