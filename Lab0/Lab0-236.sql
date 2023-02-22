SELECT WarehouseID, SUM(QuantityOnHand) AS TotalQuantityOnHand
FROM INVENTORY
GROUP BY WarehouseID;