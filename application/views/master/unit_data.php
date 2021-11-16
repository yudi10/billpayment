<section class="content-header">
    <h1>
        Type Unit
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i></a></li>
        <li class="active">Type Unit</li>
    </ol>
</section>

<!-- main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Unit</h3>
            <div class="pull-right">
                <a href="<?=site_url('unit/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-building"> Create</i></a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bodered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Unit Name</th>
                        <th>Tipe Unit</th>
                        <th>Unit Size</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?=site_url('unit/get_ajax')?>",
                "type": "POST"
            },
            "columnDefs": [
                
                {
                    "targets": [ 0 ], 
                    "orderable": false,
                },
        
            ],
            "order": []
        })
    })
</script>
