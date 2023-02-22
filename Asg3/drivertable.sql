CREATE TABLE driver_information (
    rideID int NOT NULL auto_increment,
    driverName varchar(255),
    driverNumber varchar(20),
    churchName varchar(255),
    seatsNum int,
    timeLeaving TIME,
    meetingLocation varchar(255),
    daysDriving DATE,
    PRIMARY KEY (rideID)
);

CREATE TABLE rider_information (
    riderID int NOT NULL auto_increment,
    riderName varchar(255),
    riderNumber varchar(20),
    rideID int,
    PRIMARY KEY (riderID)
);