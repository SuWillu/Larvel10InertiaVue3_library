<template>
	<Navigation>
	</Navigation>
	<div class="book_create" v-if="$page.props.auth.user && $page.props.auth.user.role_id == 1">
		<h2>Edit Book</h2>
		<form @submit.prevent="form.put(`/book/update/${book.id}`)" class="auth-form">
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
				<textarea v-model="form.description" class="form-control" ></textarea>
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
				<button type="submit" class="btn btn-primary">Update Book</button>
			</div>
		</form>
	</div>
</template>

<script setup>
	import {useForm, Link} from '@inertiajs/vue3';
	import {defineProps} from 'vue';
	import Navigation from '@/Pages/Navigation.vue';
	
	let props = defineProps({
		book: Object
	});

	const form = useForm({
		isbn: props.book.isbn,
		title: props.book.title,
		author: props.book.author,
		description: props.book.description,
		cover_img: props.book.cover_img,
		publisher: props.book.publisher,
		publication_date: props.book.publication_date,
		category: props.book.category,
		page_count: props.book.page_count		
	});
	
</script>