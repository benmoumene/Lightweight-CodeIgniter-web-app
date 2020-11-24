TYPE=VIEW
query=(select `sales_db`.`article`.`id` AS `id`,`sales_db`.`article`.`no_cpte` AS `no_cpte`,`sales_db`.`article`.`name` AS `name`,`sales_db`.`article`.`code` AS `code`,`sales_db`.`Categorie`.`name` AS `Categorie_name`,`sales_db`.`categorie`.`name` AS `categorie_name` from ((`sales_db`.`article` join `sales_db`.`Categorie` on((`sales_db`.`article`.`Categorie` = `sales_db`.`Categorie`.`id`))) join `sales_db`.`categorie` on((`sales_db`.`article`.`categorie` = `sales_db`.`categorie`.`id`))))
md5=5f4d59aad6dd3f8ae9e26e57790646a9
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=1
with_check_option=0
timestamp=2018-11-28 18:21:09
create-version=1
source=(select `article`.`id` AS `id`,`article`.`no_cpte` AS `no_cpte`,`article`.`name` AS `name`,`article`.`code` AS `code`,`Categorie`.`name` AS `Categorie_name`,`categorie`.`name` AS `categorie_name` from ((`article` join `Categorie` on((`article`.`Categorie` = `Categorie`.`id`))) join `categorie` on((`article`.`categorie` = `categorie`.`id`))))
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_general_ci
view_body_utf8=(select `sales_db`.`article`.`id` AS `id`,`sales_db`.`article`.`no_cpte` AS `no_cpte`,`sales_db`.`article`.`name` AS `name`,`sales_db`.`article`.`code` AS `code`,`sales_db`.`Categorie`.`name` AS `Categorie_name`,`sales_db`.`categorie`.`name` AS `categorie_name` from ((`sales_db`.`article` join `sales_db`.`Categorie` on((`sales_db`.`article`.`Categorie` = `sales_db`.`Categorie`.`id`))) join `sales_db`.`categorie` on((`sales_db`.`article`.`categorie` = `sales_db`.`categorie`.`id`))))
