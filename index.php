<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <style>
    td {
      vertical-align: middle;
    }
    .card-column{
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(20rem,1fr));
      grid-column-gap: 1rem;
      grid-row-gap: 1rem;

    }
  </style>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card my-5">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h4>Contact App</h4>
                <div>
                  <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop"
                  >
                    <i class="fa-solid fa-circle-plus"></i>
                  </button>
                  <button
                    class="btn btn-outline-info"
                    onclick="showList()"
                  >
                    <i class="fa-solid fa-list"></i>
                  </button>
                  <button
                    class="btn btn-outline-secondary"
                    onclick="showGrid()"
                  >
                  <i class="fa-solid fa-grip"></i>                  
                </button>
                </div>
              </div>
                <div class="output">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    
    <div
      class="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Contact <span id="result"></span> </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="save.php" method="post" id="addContact">
                <div class="row g-2">
                    <div class="col-auto">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-auto">
                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone" class="form-control">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>



    <div
  class="modal fade"
  id="edit"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="editLabel"
  aria-hidden="true"
    >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Details <span id="updateCon"></span> </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
      <form action="update.php" method="post" id="updateContact">
                <div class="row g-2">
                <input type="text" id="editId" name="id" class="form-control d-none">
                    <div class="col-auto">
                        <label for="editname">Name</label>
                        <input type="text" id="editname" name="name" class="form-control">
                    </div>
                    <div class="col-auto">
                        <label for="editphone">Phone</label>
                        <input type="number" id="editphone" name="phone" class="form-control">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          </form>
    </div>
  </div>
</div>




    <div
  class="modal fade"
  id="detail"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="detailLabel"
  aria-hidden="true"
    >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailLabel">Details <span id="result"></span> </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
          <h1 class="name-arr"></h1>
          <p >Number - <span class="ph-arr"></span> </p>
    </div>
  </div>
</div>




  </body>

  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script>

    function showList(url){
      $.get("list.php",function(data){
        $(".output").html(data);
      })
    }

    function showGrid(){
      $.get("grid.php",function(data){
        $(".output").html(data);
      })
    }

    $("#addContact").on("submit",function(e){
      e.preventDefault();
      let inputData = $(this).serialize();
      // console.log(inputData);
      $.post($(this).attr("action"),inputData,function(data){
        if(data === 'success'){
          $("#result").html(`<span class="badge rounded-pill bg-success"><i class="fa-solid fa-check"></i></span>`)
          $("input").val("");
          showList();
        }else{
          $("#result").html(`<span class="badge badge-pill badge-danger"><i class="fa-solid fa-xmark"></i></span>`)
        }
      })
    })
    //delete
    $(".output").delegate(".del","click",function(e){
      e.stopPropagation();
      let currentId = $(this).attr("data-id");
      $.get(`delete.php?id=${currentId}`,function(data){
        if(data == "success"){
          showList();
      } 
      })
    })
    //detail
    $(".output").delegate(".contact","click",function(e){
      // e.stopPropagation();
      let currentId = $(this).attr("data-id");
      $.get("detail.php?id="+currentId,function(data){
        let array = JSON.parse(data);
        $(".name-arr").text(array.name);
        $(".ph-arr").text(array.phone);
        $("#detail").modal("show");
      })
    })
    //update
    $(".output").delegate(".edit","click",function(e){
      e.stopPropagation();
      let currentId = $(this).attr("data-id");
      $.get("detail.php?id="+currentId,function(data){
        let array = JSON.parse(data);
        console.log(array);
        $("#editId").val(array.id);
        $("#editname").val(array.name);
        $("#editphone").val(array.phone);
        $("#edit").modal("show");
      })
    })

    $("#updateContact").on("submit",function(e){
      e.preventDefault();

      let newData = $(this).serialize();

      $.post($(this).attr("action"),newData,function(data){
        if(data === "update success"){
          $("#updateCon").html(`<span class="badge rounded-pill bg-success"><i class="fa-solid fa-check"></i></span>`)
          showList();
          $("#edit").modal("hide")
        }else{
          $("#updateCon").html(`<span class="badge badge-pill badge-danger"><i class="fa-solid fa-xmark"></i></span>`)
        }
      })
    })

    showList();
  </script>
</html>
