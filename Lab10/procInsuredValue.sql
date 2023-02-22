DELIMITER $$
CREATE PROCEDURE InsuredValue(
    shipmentID int,
    purchaseID int,
    insuredValue decimal(5,2)
)
BEGIN
    DECLARE iv decimal(5,2);
    DECLARE pr decimal(5,2);
    SELECT insuredValue
    FROM shipment_item;
    SELECT price
    FROM purchase;
    IF iv < pr THEN
    	SET iv = pr;
	END IF; 
END$$

DELIMITER ;