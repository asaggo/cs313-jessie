SELECT * FROM chef c INNER JOIN recipe r on c.id = r.chef_id;
SELECT * FROM dish d INNER JOIN recipe r on d.id = r.dish_id;
SELECT * FROM country ct INNER JOIN recipe r on ct.id = r.country_id;
SELECT * FROM material m INNER JOIN recipe r on m.id = r.material_id;
SELECT * FROM level l INNER JOIN recipe r on l.id = r.level_id;

GRANT SELECT, INSERT, UPDATE ON ALL TABLES IN SCHEMA public TO asaggo;
GRANT DELETE ON ALL TABLES IN SCHEMA public to asaggo;