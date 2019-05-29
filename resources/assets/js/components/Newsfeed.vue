<template>
<div class="row">
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

			<div class="col-sm-3">
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

			<div class="col-sm-3">
				<div class="row">
				  
				</div>
			</div>
		</div>
	</div>

	<div class = "row">
		<div class="col-md-12" v-if = "seen">
			<div class="col-sm-9">
			</div>
			<div class="col-sm-3">
				<div v-bind:class="{'alert': 'true', 'alert-success': isSuccess, 'alert-danger': isError}">
			    <strong>{{status}}!</strong> {{message}}.
			  </div>
			</div>
		</div>
	</div>

	<div class = "row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div v-for = "post in posts">
					<div class="well well-sm" style="height: 350px;">
						<h4 class="time">{{post.created.date | date}}</h4>
						<div v-if = "post.owner" class = "action">				
							<span class = "btn btn-default fa fa-edit fa-md" v-on:click.prevent = "editPost(post.post_id, post.user_id)"></span>
							<span class = "btn btn-default fa fa-trash-alt fa-md" v-on:click.prevent = "deletePost(post.post_id, post.user_id)"></span>
						</div>
						<a class="name" href=""> {{post.name}} </a>
						<div v-if = "post.post_id != post_id">
							<div class="well well-sm" style="overflow: hidden; width: 100%">
								{{post.post}} 
							</div>
							<span class="btn btn-default fa fa-thumbs-up fa-lg" v-on:click.prevent = "likePost(post.post_id)" 
								:style="[post.color ? like : unlike ]"> {{post.count}}
							</span>
							<span class="btn btn-default fa fa-comments fa-lg"> 101</span>
						</div>
						<div v-if = "post.post_id == post_id">
							<textarea style="overflow:hidden" v-model = "post.post"> 
							</textarea><br>
							<span class="btn btn-default fa fa-copy fa-md" v-on:click.prevent = "confirmEdit(post.post)"> Edit</span>
							<span class="btn btn-default fa fa-window-close fa-md"  v-on:click.prevent = "cancelEdit()"> Cancel</span>
						</div>
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
				user 			: {},
				seen 			: false,
				status    : '',
				message 	: '',
				isSuccess : false,
				isError 	: false,
				posts 		: [],
				isDeleted : false,
				post_id   : '',
				user_id 	: '',
				unlike    : {
			    color: '#95a5a6',
			  },
			  like 			: {
			  	color: '#2980b9',
			  },
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
				axios({
					method: 'POST',
					url: '/api/post',
					data: this.user
				}).then(response => {
					this.getPost()
					if(response.data.error > 0){
						this.isSuccess  = false
						this.isError 		= true
						this.status 		= response.data.status
						this.message		= response.data.msg.post[0]
						this.seen 			= true

						setTimeout(function () {
						  this.seen = false
						}.bind(this), 4000)
					}else{
						if(response.data.code > 0){
							this.isError 	 = false
							this.isSuccess = true
							this.status  	 = response.data.status
							this.message 	 = response.data.msg
							this.seen  		 = true

							setTimeout(function () {
							  this.seen = false
							  this.user.post = ''
							}.bind(this), 4000)
						}else{
							this.isSuccess = false
							this.isError 	 = true
							this.status  	 = response.data.status
							this.message 	 = response.data.msg
							this.seen  		 = true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 4000)
						}
					}

				}).catch(error => {

				})
			},

			editPost: function(id, uid){
				this.post_id 	  = id
				this.user_id 		= uid
			},

			confirmEdit: function(post){
				axios({
					method: 'PATCH',
					url: `/api/post/${this.post_id}`,
					data: {'post': post, 'user_id': this.user_id}
				}).then(response => {
					if(response.data.code == 'error'){
						this.isSuccess = false
						this.isError 	 = true
						this.status  	 = 'Error'
						this.message 	 = response.data.msg.post[0]
						this.seen  		 = true

						setTimeout(function () {
						  this.seen = false
						}.bind(this), 4000)
					}else{
						if(response.data.code > 0){
							this.getPost()
							this.post_id 		= ''
							this.isError 	 	= false
							this.isSuccess 	= true
							this.status  	 	= 'OKAY'
							this.message 	 	= response.data.msg
							this.seen  		 	= true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 4000)
						}else{
							this.isSuccess = false
							this.isError 	 = true
							this.status  	 = 'Error'
							this.message 	 = response.data.msg
							this.seen  		 = true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 4000)
						}
					}
				}).catch(error => {

				})
			},

			cancelEdit: function(id){
				this.post_id = ''
				this.getPost()
			},

			deletePost: function(id, uid){
				swal({
				  title: 'Warning!',
				  type: 'warning', 
				  html: `<b>Are you sure you want to delete this post ?</b>`,
				  showCloseButton: true,
				  showCancelButton: true,
				  focusConfirm: false,
				  confirmButtonText:'OKAY',
				  cancelButtonText:'Cancel',
				}).then(result =>{
					axios({
						method: 'DELETE',
						url: 	`/api/post/${id}`,
						data: {'user_id': uid}
					}).then(response => {
						if(response.data.code > 0){
							this.getPost()
							this.isSuccess = true
							this.isError 	 = false
							this.status  	 = 'OKAY'
							this.message 	 = response.data.msg
							this.seen  		 = true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 4000)
						}else{
							this.isSuccess = false
							this.isError 	 = true
							this.status  	 = 'Warning'
							this.message 	 = response.data.msg
							this.seen  		 = true

							setTimeout(function () {
							  this.seen = false
							}.bind(this), 4000)
						}
					}).catch(error => {

					})
				}, dismiss => {
				})
			},

			likePost: function(id){
				axios({
					method: 'POST',
					url: '/api/like',
					data: {'post_id': id}
				}).then(response => {
					this.getPost()
				}).catch(error => {

				})
			},		

		},

		filters: {
			date: function(date){
				return date.slice(0, 10)
			},
		}
	}
</script>

<style>
	.post {
		width: 60%;
	}
	.name {
		font-family: monospace;
		font-size: 15px;
		color: black !important;
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

	.alert{
		bottom: 0px;
	}
		

	.fa-edit{
		background-color: #2980b9;
		color: white;
		margin-bottom: 5px;
	}

	.fa-trash-alt {
		background-color: #eb4d4b;
		color: white;
		margin-bottom: 5px;
	}

	.fa-copy{
		background-color: #2980b9;
		color: white;
		margin-bottom: 5px;
	}

	.fa-window-close{
		background-color: #d63031;
		color: white;
		margin-bottom: 5px;
	}

	.fa-user {
		font-size:50px;
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
	  float: center;
	  width: 15%;
	  padding: 0 5px;
	  position: fixed;
	}

	.row {
		margin: 0 -5px;
	}

	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}

	.alert-success{
		background-color: #00cec9;
		color: black;
	}

	.alert-danger{
		background-color: #ff7675;
		color: black;
	}

	.alert{
		bottom: 0px;
		position: fixed;
	}


	@media screen and (max-width: 600px) {
	  .column {
	    width: 100%;
	    display: block;
	    margin-bottom: 10px;
	    position: relative;
	  }

	  .alert{
	  	width: 100%;
	  	display: block;
	    margin-bottom: 10px;
	    position: relative;
	  }
	}

	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  padding: 16px;
	  text-align: center;
	  background-color: #444;
	  color: white;
	  height: 182px;
	}

	textarea {
		width: 100%;
		height: 100px;
	}

	.time {
		font-family: Courier New;
		text-align: right !important;
		font-size: 12px;
	}

	.action {
		float: right;
	}

</style>