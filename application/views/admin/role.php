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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addRole">Add New Role</a>

            <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($role as $r): ?>
                    <tr>
                        <th><?= $i ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/roleaccess/').$r['id']; ?>" class="badge badge-warning">access</a>
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

<div class="modal fade" id="addRole">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add new role</h5>
            </div>

            <form action="<?= base_url('admin/role');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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