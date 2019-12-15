# CO657-IoT_Admin_Web_App

A simple web interface for managing known BLE devices for an IoT System.

MySQL database table structure:

+-------------+--------------+------+-----+---------+-------+<br/>
| Field       | Type         | Null | Key | Default | Extra |<br/>
+-------------+--------------+------+-----+---------+-------+<br/>
| mac         | char(17)     | NO   | PRI | NULL    |       |<br/>
| name        | varchar(256) | YES  |     | NULL    |       |<br/>
| living_room | tinyint(1)   | YES  |     | NULL    |       |<br/>
| bedroom     | tinyint(1)   | YES  |     | NULL    |       |<br/>
| kitchen     | tinyint(1)   | YES  |     | NULL    |       |<br/>
+-------------+--------------+------+-----+---------+-------+<br/>
