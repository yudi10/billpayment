<section class="content-header">
      <h1>
        Iuran
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-money"></i></a></li>
        <li class="active">Iuran</li>
      </ol>
</section>

<!-- main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Iuran</h3>
            <div class="pull-right">
                <a href="<?=site_url('iuran')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"> Back</i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-row">
                <?php echo form_open_multipart('iuran/process') ?>
                    <div class="form-group col-md-6">
                        <label>Iuran Name</label>
                        <input type="hidden" name="id" value="<?= $row->iuran_id?>">
                        <input type="text" name="iuran_name" value="<?=$row->iuran_name?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Price</label>
                        <input type="number" name="price" value="<?= $row->price?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
                        <button type="reset" class="btn btn-danger btn-flat">Cancle</button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</section>