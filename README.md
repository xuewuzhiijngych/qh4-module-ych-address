QH4框架扩展模块-收货地址管理模块

### 功能

1、收货地址管理模块
！ 该组件需要与city 组件结合使用 ！

### 助手方法

```php
 /**
   /**
     * 获取省市区文字
     * @param $city_id
     * @param ExtAddress|null $external
     * @return array|string
     */
    public static function getCityPcaTag($city_id, ExtAddress $external = null)
    {
    }
```

### 方法列表

```php
      /**
     * 列表
     * 可选参数 user_id 查询指定用户收货地址列表
     * @return array
     */
    public function actionIndex()
    {
    }
```

```php
    /**
     * 新增
     * 必选参数 user_id  city_id  name  phone  is_default  detail
     * @return array
     */
    public function actionCreate()
    {
    }
```

```php
    /**
     * 更新
     * 必选参数 id user_id  city_id  name  phone  is_default  detail
     * @return array
     */
    public function actionUpdate()
    {
    }
```

```php
    /**
     * 删除
     * 必选参数 id
     * @return array
     */
    public function actionDelete()
    {
    }
```

```php
    /**
     * 必选参数 id
     * 设置默认
     * @return array
     */
    public function actionSetDefault()
    {
    }
```