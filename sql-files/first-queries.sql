select * from db_main.tb_funcionarios;

insert into db_main.tb_funcionarios values(0,"Shell","00023232200");
insert into db_main.tb_funcionarios values(0,"Mary","5465d4");
insert into db_main.tb_funcionarios values(0,"An","312321312321");
insert into db_main.tb_funcionarios values(0,"Joey","33322");

delete from db_main.tb_funcionarios where db_main.tb_funcionarios.id=6;
select db_main.tb_funcionarios.name as Nome from db_main.tb_funcionarios where name like "J%"; 
select db_main.tb_funcionarios.name as Nome from db_main.tb_funcionarios where id="8"; 