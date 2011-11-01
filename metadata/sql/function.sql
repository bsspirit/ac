CREATE FUNCTION `getChildLst`(rootId INT)
    RETURNS varchar(1000)
    BEGIN
      DECLARE sTemp VARCHAR(1000);
      DECLARE sTempChd VARCHAR(1000);
    
      SET sTemp = '$';
      SET sTempChd =cast(rootId as CHAR);
    
      WHILE sTempChd is not null DO
        SET sTemp = concat(sTemp,',',sTempChd);
        SELECT group_concat(sid) INTO sTempChd FROM t_ac_catalog_rel where FIND_IN_SET(pid,sTempChd)>0;
      END WHILE;
      RETURN sTemp;
    END