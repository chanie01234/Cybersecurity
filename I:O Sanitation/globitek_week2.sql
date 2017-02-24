--
-- Table structure for table `salespeople`
--

DROP TABLE IF EXISTS `salespeople`;
CREATE TABLE `salespeople` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` VALUES (1,'Daron','Burke','555-925-3685','dburke@salesperson.com'),(2,'Sherry','Trevino','555-435-1036','strevino@salesperson.com'),(3,'Irene','Boling','555-736-2301','iboling@salesperson.com'),(4,'Robert','Hamilton','555-866-6131','rhamilton@salesperson.com'),(5,'Ken','Barker','555-352-9654','kbarker@salesperson.com'),(6,'Elizabeth','Olson','555-532-3209','eolson@salesperson.com'),(7,'Samuel','Hunter','555-682-7543','shunter@salesperson.com'),(8,'Kim','Stanley','555-302-7805','kstanley@salesperson.com'),(9,'Barbara','Hinckley','555-437-1355','bhinckley@salesperson.com');

--
-- Table structure for table `salespeople_territories`
--

DROP TABLE IF EXISTS `salespeople_territories`;
CREATE TABLE `salespeople_territories` (
  `territory_id` int(11) DEFAULT NULL,
  `salesperson_id` int(11) DEFAULT NULL,
  KEY `territory_id` (`territory_id`),
  KEY `salesperson_id` (`salesperson_id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `salespeople_territories`
--

INSERT INTO `salespeople_territories` VALUES (1,1),(2,4),(3,3),(4,6),(5,4),(6,2),(7,3),(8,9),(9,9),(10,1),(11,1),(12,3),(13,3),(14,2),(15,5),(16,7),(17,5),(18,8),(19,7),(20,6),(21,9),(22,9),(24,7),(25,5),(26,1),(27,1),(28,5),(29,3),(30,8),(31,2),(32,3),(33,9),(34,9),(35,2),(36,3),(38,9),(39,1),(40,8),(41,7),(42,6),(43,4),(44,7),(45,2),(46,9),(47,1),(48,8),(49,1),(50,6),(51,3),(52,9),(53,2),(54,1),(55,4),(56,7),(57,5),(58,3),(37,9),(37,2);

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51;

--
-- Dumping data for table `states`
--

INSERT INTO `states` VALUES (1,'Alabama','AL'),(2,'Alaska','AK'),(3,'Arizona','AZ'),(4,'Arkansas','AR'),(5,'California','CA'),(6,'Colorado','CO'),(7,'Connecticut','CT'),(8,'Delaware','DE'),(9,'Florida','FL'),(10,'Georgia','GA'),(11,'Hawaii','HI'),(12,'Idaho','ID'),(13,'Illinois','IL'),(14,'Indiana','IN'),(15,'Iowa','IA'),(16,'Kansas','KS'),(17,'Kentucky','KY'),(18,'Louisiana','LA'),(19,'Maine','ME'),(20,'Maryland','MD'),(21,'Massachusetts','MA'),(22,'Michigan','MI'),(23,'Minnesota','MN'),(24,'Mississippi','MS'),(25,'Missouri','MO'),(26,'Montana','MT'),(27,'Nebraska','NE'),(28,'Nevada','NV'),(29,'New Hampshire','NH'),(30,'New Jersey','NJ'),(31,'New Mexico','NM'),(32,'New York','NY'),(33,'North Carolina','NC'),(34,'North Dakota','ND'),(35,'Ohio','OH'),(36,'Oklahoma','OK'),(37,'Oregon','OR'),(38,'Pennsylvania','PA'),(39,'Rhode Island','RI'),(40,'South Carolina','SC'),(41,'South Dakota','SD'),(42,'Tennessee','TN'),(43,'Texas','TX'),(44,'Utah','UT'),(45,'Vermont','VT'),(46,'Virginia','VA'),(47,'Washington','WA'),(48,'West Virginia','WV'),(49,'Wisconsin','WI'),(50,'Wyoming','WY');

--
-- Table structure for table `territories`
--

DROP TABLE IF EXISTS `territories`;
CREATE TABLE `territories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59;

--
-- Dumping data for table `territories`
--

INSERT INTO `territories` VALUES (1,'Alabama',1,1),(2,'Alaska',2,1),(3,'Arizona',3,1),(4,'Arkansas',4,1),(5,'Northern California',5,1),(6,'Southern California',5,2),(7,'Colorado',6,1),(8,'Connecticut',7,1),(9,'Delaware',8,1),(10,'Florida',9,1),(11,'Georgia',10,1),(12,'Hawaii',11,1),(13,'Idaho',12,1),(14,'Chicago Metro',13,1),(15,'Outside Chicago',13,1),(16,'Indiana',14,1),(17,'Iowa',15,1),(18,'Kansas',16,1),(19,'Kentucky',17,1),(20,'Louisiana',18,1),(21,'Maine',19,1),(22,'Maryland',20,1),(23,'Massachusetts',21,1),(24,'Michigan',22,1),(25,'Minnesota',23,1),(26,'Mississippi',24,1),(27,'St. Louis Area',25,1),(28,'Kansas City Area',25,2),(29,'Montana',26,1),(30,'Nebraska',27,1),(31,'Las Vegas',28,1),(32,'Outside Las Vegas',28,1),(33,'New Hampshire',29,1),(34,'Northern New Jersey',30,1),(35,'Southern New Jersey',30,1),(36,'New Mexico',31,1),(37,'New York City',32,1),(38,'Outside New York City',32,1),(39,'North Carolina',33,1),(40,'North Dakota',34,1),(41,'Ohio',35,1),(42,'Oklahoma',36,1),(43,'Oregon',37,1),(44,'Western Pennsylvania',38,1),(45,'Eastern Pennsylvania',38,2),(46,'Rhode Island',39,1),(47,'South Carolina',40,1),(48,'South Dakota',41,1),(49,'Tennessee',42,1),(50,'Texas',43,1),(51,'Utah',44,1),(52,'Vermont',45,1),(53,'Northern Virginia',46,1),(54,'Southern Virginia',46,1),(55,'Washington',47,1),(56,'West Virginia',48,1),(57,'Wisconsin',49,1),(58,'Wyoming',50,1);


--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES (1, 'United States', 'US');

--
-- Edits to table `states`
--

ALTER TABLE `states` ADD COLUMN `country_id` int(11) DEFAULT NULL;
CREATE INDEX `fk_country_id` ON `states` (`country_id`);

UPDATE `states` SET `country_id` = 1;



--
-- Add data for Canada
--

-- Add country
INSERT INTO `countries` (`id`, `name`, `code`) VALUES (2, 'Canada', 'CA');

-- Add states
INSERT INTO `states` (`id`, `name`, `code`, `country_id`) VALUES (51, 'British Columbia', 'BC', 2);
INSERT INTO `states` (`id`, `name`, `code`, `country_id`) VALUES (52, 'Ontario', 'ON', 2);
INSERT INTO `states` (`id`, `name`, `code`, `country_id`) VALUES (53, 'Quebec', 'QC', 2);

-- Add territories
INSERT INTO `territories` (`id`, `name`, `state_id`, `position`) VALUES (59, 'British Columbia', 51, 1);
INSERT INTO `territories` (`id`, `name`, `state_id`, `position`) VALUES (60, 'Western Ontario', 52, 1);
INSERT INTO `territories` (`id`, `name`, `state_id`, `position`) VALUES (61, 'Eastern Ontario', 52, 2);
INSERT INTO `territories` (`id`, `name`, `state_id`, `position`) VALUES (62, 'Quebec', 53, 1);

-- Add relationships to salespeople
INSERT INTO `salespeople_territories` (`territory_id`, `salesperson_id`) VALUES (59, 4);
INSERT INTO `salespeople_territories` (`territory_id`, `salesperson_id`) VALUES (60, 7);
INSERT INTO `salespeople_territories` (`territory_id`, `salesperson_id`) VALUES (61, 5);
INSERT INTO `salespeople_territories` (`territory_id`, `salesperson_id`) VALUES (62, 9);


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES (1,'Larry','Fowler','lf@example.com','lfowler99', '2016-06-01 08:15:45');
