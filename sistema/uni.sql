CREATE TABLE `users` (
	`id_user` int NOT NULL AUTO_INCREMENT,
	`email` varchar(50) NOT NULL UNIQUE,
	`active` BOOLEAN NOT NULL DEFAULT true,
	`password` varchar(100),
    `dni` varchar(100),
    `birthday` varchar(100),
    `name` varchar(100),
    `tipo_user` int(100),
	PRIMARY KEY (`id_user`)
);


insert into  (id_student, id_user_fk, first_name, last_name, address, birth_date, DNI) values (1, 11, 'Bryon', 'McGookin', '55 Hovde Drive', '2003-12-02', '7422671157');