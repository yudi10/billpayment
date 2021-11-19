<section class="content-header">
      <h1>
        Sales
        <small>Iuran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i></a></li>
        <li>Transaction</li>
        <li class="active">sales</li>
      </ol>
</section>

<section class="content">

    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-aligan:top">
                                <label for="customer">Customer</label>
                                
                            </td>
                            <td>
                                <div>
                                    <select id="customer" class="form-control customerSelect">
                                        <option value=""></option>
                                        <?php foreach($customer as $cust => $value){
                                            echo '<option value="'.$value->customer_id.'">'.$value->customer_name.'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="ipl" name="ipl" id="ipl">IPL</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="iuran_id">
                                    <input type="hidden" id="price">
                                    <input type="text" name="iuran_name" id="iuran_name" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <!-- modal data Iuran -->
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <!-- end modal data iuran -->
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="qty" name="qty">QTY</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                
                                <div>
                                    <button type="submit" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Add
                                    </button>
                                </div>
                                
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- table transaction -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Iuran Name</th>
                                <th>Size Unit</th>
                                <th>Price</th>
                                <th>QTY</th>
                                <th width="15%">Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                        
                            <tr>
                                <td class="text-center">1</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note"  rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div>
                <button id="cencel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Cancle
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-success">
                    <i class="fa fa-paper-plane-o"></i> Process Payment
                </button>
            </div>
        </div>

    </div>

</section>

<!-- modal data table iuran -->
<div class="modal fade" id="modal-item">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-lebel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Select IPL Name</h4>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Iuran Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($iuran as $i => $data) { ?>
                            <tr>
                                <td><?=$data->iuran_name?></td>
                                <td class="text-right"><?=rupiah($data->price)?></td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success" id="select" 
                                    data-id="<?=$data->iuran_id?>"
                                    data-price="<?=$data->price?>"
                                    data-iuran_name="<?=$data->iuran_name?>">
                                        <i class="check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
            $(document).on('click', '#select', function(){
                var iuran_id = $(this).data('id');
                var price = $(this).data('price');
                var iuran_name = $(this).data('iuran_name');
                $('#iuran_id').val(iuran_id);
                $('#price').val(price);
                $('#iuran_name').val(iuran_name);
                $('#modal-item').modal('hide');
            })
        })
</script>

<!-- <script>
    $(document).ready(function(){
        $(document).on('click', '#add_cart', function(){
            var iuran_id = $(this).data('iuran_id');
            var iuran_name = $(this).data('iuran_name');
            var price = $(this).data('price');
            var qty = $('#' * iuran_id).val();
            $.ajax({
                type : 'GET',
                url : '<?=site_url('sale/add_to_cart')?>',
                data : 'iuran_id=' + iuran_id + '&iuran_name' + iuran_name + '&price' + price + 'qty' + qty,
                // data : {iuran_id: iuran_id, iuran_name: iuran_name, price: price, qty: qty},
                success: function(html){
                    load_data_temp();
                }
            });
        })
    })
</script> -->

