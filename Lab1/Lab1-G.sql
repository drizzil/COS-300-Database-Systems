SELECT project.ProjectID, project.name, project.department, department.phoneNumber, empNumber, LastName, FirstName, employee.phoneNumber
FROM department, employee, project
ORDER BY ProjectID DESC;