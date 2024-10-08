INSERT INTO `users` (`name`, `email`, `password`, `level`) VALUES
('Admin', 'admin@example.com', 'password', '1'),
('User 1', 'user1@example.com', 'password1', '0'),
('User 2', 'user2@example.com', 'password2', '0'),
('User 3', 'user3@example.com', 'password3', '0'),
('User 4', 'user4@example.com', 'password4', '0'),
('User 5', 'user5@example.com', 'password5', '0'),
('User 6', 'user6@example.com', 'password6', '0'),
('User 7', 'user7@example.com', 'password7', '0'),
('User 8', 'user8@example.com', 'password8', '0'),
('User 9', 'user9@example.com', 'password9', '0'),
('User 10', 'user10@example.com', 'password10', '0'),
('User 11', 'user11@example.com', 'password11', '0'),
('User 12', 'user12@example.com', 'password12', '0'),
('User 13', 'user13@example.com', 'password13', '0'),
('User 14', 'user14@example.com', 'password14', '0'),
('User 15', 'user15@example.com', 'password15', '0'),
('User 16', 'user16@example.com', 'password16', '0'),
('User 17', 'user17@example.com', 'password17', '0'),
('User 18', 'user18@example.com', 'password18', '0'),
('User 19', 'user19@example.com', 'password19', '0'),
('User 20', 'user20@example.com', 'password20', '0'),
('User 21', 'user21@example.com', 'password21', '0'),
('User 22', 'user22@example.com', 'password22', '0'),
('User 23', 'user23@example.com', 'password23', '0'),
('User 24', 'user24@example.com', 'password24', '0'),
('User 25', 'user25@example.com', 'password25', '0');

INSERT INTO `items` (`name`, `price`, `stock`) VALUES
('Item 1', 100, 10),
('Item 2', 200, 20),
('Item 3', 300, 30),
('Item 4', 400, 40),
('Item 5', 500, 50),
('Item 6', 600, 60),
('Item 7', 700, 70),
('Item 8', 800, 80),
('Item 9', 900, 90),
('Item 10', 1000, 100),
('Item 11', 1100, 110),
('Item 12', 1200, 120),
('Item 13', 1300, 130),
('Item 14', 1400, 140),
('Item 15', 1500, 150),
('Item 16', 1600, 160),
('Item 17', 1700, 170),
('Item 18', 1800, 180),
('Item 19', 1900, 190),
('Item 20', 2000, 200),
('Item 21', 2100, 210),
('Item 22', 2200, 220),
('Item 23', 2300, 230),
('Item 24', 2400, 240),
('Item 25', 2500, 250);

INSERT INTO `in_h` (`date`, `total`) VALUES
('2024-01-01 00:00:00', 1000),
('2024-01-02 00:00:00', 2000),
('2024-01-03 00:00:00', 3000),
('2024-01-04 00:00:00', 4000),
('2024-01-05 00:00:00', 5000),
('2024-01-06 00:00:00', 6000),
('2024-01-07 00:00:00', 7000),
('2024-01-08 00:00:00', 8000),
('2024-01-09 00:00:00', 9000),
('2024-01-10 00:00:00', 10000),
('2024-01-11 00:00:00', 11000),
('2024-01-12 00:00:00', 12000),
('2024-01-13 00:00:00', 13000),
('2024-01-14 00:00:00', 14000),
('2024-01-15 00:00:00', 15000),
('2024-01-16 00:00:00', 16000),
('2024-01-17 00:00:00', 17000),
('2024-01-18 00:00:00', 18000),
('2024-01-19 00:00:00', 19000),
('2024-01-20 00:00:00', 20000),
('2024-01-21 00:00:00', 21000),
('2024-01-22 00:00:00', 22000),
('2024-01-23 00:00:00', 23000),
('2024-01-24 00:00:00', 24000),
('2024-01-25 00:00:00', 25000);

INSERT INTO `in_d` (`qty`, `subtotal`, `in_h_id`, `item_id`) VALUES
(1, 100, 1, 1),
(2, 200, 2, 2),
(3, 300, 3, 3),
(4, 400, 4, 4),
(5, 500, 5, 5),
(6, 600, 6, 6),
(7, 700, 7, 7),
(8, 800, 8, 8),
(9, 900, 9, 9),
(10, 1000, 10, 10),
(11, 1100, 11, 11),
(12, 1200, 12, 12),
(13, 1300, 13, 13),
(14, 1400, 14, 14),
(15, 1500, 15, 15),
(16, 1600, 16, 16),
(17, 1700, 17, 17),
(18, 1800, 18, 18),
(19, 1900, 19, 19),
(20, 2000, 20, 20),
(21, 2100, 21, 21),
(22, 2200, 22, 22),
(23, 2300, 23, 23),
(24, 2400, 24, 24),
(25, 2500, 25, 25);

INSERT INTO `out_h` (`date`, `total`) VALUES
('2024-01-01 00:00:00', 1000),
('2024-01-02 00:00:00', 2000),
('2024-01-03 00:00:00', 3000),
('2024-01-04 00:00:00', 4000),
('2024-01-05 00:00:00', 5000),
('2024-01-06 00:00:00', 6000),
('2024-01-07 00:00:00', 7000),
('2024-01-08 00:00:00', 8000),
('2024-01-09 00:00:00', 9000),
('2024-01-10 00:00:00', 10000),
('2024-01-11 00:00:00', 11000),
('2024-01-12 00:00:00', 12000),
('2024-01-13 00:00:00', 13000),
('2024-01-14 00:00:00', 14000),
('2024-01-15 00:00:00', 15000),
('2024-01-16 00:00:00', 16000),
('2024-01-17 00:00:00', 17000),
('2024-01-18 00:00:00', 18000),
('2024-01-19 00:00:00', 19000),
('2024-01-20 00:00:00', 20000),
('2024-01-21 00:00:00', 21000),
('2024-01-22 00:00:00', 22000),
('2024-01-23 00:00:00', 23000),
('2024-01-24 00:00:00', 24000),
('2024-01-25 00:00:00', 25000);

INSERT INTO `out_d` (`qty`, `subtotal`, `out_h_id`, `item_id`) VALUES
(1, 100, 1, 1),
(2, 200, 2, 2),
(3, 300, 3, 3),
(4, 400, 4, 4),
(5, 500, 5, 5),
(6, 600, 6, 6),
(7, 700, 7, 7),
(8, 800, 8, 8),
(9, 900, 9, 9),
(10, 1000, 10, 10),
(11, 1100, 11, 11),
(12, 1200, 12, 12),
(13, 1300, 13, 13),
(14, 1400, 14, 14),
(15, 1500, 15, 15),
(16, 1600, 16, 16),
(17, 1700, 17, 17),
(18, 1800, 18, 18),
(19, 1900, 19, 19),
(20, 2000, 20, 20),
(21, 2100, 21, 21),
(22, 2200, 22, 22),
(23, 2300, 23, 23),
(24, 2400, 24, 24),
(25, 2500, 25, 25);
