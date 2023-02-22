SELECT SKU, SKU_Description, WarehouseID
FROM INVENTORY
WHERE QuantityOnHand = 0 and QuantityOnOrder > 0;