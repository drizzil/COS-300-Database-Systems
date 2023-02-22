CREATE VIEW PurchaseSummaryView AS
SELECT PURCHASE_ITEM.PurchaseItemID, PURCHASE_ITEM.PurchaseDate, PURCHASE_ITEM.ItemDescription, PURCHASE_ITEM.PriceUSD
FROM PURCHASE_ITEM;

CREATE VIEW StorePurchaseHistoryView AS
SELECT STORE.StoreName, STORE.Phone, STORE.Contact, PURCHASE_ITEM.PurchaseItemID, PURCHASE_ITEM.PurchaseDate, PURCHASE_ITEM.ItemDescription, PURCHASE_ITEM.PriceUSD
FROM STORE, PURCHASE_ITEM
WHERE STORE.StoreID = PURCHASE_ITEM.StoreID;

CREATE VIEW StoreHistoryView AS
SELECT StoreName, SUM(PriceUSD) AS TotalPurchases 
FROM StorePurchaseHistoryView 
GROUP BY StoreName;

CREATE VIEW MajorSources AS
SELECT StoreName, TotalPurchases
FROM StoreHistoryView 
WHERE TotalPurchases > 100000;