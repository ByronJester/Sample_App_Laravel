<template>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-xs-12">
				<form class="login-form">
					<input type="text" class="login-input" placeholder="Username or Email" v-model = "log.un">
					<input type="password" class="login-input" placeholder="Password" v-model = "log.pw"> 
					<input type="submit" class="login-btn btn btn-success" value="LOGIN"  v-on:click.prevent = "loginAccount">
				</form>
			</div>

			<div class="col-xs-12"> 
				<div class="well well-sm">
					<h3>REGISTER ACCOUNT</h3>
					<form>
						<div class="form-group">
					    <input type="text" class="form-control" placeholder="Enter Username" v-model = "reg.un">
					  </div>

					  <div class="form-group">
					    <input type="email" class="form-control"  placeholder="Enter Email" v-model = "reg.em">
					  </div>

					  <div class="form-group">
					    <input type="password" class="form-control"  placeholder="Enter Password" v-model = "reg.pw">
					  </div>

					  <div class="form-group">
					    <input type="password" class="form-control"  placeholder=" Confirm Password" v-model = "reg.cp">
					  </div>

					  <div class="form-group">
					    <input type="submit" class="form-control btn btn-primary" v-on:click.prevent = "registerAccount" value="REGISTER ACCOUNT">
					  </div>
					</form>
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
			reg: {
				un: '',
				em: '',
				pw: '',
				cp: ''
			},

			log: {
				un: '',
				pw: ''
			},

			seen: false
		}
			
	},
	created: function(){
	
	},
	methods: {
		registerAccount: function(){

			axios({
				method: 'POST',
				url: '/api/register',
				data: this.reg
			}).then(response => {
				if(response.data.code > 0){
					this.reg.un = ""
					this.reg.em = ""
					this.reg.pw = ""
					this.reg.cp = ""

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
					  
					}, dismiss => {
						
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

		loginAccount: function(){
			axios({
				method: 'POST',
				url: '/api/login',
				data: this.log
			}).then(response => {
				if(response.data.code > 0){
					window.location = '/home'
				}else{
					swal({
					  title: 'Warning!',
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
		}
	},
	filters:{

	}
}
</script>


<style>
	h3 {
		text-align: center;
	}

	.well-sm{
		margin-top: 5%;
		padding-top: 0px !important;
		padding-bottom: 0px !important;
		width: 320px;
		opacity: 0.9;
		border-radius: 5%;
	}

	.form-control{
		width: 100%;
		text-align: center;
	}
	
	.login-input{
		margin-right: 5px;
		border: 2px solid;
	  padding: 5px;
	  border-radius: 25px;
	  text-align: center;
	  font-size: 12px;
	  height: 40px;
	  width: 160px;
	  opacity: 0.7;
	  margin-bottom: 5px;
	  font-weight: bold;
	 	color: #222f3e;
	}

	.btn-success{
		padding-right: 20px;
		padding-left: 20px;
	  border-radius: 10px;
	  background-color: #ee5253;
	  font-size: 16px;
	  height: 40px;
	  width: 160px;
	  margin-bottom: 5px;
	}

	.login-form{
		float: right;
		margin-top: 2%;
	}

</style>