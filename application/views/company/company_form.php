<section class="content-header">
      <h1>
        Company
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i></a></li>
        <li class="active">company</li>
      </ol>
</section>

<!-- main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Company</h3>
            <div class="pull-right">
                <a href="<?=site_url('company')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"> Back</i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-row">
                <?php echo form_open_multipart('company/process') ?>
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input type="hidden" name="id" value="<?= $row->company_id?>">
                        <input type="text" name="name" value="<?=$row->name?>" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?=$row->phone?>" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Fax</label>
                        <input type="text" name="fax" value="<?=$row->fax?>" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea name="address" id="" cols="50" rows="20" value="" class="form-control"><?=$row->address?></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Logo</label>
                        <small>(Biarkan kosong jika image tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?> )</small>
                        <?php if($page == 'edit'){
                            if($row->image != null){ ?>
                                <div style="margin-bottom: 5px;">
                                <img src="<?=base_url('uploads/logo/'.$row->image) ?>" alt="" style="width: 15%">
                                </div>
                                <?php
                            }
                        } ?>
                        <input type="file" name="image" class="form-control-file">
                        
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