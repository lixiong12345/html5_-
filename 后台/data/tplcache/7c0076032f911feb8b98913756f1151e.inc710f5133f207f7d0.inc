<?php
$z[0]=Array("field","",25,51);
$z[0][4]['name']="currentstyle";
$z[1]=Array("field","",117,145);
$z[1][4]['name']="typeurl";
$z[2]=Array("field","",147,176);
$z[2][4]['name']="typename";
$z[3]=Array("sql","\r\n                    <li class=\"f144873517860\"> <a class=\"f144873517861\" href=\"[field:typedir function='str_replace(\"{cmspath}\",\"\",@me)'/]\">[field:typename/]</a>\r\n                      </li>\r\n",234,539);
$z[3][4]['sql']="Select * from dede_arctype where reid=~id~ and ishidden != 1 ORDER BY id limit 0,20";

?>