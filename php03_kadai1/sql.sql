$udpate = $pdo->prepare(" * FROM gs_an_table WHERE id=:id");

UPDATE gs_an_table SET name='デビル一野辺',email='devil@test.jp' WHERE id = 1;

UPDATE gs_an_table SET name=:name,email=:email,naiyou=:naiyou WHERE id=:id;

DELETE FROM gs_an_table WHERE id=:id;