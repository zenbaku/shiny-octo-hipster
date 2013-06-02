<h2 style="text-align:center;">Product Details</h2>
<table class="table-bordered" style="text-align:center; display:table; margin:0 auto;">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Stock</th>
			<th>Published By</th>
			<th>Published At</th>
			<th>Provider Name</th>
			<th>Product Image</th>
		<tr>
	<thead>
	<tbody></tbody>
		<tr>
			<td><?php echo $view_data['name']; ?></td>
			<td><?php echo $view_data['description']; ?></td>
			<td><?php echo $view_data['price']; ?></td>
			<td><?php echo $view_data['stock']; ?></td>
			<td><?php echo $view_data['published_by']; ?></td>
			<td><?php echo $view_data['published_at']; ?></td>
			<td><?php echo $view_data['provider_name']; ?></td>
			<td><img width="50%" height="50%" src="../../../img/<?php echo $view_data['img_src'];?>"></td>
		</tr>
</table>