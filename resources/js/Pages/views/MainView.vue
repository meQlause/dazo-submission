<script setup lang="ts">
import AppSidebar from "../components/AppSidebar.vue";
import AppHeader from "../components/AppHeader.vue";
import AppProducts from "../components/AppProducts.vue";
import AppCreateProduct from "../components/AppCreateProduct.vue";
import { ref } from "vue";
import { Category, Paginated, Product } from "../components/utils/types";

const createProduct = ref<boolean>(false);

const props = defineProps<{
    categories?: Category[];
    products?: Paginated<Product>;
    totalPages?: any;
    totalItems?: any;
}>();

</script>

<template>
    <main class="flex bg-[#F6F8FC]">
        <AppSidebar :modelValue="true" />
        <section class="flex h-full flex-col w-full overflow-y-hidden">
            <AppHeader />
            <div class="mt-[28px] mx-[32px]">
                <AppProducts
                    v-model="createProduct"
                    :class="createProduct ? 'hidden' : 'block'"
                    :products="props.products"
                />
                <AppCreateProduct
                    v-model="createProduct"
                    :class="createProduct ? 'block' : 'hidden'"
                />
            </div>
        </section>
    </main>
</template>
