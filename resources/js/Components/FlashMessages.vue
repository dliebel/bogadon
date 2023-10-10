<script setup>
import { ref, watch, computed } from 'vue'
import {Link, usePage } from '@inertiajs/vue3';
// import Icon from "@/Components/Icon.vue";

const isVisible = ref(true)
const show = ref(true);
const page = usePage();





const triggerToast = computed(() => {
  let ret = page.props.flash;
  if (undefined !== ret) {

    show.value = true;
    setTimeout(function () {
      show.value = false;
    }, 8000);
  }
});
</script>
<template>
  <div v-if="triggerToast">sdsd</div>
  <div class="my-2">


    <div v-if="page.props.flash.success && show" class="rounded-md bg-[#C4F9E2] p-4">
      <div class="flex w-full items-center justify-between">
        <div class="flex items-center text-sm font-medium text-[#004434] " >
          <span class="pr-3">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="10" cy="10" r="10" fill="#00B078"></circle>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M14.1203 6.78954C14.3865 7.05581 14.3865 7.48751 14.1203 7.75378L9.12026 12.7538C8.85399 13.02 8.42229 13.02 8.15602 12.7538L5.88329 10.4811C5.61703 10.2148 5.61703 9.78308 5.88329 9.51682C6.14956 9.25055 6.58126 9.25055 6.84753 9.51682L8.63814 11.3074L13.156 6.78954C13.4223 6.52328 13.854 6.52328 14.1203 6.78954Z"
                fill="white"></path>
            </svg>
          </span>
          <div>
            {{ page.props.flash.success }} 
          </div>
          <div  v-if="page.props.flash.urlView " class=" ml-2" >
            <Link :href="page.props.flash.urlView"    class="inline-flex items-center px-1 p-0.5  bg-white  rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-green-300 focus:ring focus:ring-green-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
             style="transition: all 0.15s ease">
             <span class="flex items-center ">  <Icon :icon="'heroicons-outline:ticket'" class="w-5 h-5 hover:text-green-600 rounded-xl hover:bg-green-200 mr-1 " /> Ver ticket</span>
               
            </Link>
          </div>
        </div>
          
        <div class="flex items-center text-sm font-medium text-[#004434]">
          <button class="hover:text-danger text-[#ACACB0]" @click="show = false">
            <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M18.8839 5.11612C19.372 5.60427 19.372 6.39573 18.8839 6.88388L6.88388 18.8839C6.39573 19.372 5.60427 19.372 5.11612 18.8839C4.62796 18.3957 4.62796 17.6043 5.11612 17.1161L17.1161 5.11612C17.6043 4.62796 18.3957 4.62796 18.8839 5.11612Z">
              </path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.11612 5.11612C5.60427 4.62796 6.39573 4.62796 6.88388 5.11612L18.8839 17.1161C19.372 17.6043 19.372 18.3957 18.8839 18.8839C18.3957 19.372 17.6043 19.372 17.1161 18.8839L5.11612 6.88388C4.62796 6.39573 4.62796 5.60427 5.11612 5.11612Z">
              </path>
            </svg>
          </button>
        </div>
      </div>

    </div>



    <div v-if="(page.props.flash.error || Object.keys(page.props.errors).length > 0)  && show" class="rounded-md bg-red-100 p-4">
      <div class="flex w-full items-center justify-between">
        <div class="flex items-center text-sm font-medium text-red-700">
          <span class="pr-3">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#BC1C21"
              class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" fill="white"
                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
          <div v-if="page.props.flash.error">
              {{ page.props.flash.error }}
          </div>
          <div v-else>
              <span class="font-medium">Error. </span>
              <span  v-if="Object.keys(page.props.errors).length === 1">Existe un error en el formulario.</span>
              <span v-else>Existe {{ Object.keys(page.props.errors).length }} errores en el formulario.</span>
          </div>
        </div>
        <div class="flex items-center text-sm font-medium text-[#004434]">
          <button class="hover:text-danger text-[#ACACB0]" @click="show = false">
            <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M18.8839 5.11612C19.372 5.60427 19.372 6.39573 18.8839 6.88388L6.88388 18.8839C6.39573 19.372 5.60427 19.372 5.11612 18.8839C4.62796 18.3957 4.62796 17.6043 5.11612 17.1161L17.1161 5.11612C17.6043 4.62796 18.3957 4.62796 18.8839 5.11612Z">
              </path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.11612 5.11612C5.60427 4.62796 6.39573 4.62796 6.88388 5.11612L18.8839 17.1161C19.372 17.6043 19.372 18.3957 18.8839 18.8839C18.3957 19.372 17.6043 19.372 17.1161 18.8839L5.11612 6.88388C4.62796 6.39573 4.62796 5.60427 5.11612 5.11612Z">
              </path>
            </svg>
          </button>
        </div>
      </div>

    </div>

</div></template>