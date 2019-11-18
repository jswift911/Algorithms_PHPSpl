-- Создаём структуру, дерева, какой оно является в режиме AL
DROP TABLE IF EXISTS tree;

CREATE TABLE tree (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    level INT(10) NOT NULL DEFAULT 0,
    lft INT(10) NOT NULL DEFAULT 0,
    rgt INT(10) NOT NULL DEFAULT 0
);

INSERT INTO tree (title, level, lft, rgt) VALUES
('Одежда', 0, 1, 16),
('Брюки', 1, 2, 5),
('Платья', 1, 6, 13),
('Юбки', 1, 14, 15),
('Клёш', 2, 3, 4),
('Футляр', 2, 7, 8),
('В пол', 2, 9, 12),
('С открытыми плечами', 3, 10, 11);

