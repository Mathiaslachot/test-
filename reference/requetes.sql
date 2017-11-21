-- script executable autant de fois que vous le voulez sur un table vide
-- ajouter
INSERT INTO `livre` (`titre`, `resume`) VALUES ('O', 'Aaaaah');
-- lister
SELECT `id`, `titre`, `resume` FROM `livre`;
-- modifier
UPDATE `livre` SET `titre` = 'Ooooo', `resume` = 'ahhhhahhhhhhh' WHERE `id` = 1 LIMIT 1;
-- visualiser
SELECT `id`, `titre`, `resume` FROM `livre` WHERE `id` = 1;
-- supprimer
DELETE FROM `livre` WHERE `id` = 1 LIMIT 1;
-- truncate (vidage de table)
TRUNCATE TABLE `livre`;
