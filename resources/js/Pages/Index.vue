<template>	
	<Navigation>
	</Navigation>
		<div class="home">
		<div class="container">
		<div><Link href="/book/create" class="button editbutton" v-if="$page.props.auth.user && $page.props.auth.user.role_id == 1">Add new book</Link></div>		
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td class="header-item">ISBN</td>
						<td class="header-item">Title</td>
						<td class="header-item">Author</td>
						<td class="header-item">Description</td>
						<td class="header-item">Cover Image</td>
						<td class="header-item">Publisher</td>
						<td class="header-item">Publication Date</td>
						<td class="header-item">Category</td>
						<td class="header-item">Page Count</td>
						<td class="header-item">Available</td>
						<td class="header-item"></td>
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
						<td>{{ book.available }}</td>
						<td>
							<Link :href="`/book/${ book.id }`" class="button showbutton" v-if="$page.props.auth.user">Show</Link>
							<div v-if="$page.props.auth.user && $page.props.auth.user.role_id == 1">
								<Link :href="`/checkin/${ book.id }`" class="button editbutton" @click="checkinBook(book.id)" v-if="(book.available == false)">Checkin</Link>							
								<Link :href="`/book/edit/${ book.id }`" class="button editbutton">Edit</Link>
								<Link :href="`/book/delete/${ book.id }`" method="DELETE" class="button deletebutton">Delete</Link>
							</div>
						</td>
					</tr>
				</tbody>
			</table>		
		</div>
	</div>
</template>

<script setup>
import {defineProps, ref} from 'vue';
import {Link, router, usePage} from '@inertiajs/vue3';
import Navigation from '@/Pages/Navigation.vue';

	defineProps({
		books: Object	
	})
	
	const todaysDate = ref(new Date().toISOString());
	
	const page = usePage();
	
	function checkinBook(book_id) {
	  const data = {
		book_id: book_id,
		librarian_id: page.props.auth.user.id
	  };

	  router.post('/checkin/' + book_id, data);
	}
</script>