<template>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <inertia-link :href="$route('people.index')" class="navbar-brand">Inertia Demo</inertia-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"  v-if="user">
                    <inertia-link :href="$route('people.index')" class="nav-link">My People</inertia-link>
                </li>
                <li class="nav-item"  v-if="user">
                    <inertia-link :href="$route('people.create')" class="nav-link">Add</inertia-link>
                </li>
            </ul>
            <ul class="navbar-nav pull-right mt-2 mt-md-0">
                <li class="nav-item" v-if="!user">
                    <inertia-link href="/login" class="nav-link">Login</inertia-link>
                </li>
                <li class="nav-item" v-if="!user">
                    <inertia-link href="/register" class="nav-link">Register</inertia-link>
                </li>
                <li class="nav-item" v-if="user">
                    <span class="navbar-text" v-if="user">
                        Logged in as {{user.name}}
                    </span>
                    <inertia-link href="/logout" as="button" method="post" class="nav-link logout-link" style="display: inline" type="button">Logout</inertia-link>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
export default {
    name: "AppHeader",
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        }
    }
}
</script>
