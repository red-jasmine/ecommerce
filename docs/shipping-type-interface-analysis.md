# ShippingTypeInterface 接口分析

## 当前接口方法

当前 `ShippingTypeInterface` 已定义的方法：

1. `requiresShipping(): bool` - 是否需要物流运输
2. `requiresAddress(): bool` - 是否需要收货地址
3. `requiresTracking(): bool` - 是否需要物流跟踪
4. `requiresFreight(): bool` - 是否需要计算运费

## 需要补充的方法

基于电商系统中的全流程处理需求，建议补充以下方法：

### 1. 物流单号相关

#### `requiresTrackingNumber(): bool`
**说明**: 是否需要物流单号
**场景**: 
- `logistics`（物流快递）需要物流单号
- `delivery`（同城配送）可能需要配送单号
- `dummy`（虚拟发货）不需要物流单号
- `digital`（数字卡密）不需要物流单号但需要卡密信息

**区别**: 与 `requiresTracking()` 的区别在于，`requiresTracking()` 表示是否需要跟踪能力，而 `requiresTrackingNumber()` 更具体地表示是否需要物流单号字段

### 2. 拆单发货支持

#### `supportsSplitShipping(): bool`
**说明**: 是否支持拆单发货
**场景**:
- `logistics`（物流快递）支持拆单发货
- `delivery`（同城配送）可能支持拆单发货
- `dummy`（虚拟发货）通常不支持拆单
- `digital`（数字卡密）不支持拆单，因为需要按数量发放卡密
- `coupons`（卡券）不支持拆单

### 3. 自动完成发货

#### `isAutoComplete(): bool`
**说明**: 是否自动完成发货（发货后自动变为已发货状态）
**场景**:
- `dummy`（虚拟发货）自动完成
- `digital`（数字卡密）需要手动确认卡密发放完成
- `logistics`（物流快递）需要手动填写物流单号后完成

### 4. 确认收货相关

#### `canConfirmReceipt(): bool`
**说明**: 是否可以确认收货（是否需要用户主动确认收货）
**场景**:
- `logistics`（物流快递）需要用户确认收货
- `delivery`（同城配送）需要确认收货
- `dummy`（虚拟发货）发货即签收，无需确认
- `digital`（数字卡密）发货即签收
- `instore`（到店自取）取货即签收
- `visit`（上门服务）服务完成即签收

#### `isAutoSigned(): bool`
**说明**: 是否自动签收（发货后是否自动设置为已签收）
**场景**:
- `dummy`、`digital`、`instore` 等虚拟或即时履约类型自动签收
- `logistics`、`delivery` 需要等待物流完成后签收

### 5. 部分发货支持

#### `allowsPartialShipping(): bool`
**说明**: 是否允许部分发货（订单中的商品可以分批次发货）
**场景**:
- `logistics`（物流快递）支持部分发货
- `delivery`（同城配送）可能支持部分发货
- `digital`（数字卡密）支持部分发货（可以分批发放卡密）
- `dummy`（虚拟发货）通常不支持部分发货

### 6. 配送时间段

#### `needsDeliveryTimeSlot(): bool`
**说明**: 是否需要配送时间段预约
**场景**:
- `delivery`（同城配送）需要预约配送时间
- `visit`（上门服务）需要预约服务时间
- `instore`（到店自取）可能需要预约到店时间
- `logistics`（物流快递）通常不需要预约时间

### 7. 发货字段定义

#### `getShippingFields(): array`
**说明**: 获取该发货类型所需的发货字段定义（用于表单验证和UI展示）
**返回**: 字段定义数组，格式如 `['field_name' => 'validation_rules|label']`
**场景**:
- `logistics` 需要：物流公司代码、物流单号
- `delivery` 需要：配送员信息、配送时间
- `digital` 需要：卡密内容
- `visit` 需要：服务时间、服务地址
- `instore` 需要：取货码、门店信息

**示例**:
```php
public function getShippingFields(): array
{
    return [
        'logistics_company_code' => 'required|string|物流公司',
        'logistics_no' => 'required|string|物流单号',
    ];
}
```

### 8. 发货数据验证

#### `validateShippingData(array $data): void`
**说明**: 验证发货数据的有效性
**参数**: `$data` 发货数据数组
**异常**: 验证失败时抛出 `InvalidArgumentException`
**场景**: 不同类型的发货需要不同的数据，需要统一验证入口

### 9. 是否需要发货确认

#### `requiresShippingConfirmation(): bool`
**说明**: 发货是否需要额外的确认步骤
**场景**:
- `logistics`（物流快递）需要确认物流单号无误
- `digital`（数字卡密）需要确认卡密数量
- `dummy`（虚拟发货）通常不需要确认

### 10. 配送方式限制

#### `getAllowedDeliveryMethods(): array`
**说明**: 获取允许的配送方式列表（如果该发货类型有多个子类型）
**场景**: 
- 某些发货类型可能有多个子选项
- 例如：物流快递可能有标准快递、次日达、隔日达等

### 11. 是否需要收货人信息

#### `requiresReceiverInfo(): bool`
**说明**: 是否需要收货人信息（姓名、电话等）
**场景**:
- `logistics`、`delivery`、`visit` 需要收货人信息
- `instore`、`digital`、`dummy` 可能不需要

**区别**: 与 `requiresAddress()` 的区别在于，地址是位置信息，收货人信息是联系方式

## 方法优先级建议

### 高优先级（核心流程必需）

1. ✅ `requiresTrackingNumber(): bool` - 区分是否需要物流单号
2. ✅ `supportsSplitShipping(): bool` - 支持拆单发货场景
3. ✅ `isAutoSigned(): bool` - 自动签收逻辑
4. ✅ `getShippingFields(): array` - 发货表单字段定义

### 中优先级（重要业务场景）

5. ✅ `allowsPartialShipping(): bool` - 部分发货支持
6. ✅ `needsDeliveryTimeSlot(): bool` - 配送时间段预约
7. ✅ `validateShippingData(array $data): void` - 数据验证

### 低优先级（可选增强）

8. `requiresShippingConfirmation(): bool` - 发货确认流程
9. `requiresReceiverInfo(): bool` - 收货人信息需求
10. `getAllowedDeliveryMethods(): array` - 配送方式限制

## 实现建议

建议将这些方法添加到 `ShippingTypeInterface` 接口中，并在 `ShippingTypeEnum` 中实现默认逻辑。对于需要复杂处理的场景，可以考虑通过策略模式或处理器模式扩展。

