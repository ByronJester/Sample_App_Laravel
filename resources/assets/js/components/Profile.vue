<template>
<div class="well well-sm">
	<div class="row">
		<div class="col-lg-12">

			<div class="row">
				<div class="col-sm-4">
					<h4>Profile Picture:</h4>
					<img v-bind:src = "user.image" width="100%" height="140px">
					<div class="panel panel-default">
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
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" v-bind:style = "{ width: percentage + '%'}">
				      {{percentage}}% Complete
				    </div>
				  </div>

					<div class="form-group" style="margin-top: 11%;">
					  <button class="input btn btn-success" v-on:click.prevent ="setUp" value="SET UP" v-bind:disabled = "disabled">
					  	<span class="fas fa-users-cog fa-lg"></span> SET UP PROFILE
					  </button>
					</div>

				</div>

				<div class="col-sm-4">
					HUHUHU
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
				disabled 	: true,
				percentage: 0,
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

		},
		methods: {
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

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			cn: function(){
				this.action(2, this.user.contact, this.handler.cn)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ag: function(){
				this.action(3, this.user.age, this.handler.ag)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ge: function(){
				this.action(4, this.user.gender, this.handler.ge)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			bd: function(){
				this.action(5, this.user.date, this.handler.bd)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			ad: function(){
				this.action(6, this.user.address, this.handler.ad)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			cc: function(){
				this.action(7, this.user.course, this.handler.cc)

				if(this.percentage === 100){
					this.disabled = false
				}else{
					this.disabled = true
				}
			},

			un: function(){
				this.action(8, this.user.college, this.handler.un)

				if(this.percentage === 100){
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

	      if(this.percentage === 100){
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

	.panel {
		height: 50px;
	}



</style>