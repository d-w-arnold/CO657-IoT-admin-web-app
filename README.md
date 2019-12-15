# CO657-IoT_Admin_Web_App

A simple web interface for managing known BLE devices for an IoT System.

MySQL database table structure:

+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| mac         | char(17)     | NO   | PRI | NULL    |       |
| name        | varchar(256) | YES  |     | NULL    |       |
| living_room | tinyint(1)   | YES  |     | NULL    |       |
| bedroom     | tinyint(1)   | YES  |     | NULL    |       |
| kitchen     | tinyint(1)   | YES  |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+
