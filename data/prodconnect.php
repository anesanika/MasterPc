<?php 
$pdo1 = new PDO('mysql:host=localhost; dbname=pc_parts', 'root', '');
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
