CREATE VIEW CustomerPurchaseView AS
SELECT CUSTOMER.LastName, CUSTOMER.FirstName, TransactionID, SalesPrice
FROM CUSTOMER LEFT JOIN TRANS
    ON CUSTOMER.CustomerID = TRANS.CustomerID
ORDER BY TransactionID ASC;