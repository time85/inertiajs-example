<template>
    <app-header></app-header>

    <div class="row">
        <div class="col-md-12" style="margin-top: 20px">
            <h2 class="text-left">All People</h2>

            <errors-and-messages :errors="errors"></errors-and-messages>

            <div v-if="peoples.data.length > 0">

                <table>
                    <tbody>
                        <tr v-for="person in peoples.data" :key="person.id">

                            <td>{{person.firstname}}</td>
                            <td>{{person.lastname}}</td>
                            <td>{{person.slug}}</td>
                            <td><inertia-link :href="$route('people.edit', {id: person.id})" class="btn btn-primary pull-right action-btn">Edit Person</inertia-link>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <!-- Pagination links-->
                <nav aria-label="Page navigation" v-if="peoples.total > peoples.per_page" style="margin-top: 20px">
                    <ul class="pagination">
                        <!-- Previous link -->
                        <li :class="'page-item' + (peoples.links[0].url == null ? ' disabled' : '')">
                            <inertia-link :href="peoples.links[0].url == null ? '#' : peoples.links[0].url" class="page-link" v-html="peoples.links[0].label"></inertia-link>
                        </li>

                        <!-- Numbers -->
                        <li v-for="item in numberLinks" :class="'page-item' + (item.active ? ' disabled' : '')">
                            <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                        </li>

                        <!-- Next link -->
                        <li :class="'page-item' + (peoples.links[peoples.links.length - 1].url == null ? ' disabled' : '')">
                            <inertia-link :href="peoples.links[peoples.links.length - 1].url == null ? '#' : peoples.links[peoples.links.length - 1].url" class="page-link" v-html="peoples.links[peoples.links.length - 1].label"></inertia-link>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="text-center" v-else>
                No people found! <inertia-link :href="$route('people.create')">Create Person</inertia-link>
            </div>
        </div>
    </div>

</template>

<script>
import AppHeader from "../../Partials/AppHeader";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";

export default {
    name: "people",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    props: {
        errors: Object
    },
    setup() {
        const route = inject('$route');

        const deletePost = (id) => {
            if (!confirm('Are you sure?')) return;
            Inertia.delete(route('people.destroy', {id}));
        }

        const peoples = computed(() => usePage().props.value.people);

        const numberLinks = peoples.value.links.filter((v, i) => i > 0 && i < peoples.value.links.length - 1);

        return {
            peoples,
            deletePost,
            numberLinks
        }
    }
}
</script>

<style scoped>
.action-btn {
    margin-left: 12px;
    font-size: 13px;
}

.article {
    margin-top: 20px;
}

</style>
