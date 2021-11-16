<section class="content-header">
    <h1>
        User
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">

                        <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                            <label>Name *</label>
                            <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->name ?>" class="form-control">
                            <?=form_error('fullname')?>
                        </div>

                        <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username ?>" class="form-control">
                            <?=form_error('username')?>
                        </div>

                        <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                            <label>Password <small>(Leave the password blank if not changed)</small></label>
                            <input type="password" name="password" class="form-control" value="<?=$this->input->post('password')?>">
                            <?=form_error('password')?>
                        </div>

                        <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                            <label>Password Confirmation</label>
                            <input type="password" name="passconf" class="form-control" value="<?=$this->input->post('passconf')?>">
                            <?=form_error('passconf')?>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?=$this->input->post('address') ?? $row->address ?></textarea>
                        </div>

                        <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">-- Admin --</option>
                                <option value="2" <?=$level == 2 ? 'selected' : null ?>>-- Kasir --</option>
                            </select>
                            <?=form_error('level')?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">Update</button>
                            <button type="reset" class="btn btn-danger btn-flat">Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>