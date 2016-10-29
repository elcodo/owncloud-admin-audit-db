This is modified Admin Audit app for Nextcloud / Owncloud.

Tested on Nextcloud 10.
Currently it only logs to database without any preview. You can use tools like Power BI to access and represent data.

It requires to create DB table:

```sql
CREATE TABLE `oc_admin_audit_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL DEFAULT '',
  `time` datetime DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `params` text,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
```
