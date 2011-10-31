use aocheng;

#一级分类
insert into t_ac_catalog(id,name,path) values(1,"产品介绍","/prod/intro");
insert into t_ac_catalog(id,name,path) values(2,"节能环保","/prod/saving");
insert into t_ac_catalog(id,name,path) values(3,"施工安装","/prod/setup");
insert into t_ac_catalog(id,name,path) values(4,"保养维修","/prod/maintain");
insert into t_ac_catalog(id,name,path) values(5,"工程案例","/prod/case");
insert into t_ac_catalog(id,name,path) values(6,"行业新闻","/prod/news");
insert into t_ac_catalog(id,name,path) values(7,"首 页","/default/index");
insert into t_ac_catalog(id,name,path) values(8,"公司简介","/site/about");
insert into t_ac_catalog(id,name,path) values(9,"招聘信息","/site/job");
insert into t_ac_catalog(id,name,path) values(10,"联系我们","/site/contact");

#二级分类
insert into t_ac_catalog(id,name,path) values(11,"主机设备 ","/prod/intro/cid/11");
insert into t_ac_catalog(id,name,path) values(12,"末端设备","/prod/intro/cid/12");
insert into t_ac_catalog(id,name,path) values(13,"周边设备","/prod/intro/cid/13");
insert into t_ac_catalog(id,name,path) values(14,"零部件","/prod/setup/cid/14");
insert into t_ac_catalog(id,name,path) values(15,"机房安装","/prod/setup/cid/15");
insert into t_ac_catalog(id,name,path) values(16,"系统安装","/prod/setup/cid/16");
insert into t_ac_catalog(id,name,path) values(17,"主机设备保养","/prod/maintain/cid/17");
insert into t_ac_catalog(id,name,path) values(18,"其他设备保养 ","/prod/maintain/cid/18");
insert into t_ac_catalog(id,name,path) values(19,"末端设备保养","/prod/maintain/cid/19");
insert into t_ac_catalog(id,name,path) values(20,"文化设施项目","/prod/case/cid/20");
insert into t_ac_catalog(id,name,path) values(21,"生物医药设施","/prod/case/cid/21");
insert into t_ac_catalog(id,name,path) values(22,"工业设施","/prod/case/cid/22");
insert into t_ac_catalog(id,name,path) values(23,"公共设施 ","/prod/case/cid/23");
insert into t_ac_catalog(id,name,path) values(24,"体育场馆","/prod/case/cid/24");

#三级分类
insert into t_ac_catalog(id,name,path) values(25,"离心机 ","/prod/maintain/cid/25");
insert into t_ac_catalog(id,name,path) values(26,"螺杆机","/prod/maintain/cid/26");
insert into t_ac_catalog(id,name,path) values(27,"活塞机","/prod/maintain/cid/27");
insert into t_ac_catalog(id,name,path) values(28,"溴化锂机组","/prod/maintain/cid/28");
insert into t_ac_catalog(id,name,path) values(29,"风冷机组","/prod/maintain/cid/29");
insert into t_ac_catalog(id,name,path) values(30,"水泵","/prod/maintain/cid/30");
insert into t_ac_catalog(id,name,path) values(31,"冷却塔","/prod/maintain/cid/31");
insert into t_ac_catalog(id,name,path) values(32,"冷冻油及溶液 ","/prod/maintain/cid/32");
insert into t_ac_catalog(id,name,path) values(33,"维修保养介绍","/prod/maintain/cid/33");
insert into t_ac_catalog(id,name,path) values(34,"其它","/prod/maintain/cid/34");


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








