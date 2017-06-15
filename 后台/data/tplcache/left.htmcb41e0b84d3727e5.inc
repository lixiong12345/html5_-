<?php
$z[0]=Array("type","\r\n        <div class=\"f144873517853\"> [field:typename/]</div>\r\n",102,199);
$z[0][4]['typeid']="9";
$z[1]=Array("channelartlist","\r\n            <li class=\"f144873517857 {dede:field.currentstyle/}\">\r\n        <h3 class=\"f144873517858\"><a class=\"BY5maaxCdj\" href=\"{dede:field name='typeurl'/}\">{dede:field name='typename'/}</a></h3>\r\n                <ul class=\"f144873517859\">\r\n\r\n {dede:sql sql='Select * from dede_arctype where reid=~id~  and ishidden != 1 ORDER BY id limit 0,20'}\r\n                    <li class=\"f144873517860\"> <a class=\"f144873517861\" href=\"[field:typedir function='str_replace(\"{cmspath}\",\"\",@me)'/]\">[field:typename/]</a>\r\n                      </li>\r\n{/dede:sql}\r\n\r\n                  </ul>\r\n              </li>\r\n",408,1097);
$z[1][4]['typeid']="9";
$z[1][4]['currentstyle']="on";

?>