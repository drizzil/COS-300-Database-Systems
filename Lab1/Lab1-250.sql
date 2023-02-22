SELECT WarehouseID, WarehouseCity, WarehouseState, Manager, SKU, SKU_Description, QuantityOnHand
FROM INVENTORY, WAREHOUSE
WHERE WAREHOUSE.WarehouseID = INVENTORY.WarehouseID
AND WAREHOUSE.WarehouseID = 200;

Write an SQL statement to show the WarehouseID, WarehouseCity, 
WarehouseState, Manager, SKU, SKU_Description, and QuantityOnHand of all 
items with a Manager of ‘Lucille Smith’. Use a join.