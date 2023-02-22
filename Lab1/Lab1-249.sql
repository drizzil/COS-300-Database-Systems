SELECT WarehouseID, SUM(QuantityOnOrder) AS TotalItemsOnOrder, SUM(QuantityOnHand) AS TotalItemsOnHand
FROM INVENTORY
GROUP BY WarehouseID, QuantityOnHand;

Write an SQL statement to display the WarehouseID, the sum of 
QuantityOnOrder, and the sum of QuantityOnHand, grouped by WarehouseID and 
QuantityOnOrder. Name the sum of QuantityOnOrder as TotalItemsOnOrder and 
the sum of QuantityOnHand as TotalItemsOnHand.