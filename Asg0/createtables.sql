CREATE TABLE ITEM (
    ItemID                  Int             NOT NULL AUTO_INCREMENT,
    Description             VarChar(25)     NOT NULL,
    PurchaseDate            Date            NOT NULL,
    Store                   Char(50)        NOT NULL,
    City                    Char(25)        NOT NULL,
    Quantity                Int             NOT NULL,
    LocalCurrencyAmount     Numeric(18, 2)  NOT NULL,
    ExchangeRate            Numeric(12, 6)  NOT NULL,
    CONSTRAINT      ItemID_PK     PRIMARY KEY(ItemID)
);

CREATE TABLE SHIPMENT (
    ShipmentID              Int             NOT NULL AUTO_INCREMENT,
    ShipperName             Char(35)        NOT NULL,
    ShipperInvoiceNumber    Int             NOT NULL,
    DepartureDate           Date            NULL,
    ArrivalDate             Date            NULL,
    InsuredValue            Numeric(12, 2)  NOT NULL,
    CONSTRAINT      ShipmentID_PK    PRIMARY KEY(ShipmentID)
);

CREATE TABLE SHIPMENT_ITEM (
    ShipmentID              Int             NOT NULL,
    ShipmentItemID          Int             NOT NULL,
    ItemID                  Int             NOT NULL,
    Value                   Numeric(12, 2)  NOT NULL,
    CONSTRAINT	Shipment_PK		PRIMARY KEY(ShipmentID, ShipmentItemID),
    CONSTRAINT  ShipmentID_FK   FOREIGN KEY(ShipmentID)   
    REFERENCES SHIPMENT(ShipmentID)
    ON UPDATE NO ACTION,
    CONSTRAINT ItemID_FK		FOREIGN KEY(ItemID)
    REFERENCES ITEM(ItemID)
    ON UPDATE NO ACTION
);