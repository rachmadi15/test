<!DOCTYPE html>
<html>
<head>
	<title>App Test</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> 
</head>
<body>
<div class="container">
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Customer App</h2>
             </div>
         </div>
     </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <select id="customer_id" name="customer_id" class="form-control">
                    <option>Pilih Customer</option><!--selected by default-->
                        @foreach($customer as $s)
                            <option value="{{ $s->id }}">
                                {{ $s->name }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" id="alamat" style="height:150px" class="form-control" placeholder="Alamat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penjualan 1 Tahun Terakhir</strong>
                <input type="text" name="jual" id="jual" style="height:150px" class="form-control" placeholder="Penjualan 1 Tahun Terakhir">
            </div>
        </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type='text/javascript'>
    $(document).ready(function(){

        $('#customer_id').change(function(){

            var id = $(this).val();
            

            $.ajax({
                url: 'getDetailCustomer/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        var total_sales = response['data'][0].total_sales;
                        var alamat = response['alamat'][0].alamat;
                        $('input[name=jual]').val(total_sales);
                        $('input[name=alamat]').val(alamat);
                    }

                }
        });
    });

    });
</script>

</html>

