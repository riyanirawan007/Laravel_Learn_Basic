<h3>List Users <span id="openForm" style="cursor: pointer;"
    class="badge badge-success">Create New</span></h3>
<hr>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">User Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form">
                @csrf
                <input type="text" name="id" id="id" disabled hidden>
                <div class="form-group">
                    <label>Name</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>

                <button style="display:none;" id="form-submit" type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        <div class="modal-footer">
            <button id="modal-dismiss" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="modal-submit" type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>
<div>
<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
    <tbody id="tableData">

    </tbody>
    </thead>
</table>
</div>

<script>
var openForm = $('#openForm');
var table = $('#tableData');
var formModal=$('#exampleModal');
var isEdit=false;
$(document).ready(function () {
    loadData();
});

var loadData = function () {
    $.ajax({
        async: false,
        url: '{{url("api/user")}}',
        type: 'get',
        dataType: 'json',
        success: (res) => {
            var item = '';
            if (res.data.length > 0) {
                var i = 1;
                res.data.forEach((val) => {
                    item += '<tr>';
                    item += '<td>' + i + '</td>';
                    item += '<td>' + val.name + '</td>';
                    item += '<td>' + val.phone + '</td>';
                    item += '<td>' + val.email + '</td>';
                    item += '<td> <button onclick="edit(\'' + val.id + '\')" class="btn btn-sm btn-info text-light">Edit</button>\
                            | <button onclick="remove(\'' + val.id +
                        '\')" class="btn btn-sm btn-danger text-light">Delete</button></td>';
                    item += '</tr>';
                    i++;
                });
            } else {
                item += '<tr>';
                item += '<td colspan=5><center>No data available</center></td>';
                item += '</tr>';
            }
            table.html(item);
        },
        error: (res, stat, err) => {
            alert(err);
        }
    });
};

openForm.click(()=>{
    $('#form')[0].reset();
    isEdit=false;
    formModal.modal('show');
});

$('#modal-submit').click(()=>{
    $('#form-submit').click();
});

$('#form').submit((e)=>{
    e.preventDefault();
    $.ajax({
            async: false,
            url: (isEdit?'{{url("api/user/update")}}/'+$('#id').val():'{{url("api/user/create")}}'),
            type: (isEdit?'PUT':'POST'),
            dataType: 'json',
            data:$('#form').serialize(),
            success: (res) => {
                alert(res.message);
                formModal.modal('hide');
                loadData();
                $('#id').val(null);
                $('#id').attr('disabled','disabled');
            },
            error: (res, stat, err) => {
                alert(err);
            }
    });
});


var edit = function (id) {
    $.ajax({
        async: false,
        url: '{{url("api/user")}}/'+id,
        type: 'get',
        dataType: 'json',
        success: (res) => {
            if(res.data.length>0)
            {
                $('#name').val(res.data[0].name);
                $('#phone').val(res.data[0].phone);
                $('#email').val(res.data[0].email);
                $('#id').val(res.data[0].id);
                $('#id').removeAttr('disabled');
                isEdit=true;
                formModal.modal('show');
            }
            else{
                alert('Data not exist!');
                loadData();
            }
        },
        error: (res, stat, err) => {
            alert(err);
        }
    });
}

var remove = function (id) {
    if (confirm('Are you sure want to delete?')) {
        $.ajax({
            async: false,
            url: '{{url("api/user/delete")}}/' + id,
            type: 'delete',
            dataType: 'json',
            success: (res) => {
                alert(res.message);
                loadData();
            },
            error: (res, stat, err) => {
                alert(err);
            }
        });
    }
}
</script>