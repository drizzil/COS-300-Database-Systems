CREATE TABLE TABLE_12(
    RoomType    char(25)    NOT NULL, 
    DormCost    int         NOT NULL,
    PRIMARY KEY(RoomType)
    );
    
CREATE TABLE TABLE_11(
    Number      int         NOT NULL, 
    Name        char(50)    NOT NULL, 
    Dorm        char(25)    NOT NULL, 
    Sibling     char(50)    NOT NULL, 
    RoomType    char(25)    NOT NULL,
    PRIMARY KEY(Number),
    CONSTRAINT FK_RoomType  FOREIGN KEY(RoomType)
    REFERENCES TABLE_12(RoomType)
);

CREATE TABLE TABLE_21(
    Number      int         NOT NULL, 
    Club        char(25)    NOT NULL,
    CONSTRAINT FK_NUMBER PRIMARY KEY(Number)
    );

CREATE TABLE TABLE_22(
    Club        char(25)    NOT NULL, 
    ClubCost    int         NOT NULL
    );

CREATE TABLE TABLE_3(
    Number      int         NOT NULL, 
    Nickname    char(25)    NOT NULL
    );
