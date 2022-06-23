<div class="card-column mt-3">
        <?php
            require_once "base.php";
            $sql = "SELECT * FROM contacts ORDER BY id DESC";
            $query = mysqli_query(conSql(),$sql);
            while($row = mysqli_fetch_assoc($query)){?>
            <div>
            <div class="card">
            <div class="card-body">
                <h3><?php echo $row['name'] ?> <i class="fas fa-user"></i> </h3> 
                <p>Num - <?php echo $row['phone'] ?></p>
            </div>
            </div>
            </div>
            <?php }?>
              </div>

