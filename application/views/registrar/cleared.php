<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h4>Requests ready for claiming...</h4><br/>
			
			<div class="alert-messages"></div>
			
			<?php if( !empty($claims) && isset($claims) ) { ?>
			<table class="table table-bordered">
				<thead>
					<th>#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Request</th>
					<th>Client Address</th>
					<th>Request date</th>
					<th>Status</th>
				</thead>
				<tbody>
					<?php $x = 1; ?>
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
					<?php foreach($claims as $claim) : ?>
					<?php
						$docs = $this->registrar_model->load_requests(array("client_id"=>$claim->client_id));

						
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
						
					?>
					<tr>
						<td><?php echo $x; ?></td>
						<td><?php echo $claim->studNum; ?></td>
						<td>
							<span title="<?php echo $claim->name;?>">
								<?php echo limitStr($claim->name); ?>
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
							<span title="<?php echo $claim->permanentAddress;?>">
								<?php echo limitStr($claim->permanentAddress); ?>
							</span>
						</td>
						<td><?php echo $claim->date; ?></td>
						<td><?php echo $claim->claim_type; ?></td>
					</tr>
					<?php $x++; ?>
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