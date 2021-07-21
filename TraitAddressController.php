<?php

namespace qh4module\address;

use qh4module\address\external\ExtAddress;
use qh4module\address\models\Index;
use qh4module\address\models\Create;
use qh4module\address\models\Update;
use qh4module\address\models\Delete;
use qh4module\address\models\SetDefault;

trait TraitAddressController
{

    public function ext_address()
    {
        return new ExtAddress();
    }

    /**
     * 列表
     * @return array
     */
    public function actionIndex()
    {
        $model = new Index([
            'external' => $this->ext_address(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 新增
     * @return array
     */
    public function actionCreate()
    {
        $model = new Create([
            'external' => $this->ext_address(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 更新
     * @return array
     */
    public function actionUpdate()
    {
        $model = new Update([
            'external' => $this->ext_address(),
        ]);
        return $this->runModel($model);
    }


    /**
     * 删除
     * @return array
     */
    public function actionDelete()
    {
        $model = new Delete([
            'external' => $this->ext_address(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 设置默认
     * @return array
     */
    public function actionSetDefault()
    {
        $model = new SetDefault([
            'external' => $this->ext_address(),
        ]);
        return $this->runModel($model);
    }
}