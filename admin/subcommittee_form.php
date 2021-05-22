<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Sub-Committee Form</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    	integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    	integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src='./res/alpine.js'></script>

	<script>
		function data() {
			return {
				email: '',
				password: '',
				loggedIn: true,
				newMember: {
					name: '',
					head: ''
				},
				members: [],
				loadData() {
					this.http('GetSubCommittee', 'POST', {}, data => {
						this.members = data;
					});
				},
				http(query, method = 'GET', params = {}, successCallback = data => { }, headers = {}) {
					fetch('./api/index.php', {
						method,
						headers,
						body: JSON.stringify({ query, params })
					})
						.then(response => {
							if (response.status >= 200 && response.status < 300) {
								return Promise.resolve(response);
							}
							else {
								return Promise.reject(response);
							}
						})
						.then(response => response.json())
						.then(successCallback)
						.catch(error => console.error(error));
				},
				login() {
					this.http('Login', 'POST', {}, data => this.loggedIn = true, {
						'Authorization': 'Basic ' + btoa(this.email + ':' + this.password)
					});
				},
				addMember() {
					let photo = document.getElementById('imageFile').files[0];
					const reader = new FileReader();
					reader.onload = () => {
						this.http('AddSubCommittee', 'POST', {
							name: this.newMember.name,
							image: reader.result,
							head: this.newMember.head
						}, data => this.members.push({
							id: data.id,
							name: this.newMember.name,
							image: data.image,
							head: this.newMember.head
						}));
					};
					reader.readAsDataURL(photo);
				},
				deleteMember(member) {
					this.http('DeleteSubCommittee', 'POST', { id: member.id }, data => this.members.splice(this.members.findIndex(x => x.id == member.id), 1));
				}
			}
		}

	</script>


</head>



<body x-data="data()" x-init="loadData()">
	<form x-show="!loggedIn">
		<label>Email <input type="email" x-model="email" /></label>
		<label>Password <input type="password" x-model="password" /></label>
		<input type="button" value="Login" @click="login()" />
	</form>



	<div x-show="loggedIn">


		<!-- Nav Bar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="./index.php">CSI-PCE Admin Panel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="./index.php">Go Back</a>
					<a class="nav-item nav-link" href="./logout.php">Logout</a>
				</div>
			</div>
		</nav>



		<!-- Title -->
		<div class="container">
			<h1 style="text-align: center; padding: 30px; "><strong>Change Sub-Committee</strong></h1>	
		</div>

		<!-- Instructions -->
		<div class="container">
			<div class="accordion" id="accordionExample">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-center" style="color:red;" type="button"
								data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
								aria-controls="collapseOne">
								Please read Instructions before use
							</button>
						</h2>
					</div>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							1. Here You Can Add Sub-Committee (Sub-Core) Members that appears on pressing the Team Members Button of a Committee Member.<br>
							2. Find the C-ID of the member under which the added member should appear from the Change Committee Page.<br>
							3. Only Press the 'Add Member' button once and wait 4-5 seconds for the member to be added.The Process happens in the background without any indication and the results will be shown in the table below as soon as it is complete. So please don't press the button again and again thinking that nothing is happening, otherwise it may cause some errors.<br> 
							4. Don't use quotes and special characters for the Name of the member<br>
							5. New Members that are added will be added to the very bottom of the list of current Head or if a new head is used then at the bottom of the list.<br>
							6. If you want to rectify any mistakes, you can remove the member from the button in the table and then add the member again with the corrected details.<br>
							7. The Members will be shown on the website in the order in which they are added. So if you want to change the order, then remove all the members of the Head Committee Member and then add them in the order which is needed.<br>
							8. Only upload an square jpg image that is optimized and compressed. Resolution of 1000px x 1000px is preffered. Larger image size will lead to longer page load times of the website.<br>
							9. For Any Other Doubts, Please Check the source code of the admin panel and website to find the corresponding details.
					</div>
				</div>
			</div>
		</div>


		<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px; background-color: rgba(0,0,0,0.05);">

			<!-- Form Name -->
			<legend style="text-align: center;"><strong>Add New Sub-Committee Members</strong></legend>

			<form>
				<div class="form-group">
					<label>Member Name</label>
					<input type="text" class="form-control" placeholder="Enter Full Name of the Member" x-model="newMember.name" aria-describedby="name_help" />
					<small id="name_help" class="form-text text-muted">Enter the name of the member eg. Michael Scott.</small>
				</div>

				<div class="form-group">

					<label>Member Image</label>
					<input type="file" accept="image/*" id="imageFile" aria-describedby="image_help"/>
					<small id="image_help" class="form-text text-muted">Please use a Square (1000px x 1000px) jpg Image and the file name for the image should be the name of the member, eg. Michael_Scott.jpg</small>
				</div>

				<div class="form-group">

					<label>Head Member C-ID</label>
					<input type="text" class="form-control" placeholder="Enter the C-ID of the Head Committee Member" x-model="newMember.head" aria-describedby="term_help"/>
					<small id="term_help" class="form-text text-muted">Please enter the C-ID of the Head Committee Member (Find it from the Committee Page). </small>
				</div>

				<input class="btn btn-primary" type="button" value="Add Member" @click="addMember()" />
			</form>

		</div>



		<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px;">

			<!-- Table Name -->
			<legend style="text-align: center;"><strong>Existing Sub-Committee Members</strong></legend>

			<div class="table-responsive">

			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>SC-ID</th>
						<th>Name</th>
						<th>Image Name</th>
						<th>Head C-ID</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody>
					<template x-for="member in members">
						<tr>
							<td x-text="member.id"></td>
							<td x-text="member.name"></td>
							<td x-text="member.image"></td>
							<td x-text="member.head"></td>
							<td><button class="btn btn-danger"
									@click="confirm(`Are you sure you want to delete ${member.name}?`) && deleteMember(member)">&times;</button>
							</td>
						</tr>
					</template>
				</tbody>
			</table>
			</div>
		</div>


	</div>
</body>

</html>