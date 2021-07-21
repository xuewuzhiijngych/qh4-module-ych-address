<?php

namespace qh4module\address\external;

use qttx\web\External;

class ExtAddress extends External
{
    /**
     * 收货地址表名
     */
    public function TableName()
    {
        return '{{%address}}';
    }

    /**
     * 城市表名
     */
    public function CityTableName()
    {
        return '{{%city}}';
    }

}