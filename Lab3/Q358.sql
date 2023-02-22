CREATE TABLE PROJECT_DATE(
    ProjectName		char(25)	NOT NULL,
    Date			char(25)	NOT NULL,
    CONSTRAINT PK_ProjectName PRIMARY KEY(ProjectName));
    
CREATE TABLE PROJECT_EMPLOYEE(
    ProjectName		char(25)	NOT NULL,
    EmployeeName	char(25)	NOT NULL,
    CONSTRAINT PK_ProjectName PRIMARY KEY(ProjectName));
    