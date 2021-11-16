<section class="content-header">
      <h1>
        Customer
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-address-book"></i></a></li>
        <li class="active">Customer</li>
      </ol>
</section>

<!-- main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Customer</h3>
            <div class="pull-right">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat"><i class="fa fa-undo"> Back</i></a>
            </div>
        </div>
        <div class="box-body">
            <div class="form-row">
                <?php echo form_open_multipart('customer/process') ?>
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="hidden" name="id" value="<?= $row->customer_id?>">
                        <input type="text" name="customer_name" value="<?=$row->customer_name?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" value="<?=$row->email?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?=$row->phone?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Unit *</label>
                        <select name="unit" class="form-control" id="js-example-basic-single" required>
                            <option value="">-- Pilih --</option>
                        <?php foreach($unit->result() as $key => $data){ ?>
                            <option value="<?= $data->unit_id ?>" <?= $data->unit_id == $row->unit_id ? "selected" : null ?>><?= $data->unit_name ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea name="address" id="" cols="50" rows="20" value="" class="form-control"><?=$row->address?></textarea>
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