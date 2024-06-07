DELETE FROM `stocks` 
WHERE `id` NOT IN 
(SELECT DISTINCT `stock_id` FROM `availabilities`);

DELETE FROM `categories` 
WHERE `id` NOT IN 
(SELECT DISTINCT `category_id` FROM `products`);

DELETE FROM `products` 
WHERE `id` NOT IN 
(SELECT DISTINCT `product_id` FROM `availabilities`);
