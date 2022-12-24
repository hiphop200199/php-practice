<div class="navbar-row">
    <div class="w3-center w3-border  w3-card-4  ">
    
  <a href="?page=<?= $page - 1 ?>" class="w3-button  <?= $page == 1 ? 'is-disabled' : '' ?>">&laquo;</a>
  <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
            if ($i >= 1 and $i <= $totalPages) :
          ?>      
  <a href="?page=<?= $i ?>" class="w3-button  <?= $i == $page ? 'w3-green' : '' ?>"><?= $i ?></a>
  <?php endif;
          endfor; ?>
  <a href="?page=<?= $page + 1 ?>" class="w3-button <?= $page == $totalPages ? 'is-disabled' : '' ?>">&raquo;</a>

</div>
    </div>