<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="pull-right">
				<form>
					<div class="input-prepend input-append">
						<div class="btn-group">
							<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="btn-text">Search by</span>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu search-options">
								<li><a tabindex="-1" href="#" data-role="request_id">Request ID</a></li>
								<li><a tabindex="-1" href="#" data-role="client_name">Client name</a></li>
								<li><a tabindex="-1" href="#" data-role="student_number">Student number</a></li>
							</ul>
						</div>
						<input class="input-large" id="appendedPrependedDropdownButton" name="q" type="text" autofocus >
						<input type="hidden" name="search_by" class="input-search-by" >
						<div class="btn-group">
							<button class="btn btn-primary" type="submit">
								<span class="icon-search icon-white"></span>
							</button>
						</div>
					</div>
				</form>
				<span>
					<em><strong style="color: red;">Note:</strong></em>
					&nbsp;&nbsp;Default search type: <strong>Student number</strong>
				</span>
			</div>
			<h4>Requests List</h4>
			<br/>
			
			<div class="alert-messages"></div>
			
			<?php if( !empty($requests) && isset($requests) ) { ?>
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Request</th>
					<th>Client Address</th>
					<th>Request date</th>
					<th>Status</th>
					<th>Payments</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php
						function limitStr($str = null)
						{
							$str = rtrim($str," ");
							if( $str != null ){
								return (strlen($str) > 20)?substr($str,0,19)."<strong>...</strong>":$str;
							}
						}
						$status = array("On process","Picked-up","Delivered");
					?>
					<?php foreach($requests as $req) : ?>
						<?php
							$docs = $this->registrar_model->load_requests(array("client_id"=>$req->client_id));

							
							if(!empty($docs) && isset($docs)){
								$num_req_paid = 0;
								foreach($docs as $doc_req){
									// echo $doc_req->req_id;
									$req_data = array(
										"request_id"	=>	$doc_req->req_id
									);
									$req_paid = $this->registrar_model->followUp_payments($req_data);
									if(!empty($req_paid)){
										$num_req_paid++;
									}
								}
							}
							
							$payments = "";
							$validated = "";
							
							$payments = ($num_req_paid == sizeOf($docs))?"<span class=\"label label-success\">Paid</span>":"<a href=\"#\">Follow up</a>";
							
							$validated = ($num_req_paid == sizeOf($docs))?"":" disabled";
							 
							
						?>
					<tr>
						<td><?php echo $req->req_id; ?></td>
						<td><?php echo $req->studNum; ?></td>
						<td>
							<span title="<?php echo $req->name;?>">
								<?php echo limitStr($req->name); ?>
							</span>
						</td>
						<td>
							<?php
								if( !empty($docs) && isset($docs) ) {
									// $y = 1;
									$ul="<ul>";
									foreach($docs as $doc){
										$ul.="<li>".$doc->doc_name."</li>";
										// if($y < sizeOf($docs)){ echo ", "; }
										// $y++;
									}
									$ul.="</ul>";
									echo $ul;
								}
							?>
						</td>
						<td>
							<span title="<?php echo $req->permanentAddress;?>">
								<?php echo limitStr($req->permanentAddress); ?>
							</span>
						</td>
						<td><?php echo $req->date; ?></td>
						<td><?php echo $status[$req->status]; ?></td>
						<td><?php echo $payments; ?></td>
						<td>
							<?php
								$validated_data = array(
									"client_id"			=>		$req->client_id,
									"date"	=>		$req->date
								);
								$validated_data = ($num_req_paid == sizeOf($docs))?json_encode($validated_data):"";
							?>
							<button data-validated='<?php echo $validated_data;?>' class="validatedClientData btn btn-primary btn-small<?php echo $validated;?>" >Validated</button>
							<button class="btn btn-warning btn-small notifyClient">Notify</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="9">Pagination . . .</td>
					</tr>
				</tfoot>
			</table>
			<?php } else { ?>
				<div class="alert alert-info">No records yet!</div>
			<?php } ?>
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Notify Client</h3>
				</div>
				<div class="modal-body">
					<p>One fine body…</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>