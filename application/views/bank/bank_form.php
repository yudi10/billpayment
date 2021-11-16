<section class="content-header">
      <h1>
        Bank
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
        <li class="active">Bank</li>
      </ol>
</section>

<!-- main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Bank</h3>
            <div class="pull-right">
                <a href="<?=site_url('bank')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"> Back</i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-row">
                <?php echo form_open_multipart('bank/process') ?>
                    <div class="form-group col-md-4">
                        <label>Account Title</label>
                        <input type="hidden" name="id" value="<?= $row->bank_id?>">
                        <input type="text" name="name_bank" value="<?=$row->name_bank?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Contact Person</label>
                        <input type="text" name="name_rekening" value="<?=$row->name_rekening?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Account Number</label>
                        <input type="text" name="no_rekening" value="<?=$row->no_rekening?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label>KCP Bank</label>
                        <textarea name="kcp_bank" id="" cols="50" rows="20" value="" class="form-control"><?=$row->kcp_bank?></textarea>
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