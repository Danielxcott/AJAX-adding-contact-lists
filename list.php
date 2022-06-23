<table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Control</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                require_once "base.php";

            $sql = "SELECT * FROM contacts ORDER BY id DESC";
            $query = mysqli_query(conSql(),$sql);

            while($row = mysqli_fetch_assoc($query)){?>
                  <tr class="contact" id="c-<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td class="text-nowrap">
                      <button class="btn btn-outline-warning edit" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button class="btn btn-outline-danger del" data-id="<?php echo $row['id'] ?>">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>

