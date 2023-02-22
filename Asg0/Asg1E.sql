SELECT ShipmentID, ShipperName, ShipperInvoiceNumber, ArrivalDate
FROM SHIPMENT
WHERE Month(DepartureDate)=12;