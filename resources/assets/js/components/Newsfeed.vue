<template>
	<div class="row">
		<div class = "col-md-12">
			<div class="col-sm-6">
				<div class="well well-sm">
					&nbsp<b>Create Post</b>
					<textarea style="overflow:hidden" placeholder="Whats on your mind ?" v-model = "user.post"> 
					</textarea><br>
	
					<span class="btn btn-primary fa fa-pencil-alt" v-on:click.prevent = "createPost">&nbsp Post </span>
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

			<div class="col-sm-4">
			</div>
		</div>

		<div class="col-md-12" v-if = "seen">
			<div class="col-sm-6">
				<div v-bind:class="{alert: 'true', 'alert-success': isSuccess, 'alert-danger': isError}">
					<span class="close fa fa-window-close" v-on:click.prevent = "closeAlert"></span>
			    <strong>{{status}}!</strong> {{message}}.
			  </div>
			</div>

			<div class="col-sm-6">
			</div>
		</div>

		<div class="col-md-12">
			<div class="col-md-6" v-for = "">
				<div v-for = "post in posts">
					<div class="well well-sm" style="height: 350px;">
						<h4 class="time">{{post.created.date | date}}</h4>
						<span class = "btn btn-default fa fa-trash-alt fa-md"></span>
						<span class = "btn btn-default fa fa-edit fa-md" ></span>
						<a class="name" href=""> {{post.name[0].fullname}} </a>
						<!-- <textarea style="overflow:hidden" :disabled = "true"> -->
						<div class="well well-sm" style="overflow: hidden; width: 100%">
							{{post.post}} 
						</div>
						<!-- </textarea><br> -->
						<span class="btn btn-default fa fa-thumbs-up fa-lg"> 101</span>
						<span class="btn btn-default fa fa-comments fa-lg"> 101</span>
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
				user 			: {},
				seen 			: false,
				status    : '',
				message 	: '',
				isSuccess : false,
				isError 	: false,
				posts 		: []
			}
		},

		created: function(){
			this.getPost()
		},

		methods: {

			getPost: function(){
				axios({
					method: 'GET',
					url: '/api/post'
				}).then(response => {
					this.posts = response.data.sort((a ,b) => b.created.date.localeCompare(a.created.date))
				}).catch(error => {

				})
			},

			createPost: function(){
				if(this.user.post.length > 190){
					this.isError = true
					this.seen 	 = true
					this.status  = 'Warning'
					this.message = 'The post length is too long!'
				}else{
					axios({
						method: 'POST',
						url: '/api/post',
						data: this.user
					}).then(response => {
						this.getPost()

						if(response.data.error > 0){
							this.isError 		= true
							this.status 		= response.data.status
							this.message		= response.data.msg.post[0]
							this.seen 			= true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 3000)
						}else{
							if(response.data.code > 0){
								this.isSuccess = true
								this.status  	 = response.data.status
								this.message 	 = response.data.msg
								this.seen  		 = true

								setTimeout(function () {
								  this.seen = false
								  this.user.post = ''
								}.bind(this), 3000)
							}else{
								this.isError 	 = true
								this.status  	 = response.data.status
								this.message 	 = response.data.msg
								this.seen  		 = true

								setTimeout(function () {
								  this.seen = false
								}.bind(this), 3000)
							}
						}

					}).catch(error => {

					})
				}
			},

			closeAlert: function(){
				this.seen = false
			},

		},

		filters: {
			date: function(date){
				return date.slice(0, 10)
			}
		}
	}
</script>

<style>
	.post {
		width: 60%;
	}
	.name {
		font-family: Courier New;
		font-size: 15px;
		color: black !important;
		font-weight: bold;
	}

	.well-sm {
	}

	.fa-thumbs-up {
		width: 49%;
		text-align: center;
		float: left;
		color: #2e86de;
	}

	.fa-comments {
		width: 49%;
		text-align: center;
		float: right;
		color: #00b894;
	}
		

	.fa-edit{
		background-color: #2980b9;
		color: white;
		margin-bottom: 5px;
		float: right;
	}

	.fa-trash-alt {
		background-color: #eb4d4b;
		color: white;
		margin-bottom: 5px;
		float: right;
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

	.time {
		font-family: Courier New;
		text-align: right !important;
		font-size: 12px;
	}

</style>