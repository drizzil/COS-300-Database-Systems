SELECT City, Store, count(*) as NumberOfPurchases 
FROM ITEM 
GROUP BY City, Store;