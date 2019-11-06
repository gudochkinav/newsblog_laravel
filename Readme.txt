1. Create database
    create database `start` default character set utf8;
2. Cretae table Menu
    create table `menu` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `link` varchar(255) not null, `sort` int(5) default 0, primary key (`id`)) engine=InnoDB default charset=utf8;
3. Create portfolio table
    create table `portfolio` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `image_url` varchar(255) not null, `created_at` int(11) null default 0, `updated_at` int(11) null default 0, primary key(`id`)) engine=InnoDB default charset=utf8;
4. Create services table
    create table `services` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `description` text not null, `created_at` int(11) not null default 0, `updated_at` int(11) not null default 0, primary key(`id`)) engine=InnoDB default charset=utf8;
5. Create testimonials table
    create table `testimonials` (`id` int(11) not null auto_increment, `author_name` varchar(255) not null, `image_url` varchar(255) null default null, `description` text not null, `created_at` int(11) not null default 0, `updated_at` int(11) not null default 0, primary key(`id`)) engine=InnoDB default charset=utf8;
6. Create categories table
    create table `categories` (`id` int(11) not null auto_increment, `name` varchar(255) not null, primary key(`id`)) engine=InnoDB default charset=utf8;
7. Create articles table
    create table `articles` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `slug` varchar(255) not null, `preview_image_url` varchar(255) null, `text` text not null, `category_id` int(11) null default 0, `related_articles` text null, `created_at` int(11) not null default 0, `updated_at` int(11) not null default 0, primary key(`id`)) engine=InnoDB default charset=utf8;
8. create subscription table
    create table `subscribers` (`id` int(11) not null auto_increment, `name` varchar(255) not null, `email` varchar(255) not null, `status` enum('Off', 'On') default 'On', `created_at` int(11) not null default 0, `updated_at` int(11) not null default 0, primary key(`id`)) engine=InnoDB default charset=utf8;
