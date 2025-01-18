<template>
	<header>
		<nav>
			<Link href="/" class="button editbutton">Home</Link>
			<Link href="/logout" class="button editbutton logout" v-if="$page.props.auth.user">Logout</Link>
			<Link href="/login" class="button editbutton logout" v-else="$page.props.auth.user">Login</Link>
		</nav>
	</header>
</template>

<script setup>
import {Link} from '@inertiajs/vue3';
</script>