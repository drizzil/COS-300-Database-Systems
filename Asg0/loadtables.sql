INSERT INTO ITEM (ItemID, Description, PurchaseDate, Store, City, Quantity, LocalCurrencyAmount, ExchangeRate) VALUES(
    1, 'QE Dining Set', '2011-04-07', 'Eastern Treasures', 'Manila', 2, 403405, 0.01774);

INSERT INTO ITEM (ItemID, Description, PurchaseDate, Store, City, Quantity, LocalCurrencyAmount, ExchangeRate) VALUES(
    2, 'Willow Serving Dishes', '2011-07-15', 'Jade Antiques', 'Singapore', 75, 102, 0.5903);

INSERT INTO ITEM (ItemID, Description, PurchaseDate, Store, City, Quantity, LocalCurrencyAmount, ExchangeRate) VALUES(
    3, 'Large Bureau', '2011-07-17', 'Eastern Sales', 'Singapore', 8, 2000, 0.5903);

INSERT INTO ITEM (ItemID, Description, PurchaseDate, Store, City, Quantity, LocalCurrencyAmount, ExchangeRate) VALUES(
    4, 'Brass Lamps', '2011-07-20', 'Jade Antiques', 'Singapore', 40, 50, 0.5903);



INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    1, "ABC Trans-Oceanic", 2008651, '2011-12-10', '2011-03-15', 15000.00);

INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    2, "ABC Trans-Oceanic", 2009012, '2011-01-10', '2011-03-20', 12000.00);

INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    3, "Worldwide", 49100300, '2011-05-05', '2011-06-17', 20000.00);

INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    4, "International", 399400, '2011-06-02', '2011-07-17', 17500.00);

INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    5, "Worldwide", 84899440, '2011-07-10', '2011-07-28', 25000.00);

INSERT INTO SHIPMENT (ShipmentID, ShipperName, ShipperInvoiceNumber, DepartureDate, ArrivalDate, InsuredValue) VALUES(
    6, "International", 488955, '2011-08-05', '2011-09-11', 18000.00);



INSERT INTO SHIPMENT_ITEM (ShipmentID, ShipmentItemID, ItemID, Value) VALUES(
	3 ,1 ,1 , 15000.00);

INSERT INTO SHIPMENT_ITEM (ShipmentID, ShipmentItemID, ItemID, Value) VALUES(
	4 ,1 ,4 , 1200.00);

INSERT INTO SHIPMENT_ITEM (ShipmentID, ShipmentItemID, ItemID, Value) VALUES(
	4 ,2 ,3 , 9500.00);

INSERT INTO SHIPMENT_ITEM (ShipmentID, ShipmentItemID, ItemID, Value) VALUES(
	4 ,3 ,2 , 4500.00);