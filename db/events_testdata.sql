--
-- Dumping data for table `customers`
-- The password is `Fredtest`
--

INSERT INTO `customers` (`customerID`, `password_hash`, `customer_forename`, `customer_surname`,`customer_email`, `date_of_birth`) VALUES
(1, '$2y$10$qOrhpkdI0Mib.Hizs7.6A.hApiW2HfJIH/iut2Q87m/NbSJRcdbx6', 'Fred', 'Brown', 'fred@test.com', '1985-11-13 00:00:00');

--
-- Dumping data for table `excursions`
--

INSERT INTO `events` (`eventID`, `event_title`, `description`, `event_date`, `price_per_person`, `event_imagepath`) VALUES
(1, 'October Comedy Night', 'Laugh all night at the very best local comedians','2023-10-20 20:00',25.50, 'AutumnComedyNight.jpg'),
(2, 'Family magic show', 'All the family can enjoy the fun of a magic show by the Great Marvella', '2023-11-08 14:00',12.00,'Marvella.jpg');

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`eventID`, `customerID`, `number_people`,`total_booking_cost`, `booking_notes`) VALUES
(1, 1, 2, 51.00,'Wheelchair access needed');

