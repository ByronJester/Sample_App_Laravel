<template>
<div class="well well-sm">
	<div class="row">
		<div class="col-lg-12">

			<div class="row" v-if = "setProfile">
				<div class="col-sm-4">
					<h4>Profile Picture:</h4>
					<img v-bind:src = "user.image" width="100%" height="140px">
					<div class="panel panel-default" style="border-radius: 0px !important;">
						<div class="panel-body">
          		<input type="file" accept="image/*" id ="file" ref="file" v-on:change = "pp" name = "img_id">
          	</div>
          </div>

          <h4>Fullname:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.f_name"  placeholder="Enter Fullame" v-on:change = "fn">
					</div>

					<h4>Email:</h4>
					<div class="form-group">
					  <input type="email" class="input" v-model = "user.email"  placeholder="Enter Email" v-on:change = "em">
					</div>

					<h4>Contact Number:</h4>
					<div class="form-group">
					  <input type="number" class="input" v-model = "user.contact"  placeholder=" Enter Mobile Number" v-on:change = "cn">
					</div>

					<h4>Age:</h4>
					<div class="form-group">
					  <input type="number" class="input" v-model = "user.age" placeholder=" Enter Age" v-on:change = "ag">
					</div>
				</div>

				<div class="col-sm-4">
					<h4>Gender:</h4>
					<div class="panel panel-default">
						<div class="panel-body">
						  <input type="radio" value="Male" 	v-model="user.gender" v-on:change = "ge"> Male
	  					<input type="radio" value="Female" v-model="user.gender" v-on:change = "ge"> Female
	  				</div>
					</div>

					<h4>Birthdate:</h4>
					<div class="form-group">
					  <input type="date" class="input" v-model = "user.date"  v-on:change = "bd">
					</div>

					<h4>Address:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.address"  placeholder="Enter Address"  v-on:change = "ad">
					</div>

					<h4 style="margin-top: 20px">College Course:</h4>
					<select v-model="user.course" class="input" v-on:change = "cc">
					  <option>BSIT</option>
					  <option>BSHRM</option>
					  <option>BSC</option>
					  <option>BSED</option>
					  <option>BSCS</option>
					  <option>BSTM</option>
					  <option>BSBA</option>
					</select>

					<h4 style="margin-top: 15px">College Name:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.college" placeholder="Enter College Name" v-on:change = "un">
					</div>

					<h4>Status:</h4>
					<div class="progress">
				    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" v-bind:style = "{ width: percentage + '%'}">
				      {{percentage}}% Complete
				    </div>
				  </div>

					<div class="form-group" style="margin-top: 11%;">
					  <button class="input btn btn-primary" v-on:click.prevent ="setUp" value="SET UP" v-bind:disabled = "disabled">
					  	<span class="fas fa-users-cog fa-lg"></span> SET UP PROFILE
					  </button>
					</div>

				</div>

				<div class="col-sm-4">
					<div class="panel panel-default" style="margin-top: 10%;">
						<div class="panel-body">
							<b>YOUR PROFILE</b>
	  				</div>
					</div>
					<div class="flip-card">
					  <div class="flip-card-inner">
					    <div class="flip-card-front">
					      <img v-bind:src="user.image" style="width:100%;height:390px;">
					    </div>
					    <div class="flip-card-back">
					      <h3 style="font-size: 20px; font-weight: bold;">{{user.f_name}}</h3> 
					      <p style="font-weight:  bold">{{user.email}}</p> 
					      <p style="font-weight:  bold">{{user.contact}}</p> 
					      <p style="font-weight:  bold">{{user.age}}</p> 
					      <p style="font-weight:  bold">{{user.gender}}</p> 
					      <p style="font-weight:  bold">{{user.date}}</p> 
					      <p style="font-weight:  bold">{{user.address}}</p> 
					      <p style="font-weight:  bold">{{user.course}}</p> 
					      <p style="font-weight:  bold">{{user.college}}</p> 
					    </div>
					  </div>
					</div>
				</div>
			</div>

			<div class="row" v-if = "edtProfile">
				<div class="col-sm-4">
					<h4>Profile Picture:</h4>
					<img v-bind:src = "user.image" width="100%" height="140px">
					<div class="panel panel-default" style="border-radius: 0px !important;">
						<div class="panel-body">
          		<input type="file" accept="image/*" id ="file" ref="file" v-on:change = "pp" name = "img_id">
          	</div>
          </div>

          <h4>Fullname:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.f_name"  placeholder="Enter Fullame" v-on:change = "fn">
					</div>

					<h4>Email:</h4>
					<div class="form-group">
					  <input type="email" class="input" v-model = "user.email"  placeholder="Enter Email" v-on:change = "em">
					</div>

					<h4>Contact Number:</h4>
					<div class="form-group">
					  <input type="number" class="input" v-model = "user.contact"  placeholder=" Enter Mobile Number" v-on:change = "cn">
					</div>

					<h4>Age:</h4>
					<div class="form-group">
					  <input type="number" class="input" v-model = "user.age" placeholder=" Enter Age" v-on:change = "ag">
					</div>
				</div>

				<div class="col-sm-4">
					<h4>Gender:</h4>
					<div class="panel panel-default">
						<div class="panel-body">
						  <input type="radio" value="Male" 	v-model="user.gender" v-on:change = "ge"> Male
	  					<input type="radio" value="Female" v-model="user.gender" v-on:change = "ge"> Female
	  				</div>
					</div>

					<h4>Birthdate:</h4>
					<div class="form-group">
					  <input type="date" class="input" v-model = "user.date"  v-on:change = "bd">
					</div>

					<h4>Address:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.address"  placeholder="Enter Address"  v-on:change = "ad">
					</div>

					<h4 style="margin-top: 20px">College Course:</h4>
					<select v-model="user.course" class="input" v-on:change = "cc">
					  <option>BSIT</option>
					  <option>BSHRM</option>
					  <option>BSC</option>
					  <option>BSED</option>
					  <option>BSCS</option>
					  <option>BSTM</option>
					  <option>BSBA</option>
					</select>

					<h4 style="margin-top: 15px">College Name:</h4>
					<div class="form-group">
					  <input type="text" class="input" v-model = "user.college" placeholder="Enter College Name" v-on:change = "un">
					</div>

					<h4>Status:</h4>
					<div class="progress">
				    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" v-bind:style = "{ width: percentage + '%'}">
				      {{percentage}}% Complete
				    </div>
				  </div>

				  <button class="btn btn-primary btn-u" v-on:click.prevent ="editProfile" v-bind:disabled = "disabled">
				  	<span class="fas fa-user-edit fa-md"></span> EDIT 
				  </button>

				  <button class="btn btn-danger btn-d" v-on:click.prevent ="deleteProfile" v-bind:disabled = "disabled">
				  	<span class="fas fa-user-times fa-md"></span> DELETE 
				  </button>
				</div>

				<div class="col-sm-4">
					<div class="panel panel-default" style="margin-top: 10%;">
						<div class="panel-body">
							<b>YOUR PROFILE</b>
	  				</div>
					</div>
					<div class="flip-card">
					  <div class="flip-card-inner">
					    <div class="flip-card-front">
					      <img v-bind:src="user.image" style="width:100%;height:390px;">
					    </div>
					    <div class="flip-card-back">
					      <h3 style="font-size: 20px; font-weight: bold;">{{user.f_name}}</h3> 
					      <p style="font-weight:  bold">{{user.email}}</p> 
					      <p style="font-weight:  bold">{{user.contact}}</p> 
					      <p style="font-weight:  bold">{{user.age}}</p> 
					      <p style="font-weight:  bold">{{user.gender}}</p> 
					      <p style="font-weight:  bold">{{user.date}}</p> 
					      <p style="font-weight:  bold">{{user.address}}</p> 
					      <p style="font-weight:  bold">{{user.course}}</p> 
					      <p style="font-weight:  bold">{{user.college}}</p> 
					    </div>
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
				user: {
					image 	: './assets/images/pp1.png',
					f_name	: '',
					email 	: '',
					contact	: '',
					age 		: '',
					gender  : '',
					date 		: '',
					address : '',
					course  : '',
					college : ''
				},
				user_id 	: '',
				disabled 	: true,
				percentage: 0,
				setProfile: false,
				edtProfile: false,
				handler : {
					pp : true,
					fn : true,
					em : true,
					cn : true,
					ag : true,
					ge : true,
					bd : true,
					ad : true,
					cc : true,
					un : true,
				},
			}
		},
		created: function(){
			this.getUser()
		},
		methods: {
			getUser: function(){
				axios({
					method: 'GET',
					url: '/api/profile',
				}).then(response =>{
					if(response.data.length > 0){
						this.edtProfile 	= true
						this.user_id 			= response.data[0].profile_id
						this.user.image 	= '/assets/images/profile_picture/' + response.data[0].image
						this.user.f_name 	= response.data[0].fullname
						this.user.email 	= response.data[0].email
						this.user.contact = response.data[0].contact
						this.user.age 		= response.data[0].age
						this.user.gender 	= response.data[0].gender
						this.user.date 		= response.data[0].birthdate
						this.user.address = response.data[0].address
						this.user.course 	= response.data[0].course
						this.user.college = response.data[0].college

						this.percentage 	= 100
						this.disabled 		= false

					}else{
						this.setProfile = true
					}
				}).catch(error => {

				})
			},

			setUp: function(){
				axios({
					method: 'POST',
					url: '/api/profile',
					data: this.user
				}).then(response =>{
					if(response.data.code > 0){
						swal({
						  title: 'Good Job!',
						  type: 'success', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						}).then(result =>{        
						  location.reload()
						}, dismiss => {
							location.reload()
						})
					}else{
						swal({
						  title: 'Error!',
						  type: 'warning', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						}).then(result =>{        
						}, dismiss => {
						})
					}
					
				}).catch(error =>{

				})
			},

			editProfile: function(){
				this.getUser()
				axios({
					method: 'PATCH',
					url: '/api/profile/' + this.user_id,
					data: this.user
				}).then(response => {
					if(response.data.code > 0){
						swal({
						  title: 'Good Job!',
						  type: 'success', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						}).then(result =>{        
							location.reload()
						}, dismiss => {
							location.reload()
						})
					}else{
						swal({
						  title: 'Error!',
						  type: 'warning', 
						  html: `<b>${response.data.msg}</b>`,
						  showCloseButton: true,
						  showCancelButton: false,
						  focusConfirm: false,
						  confirmButtonText:'OKAY',
						  cancelButtonText:'Cancel',
						}).then(result =>{        
						}, dismiss => {
						})
					}
				}).catch(error => {

				})
			},

			deleteProfile: function(){
				swal({
				  title: 'Warning!',
				  type: 'warning', 
				  html: `<b>Are you sure you want to remove your profile ?</b>`,
				  showCloseButton: true,
				  showCancelButton: true,
				  focusConfirm: false,
				  confirmButtonText:'OKAY',
				  cancelButtonText:'Cancel',
				}).then(result =>{
					axios({
						method: 'DELETE',
						url: 'api/profile/' + this.user_id
					}).then(response => {
						if(response.data.code > 0){
							location.reload()
						}
					}).catch(error => {

					})

				}, dismiss => {
					
				})
			},

			fn: function(){
				this.action(0, this.user.f_name, this.handler.fn)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			em: function(){
				this.action(1, this.user.email, this.handler.em)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			cn: function(){
				this.action(2, this.user.contact, this.handler.cn)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ag: function(){
				this.action(3, this.user.age, this.handler.ag)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ge: function(){
				this.action(4, this.user.gender, this.handler.ge)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			bd: function(){
				this.action(5, this.user.date, this.handler.bd)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ad: function(){
				this.action(6, this.user.address, this.handler.ad)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			cc: function(){
				this.action(7, this.user.course, this.handler.cc)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			un: function(){
				this.action(8, this.user.college, this.handler.un)

				if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			pp: function(e){
				var files = e.target.files || e.dataTransfer.files;
		      if (!files.length)
		        return;

		      this.user.image = files[0]

		      var reader = new FileReader()

		      reader.readAsDataURL(files[0])

		      reader.onload = (e) => {
		        this.user.image = e.target.result
		      }

		      this.user.image = files[0]
		     
	      this.action(9, this.user.image, this.handler.pp)

	      if(this.percentage >= 100){
					this.percentage = 100
					this.disabled = false
				}else{
					this.disabled = true
				}
	  
	    },

			action: function(handler, elem, bools){
				var data = null

				if(elem == ""){
					this.percentage = this.percentage - 10
					data = true
				}else{
					if(bools){
						this.percentage = this.percentage + 10
						data = false
					}
				}

				switch(handler){
					case 0 :
					this.handler.fn = data
					break

					case 1 :
					this.handler.em = data
					break

					case 2 :
					this.handler.cn = data
					break

					case 3 :
					this.handler.ag = data
					break

					case 4 :
					this.handler.ge = data
					break

					case 5 :
					this.handler.bd = data
					break

					case 6 :
					this.handler.ad = data
					break

					case 7 :
					this.handler.cc = data
					break

					case 8 :
					this.handler.un = data
					break

					case 9 :
					this.handler.pp = data
					break

					default:
				}

			}
		},
		filters:{

		}
	}
	
</script>

<style>
	.well-sm {
		text-align: center;
		background-color: #ecf0f1;
		/*background-image: url("/assets/images/bg2.png");*/
	}

	.progress-bar-danger{
		background-color: #636e72;
	}

	h4 {
		text-align: left !important;
		font-size: 10px !important;
	}

	.panel-default{
		padding-top: 0px !important;
	}

	.input {
		padding-left: 5px;
		width: 100%;
		height: 30px;
		border-radius: 5px;
	}

	.btn {
		margin-top: 10px;
	}

	.btn-u {
		margin-top: 7% !important;
		font-size: 12px;
		float: left;
		width: 49%;
	}

	.btn-d {
		margin-top: 7% !important;
		font-size: 12px;
		float: right;
		width: 49%;
		background-color: #eb4d4b;
	}

	.panel {
		height: 50px;
	}

	.flip-card {
	  background-color: transparent;
	  width: 100%;
	  height: 200px;
	  perspective: 1000px; /* Remove this if you don't want the 3D effect */
	}

	/* This container is needed to position the front and back side */
	.flip-card-inner {
	  position: relative;
	  width: 100%;
	  height: 390px;
	  text-align: center;
	  transition: transform 0.8s;
	  transform-style: preserve-3d;
	}

	/* Do an horizontal flip when you move the mouse over the flip box container */
	.flip-card:hover .flip-card-inner {
	  transform: rotateY(180deg);
	}

	/* Position the front and back side */
	.flip-card-front, .flip-card-back {
	  position: absolute;
	  width: 100%;
	  height: 100%;
	  backface-visibility: hidden;
	}

	/* Style the front side (fallback if image is missing) */
	.flip-card-front {
	  background-color: #bbb;
	  color: black;
	}

	/* Style the back side */
	.flip-card-back {
	  background-color: #74b9ff;
	  color: white;
	  transform: rotateY(180deg);
	  /*background-image: url("/assets/images/bg2.png");*/
	  /*background-size: 100% 390px;*/
	  /*background-repeat: no-repeat;*/
	}


/*	@media screen and (max-width: 600px) {
	  .flip-card-front {
	    width: 100%;
	  }
	}*/


</style>