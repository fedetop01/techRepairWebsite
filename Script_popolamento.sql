INSERT INTO question VALUES('1','What is your mothers last name?');
INSERT INTO question VALUES('2','What is the name of your pet?');
INSERT INTO question VALUES('3','What is your primary school teachers name?');

INSERT INTO product VALUES ('MacBook','Air-M1','https://www.apple.com/it/macbook-air-m1/');
INSERT INTO product VALUES ('MacBook','Air-M2','https://www.apple.com/it/macbook-air-m2/');
INSERT INTO product VALUES ('MacBook','Pro-13','https://www.apple.com/it/macbook-pro-13/');
INSERT INTO product VALUES ('iPad','Pro','https://www.apple.com/it/ipad-pro/');
INSERT INTO product VALUES ('iPad','Air','https://www.apple.com/it/ipad-air/');
INSERT INTO product VALUES ('iPad','Mini','https://www.apple.com/it/ipad-mini/');
INSERT INTO product VALUES ('iPhone','14','https://www.apple.com/it/iphone-14/');
INSERT INTO product VALUES ('iPhone','13','https://www.apple.com/it/iphone-13/');
INSERT INTO product VALUES ('iPhone','12','https://www.apple.com/it/iphone-12/');

INSERT INTO tech VALUES ('0612705011','Riparazione Mac','Mimmo','Berardi','https://w0.peakpx.com/wallpaper/126/244/HD-wallpaper-sassuolo-domenico-berardi-match-serie-a-goal-footballers-soccer.jpg', 'Experienced Mac specialist offering top-notch maintenance and repair services.
                  Proficient in diagnosing and resolving hardware and software issues specific to Mac computers.
                  Dedicated to providing reliable solutions to ensure optimal performance and customer satisfaction.');
INSERT INTO tech VALUES ('0612705059','Riparazione iPhone','Annamaria','Raspadori','https://citynews-today.stgy.ovh/~media/horizontal-hi/26842676072513/maria-de-filippi_18a4954-2.jpg', 'Experienced iPad technician specializing in maintenance and repair.
                  Skilled in diagnosing hardware and software issues, providing comprehensive solutions.
                  Dedicated to delivering high-quality service and ensuring optimal iPad performance.');
INSERT INTO tech VALUES ('0612705032','Riparazione iPad','Gertrude','Azalea','https://a3z7u4s4.rocketcdn.me/wp-content/uploads/2022/12/Tina-Cipollari.jpg', 'Hello, I''m a highly skilled technician specializing in iPhone maintenance and repair.
                  With extensive experience, I excel in diagnosing and resolving hardware and software issues.
                  I provide meticulous repairs, excellent customer service, and ensure your iPhone functions optimally.
                  Trust me for efficient and reliable iPhone solutions.');
INSERT INTO tech VALUES ('0612705030','Riparazione Hardware/Software','Gianpaolo','Calvarese','https://www.repstatic.it/content/nazionale/img/2021/08/06/113905835-cbd1a8d5-a881-45fa-99d3-b3b3ea184b92.jpg?webp', 'Skilled Apple technician with comprehensive expertise in servicing Apple devices.
                  Proficient in diagnosing and repairing a wide range of hardware and software issues across various Apple products.
                  Committed to delivering reliable solutions and exceptional customer service to ensure optimal performance and user satisfaction.');

INSERT INTO users VALUES ('m.lauretano3@studenti.unisa.it','Lauro01','3382148536','Matteo','Lauretano','$2y$10$.y6xiXNlP/GQPo4kIoKTGuBmMQm8GF4AitH0U5mViZWmBFkRvDz9q','Via Stradone','18','11/06/2001','2','Pietro');/*password Pass1234!*/
INSERT INTO users VALUES ('f.topazio@studenti.unisa.it','FedeTop','3395464863','Federica','Topazio','$2y$10$djvZEPBYQZLTond8Vu0F7uZHLKOeMKA8ibdzdT7It41z1LYurdDYW','Via Giuseppe Garibaldi','7','12/10/2001','1','Barbuto');/*password Password12!*/
INSERT INTO users VALUES ('c.zarrella5@studenti.unisa.it','Zar','3378459871','Chiara','Zarrella','$2y$10$s6uJJdrDi2mJHQGVqByGv.r82OjmL6xutHOqCwbWcCCYiuJU2jMia','Via Francesco Petrarca','9','2001/05/14','3','Longobardi');/*password Prova123!*/
INSERT INTO users VALUES ('l.ianniello9@studenti.unisa.it','LazarVexx','3378675641','Luca','Ianniello','$2y$10$SMWO.SI68u/nKvdYa5RveOcekJlDKSUFXPF/oycX4H2qGt/alr9E.','Via Luca Serafini','7','2001/09/20','2','Marco');/*password Caserta123!*/

INSERT INTO booking VALUES ('1','Lo schermo non si accende','2019/05/20','Via Stradone 18','0612705032','m.lauretano3@studenti.unisa.it','iPad','Pro');
INSERT INTO booking VALUES ('2','Le casse non funzionano','2020/07/19','Via Stradone 18','0612705059','m.lauretano3@studenti.unisa.it','iPhone','12');
INSERT INTO booking VALUES ('3','La tastiera si blocca','2018/05/20','Via Stradone 18','0612705011','m.lauretano3@studenti.unisa.it','MacBook','Pro-13');
INSERT INTO booking VALUES ('4','Lo schermo è rotto','2021/05/13','Via Giuseppe Garibaldi 7','0612705059','f.topazio@studenti.unisa.it','iPhone','14');
INSERT INTO booking VALUES ('5','La fotocamera non si apre','2020/01/19','Via Giuseppe Garibaldi 7','0612705059','f.topazio@studenti.unisa.it','iPhone','14');
INSERT INTO booking VALUES ('6','L_alimentatore non funziona','2017/04/09','Via Giuseppe Garibaldi 7','0612705011','f.topazio@studenti.unisa.it','MacBook','Pro-13');
INSERT INTO booking VALUES ('7','L_impronta non viene letto','2022/01/12','Via Luca Serafini 7','0612705030','l.ianniello9@studenti.unisa.it','iPhone','13');
INSERT INTO booking VALUES ('8','La presa USB non funziona','2019/11/09','Via Luca Serafini 7','0612705030','l.ianniello9@studenti.unisa.it','MacBook','Air-M2');