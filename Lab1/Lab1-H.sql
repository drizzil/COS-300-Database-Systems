SELECT project.ProjectID, project.name, project.department, department.phoneNumber, employee.empNumber, LastName, FirstName, employee.phoneNumber
FROM project, employee, department
ORDER BY ProjectID ASC;