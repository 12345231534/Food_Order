<div class="container-fluid">
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Số lương</th>
				<th>Sản phẩm</th>
				<th>Thành tiền tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$total = 0;
			include 'db_connect.php';
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
			<tr>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">Tổng tiền</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">
		<button class="btn btn-primary"  type="button" onclick="confirm_order()">Xác nhận</button>
		<button class="btn btn-primary"  type="button" onclick="proceed_order()">Xử lý </button>
		<button class="btn btn-danger"  type="button" onclick="cancel_order()">Hủy đơn hàng</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(){
		start_load()
		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 1){
					alert_toast("Xác nhận thành công")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
	function proceed_order(){
		start_load()
		$.ajax({
			url:'ajax.php?action=proceed_order',
			method:'POST',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 2){
					alert_toast("Đang xử lý")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
	function cancel_order(){
		start_load();
		$.ajax({
			url:'ajax.php?action=cancel_order',
			method:'GET',
			data:{id:'<?php echo $_GET['id'] ?>'},
			success:function(resp){
				if(resp == 0){
					alert_toast("Hủy đơn hàng thành công")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
</script>