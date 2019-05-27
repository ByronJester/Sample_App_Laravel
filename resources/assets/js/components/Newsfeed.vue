<template>
	<div class="row">
		<div class = "col-md-12">
			<div class="col-sm-6">
				
				<div class="well well-sm">
					&nbsp<b>Create Post</b>
					<textarea style="overflow:hidden" placeholder="Whats on your mind ?"> 
					</textarea><br>
	
					<span class="btn btn-primary fa fa-pencil-alt">&nbsp Post </span>
					<span class="btn btn-success fa fa-grin-hearts fa-lg"></span>
					<span class="btn btn-success fa fa-user-plus fa-lg"></span>
					<span class="btn btn-success fa fa-street-view fa-lg"></span>




				</div>
			</div>

			<div class="col-sm-2">
				<div class="row">
				  <div class="column">
				    <div class="card">
				      <p><i class="fa fa-user"></i></p>
				      <h3>5,000</h3>
				      <p>Friends</p>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default {
		data: function(){
			return {

			}
		},

		created: function(){

		},
		methods: {

		},
		filters: {

		}
	}
</script>

<style>
	.post {
		width: 60%;
	}

	.well-sm {
	}


	.btn-success {
		background-color: #16a085;
		padding-top: 9px;
		padding-bottom: 11px;
	}

	.btn-primary {
		background-color: #2980b9;
		padding-top: 9px;
		padding-bottom: 11px;
	}


	.column {
	  float: left;
	  width: 100%;
	  padding: 0 5px;
	}

	.row {margin: 0 -5px;}

	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	    display: block;
	    margin-bottom: 10px;
	  }
	}

	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  padding: 16px;
	  text-align: center;
	  background-color: #444;
	  color: white;
	}

	.fa-user {font-size:50px;}

	textarea {
		width: 100%;
		height: 100px;
	}

</style>