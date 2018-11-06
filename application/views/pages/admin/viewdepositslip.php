<?php include_once("application/views/languages/en.php");?> 
<div class="modal-content">
  
  <div class="modal-body">
    <p>
    <?php
      echo '<img src="data:image/png;base64,'.base64_encode($info['deposit_slip']).'" alt="' . $info['deposit_slip_filename'] . '" style="height:400px;width:800px;"/>';
    ?>
    </p>
  </div>
</div>