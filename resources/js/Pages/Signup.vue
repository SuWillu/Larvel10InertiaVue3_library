<template>
	<Navigation>
	</Navigation>
	<div class="auth">		
		<div id="container">
			<h1>Sign Up</h1>				
			<form  @submit.prevent="form.post('/signup')" class="auth-form">
				<div class="form-group">
					<label for="first_name">First Name</label><br />
					<input required="required" class="form-control" placeholder="Your first name" name="first_name" type="text" v-model="form.first_name">
					<div v-if="form.errors.first_name" class="errors">{{ form.errors.first_name }}</div>
				</div>
				<div class="form-group">
					<label for="Your E-mail Address">Your E-mail Address</label><br />
					<input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text" v-model="form.email">
					<div v-if="form.errors.email" class="errors">{{ form.errors.email }}</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label><br />
					<input required="required" type="password" class="form-control" placeholder="Password" name="password" v-model="form.password">
					<div v-if="form.errors.password" class="errors">{{ form.errors.password }}</div>
				</div>
				<div class="form-group">
					<label for="Role">Role</label><br />
					<select name="role_id" class="form-control" v-model="form.role_id">		
					  <option class="form-control" v-for="role in roles" :value="role.id">{{ role.name }}</option>
					</select>
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Submit">
				</div>
			</form>			
		</div>
	</div>
</template>

<script setup>
	import {useForm} from '@inertiajs/vue3';
	import {defineProps} from 'vue';
	import Navigation from '@/Pages/Navigation.vue';
	
	defineProps({
		roles: Object	
	})

	const form = useForm({
		first_name: '',
		email: '',
		password: '',
		role_id: 2,
	});
	
</script>