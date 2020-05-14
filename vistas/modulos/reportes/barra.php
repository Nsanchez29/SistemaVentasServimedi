<div class="progress">

  <div class="progress-bar progress-bar-<?php

      $total = abs($ventas['total']/$compras['total'])*100;

      if ($total >= 0 && $total <= 50) {

        echo 'danger';

      }elseif ($total >= 51 && $total <= 99) {

        echo 'warning';

      }else{

        echo 'green';

      }

      ?>" style="width:
        
      <?php

      $total = abs($ventas['total']/$compras['total'])*100;

      if ($total <= 99) {

        echo $total;

      }else{

        echo '100';

      }

      ?>%"><?php

      $total = number_format((abs($ventas['total']/$compras['total'])*100),2);

      if ($total <= 99) {

        echo $total;
        echo '%';

      }else{

        echo 'COMPLETADO: Q'.number_format($ventas["total"]-$compras["total"]).' de utilidad';

      }

      ?>

    </div>

</div>