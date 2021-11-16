<section class="content-header">
    <h1>
        Bank
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
        <li class="active">Bank</li>
    </ol>
</section>

<!-- main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Bank</h3>
            <div class="pull-right">
                <a href="<?=site_url('bank/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-credit-card"> Create</i></a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bodered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account Title</th>
                        <th>Contact Person</th>
                        <th>Account Number</th>
                        <th>KCP Bank</th>
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
                "url": "<?=site_url('bank/get_ajax')?>",
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
