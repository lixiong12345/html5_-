<?php
$z[0]=Array("channelartlist","\r\n  <nav class=\"menu{dede:global name=itemindex runphp=\"yes\"}@me=@me;{/dede:global}\">\r\n   <ul>\r\n    <p class=\"bodytext\"><li>{dede:field name='typename'/}</p>\r\n     <ul>\r\n      \r\n      {dede:sql sql='Select * from dede_arctype where reid=~id~  and ishidden != 1 ORDER BY sortrank limit 0,20'}\r\n      <li><a href=\"[field:typedir function='str_replace(\"{cmspath}\",\"\",@me)'/]\">[field:typename/]</a></li>\r\n      {/dede:sql}  \r\n      \r\n     </ul>\r\n     <p class=\"bodytext\"> \r\n    </li>\r\n    </p>\r\n   </ul>\r\n  </nav>\r\n  ",670,1253);
$z[0][4]['typeid']="1,2";
$z[1]=Array("global","",2961,2987);
$z[1][4]['name']="cfg_powerby";
$z[2]=Array("channel","\r\n    <li><a href=\"[field:typelink/]\">[field:typename/]</a><span>&#124;</span></li>\r\n    ",3024,3169);
$z[2][4]['typeid']="49";
$z[2][4]['type']="son";

?>