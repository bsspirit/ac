use aocheng;

#一级分类
insert into t_ac_catalog(id,name) values(1,"产品介绍");
insert into t_ac_catalog(id,name) values(2,"节能环保");
insert into t_ac_catalog(id,name) values(3,"施工安装");
insert into t_ac_catalog(id,name) values(4,"保养维修");
insert into t_ac_catalog(id,name) values(5,"工程案例");
insert into t_ac_catalog(id,name) values(6,"行业新闻");
insert into t_ac_catalog(id,name) values(7,"首 页");
insert into t_ac_catalog(id,name) values(8,"公司简介");
insert into t_ac_catalog(id,name) values(9,"招聘信息");
insert into t_ac_catalog(id,name) values(10,"联系我们");

#二级分类
insert into t_ac_catalog(id,name) values(11,"主机设备 ");
insert into t_ac_catalog(id,name) values(12,"末端设备");
insert into t_ac_catalog(id,name) values(13,"周边设备");
insert into t_ac_catalog(id,name) values(14,"零部件");
insert into t_ac_catalog(id,name) values(15,"机房安装");
insert into t_ac_catalog(id,name) values(16,"系统安装");
insert into t_ac_catalog(id,name) values(17,"主机设备保养");
insert into t_ac_catalog(id,name) values(18,"其他设备保养 ");
insert into t_ac_catalog(id,name) values(19,"末端设备保养");
insert into t_ac_catalog(id,name) values(20,"文化设施项目");
insert into t_ac_catalog(id,name) values(21,"生物医药设施");
insert into t_ac_catalog(id,name) values(22,"工业设施");
insert into t_ac_catalog(id,name) values(23,"公共设施 ");
insert into t_ac_catalog(id,name) values(24,"体育场馆");

#三级分类
insert into t_ac_catalog(id,name) values(25,"离心机 ");
insert into t_ac_catalog(id,name) values(26,"螺杆机");
insert into t_ac_catalog(id,name) values(27,"活塞机");
insert into t_ac_catalog(id,name) values(28,"溴化锂机组");
insert into t_ac_catalog(id,name) values(29,"风冷机组");
insert into t_ac_catalog(id,name) values(30,"水泵");
insert into t_ac_catalog(id,name) values(31,"冷却塔");
insert into t_ac_catalog(id,name) values(32,"冷冻油及溶液 ");
insert into t_ac_catalog(id,name) values(33,"维修保养介绍");
insert into t_ac_catalog(id,name) values(34,"其它");


#上下级关系
insert into t_ac_catalog_rel(pid,sid) values(0,1);
insert into t_ac_catalog_rel(pid,sid) values(0,2);
insert into t_ac_catalog_rel(pid,sid) values(0,3);
insert into t_ac_catalog_rel(pid,sid) values(0,4);
insert into t_ac_catalog_rel(pid,sid) values(0,5);
insert into t_ac_catalog_rel(pid,sid) values(0,6);
insert into t_ac_catalog_rel(pid,sid) values(0,7);
insert into t_ac_catalog_rel(pid,sid) values(0,8);
insert into t_ac_catalog_rel(pid,sid) values(0,9);
insert into t_ac_catalog_rel(pid,sid) values(0,10);

insert into t_ac_catalog_rel(pid,sid) values(1,11);
insert into t_ac_catalog_rel(pid,sid) values(1,12);
insert into t_ac_catalog_rel(pid,sid) values(1,13);
insert into t_ac_catalog_rel(pid,sid) values(1,14);
insert into t_ac_catalog_rel(pid,sid) values(3,15);
insert into t_ac_catalog_rel(pid,sid) values(3,16);
insert into t_ac_catalog_rel(pid,sid) values(4,17);
insert into t_ac_catalog_rel(pid,sid) values(4,18);
insert into t_ac_catalog_rel(pid,sid) values(4,19);
insert into t_ac_catalog_rel(pid,sid) values(5,20);
insert into t_ac_catalog_rel(pid,sid) values(5,21);
insert into t_ac_catalog_rel(pid,sid) values(5,22);
insert into t_ac_catalog_rel(pid,sid) values(5,23);
insert into t_ac_catalog_rel(pid,sid) values(5,24);

insert into t_ac_catalog_rel(pid,sid) values(17,25);
insert into t_ac_catalog_rel(pid,sid) values(17,26);
insert into t_ac_catalog_rel(pid,sid) values(17,27);
insert into t_ac_catalog_rel(pid,sid) values(17,28);
insert into t_ac_catalog_rel(pid,sid) values(17,29);
insert into t_ac_catalog_rel(pid,sid) values(18,30);
insert into t_ac_catalog_rel(pid,sid) values(18,31);
insert into t_ac_catalog_rel(pid,sid) values(18,32);
insert into t_ac_catalog_rel(pid,sid) values(18,33);
insert into t_ac_catalog_rel(pid,sid) values(18,34);








