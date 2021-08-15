<template>
    <app-header></app-header>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" @submit.prevent="submit">
                    <h2 class="text-left">Delete Person</h2>
                    <errors-and-messages :errors="errors"></errors-and-messages>
                    <div class="form-group">
                        <label class="col-md-6"><strong>Firstname</strong></label>
                        <label>{{data.firstname}} </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><strong>Lastname</strong></label>
                        <label>{{data.lastname}} </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><strong>Street</strong></label>
                        <label>{{data.street}} </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><strong>PostalCode</strong></label>
                        <label>{{data.postalCode}} </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><strong>City</strong></label>
                        <label>{{data.city}} </label>
                    </div>
                    <a @click="submit()" class="btn btn-block btn-danger text-white">
                        <font-awesome-icon :icon="['fas', 'trash']" />&nbsp;Delete
                    </a>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import AppHeader from "../../Partials/AppHeader";
import {inject} from "vue";
import {Inertia} from "@inertiajs/inertia";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
export default {
    name: "Delete",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    props: {
        errors: Object
    },
    setup() {
        let data = usePage().props.value.people;
        const route = inject('$route');
        function submit() {
            Inertia.delete(route('people.delete', {'id': data.id}), data, {
                forceFormData: true
            });
        }
        return {
            data, submit
        }
    }
}
</script>
<style scoped>
form {
    margin-top: 20px;
}
</style>
