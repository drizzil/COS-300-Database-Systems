SELECT * 
FROM LAB6A, LAB6B
WHERE LAB6A.color = 'green'
AND LAB6B.color = 'green';


SELECT *
FROM LAB6A JOIN LAB6B
	ON LAB6A.color = 'green'
    AND LAB6B.color = 'green';


SELECT *
FROM LAB6A LEFT JOIN LAB6B
	ON LAB6A.color = 'green' 
    AND LAB6B.color = 'green' OR 'red';


SELECT *
FROM LAB6A RIGHT JOIN LAB6B
    ON  LAB6A.color = 'green'
    AND LAB6B.color = 'green' OR 'blue';
