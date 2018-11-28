/************************************\
*********** SQL QUERIES **************
\************************************/

/* Return a list of Admin accounts: */
select User.userID, username FROM User, Admin WHERE User.userID = Admin.userID;

/************************************\
********* PREPARED STATEMENTS ********
\************************************/

/* Prepared Statmeent: ADMIN CREATION */
INSERT INTO User (username, oassword, email) VALUES (?, ?, ?);
INSERT INTO Admin VALUES (?);

/* Prepared Statement: CUSTOMER CREATION */
INSERT INTO User (username, password, email) VALUES (?, ?, ?);
INSERT INTO Customer (userID, firstName, lastName, address) VALUES (?, ?, ?, ?);
