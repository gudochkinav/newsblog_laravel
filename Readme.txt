1. Create database
    create database `start` default character set utf8;
2. Cretae table Menu
    create table `menu` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `link` varchar(255) not null, `sort` int(5) default 0, primary key (`id`)) engine=InnoDB default charset=utf8;
