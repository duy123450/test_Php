<!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Quản lý sách</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Danh mục sách</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Thêm sách mới</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="<?php echo BASE_URL ?>/admincp/#" class="close"><img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>
						
						<table id="tbl_book">
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>STT</th>
								   <th>Tên sách</th>
								   <th>Giá </th>
								   <th>Hình</th>
								   <th>Thao tác</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left"></div>
										
										<div class="pagination">
											<a href="<?php echo BASE_URL ?>/admincp/#" title="First Page">&laquo; First</a><a href="<?php echo BASE_URL ?>/admincp/#" title="Previous Page">&laquo; Previous</a>
											<a href="<?php echo BASE_URL ?>/admincp/#" class="number" title="1">1</a>
											<a href="<?php echo BASE_URL ?>/admincp/#" class="number" title="2">2</a>
											<a href="<?php echo BASE_URL ?>/admincp/#" class="number current" title="3">3</a>
											<a href="<?php echo BASE_URL ?>/admincp/#" class="number" title="4">4</a>
											<a href="<?php echo BASE_URL ?>/admincp/#" title="Next Page">Next &raquo;</a><a href="<?php echo BASE_URL ?>/admincp/#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<?php 
								foreach ($data as $key => $value) 
								{
								?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['book_name'] ?></td>
									<td><?php echo $value['price'] ?></td>
									<td>
										<img class=book src="<?php echo BASE_URL ?>/images/book/<?php echo $value['img'] ?>">
									</td>
									<td>
										<!-- Icons -->
										 <a href="<?php echo BASE_URL ?>/?controller=Admin&action=edit&book_id=<?php echo $value['book_id'] ?>" title="Edit Meta"><img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete" onClick="DeleteBook('<?php echo $value['book_id'] ?>'); ">
										 	<img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/cross.png" alt="Delete" />
										 </a> 
										 <a href="<?php echo BASE_URL ?>/?controller=Admin&action=edit&book_id=<?php echo $value['book_id'] ?>" title="Edit Meta">
										 	<img src="<?php echo BASE_URL ?>/admincp/resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" />
										 </a>
									</td>
								</tr>
							<?php
							}
							?>
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="#" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Small form input</label>
										<input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Medium form input</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								
								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>
								
								<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>
								
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>
								
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
<script type="text/javascript">
	function DeleteBook(id)
	{
		if (confirm("Ban chac chan muon xoa?"))
		{
			window.location='<?php echo BASE_URL ?>/index.php?controller=admin&action=deletebook&book_id='+id;
		}
		else return false;
	}
</script>