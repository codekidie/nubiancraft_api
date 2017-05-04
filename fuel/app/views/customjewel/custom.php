 <?php if ($customjewels): ?>
        <div class="row">
        <?php foreach ($customjewels as $m): ?>
                <div class="col-md-4 portfolio-item">
                    <a href="#" onclick="purchase3dProduct(<?php echo $m->id?>)">
                         <h3>
                               <center> <?php echo $m->materialname ?></center>
                            </h3>
                    </a>
                </div>
        <?php endforeach ?>
        </div>

 <?php endif ?>
