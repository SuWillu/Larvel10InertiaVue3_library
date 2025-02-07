<template>
	<header>
		<nav>
			<Link href="/logout" method="post" class="button editbutton logout" v-if="$page.props.auth.user">Logout</Link>
			<Link href="/login" class="button editbutton logout" v-else="$page.props.auth.user">Login</Link>
		</nav>
	</header>
	<div class="book_create">		
		<form @submit.prevent="form.get(`/search`)">
			<div class="filtersrow">
				<label for="search">Search</label><br /><br />
				<input name="search" placeholder="Search..." type="text" v-model="columnFilters.search" class="filters" />
				
				<label for="titlef">Filter by Title</label><br /><br />
				<input name="titlef" placeholder="Title starts with..." type="text" v-model="columnFilters.titlef"  class="filters"/>
				
				<label for="authorf">Filter by Author</label><br /><br />
				<input name="authorf" placeholder="Author starts with..." type="text" v-model="columnFilters.authorf" class="filters" />
				
				<label for="available">Available</label><br /><br />
				<select name="available" v-model="columnFilters.available" @onChange="event.target.value" class="filters">		
				  <option selected :value="undefined">all</option>
				  <option value="1">available</option>
				  <option value="0">not available</option>
				</select>
			</div>
		</form>
	
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td class="header-item">ISBN</td>
					<td class="header-item cursor-pointer" @click="sortBy('title')">
						<div class="row"><span class="pad-rt">Title</span><div class="arrows"><div class="arrow-up" /><div class="arrow-down" /></div></div>
					</td>
					<td class="header-item cursor-pointer" @click="sortBy('author')">
						<div class="row"><span class="pad-rt">Author</span><div class="arrows"><div class="arrow-up" /><div class="arrow-down" /></div></div>
					</td>
					<td class="header-item">Description</td>
					<td class="header-item">Cover Image</td>
					<td class="header-item">Publisher</td>
					<td class="header-item">Publication Date</td>
					<td class="header-item">Category</td>
					<td class="header-item">Page Count</td>
					<td class="header-item cursor-pointer" @click="sortBy('available')">
						<div class="row"><span class="pad-rt">Available</span><div class="arrows"><div class="arrow-up" /><div class="arrow-down" /></div></div>
					</td>
					<td class="header-item">Average Rating</td>
					<td class="header-item">Actions</td>
				</tr>
			</thead>
			<tbody>
				<tr class="book_block" v-for="book in books" :key="book.id">
					<td>{{ book.isbn }}</td>
					<td>{{ book.title }}</td>
					<td>{{ book.author }}</td>
					<td>{{ book.description }}</td>
					<td>{{ book.cover_img }}</td>
					<td>{{ book.publisher }}</td>
					<td>{{ book.publication_date }}</td>
					<td>{{ book.category }}</td>
					<td>{{ book.page_count }}</td>
					<td>{{ book.available ? "Yes" : "No"  }}</td>
					<td>{{ book.reviews_avg_stars }}</td>
					<td>
						<Link :href="`/book/${ book.id }`" class="button showbutton">Show</Link>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>



<script setup>
import {useForm, router, Link} from '@inertiajs/vue3';
import {defineProps, ref, computed, watch, reactive} from 'vue';
import {throttle, pickBy} from 'lodash';

	let props = defineProps({
		books: Object,
		filters: Object
	});
	
	const columnFilters = reactive({
		search: props.filters.search,
		available: props.filters.available,
		titlef: props.filters.titlef,
		authorf: props.filters.authorf,
		column: props.filters.column,
		direction: props.filters.direction
	});
	
	const form = useForm({
		search:''	
	});
	
	let search = ref(props.filters.search);	
	let available = ref(props.filters.available);
	let titlef = ref(props.filters.titlef);
	let authorf = ref(props.filters.authorf);
	
	function sortBy(column) {
		columnFilters.column = column;
		columnFilters.direction = columnFilters.direction === 'asc' ? 'desc' : 'asc';
	}
	
	watch(columnFilters,
		throttle(() => {
			let query = pickBy(columnFilters);
			let queryRoute = route(
				"search",
				Object.keys(query).length ? query : {
					remember: "forget",
				}
			);
		
			router.get(
				queryRoute,
				{},
				{
					preserveScroll: true,
					preserveState: true,
					replace: true,
				}
			);
						
		}, 500),
		{
			deep: true,
		}
	);
</script>