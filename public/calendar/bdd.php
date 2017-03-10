<?php
try
{
	$bdd = new PDO('mysql:host=g5s2aw.sdslab.cat;dbname=g5s2aw_boscofp;charset=utf8', 'g5s2aw_root', '12345aA');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
