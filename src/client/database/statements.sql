/************************************\
**** SIDEBAR PREPARED STATEMENTS *****
\************************************/

SELECT vehicleID FROM Vehicle WHERE make = ?;
SELECT vehicleID FROM Vehicle WHERE model = ?;
SELECT vehicleID FROM Vehicle WHERE year = ?;
SELECT vehicleID FROM Vehicle WHERE type = ?;
SELECT vehicleID FROM Vehicle WHERE engine = ?;
SELECT vehicleID FROM Vehicle WHERE drivetrain = ?;
SELECT vehicleID FROM Vehicle WHERE transmission = ?;
SELECT vehicleID FROM Vehicle WHERE exterior = ?;
SELECT vehicleID FROM Vehicle WHERE seats = ?;

/************************************\
*********** SQL QUERIES **************
\************************************/

/* Return a list of Admin accounts: */
SELECT User.userID, username FROM User, Admin WHERE User.userID = Admin.userID;

/* Check and show what vehicles ARE IN STOCK, the location of the warehouse, and sort by descending amount in inventory */
SELECT Vehicle.vehicleID, year, make, model, amount, Warehouse.warehouseID, location
FROM Vehicle, Warehouse, Inventories
WHERE amount > 0 AND Inventories.vehicleID = Vehicle.vehicleID AND Inventories.warehouseID = Warehouse.warehouseID
ORDER BY amount DESC;

/* Check and show what vehicles ARE NOT IN STOCK and where they should be located when in stock. */
SELECT Vehicle.vehicleID, year, make, model, amount, Warehouse.warehouseID, location
FROM Vehicle, Warehouse, Inventories
WHERE amount = 0 AND Inventories.vehicleID = Vehicle.vehicleID AND Inventories.warehouseID = Warehouse.warehouseID;

/* Check and show all vehicles, REGARDLESS OF STOCK LEVELS, and where they should/are located, and sort by descending amount in inventory */
SELECT Vehicle.vehicleID, year, make, model, amount, Warehouse.warehouseID, location
FROM Vehicle, Warehouse, Inventories
WHERE Inventories.vehicleID = Vehicle.vehicleID AND Inventories.warehouseID = Warehouse.warehouseID
ORDER BY amount DESC;

/************************************\
********* PREPARED STATEMENTS ********
\************************************/

/* ADMIN CREATION */
INSERT INTO User (username, oassword, email) VALUES (?, ?, ?);
INSERT INTO Admin VALUES (?);

/* CUSTOMER CREATION */
INSERT INTO User (username, password, email) VALUES (?, ?, ?);
INSERT INTO Customer (userID, firstName, lastName, address) VALUES (?, ?, ?, ?);

/* VEHICLE CREATION */
INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);

/* WAREHOUSE CREATION */
INSERT INTO Warehouse (location, continentID) VALUES (?, ?);

/* INVENTORY CREATION */
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (?, ?, ?);

/* COMMENT CREATION */
