 <?php
require_once('Dao.php');
$dao= new Dao('myDB');



         ?>
           <div>
         <form id="check" method="POST" action="ab.php">
          <div id="flex-table">
              <table border="2px" style="background-color: #222;color: #FFF"><thead style="background-color: #00f;color: #FFF"><tr><th>X</th>
                    <?php
                      foreach (ucfirst('reserv')::getColumn() as $v) {
                        echo "<th>$v</th>";
                      }

                    ?>
                </thead><tbody>
          <?php
                    $list=$dao->getList('reserv');
        for($i=0;$i<count($list);$i++)
        {
          ?><tr><td><input type='checkbox' name='<?php echo $list[$i]->getPrimaryKey();?>'></td>
                        <td><input type='hidden' name='x' value='<?php echo $list[$i]->getPrimaryKey();?>'>
                        </td>     
          <?php
          foreach (ucfirst('reserv')::getAttr() as  $v2) {
                    if ($v2=='getPhoto') {
                       echo "<td><img src ='".$list[$i]->$v2()."' width=100/></td>";
                    }
            else echo "<td>".$list[$i]->$v2()."</td>";
          }
                
        }
                ?></tr></tbody>
            </table>
                    </div>
                  <input type="submit" name="Ajouter" value="Ajouter">
                    

                </form>
                </div>
             

             <?php

                

             ?>
    

