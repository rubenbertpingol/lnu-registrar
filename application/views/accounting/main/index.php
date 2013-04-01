<div class='container-fluid'>
		 <form class="form-search pull-right" action="<?php echo base_url('accounting/searchRequests'); ?>" method="get">
              <div class="input-prepend input-append">
                  <div class="btn-group">
                  	
                    <button type="button"  tabindex="2" class="btn dropdown-toggle btn-info" data-toggle="dropdown">
                      Search
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li onclick="javasrcipt:createSearch(1,this);"> 
                        <a href="#"> Student Number </a>
                      </li>
                      <li onclick="javasrcipt:createSearch(2,this);"> 
                        <a href="#"> Name </a>
                      </li>
                      <li class="divider"></li>
                      <li onclick="javasrcipt:createSearch(3,this);"> 
                        <a href="#"> Request ID </a>
                      </li>
                    </ul>
                    <input type="hidden" name="type" value="" />
                  <input name="q" class="span3" id="appendedPrependedDropdownButton" type="text">
                      <div class="btn-group">
                        <button  tabindex="1" type="submit" class="btn btn-primary" type="button"> <i class="icon-search icon-white"></i></button>
                      </div>
                  </div>
            </div>
        </form>
        <div class="clearfix"></div>
        <span class="pull-right"> Note: <em style="color:#09F;"> Default Search Student Number </em> </span>
        <div class="clearfix"></div>
		<table class="table table-fluid table-bordered table-striped table-hover" >
			<thead>
				<tr>
					<th colspan="8"> Pending Request </th>
				</tr>
				<tr>
					<th> # </th>
                    <th> Student Number </th>
					<th> Name</th>
					<th> Request </th>
                    <th> Level </th>
					<th> Client Address </th>
					<th> Date of Request </th>
					<th> Status </th>
				</tr>
			</thead>
			<tbody>
            	<?php if(isset($requests) && !empty($requests)){?>
                	<?php foreach( $requests as $key => $value): ?>
                    	<?php $docs =  $this->accounting_model->get_documents(array('client_id'=>$value->id)); ?> 
                        <tr>
                            <td> <span id="ruequestId"><?php echo $value->request_id; ?></span> </td>
                            <td> <?php echo $value->studNum; ?> </td>
                            <td> <?php echo $value->name; ?> </td>
                            <td>
                                 <?php
									echo $value->doc_name;
								?>
                             </td>
                            <td> <?php echo $value->level; ?> </td>
                            <td> <?php echo $value->permanentAddress; ?> </td>
                            <td> <?php echo $value->request_date; ?> </td>
                            <td>
                            	<button onclick="var cons	=	confirm('Are you sure you want to confirm request?'); if(!cons){return false;}else{confirmRequest(<?php echo $value->request_id; ?>,this);}" class="btn confirm btn-mini btn-primary"> <i class="icon-ok-circle icon-white"></i> Confirm </button>
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-mini btn-warning"> <i class="icon-envelope icon-white"></i> Notify </button>
                            </td>
                        </tr>
               		<?php endforeach; ?>
                <?php }else{ ?>
                		<tr class='warning'>
                        	<td align="center" colspan="8" style="color:red;"> No Request Found.</td>
                        </tr>
                <?php }?>
			</tbody>
			<tfoot>
				<tr>
					<Td colspan="8">
	                    <div class="pagination pagination-mini">
                        	
                            	<?php //echo $this->pagination->create_links(); ?>
                            
                        </div>
                        
					</td>
				</tr>
			</tfoot>
		</table>
       
       <!-- Button to trigger modal -->
        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form  method="POST" action="<?php echo base_url('accounting/sendNotification'); ?>" class="form" name="message">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>
            <h3 id="myModalLabel"> Notify Client </h3>
          </div>
          <div class="modal-body">
            
            	<input type="text" name="email" placeholder="Email..." /> <br/>
                <textarea  name="message"  rows="10" style="width:500px !important;"></textarea>
                
            
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary"> Send Message </button>
          </div>
          
        </form>
        </div>
       
</div>