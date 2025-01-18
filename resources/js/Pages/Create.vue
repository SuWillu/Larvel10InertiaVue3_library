<template>
	<Navigation>
	</Navigation>
	<div class="book_create" v-if="$page.props.auth.user && $page.props.auth.user.role_id == 1">
		<h2>Add New Book</h2>
		<form @submit.prevent="form.post('/book')" class="auth-form">
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<input type="text" class="form-control" v-model="form.isbn" />
				<div v-if="form.errors.isbn" class="errors">{{ form.errors.isbn }}</div>
			</div>
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" class="form-control" v-model="form.title" />
				<div v-if="form.errors.title" class="errors">{{ form.errors.title }}</div>
			</div>
			<div class="form-group">
				<label for="author">Author:</label>
				<input type="text" class="form-control" v-model="form.author" />
				<div v-if="form.errors.author" class="errors">{{ form.errors.author }}</div>
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" v-model="form.description" ></textarea>
				<div v-if="form.errors.description" class="errors">{{ form.errors.description }}</div>
			</div>
			<div class="form-group">
				<label for="cover_img">Cover Image:</label>
				<input type="text" class="form-control" v-model="form.cover_img" />
				<div v-if="form.errors.cover_img" class="errors">{{ form.errors.cover_img }}</div>
			</div>
			<div class="form-group">
				<label for="publisher">Publisher:</label>
				<input type="text" class="form-control" v-model="form.publisher" />
				<div v-if="form.errors.publisher">{{ form.errors.publisher }}</div>
			</div>
			<div class="form-group">
				<label for="publication_date">Publication Date:</label>
				<input type="date" class="form-control" v-model="form.publication_date" />
				<div v-if="form.errors.publication_date">{{ form.errors.publication_date }}</div>
			</div>
			<div class="form-group">
				<label for="category">Category:</label>
				<input type="integer" class="form-control" v-model="form.category" />
				<div v-if="form.errors.category">{{ form.errors.category }}</div>
			</div>
			<div class="form-group">
				<label for="page_count">Number of Pages:</label>
				<input type="integer" class="form-control" v-model="form.page_count" />
				<div v-if="form.errors.page_count">{{ form.errors.page_count }}</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</template>

<script setup>
	import {useForm, Link} from '@inertiajs/vue3';
	import Navigation from '@/Pages/Navigation.vue';

	const form = useForm({
		isbn: '',
		title: '',
		author: '',
		description: '',
		cover_img: '',
		publisher: '',
		publication_date: '',
		category: '',
		page_count: 0		
	});
	
</script>