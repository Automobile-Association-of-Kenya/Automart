INSERT INTO
    makes (make)
VALUES
    ('Toyota'),
    ('Honda'),
    ('Ford'),
    ('Chevrolet'),
    ('Nissan'),
    ('Volkswagen'),
    ('Mercedes-Benz'),
    ('BMW'),
    ('Audi'),
    ('Kia'),
    ('Subaru'),
    ('Hyundai'),
    ('Lexus'),
    ('Mazda'),
    ('Volvo'),
    ('Jeep'),
    ('Porsche'),
    ('Tesla'),
    ('Acura'),
    ('Mitsubishi'),
    ('Suzuki'),
    ('Renault'),
    ('Peugeot'),
    ('Fiat'),
    ('Jaguar'),
    ('Land Rover'),
    ('Mini'),
    ('Rolls-Royce'),
    ('Lamborghini'),
    ('Ferrari'),
;

insert into
    `car_models` (`make_id`, `name`)

SELECT
    *
FROM
    `car_makes`
WHERE
    (`car_makes`.`car_make_id` = 1)
    OR (`car_makes`.`car_make_id` = 2)
    OR (`car_makes`.`car_make_id` = 3)
    OR (`car_makes`.`car_make_id` = 4)
    OR (`car_makes`.`car_make_id` = 5)
    OR (`car_makes`.`car_make_id` = 6)
    OR (`car_makes`.`car_make_id` = 7)
    OR (`car_makes`.`car_make_id` = 8)
    OR (`car_makes`.`car_make_id` = 9)
    OR (`car_makes`.`car_make_id` = 10)
    OR (`car_makes`.`car_make_id` = 11)
    OR (`car_makes`.`car_make_id` = 12)
    OR (`car_makes`.`car_make_id` = 13)
    OR (`car_makes`.`car_make_id` = 14)
    OR (`car_makes`.`car_make_id` = 15)
    OR (`car_makes`.`car_make_id` = 16)
    OR (`car_makes`.`car_make_id` = 17)
    OR (`car_makes`.`car_make_id` = 18)
    OR (`car_makes`.`car_make_id` = 19)
    OR (`car_makes`.`car_make_id` = 20)
    OR (`car_makes`.`car_make_id` = 21)
    OR (`car_makes`.`car_make_id` = 22)
    OR (`car_makes`.`car_make_id` = 23)
    OR (`car_makes`.`car_make_id` = 24)
    OR (`car_makes`.`car_make_id` = 25)
    OR (`car_makes`.`car_make_id` = 26)
    OR (`car_makes`.`car_make_id` = 27)
    OR (`car_makes`.`car_make_id` = 28)
    OR (`car_makes`.`car_make_id` = 29)
    OR (`car_makes`.`car_make_id` = 30)
    OR (`car_makes`.`car_make_id` = 31)
    OR (`car_makes`.`car_make_id` = 32)
    OR (`car_makes`.`car_make_id` = 33)
    OR (`car_makes`.`car_make_id` = 34)
    OR (`car_makes`.`car_make_id` = 35)
    OR (`car_makes`.`car_make_id` = 36)
    OR (`car_makes`.`car_make_id` = 37)
    OR (`car_makes`.`car_make_id` = 50)
