CREATE TABLE INVOICE_ITEM_NEW(
    ItemType            char(25)    NOT NULL, 
    Quantity            int         NOT NULL, 
    ItemPrice           int         NOT NULL, 
    ExtendedPrice       int         NOT NULL, 
    SpecialInstructions char(100)   NOT NULL,
    PRIMARY KEY(ItemType)
    );

CREATE TABLE CUSTOMER_NEW(
    CustomerNumber  int         NOT NULL, 
    FirstName       char(25)    NOT NULL, 
    LastName        char(25)    NOT NULL, 
    Phone           int         NOT NULL, 
    InvoiceNumber   int         NOT NULL,
    PRIMARY KEY(CustomerNumber),
    CONSTRAINT  FK_InvoiceNumber FOREIGN KEY(InvoiceNumber)
    REFERENCES INVOICE_NEW(InvoiceNumber)
    );

CREATE TABLE INVOICE_NEW(
    InvoiceNumber   int         NOT NULL, 
    DateIn          Date        NOT NULL, 
    DateOut         Date        NOT NULL, 
    ItemType        char(25)    NOT NULL,
    PRIMARY KEY(InvoiceNumber),
    CONSTRAINT FK_ItemType FOREIGN KEY(ItemType)
    REFERENCES INVOICE_ITEM_NEW(ItemType)
    );
    