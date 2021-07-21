<?php

namespace qh4module\address\models;

/**
 * tbl_address列表数据
 * Class Delete
 * @package qh4module\address\models
 */
class Index extends AddressModel
{
    /**
     * @var int 接收参数,非必须：用户id
     */
    public $user_id;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return parent::rules();
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $fields = ['id', 'user_id', 'city_id', 'pca_tag', 'name', 'phone', 'detail', 'is_default'];

        $tb_set = $this->external->TableName();
        $db = $this->external->getDb();


        $sql = $db->select($fields)->from($tb_set);

        if ($this->user_id) {
            $sql->where('user_id = :user_id')
                ->bindValue('user_id', $this->user_id);
        }

        $data = $sql
            ->whereArray([
                'del_time' => 0,
            ])
            ->query();

        $total = $db->single('SELECT FOUND_ROWS()');
        return array(
            'total' => $total,
            'list' => $data,
        );
    }

}
