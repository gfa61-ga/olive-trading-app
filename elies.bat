C:\elies\bin\mysql\mysql5.5.8\bin\mysqldump -u root -pdelta5 -c -e --default-character-set=utf8 --single-transaction --skip-set-charset --add-drop-database -B elies -r dbdump.sql

ssed -e "s/DEFAULT CHARACTER SET latin1/DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci/" dbdump.sql | ssed -e "s/DEFAULT CHARSET=latin1/DEFAULT CHARSET=utf8/" >dbdump_w.sql
C:\elies\bin\mysql\mysql5.5.8\bin\mysql -u root -pdelta5 elies < dbdump_w.sql
