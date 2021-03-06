<div id='textInfo' class="text-light">This is info text</div>
<div class="jumbotron bg-info">
    <h1 class="display-4 text-light">Hello, world!</h1>
    <p class="lead text-light">This is a simple example for Laravel Basic CRUD</p>
    <hr class="my-4 text-light">
    <a class="btn btn-success btn-md" href="javascript:void(0)" id="checkAPI" role="button">Check DB Connection</a>
</div>


<script>
    $(document).ready(function () {
        var textInfo = $('#textInfo');
        var checkAPI = $('#checkAPI');
        textInfo.hide();

        checkAPI.click(function () {
            $.ajax({
                url: '{{url("/api/db_connection")}}',
                type: 'get',
                dataType: 'json',
                success: (res) => {
                    textInfo.show();
                    textInfo.html('<div class="alert alert-success" role="alert">\
                            DB is connected : ' + res.connected+ '\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                                </button>\
                            </div>');
                },
                error(res, stat, err) {
                    alert('error: ' + err);
                }
            });
        });
    });
</script>