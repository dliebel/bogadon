<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';



const props = defineProps({
    client:{
        type:Object
    }
})


const form = useForm({
    first_name:props.client.first_name,
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



        <div class="m-6">
            <div class="max-w-12xl mx-auto ">
                <FormSection @submitted="submit">
                <template #messager>
                    <Breadcrumb class="-mt-2" :breadcrumbs="migasDePan"/> 
                    <FlashMessages />
                </template>
                <template #title> Editar Cliente</template>

                <template #description>
                    Formulario para editar el cliente. Complete los datos requeridos


                    <div class="col-span-6 sm:col-span-3 pt-10">
                    </div>

                </template>

                <template #form> 
                    <!-- Profile Photo -->

                

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-3">
                        <InputLabel for="first_name" value="Nombre" />
                        <TextInput id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" required />
                        <InputError :message="form.errors.first_name" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <InputLabel for="last_name" value="Apellido" />
                        <TextInput id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" />
                        <InputError :message="form.errors.last_name" class="mt-2" />

                    </div>
                



                    <div class="col-span-6 sm:col-span-2">
                        <InputLabel for="phone" value="Teléfono " />
                        <TextInput id="phone" type="number" class="mt-1 block w-full" v-model="form.phone" required/>
                        <InputError :message="form.errors.phone" class="mt-2" />
                    </div>



                    <div class="col-span-6 sm:col-span-6">
                        <InputLabel for="address" value="Dirección" />
                        <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address" />
                        <InputError :message="form.errors.address" class="mt-2" />
                    </div>

                </template>

                <template #actions>
                    <Link
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                    :href="route('cliente.index')" style="transition: all 0.15s ease">
                    <span class="">Cancelar</span>
                    </Link>
                    <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                    </ActionMessage>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Guardar
                    </PrimaryButton>
                </template>
                </FormSection>
            </div>
        </div>


    </AppLayout>
</template>