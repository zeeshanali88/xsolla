## Bulid Application

clone and go to app folder
run `docker compose build` or `docker compose up --build -d`

## stop docker

`docker compose down`

## URL

`http://localhost` for web page
`http://pma.localhost` for phpmyadmin

## Creditial mysql

`mysql root password = rootPASS`
`host = mysql`
`database name = dbase`
`username = dbuser`
`password = dbpass`

## Create following table in database

CREATE TABLE `games` (
`id` int NOT NULL AUTO_INCREMENT,
`title` varchar(200) DEFAULT NULL,
`platform` varchar(100) DEFAULT NULL,
`rating` varchar(5) DEFAULT NULL,
`review` text,
`last_played` datetime DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
