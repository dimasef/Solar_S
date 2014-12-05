create user 'solar'@'%' identified by 'test_pass';
grant all privileges on solar_system.* to 'solar'@'%'with grant option;
