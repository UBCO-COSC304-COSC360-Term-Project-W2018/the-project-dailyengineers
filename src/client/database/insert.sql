/* ADMIN CREATION */
INSERT INTO User (username, password, email) VALUES ('admin', 'admin', 'admin@vehicleemporium.com');
INSERT INTO Admin VALUES (userID);

/* Prepared statmeent: */
INSERT INTO User (username, oassword, email) VALUES (?, ?, ?);
INSERT INTO Admin VALUES (?);

/* CUSTOMER CREATION */
INSERT INTO User (username, password, email) VALUES ('customer', 'customer', 'customer@somesite.com');
