 <?php if ($materials): ?>
        <div class="row">
        <?php foreach ($materials as $m): ?>
                <div class="col-md-4 portfolio-item">
                    <a href="#" onclick="purchaseProduct(<?php echo $m->id?>)">
                        <center><img class="img-responsive" src="http://localhost/jewelry_api/files/<?php echo $m->materialimage; ?>" alt="" style="width:150px;height:150px;"></center>
                    </a>
                    <h3>
                       <center> <?php echo $m->materialname ?></center>
                    </h3>
                </div>
        <?php endforeach ?>
        </div>

 <?php endif ?>
