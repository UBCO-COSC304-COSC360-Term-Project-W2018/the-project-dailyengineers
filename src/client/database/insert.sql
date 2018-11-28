/* ADMIN CREATION */
INSERT INTO User (username, password, email) VALUES ('admin', 'admin', 'admin@vehicleemporium.com');
INSERT INTO Admin VALUES (1);

/* CUSTOMER CREATION */
INSERT INTO User (username, password, email) VALUES ('customer', 'customer', 'customer@somesite.com');
INSERT INTO Customer (userID, firstName, lastName, address) VALUES ('2', 'Barber', 'Joe', '123 Customer Street, Kelowna, BC, Canada');

/* VEHICLE CREARTION
  bodyType: (Coupe, Hatchback, Sedan, SUV, Truck, Wagon, Other)
  transmission: (Automatic, CVT, Manual, Electric)
  drivetrain: (4X4, AWD, FWD, RWD, Other)
  engine: (3CYL, 4CYL, 6CYL, 8CYL, 10CYL, 12CYL, Electric, Rotary, Other)
  fuel: (Gas, Diesel, Flex, Hybrid, Electric)
  */

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2015', 'Audi', 'R8', '129900.00', 'Coupe', 'Manual', 'AWD', '10CYL', 'Gas', 'Silver', '2');

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2018', 'Tesla', 'Model S', '174700.00', 'Sedan', 'Electric', 'AWD', 'Electric', 'Electric', 'White', '7');

INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2010', 'Toyota', 'Tacoma', '24999.00', 'Truck', 'Automatic', '4X4', '6CYL', 'Gas', 'Blue', '5');

/* WAREHOUSE CREATION */
INSERT INTO Warehouse (location, continentID) VALUES ('Vancouver, Canada', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Detroit, USA', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Mexico City, Mexico', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('Bueonos Aires, Argentina', '1');
INSERT INTO Warehouse (location, continentID) VALUES ('London, England', '2');
INSERT INTO Warehouse (location, continentID) VALUES ('Istanbul, Turkey', '3');
INSERT INTO Warehouse (location, continentID) VALUES ('Shanghai, China', '3');
INSERT INTO Warehouse (location, continentID) VALUES ('Tokyo, Japan', '4');
INSERT INTO Warehouse (location, continentID) VALUES ('Sydney, Australia', '5');

/* INVENTORY CREATION */
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (1, 2, 35);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (6, 1, 20);
INSERT INTO Inventories (warehouseID, vehicleID, amount) VALUES (8, 3, 50);
