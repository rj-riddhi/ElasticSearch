<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary" style="text-align: center;">Laravel Search Using Elasticsearch</h1>
    </div>
</div>


<div class="container">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	<div class="row">
		  <div class="col-lg-6">
		    <form method="get">
		    <div class="input-group">

               
		      <input name="search" value="{{ old('search') }}" type="text" class="form-control"  placeholder="Search for...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="submit">Go!</button>
		      </span>


		    </div><!-- /input-group -->
</form>
		  </div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
	  </div>
	  <div class="panel-body">

	    	
	    	<div class="row">
		  		<div class="col-lg-6">
				  

			    	@if(!empty($items))
					<table class="table">
							<thead class="text-center">
								<th>Title</th>
								<th>Description</th>
							</thead>
							<tbody>
							@foreach($items as $values)
			    			 <tr>
								 <td>{{$values['title']}}</td>
								 <td>{{$values['description']}}</td>
							 </tr>
							 @endforeach
							</tbody>
						</table>
						@endif
			    		@if(!empty($error))
						<div class="alert alert-danger">{{$error}}</div>
			     @endif

				 @if(!empty($match))
				 <div class="alert alert-danger">
				 {{$match['msg']}}
				</div>
			     @endif
			    	
					@if(!empty($table))
						<table class="table">
							<thead class="text-center">
								<th>Id</th>
								<th>Title</th>
								<th>Description</th>
							</thead>
							<tbody>
							@foreach($table as $value)
			    			 <tr>
								 <td>{{$value->id}} </td>
								 <td>{{$value->title}}</td>
								 <td>{{$value->description}}</td>
							 </tr>

							@endforeach
							</tbody>
							
						</table>
						{{$table->links()}}
						@endif
		  		</div>
		  		<div class="col-lg-6">
		  			<div class="panel panel-default">
	  					<div class="panel-heading">
	  						Create New Items
	  					</div>
	  					<div class="panel-body">


	  						@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif


	  						<form action="/ItemSearchCreate"  method="POST">
								  @csrf	
                              <div class="row">
			                        <div class="col-xs-12 col-sm-12 col-md-12">
			                            <div class="form-group">
			                                <strong>Title:</strong>
			                                <input name="title" value="{{ old('title') }}" type="text" class="form-control" placeholder="Title">
			                            </div>
			                        </div>
			                        <div class="col-xs-12 col-sm-12 col-md-12">
			                            <div class="form-group">
			                                <strong>Description:</strong>
											<input name="description" value="{{ old('description') }}" type="textarea" class="form-control" placeholder="Description"style="height:100px">
			                            </div>
			                        </div>
			                    </div>


			                    <div class="text-center">
			                    	<button type="submit" class="btn btn-primary">Submit</button>
			                    </div>
</form>
	  					</div>
	  				</div>
		  		</div>
		  	</div>
	  </div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   -->
</body>
</html>
