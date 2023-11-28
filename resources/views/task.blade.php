<html>
  <head>
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </head>
  <body class="bg-primary-subtle">
    <div class="container py-2" style="height: 100%">
      <div class="row">
        <h1 class="col-11"><b>Task Management</b></h1>
        <button type="button" class="btn btn-primary col-1" data-bs-toggle="modal" data-bs-target="#newTaskModal" id="addButton">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg>
        </button>
      </div>

      <div class="row py-2 overflow-hidden" style="height: 90%">
        <div class="col card bg-secondary py-2 border-0">
            <h2 class="text-white">To Do</h2>
            <div id="to_do" class="overflow-scroll pb-2" style="height: 50em"></div>
        </div>
        <div class="col card bg-secondary py-2 border-0 mx-2" >
            <h2 class="text-white">In Progress</h2>
            <div id="in_progress" class="overflow-scroll pb-2" style="height: 50em"></div>
        </div>
        <div class="col card bg-secondary py-2 border-0">
            <h2 class="text-white">Done</h2>
            <div id="done" class="overflow-scroll pb-2" style="height: 50em"></div>
        </div>
      </div>
    </div> 
    
  </body>

  <div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newTaskModalLabel">Add New</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="taskForm">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="status_list form-control" required>
                        <option value="">Select</option>
                    </select>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="submit" form="taskForm" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTaskModalLabel">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editTaskForm">
                <input type="hidden" name="id" id="id_edit" value="">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title_edit" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description_edit" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="status_list form-control" id="status_edit"required>
                        <option value="">Select</option>
                     </select>
                </div>              
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" form="editTaskForm" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
    let trash_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/></svg>';
    let edit_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>';
    
    function getTask(type){
        $.get('http://127.0.0.1:8000/api/get', {status : type}).done(function (data){
            // console.log(data);
            data.forEach(element => {
                let $newdiv = $(`<div id='${element.id}' class='column'>
                <h2>${element.title}</h2>
                <span>${element.description}</span>
                </div>`);

                let $card = $(`<div class="card mt-1">
                        <div class="card-body" id=${element.id}>
                            <h3 class="card-title">${element.title}</h3>
                            <p class="card-text">${element.description}</p>
                            <button onclick="editTask(${element.id})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTaskModal">${edit_icon}</button>
                            <button onclick="deleteTask(${element.id})" class="btn btn-danger">${trash_icon}</button>
                        </div>
                    </div>`);

                let divId = type.replace(/ /g,"_");
                $(`#${divId}`).append($card);
            });
        });
    }

    function deleteTask(taskId){
        $.ajax({
          type: 'POST',
          url: 'http://127.0.0.1:8000/api/delete',
          data: {id : taskId},
          success: function(response){
            location.reload();
            console.log('Success:', response);
          },
          error: function(error){
            console.log('Error:', error);
          }
        });
    }

    function editTask(taskId){
        $.get('http://127.0.0.1:8000/api/read', {id : taskId}).done(function (data){
            $('#id_edit').val(data.id);
            $('#title_edit').val(data.title);
            $('#description_edit').val(data.description);
            $('#status_edit').val(data.status);
        })
    }

    let status = ['to do', 'in progress', 'done'];

    status.forEach(element => {
        getTask(element);

        const words = element.toUpperCase();
        $('.status_list').append(`<option value="${element}">${words}</option>`)
    });

    // Add Task
    $('#addButton').click(function(){
        $('#taskForm').trigger('reset');
    })

    $('#taskForm').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        var apiUrl = 'http://127.0.0.1:8000/api/create';

        $.ajax({
          type: 'POST',
          url: apiUrl,
          data: formData,
          success: function(response){
            location.reload();
            console.log('Success:', response);
          },
          error: function(error){
            console.log('Error:', error);
          }
        });
    });

    // Edit Task
    $('#editTaskForm').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        var apiUrl = 'http://127.0.0.1:8000/api/update';

        $.ajax({
          type: 'PUT',
          url: apiUrl,
          data: formData,
          success: function(response){
            location.reload();
            console.log('Success:', response);
          },
          error: function(error){
            console.log('Error:', error);
          }
        });
    });
    
  </script>
</html>