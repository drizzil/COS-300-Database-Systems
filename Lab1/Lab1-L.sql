SELECT department, COUNT(name) AS TotalProjects
FROM project
GROUP BY department;