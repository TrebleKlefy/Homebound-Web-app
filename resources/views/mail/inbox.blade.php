@extends('layouts.app')
@section('css')
<link href="{{ asset('css/email.css') }}" rel="stylesheet">
@endsection

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="mask bg-gradient-default opacity-8">
<div class="container  mt-4">
<div class="row mt-5 pt-4">
	<!-- BEGIN INBOX -->
	<div class="col-md-12">
		<div class="grid email">
			<div class="grid-body">
				<div class="row">
					<!-- BEGIN INBOX MENU -->
					<div class="col-md-3">
						<h2 class="grid-title"><i class="fa fa-inbox"></i> Inbox</h2>
						<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>

						<hr>

						<div>
							<ul class="nav nav-pills nav-stacked">
								<li class="header">Folders</li>
								<li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox ({{Auth::user()->unreadNotifications->count()}})</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Starred</a></li>
								<li><a href="#"><i class="fa fa-bookmark"></i> Important</a></li>
								<li><a href="#"><i class="fa fa-mail-forward"></i> Sent</a></li>
								<li><a href="#"><i class="fa fa-pencil-square-o"></i> Drafts</a></li>
								<li><a href="#"><i class="fa fa-folder"></i> Spam (217)</a></li>
							</ul>
						</div>
					</div>
					<!-- END INBOX MENU -->
					
					<!-- BEGIN INBOX CONTENT -->
					<div class="col-md-9 ">
						<div class="row dataTables_wrapper dt-bootstrap4 no-footer">
							<div class="col-sm-6">
								<label style="margin-right: 8px;" class="">
									<div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" id="check-all" class="icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
								</label>
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Mark as read</a></li>
										<li><a href="#">Mark as unread</a></li>
										<li><a href="#">Mark as important</a></li>
										<li class="divider"></li>
										<li><a href="#">Report spam</a></li>
										<li><a href="#">Delete</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="padding"></div>
						
						<div class="table-responsive">
							<table  class="table " id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class='hidden'>Avert Name</th>
                                        <th class='hidden' >Email</th>
                                        <th class='hidden'>Status</th>
                                        <th class='hidden'>Phone Number</th>
                                        <th class='hidden'>Address</th>
                                        <th class='hidden'>Action</th>
                                    </tr>
                                    </thead>
								<tbody>
                                    <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:210px">
                                     
                                        <div class="list-group ">
                                            @foreach (Auth::user()->Notifications as $notification)
                                        @if ($notification->read_at == null )
                                            
                                                <tr class="alert-success">
                                                <td class="action"><input type="checkbox" /></td>
                                                <td class="action"><i class="fa fa-star-o"></i></td>
                                                <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                                <td class="name"><a href="/inbox/message/read/{{$notification->id}}">Larry Gardner</a></td>
                                            <td class="subject"><a href="/inbox/message/read/{{$notification->id}}">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
                                                <td class="time"><small>{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}</small></td>
                                            </tr>
                                              
                                          
                                          </div>
                            
                            
                                        @else
                                        <tr class="read alert-danger">
                                            <td class="action"><input type="checkbox" /></td>
                                            <td class="action"><i class="fa fa-star-o"></i></td>
                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>
                                            <td class="name"><a href="inbox/message/read/{{$notification->id}}">Larry Gardner</a></td>
                                            <td class="subject"><a href="inbox/message/read/{{$notification->id}}">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>
                                            <td class="time"><small>{{\Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans()}}</small></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    
							
							</tbody></table>
						</div>

											
					</div>
					<!-- END INBOX CONTENT -->
					
					<!-- BEGIN COMPOSE MESSAGE -->
					<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-wrapper">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-blue">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
									</div>
									<form action="#" method="post">
										<div class="modal-body">
											<div class="form-group">
												<input name="to" type="email" class="form-control" placeholder="To">
											</div>
											<div class="form-group">
												<input name="cc" type="email" class="form-control" placeholder="Cc">
											</div>
											<div class="form-group">
												<input name="bcc" type="email" class="form-control" placeholder="Bcc">
											</div>
											<div class="form-group">
												<input name="subject" type="email" class="form-control" placeholder="Subject">
											</div>
											<div class="form-group">
												<textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
											</div>
											<div class="form-group">														<input type="file" name="attachment">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
											<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send Message</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- END COMPOSE MESSAGE -->
				</div>
			</div>
		</div>
	</div>
	<!-- END INBOX -->
</div>
</div>
</div>

  {{-- @include('footer.footer') --}}

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
</script>

@section('javascript')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"  defer></script>
<script src="js/scripts.js"  defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"  defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"  defer></script>
<script src="assets/demo/datatables-demo.js"  defer></script>
@endsection