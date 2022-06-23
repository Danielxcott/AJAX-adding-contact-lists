<div class="card-column mt-3">
        <?php
            require_once "base.php";
            $sql = "SELECT * FROM contacts ORDER BY id DESC";
            $query = mysqli_query(conSql(),$sql);
            while($row = mysqli_fetch_assoc($query)){?>
            <div>
            <div class="card contact" id="c-<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">
            <div class="card-body">
                <h3><?php echo $row['name'] ?> <i class="fas fa-user"></i> </h3> 
                <p>Num - <?php echo $row['phone'] ?></p>
                <div>
                <button class="btn btn-outline-warning edit" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button class="btn btn-outline-danger del" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                </div>
            </div>
            </div>
            </div>
            <?php }?>
              </div>

