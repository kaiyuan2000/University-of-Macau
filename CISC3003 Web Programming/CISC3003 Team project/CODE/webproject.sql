-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-02 14:17:07
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `webproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `id` text NOT NULL,
  `Email` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`id`, `Email`, `name`, `title`, `description`, `image`) VALUES
('1a2b3c4d5e6f7g8h9i0j', '60903991@test.com', 'Terence Laird', 'Bee friendly plants to get your garden buzzing', 'Helenium ‘Waltraut’. This plant will bring intense orange to your flower borders with its daisy-style flowers.', 'post_03.jpeg'),
('2k3l4m5n6o7p8q9r0s1t', '60903991@test.com', 'Terence Laird', 'Benefits for you to mowing the lawn', 'Regular physical activity. The Department of Health recommends adults do 150 minutes of light aerobic exercise a week.', 'post_04.jpeg'),
('3u4v5w6x7y8z9a0b1c2d', '61800000@test.com', 'Scout Buckley', 'Growing Strawberries', 'Strawberries usually grow best and produce the most fruit when they get a good amount of light. ', 'post_05.jpeg'),
('4e5f6g7h8i9j0k1l2m3n', '61234567@test.com', 'Jeffrey Watkins', 'What is companion planting?', 'The idea of companion planting has been known for thousands of years. The ‘three sisters’ method for planting was used by Native Americans more than 3000 years ago. ', 'post_06.jpeg'),
('5o6p7q8r9s0t1u2v3w4x', '67891234@test.com', 'Ralph Vega', 'Low maintenance plants', 'Plants can be low maintenance for different reasons. These are some general tips when planning easy care planting...', 'post_07.jpeg'),
('6y7z8a9b0c1d2e3f4g5h', '67891234@test.com', 'Ralph Vega', 'Flower pressing', 'Flower pressing is carried out in two stages, both of which can be completed at any time of year. ', 'post_08.jpeg'),
('7i8j9k0l1m2n3o4p5q6r', '61800000@test.com', 'Scout Buckley', 'The importance of soil', 'Soil structure and composition is a science, but it doesn’t require a lab coat and complicated equations. ', 'post_09.jpeg'),
('8s9t0u1v2w3x4y5z6a7b', '60903991@test.com', 'Terence Laird', 'Gift Guide: The Best Plants For Valentine’s Day', 'Plants from Bloomscape make shopping for the one you love even easier because they’re delivered directly from our greenhouse to your front door.', 'post_10.jpeg'),
('9c0d1e2f3g4h5i6j7k8l', '60903991@test.com', 'Terence Laird', 'The Benefits Of A Living Christmas Tree', 'Traditionally, about half of Americans who celebrate the holiday opt for artificial Christmas trees.', 'post_11.jpeg'),
('0m1n2o3p4q5r6s7t8u9v', '64567899@test.com', 'cally', 'This is my new post!', 'I am happy!!!', 'activitiy_01.jpg'),
('a1b2c3d4e5f6g7h8i9j0', '61237899@test.com', 'Mary', 'This is my new post, so happy~', 'I feel happy today', 'activitiy_08.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `name` text NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`Password`, `Email`, `name`, `icon`) VALUES
('0903', '60903991@test.com', 'Terence Laird', 'user_01.png'),
('1800', '61800000@test.com', 'Scout Buckley', 'user_06.png'),
('1234', '61234567@test.com', 'Jeffrey Watkins', 'user_05.png'),
('7891', '67891234@test.com', 'Ralph Vega', 'user_02.png'),
('4567', '64567899@test.com', 'cally', 'user_04.png'),
('1237', '61237899@test.com', 'Mary', 'user_03.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE user ADD COLUMN status TINYINT NOT NULL DEFAULT 0;
ALTER TABLE user ADD COLUMN verification_code VARCHAR(255) NOT NULL;


--
-- 資料表結構 `product`
--
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
   `category` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_detail` varchar(6000) NOT NULL,
  PRIMARY KEY(`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `products` ( `product_name`, `category`,`product_image`, `product_price`,`product_detail`) VALUES
('ACANA Bountiful Catch', 'cat','cat-product01.jpeg', '87.53','Cats swallow lots of fur when they groom themselves every day. If this hair remains in the stomach for a long time, it can form harmful hairballs. Cat grass is a natural way to aid digestion and prevent swallowed fur from turning into hairballs in the digestive tract.'),
('ACANA Wounderful Catch', 'cat','cat-product02.jpg', '53.64','Dry cat food is one of the most commonly used food for cats because of its ease of feeding, ease of storing, and variety of flavours. At Petsy, you get to choose from both Indian and imported brands such as Whiskas dry cat food, Me-O dry cat food,  Royal Canin dry cat food and much more! Dry cat food is best suited for cats who enjoy free feeding because it do run the risk of bacterial build-up from being left out for too long.'),
('ACANA Indoor Entree', 'cat','cat-product03.jpeg', '23.45','Cats swallow lots of fur when they groom themselves every day. If this hair remains in the stomach for a long time, it can form harmful hairballs. Cat grass is a natural way to aid digestion and prevent swallowed fur from turning into hairballs in the digestive tract.'),
('ACANA Regionals Regional Ingredients Grain-Free Cat Food', 'cat','cat-product04.jpeg', '64.62','Dry cat food is one of the most commonly used food for cats because of its ease of feeding, ease of storing, and variety of flavours. At Petsy, you get to choose from both Indian and imported brands such as Whiskas dry cat food, Me-O dry cat food.'),
('PETSSION LIFE CORE Love | Natural Silk Orchid, Turmeric, and Rosemary','cat','cat-product05.jpg', '64.56','Suitable for cats over 7 years of age, ROYAL CANIN® Instinctive 7+ in Gravy is specially formulated with all the nutritional needs of your adult cat in mind. As your cat gets older, its activity levels will naturally decrease over time. '),
('Orijen Grain-Free Six Fish Recipe Cat Food 1.8kg/5.4kg', 'cat','cat-product06.jpg', '100.23','The wet meal appeals to the palate of fussy eaters and gives them the delight of relishing a juicy, wholesome meal while strengthening them from the inside.'),
('Orijen Grain-Free Chicken Recipe | ]Adult/Kitten Dry Food 1.8kg/5.4k', 'cat','cat-product07.jpg', '88.23','Suitable for cats over 7 years of age, ROYAL CANIN® Instinctive 7+ in Gravy is specially formulated with all the nutritional needs of your adult cat in mind. As your cat gets older, its activity levels will naturally decrease over time. '),
('aiwan CATPOOL Gold Cat Butler | Natural Grain-Free Cat Food', 'cat','cat-product08.jpg', '110.23','Kennel Kitchen Chicken and Tuna is ideal for adult cats and kittens. Made with white breast chicken that is mixed with tuna fillets. Free from corn, soy, preservatives and any Artificial flavors. This is one scrumptious meal for your cats and kittens.'),
('Taiwan CATPOOL Black Cat Butler', 'cat','cat-product09.jpg', '120.23','If you noticed your cat urinating at a much more frequent rate and with less regard to the appropriate places to do its business, (i.e. outside or in its litter tray) then your cat may have a urinary health issue. E'),
('Taiwan Pet Companion | Grain-Free Hypoallergenic Cat Food - Sea Fish Wild Berry', 'cat','cat-product10.jpg', '168.23','Kennel Kitchen Chicken and Tuna is ideal for adult cats and kittens. Made with white breast chicken that is mixed with tuna fillets. Free from corn, soy, preservatives and any Artificial flavors. This is one scrumptious meal for your cats and kittens.'),
('Taiwan Pet Companion Cat Food - Fresh Chicken Wild Berry', 'cat','cat-product11.jpeg', '84.23','The Persian breed officially has the longest and densest coat of all cat breeds! That why ROYAL CANIN® Persian Adult Loaf contains a special, exclusive combination of nutrients to help support the skin defence role in maintaining skin health and keeping long-haired coats shiny and glossy.'),
('Taiwan CATPOOL White Cat Butler (Chicken + Duck + Lingzhi Mushroom + Squid Ink + Lysine)', 'cat','cat-product12.jpg', '88.23','The wet meal appeals to the palate of fussy eaters and gives them the delight of relishing a juicy, wholesome meal while strengthening them from the inside.'),
('Authority® Sensitive Stomach & Skin All Life Stage Dry Dog Food', 'dog','dog-product01.jpg', '87.53','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds. '),
('Bakers Adult Dry Dog Food Beef and Veg 12kg', 'dog','dog-product02.jpg', '153.53','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds. '),
('Grain-Free Salmon Recipe Dog Food', 'dog','dog-product03.jpg', '127.03','Healthy Pet food - Adult is a complete and balanced food with over 20 nutrients, vitamins, and minerals, which provides a perfect balance of nutrition and is fortified with herbs for additional health benefits for adult dogs.'),
('IAMS Adult Minichunks Small Kibble High Protein Dry Dog Food','dog', 'dog-product04.jpg', '36.50','Suitable for dogs over 10 months old, ROYAL CANIN® Shih Tzu Adult is specially formulated with all the nutritional needs of your adult Shih Tzu in mind.ROYAL CANIN® Shih Tzu Adult contains an exclusive combination of nutrients that help to maintain your dog skin health – which in turn positively affects the health of its coat. '),
('Royal Canin Gastrointestinal Low Fat Loaf in Sauce Adult Dog Wet Food', 'dog','dog-product05.png', '99.43','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds.'),
('Royal Canin® Veterinary Diet Hydrolyzed Protein HP Adult Dog Dry Food', 'dog','dog-product06.png', '87.00','ROYAL CANIN® Mini Puppy food is formulated with the nutritional needs of your puppy in mind and is suitable for puppies aged 2-10 months that will have an adult weight of up to 10kg. Your puppy growth period is such an essential stage in its life; it the time of big changes and new discoveries.'),
('Orijen Grain-Free Chicken Recipe | Adult/Kitten Dry Food 1.8kg/5.4kg', 'dog','dog-product07.png', '27.00','Healthy Pet food - Adult is a complete and balanced food with over 20 nutrients, vitamins, and minerals, which provides a perfect balance of nutrition and is fortified with herbs for additional health benefits for adult dogs.'),
('Pure Balance Chicken & Pea Recipe Dry Dog Food, Grain-Free, 24 lbs', 'dog','dog-product08.png', '87.00','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds.'),
('Royal Canin Starter Medium Breed Mother & Babydog Dry Dog Food','dog', 'dog-product09.png', '37.53','ROYAL CANIN® Mini Puppy food is formulated with the nutritional needs of your puppy in mind and is suitable for puppies aged 2-10 months that will have an adult weight of up to 10kg. Your puppy growth period is such an essential stage in its life; it the time of big changes and new discoveries.'),
('Royal Canin German Shepherd Puppy Dry Dog Food', 'dog','dog-product10.png', '107.33','Suitable for dogs over 10 months old, ROYAL CANIN® Shih Tzu Adult is specially formulated with all the nutritional needs of your adult Shih Tzu in mind.ROYAL CANIN® Shih Tzu Adult contains an exclusive combination of nutrients that help to maintain your dog skin health – which in turn positively affects the health of its coat. '),
('Royal Canin Golden Retriever Adult Dry Dog Food','dog', 'dog-product12.png', '45.89','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds. '),
('Royal Canin Giant Junior Dry Dog Food', 'dog','dog-product12.png', '67.23','The best dry dog food is one that is complete, balanced, tasty, and wholesome. At Petsy, choose from healthy dry dog food brands with the best offers that fit your budget and dog’s health requirements. In addition to stocking top dry dog foods, at Petsy, you can also find the best dry dog foods for Shih Tzus, Labradors, Beagles, German Shepherds, and other breeds. '),
('sup House for Outdoor Cats in Winter', 'sup','sup-product01.png', '187.53','A dog crate is used for several reasons, whether it is  to keep curious puppers in a safe area or to provide a warm and safe space for an adult dog. The best dog crate brands ensure comfort, security, and are easy to assemble and disassemble. '),
('LifeLodge Premium sup Houses for Outdoor Cats Insulated', 'sup','sup-product02.png', '207.00','A dog crate is used for several reasons, whether it is  to keep curious puppers in a safe area or to provide a warm and safe space for an adult dog. The best dog crate brands ensure comfort, security, and are easy to assemble and disassemble. '),
('Dog House Indoor Memory Sponge', 'sup','sup-product03.png', '139.00','A dog crate is used for several reasons, whether it is  to keep curious puppers in a safe area or to provide a warm and safe space for an adult dog. The best dog crate brands ensure comfort, security, and are easy to assemble and disassemble. '),
('Sup Princess Indoor Tent House', 'sup','sup-product04.png', '123.00','Bringing you the best selection of Pet toys for your beloved pets to keep them engaged and happy in their time away from you. At BASIL, we ensure that the toys are of standard quality, Non-toxic for safety of pets and their delight. We make sure that their tail wag continues and do pause at any moment with our delightful offering of toys.'),
('Dog and sup pop Play Pen,Pets Houses for Dogs and Cats', 'sup','sup-product05.png', '347.00','Trixie scratching post protects your upholstery and carpets from your cat natural scratching habit. It has a good value and high quality design. Sharpening their claws is very important for cats. It has a large scratching area made of durable sisal, prevents your cat from scratching wallpaper and furniture.'),
('Pet Supplies & Accessories Over-the-Door Storage Organizer', 'sup','sup-product06.png', '237.50','Scratching is a normal feline behavior. Cats scratch to mark their territory with the scent released from their paw pads every time they scratch. They also scratch to condition their claws, which means if there aren’t enough scratching outlets at home, they’d turn to your sofa, curtains, and beds. '),
('DownyPaws sup Cave Beds for Indoor Cats','sup', 'sup-product07.png', '87.50','Scratching is a normal feline behavior. Cats scratch to mark their territory with the scent released from their paw pads every time they scratch. They also scratch to condition their claws, which means if there aren’t enough scratching outlets at home, they’d turn to your sofa, curtains, and beds. '),
('Outdoor sup House Insulated Weatherproof Feral sup Shelter', 'sup','sup-product08.png', '205.33','A lenient, comfortable take on harness design, Barkbutler x Whoof Whoof Mesh Harness + Leash are made from soft breathable cushions which put little to no pressure on a dog coat. Durable metal clips and ropes are robust and effective. Padded handle provides ease of control and handling, and prevents strain on the fingers.'),
('Basil Dog Bowls - Heavy Dish Anti-Skid Steel','sup', 'sup-product11.png', '137.00','Make walk time stylish with this beautifully crafted leash. It pairs perfectly with the matching harness and collar or can be used on its own.'),
('Nina Ottosson by Outward Hound Multi Puzzle Interactive Dog Puzzle - Level 4', 'sup','sup-product12.png', '123.00','Bringing you the best selection of Pet toys for your beloved pets to keep them engaged and happy in their time away from you. At BASIL, we ensure that the toys are of standard quality, Non-toxic for safety of pets and their delight. We make sure that their tail wag continues and do pause at any moment with our delightful offering of toys.'),
('Trixie Protective Collar with Velcro Fastener (E-Collars for Dogs)','sup', 'sup-product09.png', '71.00', 'Every pet owner wants to provide their pets with the best quality products to keep them healthy and happy. By choosing a basic bowl they are assured of meeting all the essential requirements in one product as our products are free from all doubts and complete on purity. The bowls are high on quality and assure you of being made using the best ingredients with the pure intention of pet welfare. Our bowls are 100% food grade and last for a lifetime of pets, durability is the first priority and we stand by what our customers expect from a product. We work on international standards to provide best in class products to our clients.'),
('Trixie Lightweight Foldable Cat & Dog Step Stairs', 'sup','sup-product10.png', '13.53', 'The Nina Ottosson by Outward Hound MultiPuzzle level 4 interactive dog puzzle toy will keep your dog entertained for hours as they use their natural hunting skills to seek out the hidden treats! Your pups favorite dog treats or kibble can be hidden in the outer and central compartments by sliding the puzzle pieces and let the games begin! This puzzle is ideal for dogs who have already mastered levels 1-3 of the Nina Ottosson puzzle line. Made from tough plastic parts and food safe materials that are BPA, PVC, and phthalate-free. Hand Wash with soap and water to clean.');

COMMIT;

-- CREATE TABLE IF NOT EXISTS `products_dog` (
--   `product_id` int(5) NOT NULL AUTO_INCREMENT,
--   `product_name` varchar(100) NOT NULL,
--   `product_image` varchar(255) NOT NULL,
--   `product_price` decimal(6,2) NOT NULL,
--   `product_detail` varchar(500) NOT NULL,
--   PRIMARY KEY(`product_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERT INTO `products_dog` ( `product_name`, `product_image`, `product_price`,`product_detail`) VALUES
-- ('Authority® Sensitive Stomach & Skin All Life Stage Dry Dog Food', 'dog-product01.jpg', '87.53'),
-- ('Bakers Adult Dry Dog Food Beef and Veg 12kg', 'dog-product02.jpg', '153.53'),
-- ('Grain-Free Salmon Recipe Dog Food', 'dog-product03.png', '127.03'),
-- ('IAMS Adult Minichunks Small Kibble High Protein Dry Dog Food', 'dog-product04.png', '36.50'),
-- ('Royal Canin Gastrointestinal Low Fat Loaf in Sauce Adult Dog Wet Food', 'dog-product05.png', '99.43'),
-- ('Royal Canin® Veterinary Diet Hydrolyzed Protein HP Adult Dog Dry Food', 'dog-product06.png', '87.00'),
-- ('Orijen Grain-Free Chicken Recipe | Adult/Kitten Dry Food 1.8kg/5.4kg', 'dog-product07.png', '27.00'),
-- ('Pure Balance Chicken & Pea Recipe Dry Dog Food, Grain-Free, 24 lbs', 'dog-product08.png', '87.00'),
-- ('Royal Canin Starter Medium Breed Mother & Babydog Dry Dog Food', 'dog-product09.png', '37.53'),
-- ('Royal Canin German Shepherd Puppy Dry Dog Food', 'dog-product10.png', '107.33'),
-- ('Royal Canin Golden Retriever Adult Dry Dog Food', 'dog-product12.png', '45.89'),
-- ('Royal Canin Giant Junior Dry Dog Food', 'dog-product12.png', '67.23');

-- COMMIT;


-- CREATE TABLE IF NOT EXISTS `products_sup` (
--   `product_id` int(5) NOT NULL AUTO_INCREMENT,
--   `product_name` varchar(100) NOT NULL,
--   `product_image` varchar(255) NOT NULL,
--   `product_price` decimal(6,2) NOT NULL,
--   `product_detail` varchar(500) NOT NULL,
--   PRIMARY KEY(`product_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERT INTO `products_sup` ( `product_name`, `product_image`, `product_price`,  `product_detail`) VALUES
-- ('sup House for Outdoor Cats in Winter', 'sup-product01.png', '187.53'),
-- ('LifeLodge Premium sup Houses for Outdoor Cats Insulated', 'sup-product02.png', '207.00'),
-- ('Dog House Indoor Memory Sponge', 'sup-product03.png', '139.00'),
-- ('Sup Princess Indoor Tent House', 'sup-product04.png', '123.00'),
-- ('Dog and sup pop Play Pen,Pets Houses for Dogs and Cats', 'sup-product05.png', '347.00'),
-- ('Pet Supplies & Accessories Over-the-Door Storage Organizer', 'sup-product06.png', '237.50'),
-- ('DownyPaws sup Cave Beds for Indoor Cats', 'sup-product07.png', '87.50'),
-- ('Outdoor sup House Insulated Weatherproof Feral sup Shelter', 'sup-product08.png', '205.33'),
-- ('Basil Dog Bowls - Heavy Dish Anti-Skid Steel', 'sup-product09.png', '137.00'),
-- ('Nina Ottosson by Outward Hound Multi Puzzle Interactive Dog Puzzle - Level 4', 'sup-product10.png', '123.00'),
-- ('Trixie Protective Collar with Velcro Fastener (E-Collars for Dogs)', 'sup-product11.png', '71.00', 'Every pet owner wants to provide their pets with the best quality products to keep them healthy and happy. By choosing a basic bowl they are assured of meeting all the essential requirements in one product as our products are free from all doubts and complete on purity. The bowls are high on quality and assure you of being made using the best ingredients with the pure intention of pet welfare. Our bowls are 100% food grade and last for a lifetime of pets, durability is the first priority and we stand by what our customers expect from a product. We work on international standards to provide best in class products to our clients.'),
-- ('Trixie Lightweight Foldable Cat & Dog Step Stairs', 'sup-product12.png', '13.53', 'The Nina Ottosson by Outward Hound MultiPuzzle level 4 interactive dog puzzle toy will keep your dog entertained for hours as they use their natural hunting skills to seek out the hidden treats! Your pups favorite dog treats or kibble can be hidden in the outer and central compartments by sliding the puzzle pieces and let the games begin! This puzzle is ideal for dogs who have already mastered levels 1-3 of the Nina Ottosson puzzle line. Made from tough plastic parts and food safe materials that are BPA, PVC, and phthalate-free. Hand Wash with soap and water to clean.');

-- COMMIT;
