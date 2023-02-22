SELECT FirstName, LastName
FROM CUSTOMER
WHERE CustomerID IN
    (SELECT CustomerNumber
    FROM INVOICE
    WHERE TotalAmount > 100)
ORDER BY LastName, FirstName DESC;