        <!-- Begin Page Content -->
        <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
    </h1>
    

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMenu">Add New Menu</a>

            <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($menu as $m): ?>
                    <tr>
                        <th><?= $i ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <a href="" class="badge badge-success">edit</a>
                            <a href="" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  </tbody>
            </table>
        </div>
    </div>

</div>


</div>
<!-- End of Main Content -->

<div class="modal fade" id="addMenu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add new menu</h5>
            </div>

            <form action="<?= base_url('menu');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>
.