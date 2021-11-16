<section class="content-header">
    <h1>
        Iuran
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-money"></i></a></li>
        <li class="active">Iuran</li>
    </ol>
</section>

<!-- main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Iuran</h3>
            <div class="pull-right">
                <a href="<?=site_url('iuran/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-money"> Create</i></a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bodered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name Iuran</th>
                        <th>price</th>
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
                "url": "<?=site_url('iuran/get_ajax')?>",
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