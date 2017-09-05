<div class="container">
    <form id="ajaxform" class="form-horizontal" action="<?php Route::asset('dashboard/ajaxInsert'); ?>" method="POST">

        <div class="form-group">
          <input id="txtinpt" name="text" type="text" class="form-control" placeholder="text">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-default btn-block">
        </div>
    </form>

    <div>
        <table class="table table-bordered">
            <thead>
                <td>ID</td>
                <td>Text</td>
            </thead>

            <tbody id="list">
            </tbody>
        </table>
    </div>
</div>
