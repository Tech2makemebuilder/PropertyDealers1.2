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
	<title>Committee Form</title>
	
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
					post: '',
					term: ''
				},
				members: [],
				loadData() {
					this.http('GetCommittee', 'POST', {}, data => {
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
						this.http('AddCommittee', 'POST', {
							name: this.newMember.name,
							post: this.newMember.post,
							image: reader.result,
							term: this.newMember.term
						}, data => this.members.push({
							id: data.id,
							name: this.newMember.name,
							post: this.newMember.post,
							image: data.image,
							term: this.newMember.term
						}));
					};
					reader.readAsDataURL(photo);
				},
				deleteMember(member) {
					this.http('DeleteCommittee', 'POST', { id: member.id }, data => this.members.splice(this.members.findIndex(x => x.id == member.id), 1));
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
			<h1 style="text-align: center; padding: 30px; "><strong>Change Committee Page</strong></h1>	
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
							1. Here You Can Add Committee Members that appear on the Committee Page of the Website.<br>
							2. Only Press the 'Add Member' button once and wait 4-5 seconds for the member to be added. The Process happens in the background without any indication and the results will be shown in the table below as soon as it is complete. So please don't press the button again and again thinking that nothing is happening, otherwise it may cause some errors.<br>
							3. Don't use quotes and special characters for the Name and Post of the member<br>
							4. Enter the TERM in the exact format specified. Only enter 1 Year Terms.<br>
							5. The Committee Members will be shown on the website with the latest term in the current Committe. If a new Term is added then that will be shown in the current committe and the previous committe will be moved down.<br>
							6. The Members will be shown on the website in the order in which they are added (For a Specific Term). So if you want to change the order, then remove all the members of the current Term and then add them in the order which is needed.<br>
							7. If you want to rectify any mistakes, you can remove the member from the button in the table and then add the member again with the corrected details.<br>
							8. A Unique Identifier C-ID of the member is shown here. Use the C-ID of the member to add sub-committee members for that member in the Change Sub-Committe Page.<br>
							9. Only upload an square jpg image that is optimized and compressed. Resolution of 1000px x 1000px is preffered. Larger image size will lead to longer page load times of the website.<br>
							10. New Members will be added to the bottom of the list for that Term.<br>
							11. For Any Other Doubts, Please Check the source code of the admin panel and website to find the corresponding details.
						</div>
					</div>
				</div>
			</div>
		
		</div>


		<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px; background-color: rgba(0,0,0,0.05);">

			<!-- Form Name -->
			<legend style="text-align: center;"><strong>Add New Committee Members</strong></legend>

			<form>
				<div class="form-group">
					<label>Member Name</label>
					<input type="text" class="form-control" placeholder="Enter Full Name of the Member" x-model="newMember.name" aria-describedby="name_help" />
					<small id="name_help" class="form-text text-muted">Enter the name with the title eg. Mr. Michael Scott.</small>
				</div>

				<div class="form-group">

					<label>Member Post</label>
					<input type="text" class="form-control" placeholder="Enter the Post for the Member" x-model="newMember.post" />
				</div>

				<div class="form-group">

					<label>Member Image</label>
					<input type="file" accept="image/*" id="imageFile" aria-describedby="image_help"/>
					<small id="image_help" class="form-text text-muted">Please use a Square (1000px x 1000px) jpg Image and the file name for the image should be the name of the member, eg. Michael_Scott.jpg</small>
				</div>

				<div class="form-group">

					<label>Member Term</label>
					<input type="text" class="form-control" placeholder="Enter the Term of the Member" x-model="newMember.term" aria-describedby="term_help"/>
					<small id="term_help" class="form-text text-muted">Please enter the years of term in this EXACT format: 2020-2021</small>
				</div>

				<input class="btn btn-primary" type="button" value="Add Member" @click="addMember()" />
			</form>

		</div>



		<div class="container" style="margin-top: 20px; margin-bottom: 20px; padding: 20px;">

			<!-- Table Name -->
			<legend style="text-align: center;"><strong>Existing Committee Members</strong></legend>

			<div class="table-responsive">

			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>C-ID</th>
						<th>Name</th>
						<th>Post</th>
						<th>Image Name</th>
						<th>Term</th>
						<th>Remove</th>
					</tr>
				</thead>
				<tbody>
					<template x-for="member in members">
						<tr>
							<td x-text="member.id"></td>
							<td x-text="member.name"></td>
							<td x-text="member.post"></td>
							<td x-text="member.image"></td>
							<td x-text="member.term"></td>
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