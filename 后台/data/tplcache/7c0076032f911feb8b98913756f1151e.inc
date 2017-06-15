<li class="f144873517857 {dede:field.currentstyle/}">
        <h3 class="f144873517858"><a class="BY5maaxCdj" href="{dede:field name='typeurl'/}">{dede:field name='typename'/}</a></h3>
                <ul class="f144873517859">

 {dede:sql sql='Select * from dede_arctype where reid=~id~  and ishidden != 1 ORDER BY id limit 0,20'}
                    <li class="f144873517860"> <a class="f144873517861" href="[field:typedir function='str_replace("{cmspath}","",@me)'/]">[field:typename/]</a>
                      </li>
{/dede:sql}

                  </ul>
              </li>