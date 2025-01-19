<template>
	<header>
		<nav>
			<Link href="/search" class="button editbutton">Home</Link>
			<Link href="/logout" class="button editbutton logout" v-if="$page.props.auth.user">Logout</Link>
			<Link href="/login" class="button editbutton logout" v-else="$page.props.auth.user">Login</Link>
		</nav>
	</header>
	<div class="show-book" >
		<div class="container">
			<h3>{{ book.title }} by {{ book.author }}</h3>
			<p class="stars">Stars: {{props.avgstars}}</p>
			<p>Description: {{ book.description }} </p>
			<p>Publisher: {{ book.publisher }}</p>
			<p>First published: {{ book.publication_date }}</p>
			<p>Category: {{ book.category }}</p>
			<p>{{ book.page_count }} Pages</p>
			<p>Available: {{ book.available ? "Yes" : "No" }}</p>
			<div v-if="$page.props.auth.user && $page.props.auth.user.role_id == 2">
				<Link :href="`/checkout/${ book.id }`" class="button editbutton" v-if="book.available == true" @click="checkoutBook">Checkout Book</Link><br /><br />
				<div v-bind="message" class="msg">Books are due 5 days after checkout.</div>
			</div>
		</div>
		
		<div class="review-create" v-if="$page.props.auth.user && $page.props.auth.user.role_id == 2">
			<form @submit.prevent="form.post('/review')" class="auth-form">
				<div class="form-group">
					<label for="stars">Stars (Please rate this book giving a number between 1 and 5):</label>				
					<select name="stars" class="form-control" v-model="form.stars">
					<option v-for="index in 5" :key="index" class="form-control" :value="index">{{index}}</option>				 
					</select>
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<input type="text" class="form-control" v-model="form.description" />
					<div v-if="form.errors.description" class="errors">{{ form.errors.description }}</div>
				</div>	
				<div class="form-group">				
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				<input type="hidden" name="book_id" v-model="form.book_id" value="props.book.id" />
				<input type="hidden" name="user_id" v-model="form.user_id"  value="$page.props.auth.user.id" />
			</form>
		</div>
		<div class="container"><h3>Reviews</h3>
			<div v-for="review in reviews">
				<div class="reviews">
					<p>User:{{ review.customer.first_name }}</p>
					<p>Stars: {{review.stars}}</p>
					<p>Description: {{ review.description }} </p>
				</div>
			</div>
		</div>	
	</div>
		
	
</template>

<script setup>
import {defineProps, computed, ref} from 'vue';
import {useForm, Link, router, usePage} from '@inertiajs/vue3';

	let props = defineProps({
		book: Object,
		reviews: Object,
		avgstars: Number,
		message: String
	});
	
	
	const page = usePage()
	
	const form = useForm({
		book_id: props.book.id,
		user_id: page.props.auth.user.id,		
		stars: 1,
		description: '',			
	});
	
	const todaysDate = ref(new Date().toISOString());
	
	function checkoutBook() {
	  const data = {
		book_id: props.book.id,
		user_id: page.props.auth.user.id
	  };

	  router.post('/checkout/${ book.id }', data);
	}
	
	
</script>