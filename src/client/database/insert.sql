/* ADMIN CREATION */
INSERT INTO User (username, password, email) VALUES ('admin', 'admin', 'admin@vehicleemporium.com');
INSERT INTO Admin VALUES (1);

/* CUSTOMER CREATION */
INSERT INTO User (username, password, email) VALUES ('customer', 'customer', 'customer@somesite.com');
INSERT INTO Customer (userID, firstName, lastName, address) VALUES ('2', 'Barber', 'Joe', '123 Customer Street, Kelowna, BC, Canada');

/* VEHICLE CREARTION */
INSERT INTO Vehicle (year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats)
VALUES ('2015', 'Audi', 'R8', '129900.00', 'Coupe', 'Manual', 'AWD', '10CYL', 'Gas', 'Silver', '2');
