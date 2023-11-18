@extends('layouts.app')

@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
    	<h2 style="display: block;margin: auto;text-align: center;">Admin Panel</h2>
    	@if (session('status'))
        	<div class="alert alert-success" role="alert">
            	{{ session('status') }}
            </div>
       	@endif
    	<div class="col-md-4">
    		<div class="card">
            	<div class="card-header">{{ __('Add Users') }}</div>
				<div class="card-body">
				{!! Form::open(array('url'=>'/userregister','method' => 'POST','class'=>'formadminregister')) !!}
                {{ Form::label('name', 'User Name')}}
                {{ Form::text('name', '',['class' => 'form-control useradminname','placeholder'=>'First Name'])}}
                <br>
                {{ Form::label('email', 'User Email')}}
                {{ Form::email('email', '',['class' => 'form-control useradminemail','placeholder'=>'Email'])}}
                <br>
                 {{ Form::label('role', 'User Role')}}
                {{ Form::text('role', '',['class' => 'form-control useradminrole','placeholder'=>'User Role'])}}
                <br>
                {{Form::submit('Save',['class' => 'btn btn-success updatebyadmin'])}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
		
		<div class="col-md-8">
       		@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>      
            @endif
            <div class="card">
                <div class="card-header">{{ __('Show Users') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>User Role</th>
                            <th>Action</th>
                        </tr>
                        @foreach($usersArr as $k=> $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->adminviewpassword}}</td>
                            <td>{{$v->user_role}}</td>
                            <td><i class="fas fa-edit editdata" ids="{{$v->id}}" username="{{$v->name}}" email="{{$v->email}}" user_role="{{$v->user_role}}"></i> <i class="fas fa-trash removedata" ids="{{$v->id}}"></i>






                             </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $usersArr->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.editdata', function(){
			var ids = $(this).attr('ids');
			var base_url = window.location.origin;
			$('.useradminname').val($(this).attr('username'));
			$('.useradminname').attr('ids',ids);
			$('.useradminemail').val($(this).attr('email'));
			$('.useradminrole').val($(this).attr('user_role'));
			$('.formadminregister').attr('method','PUT');
			$('.formadminregister').attr('action',base_url+'/todo/updateuser/'+ids);
			$('.updatebyadmin').val('update');
			$('.updatebyadmin').addClass('updateuserdata').removeClass('updatebyadmin');
		});

		$(document).on('click','.updateuserdata', function(e){
			var ids = $('.useradminname').attr('ids');
			var token = $('#token').val();
			e.preventDefault();
        	$.ajax({
            url: "/todo/updateuserbyadmin",
            type: "POST",
            data: {'_token':token,'ids':ids,'name':$('.useradminname').val(),'email':$('.useradminemail').val(),'role':$('.useradminrole').val()},
            dataType:'json',
           	success: function(data){
            	location.reload();
            }          
        });
        	 });

        $(document).on('click','.removedata', function(e){
			var ids = $(this).attr('ids');
			var $this = $(this);
			var token = $('#token').val();
			e.preventDefault();
        	$.ajax({
            url: "/todo/deleteuserbyadmin",
            type: "POST",
            data: {'_token':token,'ids':ids},
            dataType:'json',
           	success: function(data){
           		if(data == 1){
           			alert("User Deleted Successfully");
           			$this.closest('tr').remove();
           		}
            }          
        });
        });	
	});
</script>
@endsection
