SELECT ProjectID, assignment.empNumber, LastName, FirstName, phonenumber
FROM assignment, employee
WHERE assignment.empNumber = employee.empNumber;