# Tables Used

` Courses `

|Field         | Type       | Null |Key |Default |Extra |
| ------------ | ---------- | ---- | -- | ------ | ---- |
|Course_name   | varchar(50)| NO   |    |NULL    |      |
|Course_code   | varchar(8) | NO   |PRI |NULL    |      |
|Started_year  |	date	| NO   |NULL|        |      |
		

` Exams `
|Field              |Type         |Null |Key  |Default |Extra |
| ----              | ---         | --- | --- | ------ | ---- |
|course_name        |char(50)     |YES  |     |NULL    |      |
|semester           |int(11)      |YES  |     |NULL    |      |
|subject            |char(50)     |YES  |     |NULL    |      |
|subject_code       |varchar(10)  |YES  |     |NULL    |      |
|date_of_exam       |date         |YES  |     |NULL    |      |
|start_time         |time         |YES  |     |NULL    |      |
|end_time           |time         |YES  |     |NULL    |      |
|scheduled_by       |varchar(20)  |YES  |     |NULL    |      |
|Question_paper_name|varchar(50)  |NO   |     |NULL    |      |
|exam_type          |varchar(20)  |YES  |     |NULL    |      |


` Users `

|Field          |Type       |Null | Key |Default|Extra|
| ------------- | --------- | --- | --- | ----- | --- |
|First_name     |varchar(15)|NO   |     |NULL   |     |
|Last_name      |varchar(15)|NO   |     |NULL   |     |
|Employee_ID    |varchar(15)|NO   |PRI  |NULL   |     |
|Designation    |varchar(20)|NO   |     |NULL   |     |
|Email_ID       |varchar(30)|NO   |UNI  |NULL   |     |
|User_name      |varchar(20)|NO   |UNI  |NULL   |     |
|Login_password |varchar(50)|NO   |     |NULL   |     |
|Phone_number   |bigint(20) |YES  |UNI  |NULL   |     |
|Address        |varchar(50)|YES  |     |NULL   |     |


` Students `

|Field          |Type           |Null | Key |Default|Extra|
| ------------- | ---------     | --- | --- | ----- | --- |
|First_Name     |varchar(15)    |NO   |     |NULL   |     |
|Last_Name      |varchar(15)    |NO   |     |NULL   |     |
|Date_of_Birth  |date           |NO   |     |NULL   |     |
|Address        |varchar(50)    |NO   |     |NULL   |     |
|Mobile_Number  |bigint(20)     |NO   |UNI  |NULL   |     |
|Roll_Number    |bigint(20)     |NO   |PRI  |NULL   |     |
|Course         |char(30)       |NO   |     |NULL   |     |
|Semester       |int(11)        |NO   |     |NULL   |     |
|Login_Password |varchar(100)   |NO   |     |NULL   |     |

