<section class="content-header">
    <h1>
        Company
        <small>Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i></a></li>
        <li class="active">Company</li>
    </ol>
</section>

<!-- main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Company</h3>
            <div class="pull-right">
                <a href="<?=site_url('company/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-building"> Create</i></a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bodered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Address</th>
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
                "url": "<?=site_url('company/get_ajax')?>",
                "type": "POST"
            },
            "columnDefs": [
                
                {
                    "targets": [ 1 ], 
                    "orderable": false,
                },
        
            ],
            "order": []
        })
    })
</script>