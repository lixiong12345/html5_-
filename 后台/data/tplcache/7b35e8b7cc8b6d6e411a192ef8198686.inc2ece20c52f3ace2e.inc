<?php
$z[0]=Array("field","",91,119);
$z[0][4]['name']="typeurl";
$z[1]=Array("field","",121,150);
$z[1][4]['name']="typename";
$z[2]=Array("sql","\r\n                    <li class=\"f144873517860\"> <a class=\"f144873517861\" href=\"[field:typedir function='str_replace(\"{cmspath}\",\"\",@me)'/]\">[field:typename/]</a>\r\n                      </li>\r\n",208,513);
$z[2][4]['sql']="Select * from dede_arctype where reid=~id~ and ishidden != 1 ORDER BY id limit 0,20";

?>