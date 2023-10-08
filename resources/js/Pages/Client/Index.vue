<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import NavLink from '@/Components/NavLink.vue';

const props = defineProps({
    clients:{
        type:Object
    }
})

const form = useForm({});


function destroy(id){
    if (confirm("Esta seguro de eliminar")){
        form.delete(route('cliente.destroy',id));
    }
}

</script>

<template>
       <AppLayout title="Cliente">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de clientes
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                    <NavLink :href="route('cliente.create')" >
                                            Crear Cliente
                    </NavLink>


                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Nombre / Apellido
                                </th>

                               

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Direccion
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Telefono
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900" >
                            <tr  v-for="c in clients">
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    <div class="flex items-center gap-x-2">
                                        <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                                        <div>
                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{ c.firsh_name  }} {{ c.last_name }}</h2>
                                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">authurmelo@example.com</p>
                                        </div>
                                    </div>
                                </td>
                               
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{c.address}}</td>
                             
                                
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ c.phone }}</td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-x-6">

                                      
                                        

                                        <NavLink :href="route('cliente.edit',c.id)" >
                                            Editar
                                        </NavLink>
                                        <button @click="destroy(c.id)" class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                            Borrar
                                        </button>

                                   
                                    </div>
                                </td>
                            </tr>

                          
                        </tbody>
                    </table>
            </div>
        </div>
       </AppLayout>
    
</template>