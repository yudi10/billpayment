<section class="content-header">
      <h1>
        Type Unit
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i></a></li>
        <li class="active">Unit</li>
      </ol>
</section>

<!-- main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Bank</h3>
            <div class="pull-right">
                <a href="<?=site_url('unit')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"> Back</i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-row">
                <?php echo form_open_multipart('unit/process') ?>
                    <div class="form-group col-md-4">
                        <label>Unit Name</label>
                        <input type="hidden" name="id" value="<?= $row->unit_id?>">
                        <input type="text" name="unit_name" value="<?=$row->unit_name?>" class="form-control" required>
                        
                    </div>

                    <div class="form-group col-md-4">
                        <label>Unit Type</label>
                        <input type="text" name="tipe_unit" value="<?=$row->tipe_unit?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Unit Size</label>
                        <input type="text" name="size_unit" value="<?=$row->size_unit?>" class="form-control" required>
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