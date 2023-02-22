DELIMITER $$
CREATE TRIGGER trigInsuredValue
    BEFORE INSERT ON shipment_item FOR EACH ROW
BEGIN
    DECLARE iv decimal(5,2);
    DECLARE pr decimal(5,2);
    SELECT insuredValue INTO iv
    FROM shipment_item;
    SELECT price INTO pr 
    FROM purchase;
    IF iv < pr THEN
    	SET iv = pr;
	END IF; 
END$$

DELIMITER ;