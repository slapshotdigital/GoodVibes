mysql> create table forum_topics (
    -> topic_id int not null primary key auto_increment,
    -> topic_title varchar (150),
    -> topic_create_time datetime,
    -> topic_owner varchar (150)
    -> );
Query OK, 0 rows affected (0.03 sec)

mysql> create table forum_posts (
    -> post_id int not null primary key auto_increment,
    -> topic_id int not null,
    -> post_text text,
    -> post_create_time datetime,
    -> post_owner varchar (150)
    -> );
Query OK, 0 rows affected (0.00 sec)
