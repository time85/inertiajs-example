<template>
    <app-header></app-header>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" @submit.prevent="submit">
                    <h2 class="text-left">Update Person</h2>
                    <errors-and-messages :errors="errors"></errors-and-messages>
                    <div class="form-group">
                        <label for="firstname">firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" v-model="form.firstname" />
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" v-model="form.lastname" />
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" class="form-control" name="street" id="street" v-model="form.street" />
                    </div>
                     <div class="form-group">
                        <label for="postalCode">PostalCode</label>
                        <input type="text" class="form-control" name="postalCode" id="postalCode" v-model="form.postalCode" />
                    </div>
                     <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" v-model="form.city" />
                    </div>


                    <a @click="submit()" class="btn btn-primary btn-block text-white">
                        <font-awesome-icon :icon="['fas', 'save']" />&nbsp;Save
                    </a>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import AppHeader from "../../Partials/AppHeader";
import {inject, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
export default {
    name: "Edit",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    props: {
        errors: Object
    },
    setup() {
        const form = reactive({
            firstname: null,
            lastname: null,
            street: null,
            postalCode: null,
            city: null,
            _token: usePage().props.value.csrf_token,
            _method: "PUT"
        });
        // retrieve post prop
        const {firstname, lastname, street, postalCode, city, id } = usePage().props.value.people;
        form.firstname = firstname;
        form.lastname = lastname;
        form.street = street;
        form.postalCode = postalCode;
        form.city = city;
        const route = inject('$route');
        function submit() {
            Inertia.post(route('people.update', {'id': id}), form, {
                forceFormData: true
            });
        }
        return {
            form, submit
        }
    }
}
</script>
<style scoped>
form {
    margin-top: 20px;
}
</style>
