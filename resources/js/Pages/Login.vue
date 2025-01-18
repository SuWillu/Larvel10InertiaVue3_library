<template>
	<div class="login auth">		
		<div id="container">
			<h1>Please log in</h1>				
			<form  @submit.prevent="form.post('/login')" class="auth-form">				
				<div class="form-group">
					<label for="Your E-mail Address">Your E-mail Address</label><br />
					<input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text" v-model="form.email">
					<div v-if="form.errors.email" class="errors">{{ form.errors.email }}</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label><br />
					<input required="required" type="password" class="form-control" placeholder="Password" name="password" v-model="form.password">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Submit">
				</div>
				<input name="_token" type="hidden" value="{{ Session::token() }}">
			</form><br /><br />
			<div>If you have not signed up yet, please signup!</div>			
			<Link href="/signup" class="button editbutton">signup</Link>
		</div>
	</div>
</template>

<script setup>
	import {useForm, Link} from '@inertiajs/vue3';	

	const form = useForm({		
		email: '',
		password: '',			
	});
	
</script>