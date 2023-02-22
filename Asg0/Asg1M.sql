SELECT ShipperName, DepartureDate 
FROM SHIPMENT 
WHERE ShipmentID IN
    (SELECT ShipmentID 
     FROM SHIPMENT_ITEM 
    WHERE Value >= 1000)
ORDER BY ShipperName ASC, DepartureDate DESC 