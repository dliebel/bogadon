<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';



const props = defineProps({
    client:{
        type:Object
    }
})


const form = useForm({
    firsh_name:props.client.firsh_name,
    last_name:props.client.last_name,
    address:props.client.address,
    phone:props.client.phone,
})


const submit = () =>{
    form.put(route('cliente.update',props.client.id));

}


       

</script>

<template>
     <AppLayout title="Actualizar Cliente">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formulario de Actualizacion de clientes
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                <div>
                    <h2 class="font-semibold text-xl text-gray-600">Responsive Form</h2>
                    <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p>

                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                                <p>Please fill out all the fields.</p>
                            </div>

                            <div class="lg:col-span-2">
                                <form @submit.prevent="submit">

                                    <div class="m-4 p-4">
                                        <InputLabel for="firsh_name" value="Nombre" />
                                        <TextInput
                                            id="firsh_name"
                                            v-model="form.firsh_name"
                                            type="firsh_name"
                                            class="mt-1 block w-full"
                                            required
                                            autocomplete="current-firsh_name"
                                        />
                                        <InputError class="mt-2" :message="form.errors.firsh_name" />
                                    </div>

                                    <div class="m-4 p-4">
                                        <InputLabel for="last_name" value="Apellido" />
                                        <TextInput
                                            id="last_name"
                                            v-model="form.last_name"
                                            type="last_name"
                                            class="mt-1 block w-full"
                                            required
                                            autocomplete="current-last_name"
                                        />
                                        <InputError class="mt-2" :message="form.errors.last_name" />
                                    </div>

                                    <div class="m-4 p-4">
                                        <InputLabel for="address" value="Direccion" />
                                        <TextInput
                                            id="address"
                                            v-model="form.address"
                                            type="address"
                                            class="mt-1 block w-full"
                                            required
                                            autocomplete="current-address"
                                        />
                                        <InputError class="mt-2" :message="form.errors.address" />
                                    </div>
                                    <div class="m-4 p-4">
                                        <InputLabel for="phone" value="Telefono" />
                                        <TextInput
                                            id="phone"
                                            v-model="form.phone"
                                            type="phone"
                                            class="mt-1 block w-full"
                                            required
                                            autocomplete="current-phone"
                                        />
                                        <InputError class="mt-2" :message="form.errors.phone" />
                                    </div>



                                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                       Guardar
                                    </PrimaryButton>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                 
                
            </div>
        </div>
    </AppLayout>
</template>